<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = DB::table('research')->get();
        return view('home', ['research' => $research]);
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
        $research = DB::table('research')->get();
        return view('admin.research.research', ['research' => $research]);
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

        $research = new Research([
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'research_title' => $request->judul_penelitian,
            'skill_group' => $request->kelompok_keahlian,
            'head_name' => $request->nama_ketua,
            // 'head_partner_name' => $request->nama_ketua_pasangan,
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

        $research->save();

        return redirect()->route('research.create_index');
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

        $research = Research::where('research_id', $id);
        $research->update([
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'research_title' => $request->judul_penelitian,
            'skill_group' => $request->kelompok_keahlian,
            'head_name' => $request->nama_ketua,
            // 'head_partner_name' => $request->nama_ketua_pasangan,
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
        return redirect()->route('research.create_index');  
    }
}
