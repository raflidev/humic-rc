<?php

namespace App\Http\Controllers;

use App\Imports\AiImport;
use App\Imports\MoaImport;
use App\Imports\MouImport;
use App\Models\Ai;
use App\Models\Moa;
use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class KerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kerjasama');
    }

    public function index_mou()
    {
        $data = DB::table('mou')->get();
        return view('kerjasama_mou', ['data' => $data]);
    }

    public function index_moa()
    {
        $data = DB::table('moa')->get();
        return view('kerjasama_moa', ['data' => $data]);
    }

    public function index_ai()
    {
        $data = DB::table('ai')->get();
        // dd($data);
        return view('kerjasama_ai', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_mou()
    {
        return view('admin.kerjasama.kerjasama_mou_add');
    }
    public function create_moa()
    {
        return view('admin.kerjasama.kerjasama_moa_add');
    }
    public function create_ai()
    {
        return view('admin.kerjasama.kerjasama_ai_add');
    }

    // excel
    public function excel_import_moa()
    {
        return view('admin.kerjasama.kerjasama_moa_excel');
    }

    public function excel_import_moa_post(Request $request)
    {
        Excel::import(new MoaImport, $request->file('File'));
        return back();
    }

    public function excel_import_mou()
    {
        return view('admin.kerjasama.kerjasama_mou_excel');
    }

    public function excel_import_mou_post(Request $request)
    {
        Excel::import(new MouImport, $request->file('File'));
        return back();
    }

    public function excel_import_ai()
    {
        return view('admin.kerjasama.kerjasama_ai_excel');
    }

    public function excel_import_ai_post(Request $request)
    {
        Excel::import(new AiImport, $request->file('File'));
        return back();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_mou(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'fakultas' => 'required',
            'telunumber' => 'required',
            'nomormitra' => 'required',
            'title' => 'required',
            'instansiMitra' => 'required',
            'jenisMitra' => 'required',
            'tanggalPengesahan' => 'required',
            'tanggalBerakhir' => 'required',
            'durasi'    => 'required',
            'status'    => 'required',
            'lndn' => 'required',
            'pnp' => 'required',
            'akd' => 'required',
            'filemou' => 'required',
            'aktifitas' => 'required',
        ]);

        DB::table('mou')->insert([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'telu_number' => $request->telunumber,
            'partner_number' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date_start' => $request->tanggalPengesahan,
            'date_end' => $request->tanggalBerakhir,
            'duration' => $request->durasi,
            'status' => $request->status,
            'lndn' => $request->lndn,
            'pnp' => $request->pnp,
            'akd' => $request->akd,
            'file' => $request->filemou,
            'activity_real' => $request->aktifitas,
        ]);

        return redirect()->route('kerjasama.mou');
    }
    public function store_moa(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'fakultas' => 'required',
            'moanumber' => 'required',
            'nomormitra' => 'required',
            'title' => 'required',
            'instansiMitra' => 'required',
            'jenisMitra' => 'required',
            'tanggalPengesahan' => 'required',
            'tanggalBerakhir' => 'required',
            'durasi' => 'required',
            'status' => 'required',
            'lndn' => 'required',
            'pnp' => 'required',
            'akd' => 'required',
            'link' => 'required',
            'aktifitas' => 'required',
        ]);

        $moa = new Moa([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'moa_number' => $request->moanumber,
            'moa_number_partner' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date_start' => $request->tanggalPengesahan,
            'date_end' => $request->tanggalBerakhir,
            'duration' => $request->durasi,
            'status' => $request->status,
            'lndn' => $request->lndn,
            'pnp' => $request->pnp,
            'akd' => $request->akd,
            'link' => $request->link,
            'activity_real' => $request->aktifitas,
        ]);

        $moa->save();

        return redirect()->route('kerjasama.moa');
    }
    public function store_ai(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'fakultas' => 'required',
            'telunumber' => 'required',
            'nomormitra' => 'required',
            'title' => 'required',
            'instansiMitra' => 'required',
            'jenisMitra' => 'required',
            'tanggalPenandatangan' => 'required',
            'status' => 'required',
            'lndn' => 'required',
            'link' => 'required',
            'aktifitas' => 'required',
        ]);

        $ai = new Ai([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'telu_number' => $request->telunumber,
            'partner_number' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date' => $request->tanggalPenandatangan,
            'status_ai' => $request->status,
            'lndn' => $request->lndn,
            'link' => $request->link,
            'activity_real' => $request->aktifitas,
            'status' => 'false'
        ]);

        $ai->save();

        return redirect()->route('kerjasama.ai');
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
    public function edit_moa($id)
    {
        $data = DB::table('moa')->where('moa_id', $id)->first();
        return view('admin.kerjasama.kerjasama_moa_edit', ['data' => $data]);
    }

    public function edit_mou($id)
    {
        $data = DB::table('mou')->where('mou_id', $id)->first();
        return view('admin.kerjasama.kerjasama_mou_edit', ['data' => $data]);
    }

    public function edit_ai($id)
    {
        $data = DB::table('ai')->where('ai_id', $id)->first();
        return view('admin.kerjasama.kerjasama_ai_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_moa(Request $request, $id)
    {
        $moa = Moa::where('moa_id', $id);
        $moa->update([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'moa_number' => $request->moanumber,
            'moa_number_partner' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date_start' => $request->tanggalPengesahan,
            'date_end' => $request->tanggalBerakhir,
            'duration' => $request->durasi,
            'status' => $request->status,
            'lndn' => $request->lndn,
            'pnp' => $request->pnp,
            'akd' => $request->akd,
            'link' => $request->link,
            'activity_real' => $request->aktifitas,
        ]);
        return redirect()->route('kerjasama.moa');
    }

    public function update_mou(Request $request, $id)
    {
        $mou = Mou::where('mou_id', $id);
        $mou->update([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'telu_number' => $request->telunumber,
            'partner_number' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date_start' => $request->tanggalPengesahan,
            'date_end' => $request->tanggalBerakhir,
            'duration' => $request->durasi,
            'status' => $request->status,
            'lndn' => $request->lndn,
            'pnp' => $request->pnp,
            'akd' => $request->akd,
            'file' => $request->filemou,
            'activity_real' => $request->aktifitas,
        ]);
        return redirect()->route('kerjasama.mou');
    }

    public function update_ai(Request $request, $id)
    {
        $ai = Ai::where('ai_id', $id);
        $ai->update([
            'year' => $request->tahun,
            'faculty' => $request->fakultas,
            'telu_number' => $request->telunumber,
            'partner_number' => $request->nomormitra,
            'title' => $request->title,
            'partner_name' => $request->instansiMitra,
            'partner_type' => $request->jenisMitra,
            'date' => $request->tanggalPenandatangan,
            'status_ai' => $request->status,
            'lndn' => $request->lndn,
            'link' => $request->link,
            'activity_real' => $request->aktifitas,
            'status' => 'false'
        ]);

        return redirect()->route('kerjasama.ai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_moa($id)
    {
        $moa = Moa::where('moa_id', $id);
        $moa->delete();
        return redirect()->route('kerjasama.moa');
    }
    public function destroy_mou($id)
    {
        $mou = Mou::where('mou_id', $id);
        $mou->delete();
        return redirect()->route('kerjasama.mou');
    }
    public function destroy_ai($id)
    {
        $ai = Ai::where('ai_id', $id);
        $ai->delete();
        return redirect()->route('kerjasama.ai');
    }
}
