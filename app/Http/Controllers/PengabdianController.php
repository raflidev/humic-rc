<?php

namespace App\Http\Controllers;

use App\Models\Pengnas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengnas')->get();
        $total_pengmas = DB::table('pengnas')->get()->count();
        return view('pengabdian', ['data' => $data, 'total_pengmas' => $total_pengmas]);
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
            'kelompok_keahlian' => 'required',
            'judul_abdimas' => 'required',
            'nama_ketua' => 'required',
            'dana' => 'required',
            'masyarakat_sasar' => 'required',
            'alamat_masyarakat_sasar' => 'required',
            'kota' => 'required',
            'skema_masyarakat' => 'required',
            'fakultas_masyarakat' => 'required',
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
            ]);
        }

        $pengnas->save();

        return redirect()->route('pengabdian.create_index');
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
            'kelompok_keahlian' => 'required',
            'judul_abdimas' => 'required',
            'nama_ketua' => 'required',
            'dana' => 'required',
            'masyarakat_sasar' => 'required',
            'alamat_masyarakat_sasar' => 'required',
            'kota' => 'required',
            'skema_masyarakat' => 'required',
            'fakultas_masyarakat' => 'required',
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
        ]);

        return redirect()->route('pengabdian.create_index');
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
        return redirect()->route('pengabdian.create_index');
    }
}
