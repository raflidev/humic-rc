<?php

namespace App\Http\Controllers;

use App\Imports\ResearchImport;
use App\Models\Research;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = DB::table('research')->whereNotNull('year')->where('status', true)->get();
        $total_dana_internal = DB::table('research')->whereNotNull('year')->where('status', true)->where('fund_type', 'internal')->where('year', ">=", Carbon::now()->year - 2)->sum('fund_total');
        $total_dana_eksternal = DB::table('research')->whereNotNull('year')->where('status', true)->where('fund_type', 'eksternal')->where('year', ">=", Carbon::now()->year - 2)->sum('fund_total');
        $penelitian_internal = DB::table('research')->whereNotNull('year')->where('status', true)->where("fund_type", 'internal')->count();
        $penelitian_eksternal = DB::table('research')->whereNotNull('year')->where('status', true)->where("fund_type", 'eksternal')->count();
        // get data
        $grafik = DB::table('research')->select('year', DB::raw('SUM(fund_total) as fund_total'))->whereNotNull('year')->where('status', true)->where('year', ">=", Carbon::now()->year - 2)->groupBy('year')->get();
        return view('home', ['research' => $research, 'internal' => $total_dana_internal, 'external' => $total_dana_eksternal, 'penelitian_internal' => $penelitian_internal, 'penelitian_eksternal' => $penelitian_eksternal, 'grafik' => $grafik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $research = DB::table('research')->get();
        return view('admin.research.research_add', ['research' => $research]);
    }

    public function create_index()
    {
        if (Auth::user()->role == "user") {
            $name = "%" . Auth::user()->name . "%";
            $research = DB::table('research')->where("head_name", 'like', "$name")->orWhere('user_id', Auth::user()->id)->orWhere('member', 'like', "$name")->get();
        } else {
            $research = DB::table('research')->get();
        }
        return view('admin.research.research', ['research' => $research]);
    }

    public function excel_import()
    {
        return view('admin.research.research_excel');
    }

    public function excel_import_post(Request $request)
    {
        Excel::import(new ResearchImport, $request->file('File'));
        return redirect()->route('research.create_index')->with('success', 'Berhasil Menambahkan Data');
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
            'fakultas' => 'required',
            'prodi' => 'required',
            'judul_penelitian' => 'required',
            'kelompok_keahlian' => 'required',
            'nama_ketua' => 'required',
            'total_dana_external' => 'required',
            'total_dana' => 'required',
            'skema_penelitian' => 'required',
            'tahun_pelaksanaan' => 'required',
            'jenis_pendanaan' => 'required',
            'kelompok_masyarakat' => 'required',
            'dana_kelompok_masyarakat' => 'required',
            'brim' => 'required',
            'dana_brim' => 'required',
            'tanggal_kontrak_start' => 'required',
            'tanggal_kontrak_end' => 'required',
            'nomor_kontrak' => 'required',
            'keterangan' => 'required',
        ]);

        $dataMember = [];
        $input = $request->input();
        $anggota = $request->jumlah_anggota;
        if ($anggota > 0) {
            for ($i = 1; $i <= $anggota; $i++) {
                $dataMember[$i] = $input["nama_anggota$i"];
            }
        }

        $dataMemberPartner = [];
        $input = $request->input();
        $anggota_mitra = $request->jumlah_anggota_mitra;
        if ($anggota_mitra > 0) {
            for ($i = 1; $i <= $anggota_mitra; $i++) {
                $dataMemberPartner[$i] = $input["nama_anggota_mitra$i"];
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

        if (Auth::user()->role == 'user') {
            $research = new Research([
                'faculty' => $request->fakultas,
                'user_id' => Auth::user()->id,
                'study_program' => $request->prodi,
                'research_title' => $request->judul_penelitian,
                'skill_group' => $request->kelompok_keahlian,
                'head_name' => $request->nama_ketua,
                'member' => implode("|", $dataMember),
                'student' => implode("|", $dataMahasiswa),
                'member_partner' => implode("|", $dataMemberPartner),
                'fund_external' => $request->total_dana_external,
                'fund_total' => $request->total_dana,
                'research_type' => $request->skema_penelitian,
                'year' => $request->tahun_pelaksanaan,
                'fund_type' => $request->jenis_pendanaan,
                'group_society' => $request->kelompok_masyarakat,
                'fund_group_society' => $request->dana_kelompok_masyarakat,
                'brim' => $request->brim,
                'fund_brim' => $request->dana_brim,
                'date_start' => $request->tanggal_kontrak_start,
                'date_end' => $request->tanggal_kontrak_end,
                'contract_number' => $request->nomor_kontrak,
                'description' => $request->keterangan,
                'status' => False,
            ]);

            // dd($research);
        } else {
            $research = new Research([
                'faculty' => $request->fakultas,
                'user_id' => Auth::user()->id,
                'study_program' => $request->prodi,
                'research_title' => $request->judul_penelitian,
                'skill_group' => $request->kelompok_keahlian,
                'head_name' => $request->nama_ketua,
                'member' => implode("|", $dataMember),
                'student' => implode("|", $dataMahasiswa),
                'member_partner' => implode("|", $dataMemberPartner),
                'fund_external' => $request->total_dana_external,
                'fund_total' => $request->total_dana,
                'research_type' => $request->skema_penelitian,
                'year' => $request->tahun_pelaksanaan,
                'fund_type' => $request->jenis_pendanaan,
                'group_society' => $request->kelompok_masyarakat,
                'fund_group_society' => $request->dana_kelompok_masyarakat,
                'brim' => $request->brim,
                'fund_brim' => $request->dana_brim,
                'date_start' => $request->tanggal_kontrak_start,
                'date_end' => $request->tanggal_kontrak_end,
                'contract_number' => $request->nomor_kontrak,
                'description' => $request->keterangan,
                'status' => true,
            ]);
        }

        $research->save();

        return redirect()->route('research.create_index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research, $id)
    {
        $research = DB::table('research')->where('research_id', $id)->get();
        return view('admin.research.research_edit', ['research' => $research]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fakultas' => 'required',
            'prodi' => 'required',
            'judul_penelitian' => 'required',
            'kelompok_keahlian' => 'required',
            'nama_ketua' => 'required',
            'total_dana_external' => 'required',
            'total_dana' => 'required',
            'skema_penelitian' => 'required',
            'tahun_pelaksanaan' => 'required',
            'jenis_pendanaan' => 'required',
            'kelompok_masyarakat' => 'required',
            'dana_kelompok_masyarakat' => 'required',
            'brim' => 'required',
            'dana_brim' => 'required',
            'tanggal_kontrak_start' => 'required',
            'tanggal_kontrak_end' => 'required',
            'nomor_kontrak' => 'required',
            'keterangan' => 'required',
        ]);

        $dataMember = [];
        $input = $request->input();
        $anggota = $request->jumlah_anggota;
        if ($anggota > 0) {
            for ($i = 1; $i <= $anggota; $i++) {
                $dataMember[$i] = $input["nama_anggota$i"];
            }
        }

        $dataMemberPartner = [];
        $input = $request->input();
        $anggota_mitra = $request->jumlah_anggota_mitra;
        if ($anggota_mitra > 0) {
            for ($i = 1; $i <= $anggota_mitra; $i++) {
                $dataMemberPartner[$i] = $input["nama_anggota_mitra$i"];
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

        $research = Research::where('research_id', $id);
        $research->update([
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'research_title' => $request->judul_penelitian,
            'skill_group' => $request->kelompok_keahlian,
            'head_name' => $request->nama_ketua,
            'member' => implode("|", $dataMember),
            'student' => implode("|", $dataMahasiswa),
            'member_partner' => implode("|", $dataMemberPartner),
            'head_partner_name' => $request->nama_ketua_mitra,
            // 'fund_external' => $request->dana_eksternal,
            'fund_external' => $request->total_dana_external,
            'fund_total' => $request->total_dana,
            'research_type' => $request->skema_penelitian,
            'year' => $request->tahun_pelaksanaan,
            'fund_type' => $request->jenis_pendanaan,
            'group_society' => $request->kelompok_masyarakat,
            'fund_group_society' => $request->dana_kelompok_masyarakat,
            'brim' => $request->brim,
            'fund_brim' => $request->dana_brim,
            'date_start' => $request->tanggal_kontrak_start,
            'date_end' => $request->tanggal_kontrak_end,
            'contract_number' => $request->nomor_kontrak,
            'description' => $request->keterangan,
        ]);

        return redirect()->route('research.create_index')->with('success', 'Berhasil Update Data');;
    }

    public function verifikasi($id)
    {
        $research = Research::where('research_id', $id);
        $research->update(['status' => true]);
        return redirect()->route('research.create_index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research, $id)
    {
        $research = Research::where('research_id', $id);
        $research->delete();
        return redirect()->route('research.create_index')->with('success', 'Berhasil Hapus Data');;
    }
}
