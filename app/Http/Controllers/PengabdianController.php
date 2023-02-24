<?php

namespace App\Http\Controllers;

use App\Imports\PengmasImport;
use App\Models\Pengnas;
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
        $data = DB::table('pengnas')->get();
        return view('admin.pengabdian.pengabdian', ['pengabdian' => $data]);
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
            'nama_ketua' => 'required',
            'dana' => 'required',
        ]);

        $dataDosen = [];
        $input = $request->input();
        $anggota_dosen = $request->jumlah_dosen;
        if ($anggota_dosen > 0) {
            for ($i = 1; $i <= $anggota_dosen; $i++) {
                $dataDosen[$i] = $input["nama_dosen$i"];
            }
        }

        $dataMahasiswa = [];
        $input = $request->input();
        $mahasiswa = $request->jumlah_mahasiswa;
        if ($mahasiswa > 0) {
            for ($i = 1; $i <= $mahasiswa; $i++) {
                $dataMahasiswa[$i] = $input["nama_mahasiswa$i"];
            }
        }
        if (Auth::user()->role == "superadmin") {
            $pengnas = new Pengnas([
                'period' => $request->periode,
                'scheme' => $request->skema,
                'faculty' => $request->fakultas,
                'study_program' => $request->prodi,
                'skill_group' => $request->kelompok_keahlian,
                'title_abdimas' => $request->judul_abdimas,
                'head' => $request->nama_ketua,
                'lecturer' => implode("|", $dataDosen),
                'lecturer_total' => $request->jumlah_dosen,
                'student' => implode("|", $dataMahasiswa),
                'student_total' => $request->jumlah_mahasiswa,
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
                'scheme' => $request->skema,
                'faculty' => $request->fakultas,
                'study_program' => $request->prodi,
                'skill_group' => $request->kelompok_keahlian,
                'title_abdimas' => $request->judul_abdimas,
                'head' => $request->nama_ketua,
                'lecturer' => implode("|", $dataDosen),
                'lecturer_total' => $request->jumlah_dosen,
                'student' => implode("|", $dataMahasiswa),
                'student_total' => $request->jumlah_mahasiswa,
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
            'nama_ketua' => 'required',
            'dana' => 'required',
        ]);

        $dataDosen = [];
        $input = $request->input();
        $anggota_dosen = $request->jumlah_dosen;
        if ($anggota_dosen > 0) {
            for ($i = 1; $i <= $anggota_dosen; $i++) {
                $dataDosen[$i] = $input["nama_dosen$i"];
            }
        }

        $dataMahasiswa = [];
        $input = $request->input();
        $mahasiswa = $request->jumlah_mahasiswa;
        if ($mahasiswa > 0) {
            for ($i = 1; $i <= $mahasiswa; $i++) {
                $dataMahasiswa[$i] = $input["nama_mahasiswa$i"];
            }
        }

        $pengnas = Pengnas::where('pengnas_id', $id);
        $pengnas->update([
            'period' => $request->periode,
            'scheme' => $request->skema,
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'skill_group' => $request->kelompok_keahlian,
            'title_abdimas' => $request->judul_abdimas,
            'head' => $request->nama_ketua,
            'lecturer' => implode("|", $dataDosen),
            'lecturer_total' => $request->jumlah_dosen,
            'student' => implode("|", $dataMahasiswa),
            'student_total' => $request->jumlah_mahasiswa,
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
}
