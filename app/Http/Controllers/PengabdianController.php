<?php

namespace App\Http\Controllers;

use App\Models\Pengnas;
use Illuminate\Http\Request;
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
        return view('pengabdian', ['data' => $data]);
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

        $pengnas = new Pengnas([
            'period' => $request->periode,
            'scheme' => $request->skema,
            'faculty' => $request->fakultas,
            'study_program' => $request->prodi,
            'skill_group' => $request->kelompok_keahlian,
            'title_abdimas' => $request->judul_abdimas,
            'head' => $request->nama_ketua,
            'fund' => $request->dana,
            'society' => $request->masyarakat_sasar,
            'society_address' => $request->alamat_masyarakat_sasar,
            'city' => $request->kota,
            'society_scheme' => $request->skema_masyarakat,
            'society_faculty' => $request->fakultas_masyarakat,
        ]);

        $pengnas->save();

        return redirect()->route('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
