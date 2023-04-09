<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('target')->get();
        return view('target', ['data' => $data]);
    }

    public function index_admin()
    {
        $data = DB::table('target')->get();
        return view('admin.target.target', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.target.target_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('target')->insert([
            'tahun' => $request->tahun,
            'sumber' => $request->sumber,
            'indikator' => $request->indikator,
            'target' => $request->target,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('target.index_admin')->with('success', 'Berhasil Menambahkan Data');
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
        $data = DB::table('target')->where('id', $id)->get();
        return view('admin.target.target_edit', ['data' => $data[0]]);
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
        DB::table('target')->where('id', $id)->update([
            'tahun' => $request->tahun,
            'sumber' => $request->sumber,
            'indikator' => $request->indikator,
            'target' => $request->target,
            'capaian' => $request->capaian,
            'gap' => $request->gap,
            'kesimpulan' => $request->kesimpulan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('target.index_admin')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Target::where('id', $id);
        $target->delete();
        return redirect()->route('target.index_admin')->with('success', 'Berhasil Hapus Data');;
    }
}
