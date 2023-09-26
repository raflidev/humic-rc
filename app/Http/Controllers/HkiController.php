<?php

namespace App\Http\Controllers;

use App\Imports\HkiImport;
use App\Models\Hki;
use App\Models\member_hki;
use App\Models\mitra_hki;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hki::where('status_post', true)->get();
        $data_count = $data->count();
        $data_count_tahun_ini = $data->where('tahun', date('Y'))->count();
        return view('hki', ['data' => $data, 'data_count' => $data_count, 'data_count_tahun_ini' => $data_count_tahun_ini]);
    }

    public function create_index()
    {
        // $data = Hki::all();

        $hki = Hki::query();

        if (Auth::user()->role == "user") {
            $hki = Hki::join('member_hki', 'hki.id', '=', 'member_hki.hki_id')
                ->select('hki.*')
                ->where('member_hki.user_id', Auth::user()->id);
        } else {
            $hki = Hki::select('hki.*');
        }

        $hki = $hki->get();
        return view('admin.hki.hki', ['data' => $hki]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hki.hki_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "jenis" => 'required',
            "judul" => 'required',
            "tahun" => 'required',
            "status" => 'required',
        ]);

        $data = new Hki();
        $data->jenis = $request->jenis;
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->status = $request->status;
        if (Auth::user()->role == 'user') {
            $data->status_post = false;
        } else {
            $data->status_post = true;
        }
        $data->save();
        if (Auth::user()->role != 'admin') {
            $member_hki = new member_hki;
            $member_hki->hki_id = $data->id;
            $member_hki->user_id = Auth::user()->id;
            $member_hki->role = 'Ketua';
            $member_hki->save();
        }

        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Hki::where('id', $id)->firstOrFail();
        return view('admin.hki.hki_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "jenis" => 'required',
            "judul" => 'required',
            "tahun" => 'required',
            "status" => 'required',
        ]);


        $data = Hki::where('id', $id)->firstOrFail();
        $data->jenis = $request->jenis;
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Diubah!');
    }

    public function excel_import()
    {
        return view('admin.hki.hki_excel');
    }

    public function excel_import_post(Request $request)
    {
        Excel::import(new HkiImport, $request->file('File'));
        return redirect()->route('hki.create_index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function verifikasi($id)
    {
        $data = Hki::where('id', $id)->firstOrFail();
        $data->status_post = 1;
        $data->save();
        return redirect()->route('hki.create_index')->with('success', 'Berhasil Verifikasi Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hki::where('id', $id)->delete();
        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Dihapus!');
    }

    public function member($id)
    {
        $user = User::where('role', 'user')->get();
        $member = member_hki::join('users', 'member_hki.user_id', '=', 'users.id')
            ->where('hki_id', $id)
            ->select('users.name', 'member_hki.role', 'member_hki.id')
            ->get();
        $data = Hki::where('id', $id)->first();
        return view('admin.hki.hki_member', ['user' => $user, 'id' => $id, 'data' => $data, 'member' => $member]);
    }

    public function mitra($id)
    {
        $user = User::where('role', 'user')->get();
        $mitra = mitra_hki::where('hki_id', $id)->get();
        $data = Hki::where('id', $id)->first();
        return view('admin.hki.hki_mitra', ['user' => $user, 'id' => $id, 'data' => $data, 'mitra' => $mitra]);
    }

    public function member_store(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'role' => 'required',
        ]);

        $checkDuplicate = member_hki::where('hki_id', $id)->where('user_id', $request->user_id)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'User Sudah Ada di Member!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_hki::where('hki_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_hki::where('hki_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $member = member_hki::create([
            'hki_id' => $id,
            'user_id' => $request->user_id,
            'role' => $request->role,
        ]);



        $member->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function mitra_store(Request $request, $id)
    {
        $request->validate([
            'nama_mitra' => 'required',
            'role' => 'required',
        ]);

        $checkDuplicate = mitra_hki::where('hki_id', $id)->where('nama_mitra', $request->nama_mitra)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'Mitra Sudah Ada di Mitra!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_hki::where('hki_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_hki::where('hki_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $mitra = mitra_hki::create([
            'hki_id' => $id,
            'nama_mitra' => $request->nama_mitra,
            'role' => $request->role,
        ]);



        $mitra->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function member_destroy($id)
    {
        $member = member_hki::where('id', $id);
        $member->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function mitra_destroy($id)
    {
        $mitra = mitra_hki::where('id', $id);
        $mitra->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function laporan()
    {
        $data = DB::table('hki')->get();
        return view('admin.hki.hki_laporan', ['data' => $data]);
    }
}
