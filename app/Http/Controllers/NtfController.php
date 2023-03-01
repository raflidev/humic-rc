<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NtfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ntf')->get();
        return view('admin.ntf.ntf', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ntf.ntf_add');
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
            'dana' => 'required',
            'tahun' => 'required',
        ]);

        DB::table('ntf')->insert([
            'dana' => $request->dana,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('ntf.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $grafik = DB::table('ntf')->get();
        return view('ntf', ['grafik' => $grafik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('ntf')->where('id', $id)->first();
        return view('admin.ntf.ntf_edit', ['ntf' => $data]);
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
            'dana' => 'required',
            'tahun' => 'required',
        ]);

        DB::table('ntf')->where('id', $id)->update([
            'dana' => $request->dana,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('ntf.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ntf')->where('id', $id)->delete();
        return redirect()->route('ntf.index')->with('success', 'Data berhasil dihapus!');
    }
}
