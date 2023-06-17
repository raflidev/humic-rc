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
        if ($request->subjek == "Penelitian") {
            $db = DB::table('research')->where('research_id', $request->id_subjek)->get();
            $prodi = ($db[0]->study_program == null ? '-' : $db[0]->study_program);
            $judul = ($db[0]->research_title == null ? '-' : $db[0]->research_title);
            $ketua = ($db[0]->head_name == null ? '-' : $db[0]->head_name);
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = ($db[0]->skill_group == null ? '-' : $db[0]->skill_group);
            $total_bantuan = ($db[0]->fund_total == null ? '-' : $db[0]->fund_total);
            $skema = ($db[0]->research_type == null ? '-' : $db[0]->research_type);
        }

        if ($request->subjek == "Pengabdian Masyarakat") {
            $db = DB::table('pengnas')->where('pengnas_id', $request->id_subjek)->get();
            $prodi = ($db[0]->study_program == null ? '-' : $db[0]->study_program);
            $judul = ($db[0]->title_abdimas == null ? '-' : $db[0]->title_abdimas);
            $ketua = ($db[0]->head == null ? '-' : $db[0]->head);
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = ($db[0]->skill_group == null ? '-' : $db[0]->skill_group);
            $total_bantuan = ($db[0]->fund == null ? '-' : $db[0]->fund);
            $skema = ($db[0]->scheme == null ? '-' : $db[0]->scheme);
        }

        if ($request->subjek == "MOA") {
            $db = DB::table('moa')->where('moa_id', $request->id_subjek)->get();
            $prodi = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $judul = ($db[0]->title == null ? '-' : $db[0]->title);
            $ketua = "-";
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = "-";
            $total_bantuan = "-";
            $skema = "-";
        }

        if ($request->subjek == "MOU") {
            $db = DB::table('mou')->where('mou_id', $request->id_subjek)->get();
            $prodi = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $judul = ($db[0]->title == null ? '-' : $db[0]->title);
            $ketua = "-";
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = "-";
            $total_bantuan = "-";
            $skema = "-";
        }

        if ($request->subjek == "IA") {
            $db = DB::table('ai')->where('ai_id', $request->id_subjek)->get();
            $prodi = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $judul = ($db[0]->title == null ? '-' : $db[0]->title);
            $ketua = "-";
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = "-";
            $total_bantuan = "-";
            $skema = "-";
        }

        DB::table('isi_target')->insert([
            'id_target' => $id,
            'subjek' => $request->subjek,
            'id_subjek' => $request->id_subjek,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'kelompok_keahlian' => $kelompok_keahlian,
            'skema' => $skema,
            'total_bantuan' => $total_bantuan,
            'judul' => $judul,
            'ketua' => $ketua,
        ]);


        $target = DB::table('target')->where('id', $id)->get();
        DB::table('target')->where('id', $id)->update([
            'capaian' => $target[0]->capaian + 1,
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
        $isi_target = isiTarget::where('id', $id_delete)->get();
        $target = DB::table('target')->where('id', $isi_target[0]->id_target)->get();
        DB::table('target')->where('id', $isi_target[0]->id_subjek)->update([
            'capaian' => $target[0]->capaian - 1,
        ]);

        $target = isiTarget::where('id', $id_delete);
        $target->delete();
        return redirect()->route('isitarget.index', $id)->with('success', 'Berhasil Menghapus Data');
    }
}
