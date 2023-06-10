<?php

namespace App\Http\Controllers;

use App\Models\isiTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsiTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // target and isitarget join
        $data = DB::table('target')
            ->join('isi_target', 'target.id', '=', 'isi_target.id_target')
            ->select('isi_target.*')
            ->where('target.id', $id)
            ->get();

        $awal = DB::table('target')->where('id', $id)->get();

        $penelitian = DB::table('research')->get();
        $pengnas = DB::table('pengnas')->get();
        $moa = DB::table('moa')->get();
        $mou = DB::table('mou')->get();
        $ai = DB::table('ai')->get();
        return view('admin.isiTarget.isiTarget', ['data' => $data, 'awal' => $awal[0], 'penelitian' => $penelitian, 'pengnas' => $pengnas, 'moa' => $moa, 'mou' => $mou, 'ai' => $ai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        DB::table('isi_target')->insert([
            'id_target' => $id,
            'subjek' => $request->subjek,
            'id_subjek' => $request->id_subjek,
        ]);


        return redirect()->route('isitarget.index', $id)->with('success', 'Berhasil Menambahkan Data');
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
    public function destroy($id, $id_delete)
    {
        $target = isiTarget::where('id', $id_delete);
        $target->delete();
        return redirect()->route('isitarget.index', $id)->with('success', 'Berhasil Menghapus Data');
    }
}
