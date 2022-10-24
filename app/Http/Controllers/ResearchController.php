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
        return view('admin.research', ['research' => $research]);
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
            'faculty' => 'required',
            'study_program' => 'required',
            'research_title' => 'required',
            'skill_group' => 'required',
            'head_name' => 'required',
            'fund_external' => 'required',
            'fund_total' => 'required',
            'research_type' => 'required',
            'year' => 'required',
            'fund_type' => 'required',
            'group_society' => 'required',
            'fund_group_society' => 'required',
            'brim' => 'required',
            'fund_brim' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'contract_number' => 'required',
            'description' => 'required',
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

        return redirect()->route('/');
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
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        //
    }
}
