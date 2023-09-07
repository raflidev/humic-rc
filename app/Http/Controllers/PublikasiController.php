<?php

namespace App\Http\Controllers;

use App\Imports\PublikasiImport;
use App\Models\member_publikasi;
use App\Models\mitra_publikasi;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Publikasi::all()->where('status', 1);
        return view('publikasi', ['data' => $data]);
    }

    public function create_index()
    {
        // $data = Publikasi::all();

        $publikasi = Publikasi::query();

        if (Auth::user()->role == "user") {
            $publikasi = Publikasi::join('member_publikasi', 'publikasi.id', '=', 'member_publikasi.publikasi_id')
                ->select('publikasi.*')
                ->where('member_publikasi.user_id', Auth::user()->id);
        } else {
            $publikasi = Publikasi::select('publikasi.*');
        }

        $publikasi = $publikasi->get();
        return view('admin.publikasi.publikasi', ['data' => $publikasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publikasi.publikasi_add');
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
            "jenis_publikasi" => 'required',
            "judul" => 'required',
            "nama_jurnal" => 'required',
            "issue" => 'required',
            "volume" => 'required',
            "tahun" => 'required',
            "quartile" => 'required',
            "indexed" => 'required',
            "link_makalah" => 'required',
        ]);

        $data = new Publikasi();
        $data->jenis_publikasi = $request->jenis_publikasi;
        $data->judul = $request->judul;
        $data->nama_jurnal = $request->nama_jurnal;
        $data->issue = $request->issue;
        $data->volume = $request->volume;
        $data->tahun = $request->tahun;
        $data->quartile = $request->quartile;
        $data->indexed = $request->indexed;
        $data->link_makalah = $request->link_makalah;
        if (Auth::user()->role == 'user') {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        $data->save();

        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Publikasi::where('id', $id)->firstOrFail();
        return view('admin.publikasi.publikasi_edit', ['data' => $data]);
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
            "jenis_publikasi" => 'required',
            "judul" => 'required',
            "nama_jurnal" => 'required',
            "issue" => 'required',
            "volume" => 'required',
            "tahun" => 'required',
            "quartile" => 'required',
            "indexed" => 'required',
            "link_makalah" => 'required',
        ]);

        $data = Publikasi::where('id', $id)->firstOrFail();
        $data->jenis_publikasi = $request->jenis_publikasi;
        $data->user_id = Auth::user()->id;
        $data->judul = $request->judul;
        $data->nama_jurnal = $request->nama_jurnal;
        $data->issue = $request->issue;
        $data->volume = $request->volume;
        $data->tahun = $request->tahun;
        $data->quartile = $request->quartile;
        $data->indexed = $request->indexed;
        $data->link_makalah = $request->link_makalah;
        $data->save();

        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Mengubah Data');
    }

    public function verifikasi($id)
    {
        $data = Publikasi::where('id', $id)->firstOrFail();
        $data->status = 1;
        $data->save();
        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Verifikasi Data');
    }

    public function excel_import()
    {
        return view('admin.publikasi.publikasi_excel');
    }

    public function excel_import_post(Request $request)
    {
        Excel::import(new PublikasiImport, $request->file('File'));
        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publikasi = Publikasi::where('id', $id)->firstOrFail();
        $publikasi->delete();
        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Menghapus Data');
    }

    public function member($id)
    {
        $user = User::where('role', 'user')->get();
        $member = member_publikasi::join('users', 'member_publikasi.user_id', '=', 'users.id')
            ->where('publikasi_id', $id)
            ->select('users.name', 'member_publikasi.role', 'member_publikasi.id')
            ->get();
        $data = Publikasi::where('id', $id)->first();
        return view('admin.publikasi.publikasi_member', ['user' => $user, 'id' => $id, 'data' => $data, 'member' => $member]);
    }

    public function mitra($id)
    {
        $user = User::where('role', 'user')->get();
        $mitra = mitra_publikasi::where('publikasi_id', $id)->get();
        $data = Publikasi::where('id', $id)->first();
        return view('admin.publikasi.publikasi_mitra', ['user' => $user, 'id' => $id, 'data' => $data, 'mitra' => $mitra]);
    }

    public function member_store(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'role' => 'required',
        ]);

        $checkDuplicate = member_publikasi::where('publikasi_id', $id)->where('user_id', $request->user_id)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'User Sudah Ada di Member!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_publikasi::where('publikasi_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_publikasi::where('publikasi_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $member = member_publikasi::create([
            'publikasi_id' => $id,
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

        $checkDuplicate = mitra_publikasi::where('publikasi_id', $id)->where('nama_mitra', $request->nama_mitra)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'Mitra Sudah Ada di Mitra!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_publikasi::where('publikasi_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_publikasi::where('publikasi_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $mitra = mitra_publikasi::create([
            'publikasi_id' => $id,
            'nama_mitra' => $request->nama_mitra,
            'role' => $request->role,
        ]);



        $mitra->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function member_destroy($id)
    {
        $member = member_publikasi::where('id', $id);
        $member->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function mitra_destroy($id)
    {
        $mitra = mitra_publikasi::where('id', $id);
        $mitra->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }
}
