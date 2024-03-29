<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = DB::table('target');
        $capaian_sum = $data->sum('capaian');
        $capaian_tahun_ini = $data->where('tahun', date('Y'))->sum('capaian');
        $target_sum = $data->sum('target');
        $target_tahun_ini = $data->where('tahun', date('Y'))->sum('target');
        $data = $data->get();


        return view('target', [
            'data' => $data,
            'capaian_sum' => $capaian_sum,
            'capaian_tahun_ini' => $capaian_tahun_ini,
            'target_sum' => $target_sum,
            'target_tahun_ini' => $target_tahun_ini,
        ]);
    }

    public function laporan()
    {
        $data = DB::table('target')->get();
        $pdf = FacadePdf::loadView('admin.target.laporan', ['data' => $data]);
        return $pdf->stream();
    }

    public function index_admin()
    {
        if (Auth::user()->role == 'superadmin') {
            $data = DB::table('target')->get();
        } else {
            $data = DB::table('pic')
                ->join('target', 'pic.id_target', '=', 'target.id')
                ->where('pic.id_user', Auth::user()->id)
                ->select('target.id', 'target.tahun', 'target.sumber', 'target.indikator', 'pic.target', 'target.keterangan', 'target.capaian')
                ->get();
        }

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
            'capaian' => 0,
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
