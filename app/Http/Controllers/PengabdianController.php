<?php

namespace App\Http\Controllers;

use App\Imports\PengmasImport;
use App\Models\member_pengmas;
use App\Models\mitra_pengmas;
use App\Models\Pengnas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengnas')->whereNotNull('faculty')->where('status', true)->get();
        $total_data = $data->count();
        $total_pengmas_internal = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'internal')->where('status', true)->get()->count();
        $total_pengmas_eksternal = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'eksternal')->where('status', true)->get()->count();
        $total_pengmas_internal_regular = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'internal')->where('fund_scheme', 'regular')->where('status', true)->get()->count();
        $total_pengmas_internal_mandiri = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'internal')->where('fund_scheme', 'mandiri')->where('status', true)->get()->count();
        $total_pengmas_internal_kolabinternal = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'internal')->where('fund_scheme', 'kolaborasi internal')->where('status', true)->get()->count();
        $total_pengmas_internal_kolabeksternal = DB::table('pengnas')->whereNotNull('faculty')->where('fund_type', 'internal')->where('fund_scheme', 'kolaborasi eksternal')->where('status', true)->get()->count();
        // grafik
        $grafik = DB::table('pengnas')->select('faculty', DB::raw('SUM(fund) as fund'))->whereNotNull('faculty')->where('status', true)->groupBy('faculty')->get();
        return view('pengabdian', ['data' => $data, 'total_data' => $total_data, 'total_pengmas_internal' => $total_pengmas_internal, 'total_pengmas_eksternal' => $total_pengmas_eksternal, 'total_pengmas_internal_regular' => $total_pengmas_internal_regular, 'total_pengmas_internal_mandiri' => $total_pengmas_internal_mandiri, 'total_pengmas_internal_kolabinternal' => $total_pengmas_internal_kolabinternal, 'total_pengmas_internal_kolabeksternal' => $total_pengmas_internal_kolabeksternal, 'grafik' => $grafik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_index()
    {
        // if (Auth::user()->role == "user") {
        //     $name = "%" . Auth::user()->name . "%";
        //     $data = DB::table('pengnas')->where("head", 'like', "$name")->orWhere('user_id', Auth::user()->id)->orWhere('lecturer', 'like', "$name")->get();
        // } else {
        //     $data = DB::table('pengnas')->get();
        // }


        $pengabdian = Pengnas::query();

        if (Auth::user()->role == "user") {
            $pengabdian = Pengnas::join('member_pengmas', 'pengnas.pengnas_id', '=', 'member_pengmas.pengmas_id')
                ->select('pengnas.*')
                ->where('member_pengmas.user_id', Auth::user()->id);
        } else {
            $pengabdian = Pengnas::select('pengnas.*');
        }

        $pengabdian = $pengabdian->get();

        return view('admin.pengabdian.pengabdian', ['pengabdian' => $pengabdian]);
    }


    public function create()
    {
        return view('admin.pengabdian.pengabdian_add');
    }

    public function excel_import()
    {
        return view('admin.pengabdian.pengabdian_excel');
    }

    public function excel_import_post(Request $request)
    {
        Excel::import(new PengmasImport, $request->file('File'));
        return redirect()->route('pengabdian.create_index')->with('success', 'Berhasil Menambahkan Data');
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
            'periode' => 'required',
            'skema' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'judul_abdimas' => 'required',
            'dana' => 'required',
        ]);


        if (Auth::user()->role == "superadmin") {
            $pengnas = new Pengnas([
                'period' => $request->periode,
                'user_id' => Auth::user()->id,
                'scheme' => $request->skema,
                'faculty' => $request->fakultas,
                'study_program' => $request->prodi,
                'skill_group' => $request->kelompok_keahlian,
                'title_abdimas' => $request->judul_abdimas,
                'head' => $request->nama_ketua,
                // 'lecturer_total' => $request->jumlah_dosen,
                // 'student_total' => $request->jumlah_mahasiswa,
                'fund' => $request->dana,
                'society' => $request->masyarakat_sasar,
                'society_address' => $request->alamat_masyarakat_sasar,
                'city' => $request->kota,
                'society_scheme' => $request->skema_masyarakat,
                'society_faculty' => $request->fakultas_masyarakat,
                'status' => True,
                'fund_scheme' => $request->skema_dana,
                'fund_type' => $request->jenis_pendanaan,
            ]);
        } else {
            $pengnas = new Pengnas([
                'period' => $request->periode,
                'user_id' => Auth::user()->id,
                'scheme' => $request->skema,
                'faculty' => $request->fakultas,
                'study_program' => $request->prodi,
                'skill_group' => $request->kelompok_keahlian,
                'title_abdimas' => $request->judul_abdimas,
                // 'head' => $request->nama_ketua,
                // 'lecturer' => implode("|", $dataDosen),
                // 'lecturer_total' => $request->jumlah_dosen,
                // 'student' => implode("|", $dataMahasiswa),
                // 'student_total' => $request->jumlah_mahasiswa,
                'fund' => $request->dana,
                'society' => $request->masyarakat_sasar,
                'society_address' => $request->alamat_masyarakat_sasar,
                'city' => $request->kota,
                'society_scheme' => $request->skema_masyarakat,
                'society_faculty' => $request->fakultas_masyarakat,
                'status' => False,
                'dana_skema' => $request->skema_dana,
                'fund_type' => $request->jenis_pendanaan,
            ]);
        }

        $pengnas->save();

        if (Auth::user()->role != 'admin') {
            $member_pengmas = new member_pengmas;
            $member_pengmas->pengmas_id = $pengnas->id;
            $member_pengmas->user_id = Auth::user()->id;
            $member_pengmas->role = 'Ketua';
            $member_pengmas->save();
        }

        return redirect()->route('pengabdian.create_index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = DB::table('pengnas')->where('pengnas_id', $id)->first();
        return view('admin.pengabdian.pengabdian_edit', ['pengabdian' => $data]);
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
            'periode' => 'required',
            'skema' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'judul_abdimas' => 'required',
            'dana' => 'required',
        ]);

        $pengnas = Pengnas::where('pengnas_id', $id);
        $pengnas->update([
            'period' => $request->periode,
            'scheme' => $request->skema,
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'skill_group' => $request->kelompok_keahlian,
            'title_abdimas' => $request->judul_abdimas,
            // 'head' => $request->nama_ketua,
            // 'student_total' => $request->jumlah_mahasiswa,
            'fund' => $request->dana,
            'society' => $request->masyarakat_sasar,
            'society_address' => $request->alamat_masyarakat_sasar,
            'city' => $request->kota,
            'society_scheme' => $request->skema_masyarakat,
            'society_faculty' => $request->fakultas_masyarakat,
            'fund_scheme' => $request->skema_dana,
            'fund_type' => $request->jenis_pendanaan,
        ]);

        return redirect()->route('pengabdian.create_index')->with('success', 'Berhasil Update Data');
    }

    public function verifikasi($id)
    {
        $pengnas = Pengnas::where('pengnas_id', $id);
        $pengnas->update(['status' => true]);
        return redirect()->route('pengabdian.create_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengnas = Pengnas::where('pengnas_id', $id);
        $pengnas->delete();
        return redirect()->route('pengabdian.create_index')->with('success', 'Berhasil Hapus Data');
    }

    public function member($id)
    {
        $user = User::where('role', 'user')->get();
        $member = member_pengmas::join('users', 'member_pengmas.user_id', '=', 'users.id')
            ->where('pengmas_id', $id)
            ->select('users.name', 'member_pengmas.role', 'member_pengmas.id')
            ->get();
        $data = Pengnas::where('pengnas_id', $id)->first();
        return view('admin.pengabdian.pengabdian_member', ['user' => $user, 'id' => $id, 'data' => $data, 'member' => $member]);
    }

    public function mitra($id)
    {
        $user = User::where('role', 'user')->get();
        $mitra = mitra_pengmas::where('pengmas_id', $id)->get();
        $data = Pengnas::where('pengnas_id', $id)->first();
        return view('admin.pengabdian.pengabdian_mitra', ['user' => $user, 'id' => $id, 'data' => $data, 'mitra' => $mitra]);
    }

    public function member_store(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'role' => 'required',
        ]);

        $checkDuplicate = member_pengmas::where('pengmas_id', $id)->where('user_id', $request->user_id)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'Member Sudah Ada!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_pengmas::where('pengmas_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_pengmas::where('pengmas_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $member = member_pengmas::create([
            'pengmas_id' => $id,
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

        $checkDuplicate = mitra_pengmas::where('pengmas_id', $id)->where('nama_mitra', $request->nama_mitra)->first();
        if ($checkDuplicate != null) {
            return back()->withErrors([
                'wrong' => 'Mitra Sudah Ada!',
            ]);
        }

        if ($request->role == 'Ketua') {
            $checkMitra = mitra_pengmas::where('pengmas_id', $id)->where('role', 'ketua')->first();
            if ($checkMitra != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Mitra!',
                ]);
            }

            $checkMember = member_pengmas::where('pengmas_id', $id)->where('role', 'ketua')->first();
            if ($checkMember != null) {
                return back()->withErrors([
                    'wrong' => 'Ketua Sudah Ada di Member!',
                ]);
            }
        }

        $mitra = mitra_pengmas::create([
            'pengmas_id' => $id,
            'nama_mitra' => $request->nama_mitra,
            'role' => $request->role,
        ]);



        $mitra->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function member_destroy($id)
    {
        $member = member_pengmas::where('id', $id);
        $member->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function mitra_destroy($id)
    {
        $mitra = mitra_pengmas::where('id', $id);
        $mitra->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function laporan()
    {
        $data = DB::table('pengnas')->get();
        return view('admin.pengabdian.pengabdian_laporan', ['data' => $data]);
    }
}
