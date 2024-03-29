<?php

namespace App\Http\Controllers;

use App\Models\isiTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = DB::table('target')
            ->join('isi_target', 'target.id', '=', 'isi_target.id_target')
            ->join('users', 'isi_target.id_user', '=', 'users.id')
            ->select('isi_target.*', 'users.name')
            ->where('isi_target.id_target', $id);
        // target and isitarget join
        if (Auth::user()->role != 'superadmin') {
            $data = $data->where('isi_target.id_user', Auth::user()->id);
        }

        $data = $data->get();

        // dd($data);


        $awal = DB::table('target')->where('id', $id)->get();

        $penelitian = (Auth::user()->role == "superadmin" ?
            DB::table('research')->where('status', true)->get()
            :
            DB::table('research')
            ->join('member_penelitian', 'research.research_id', '=', 'member_penelitian.penelitian_id')
            ->where('member_penelitian.user_id', Auth::user()->id)
            ->where('research.status', true)
            ->get()
        );
        $pengnas = (Auth::user()->role == "superadmin" ?
            DB::table('pengnas')->where('status', true)->get()
            :
            DB::table('pengnas')
            ->join('member_pengmas', 'pengnas.pengnas_id', '=', 'member_pengmas.pengmas_id')
            ->where('member_pengmas.user_id', Auth::user()->id)
            ->where('status', true)
            ->get()
        );
        $publikasi = (Auth::user()->role == "superadmin" ?
            DB::table('publikasi')->where('status', true)->get()
            :
            DB::table('publikasi')
            ->join('member_publikasi', 'publikasi.id', '=', 'member_publikasi.publikasi_id')
            ->where('member_publikasi.user_id', Auth::user()->id)
            ->where('status', true)
            ->get()
        );
        $hki = (Auth::user()->role == "superadmin" ?
            DB::table('hki')->where('status', true)->get()
            :
            DB::table('hki')
            ->join('member_hki', 'hki.id', '=', 'member_hki.hki_id')
            ->where('member_hki.user_id', Auth::user()->id)
            ->where('status_post', true)
            ->get()
        );
        $moa = (Auth::user()->role == "superadmin" ? DB::table('moa')->where('status', true)->get() : DB::table('moa')->where('user_id', Auth::user()->id)->where('status', true)->get());
        $mou = (Auth::user()->role == "superadmin" ? DB::table('mou')->where('status', true)->get() : DB::table('mou')->where('user_id', Auth::user()->id)->where('status', true)->get());
        $ai = (Auth::user()->role == "superadmin" ? DB::table('ai')->where('status', true)->get() : DB::table('ai')->where('user_id', Auth::user()->id)->where('status', true)->get());
        return view('admin.isiTarget.isiTarget', ['data' => $data, 'awal' => $awal[0], 'penelitian' => $penelitian, 'pengnas' => $pengnas, 'moa' => $moa, 'mou' => $mou, 'ai' => $ai, 'publikasi' => $publikasi, 'hki' => $hki, 'id' => $id]);
        // return view('admin.isiTarget.isiTarget', ['data' => $data, 'awal' => $awal[0], 'penelitian' => $penelitian, 'id' => $id]);
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
            $ketua = "-";
            $fakultas = ($db[0]->faculty == null ? '-' : $db[0]->faculty);
            $kelompok_keahlian = ($db[0]->skill_group == null ? '-' : $db[0]->skill_group);
            $total_bantuan = ($db[0]->fund_total == null ? '-' : $db[0]->fund_total);
            $skema = ($db[0]->research_type == null ? '-' : $db[0]->research_type);
        }

        if ($request->subjek == "Pengabdian Masyarakat") {
            $db = DB::table('pengnas')->where('pengnas_id', $request->id_subjek)->get();
            $prodi = ($db[0]->study_program == null ? '-' : $db[0]->study_program);
            $judul = ($db[0]->title_abdimas == null ? '-' : $db[0]->title_abdimas);
            $ketua = "-";
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

        if ($request->subjek == "Publikasi") {
            $db = DB::table('publikasi')->where('id', $request->id_subjek)->get();
            $prodi = "-";
            $judul = ($db[0]->judul == null ? '-' : $db[0]->judul);
            $ketua = "-";
            $fakultas = "-";
            $kelompok_keahlian = "-";
            $total_bantuan = "-";
            $skema = "-";
        }

        if ($request->subjek == "HKI") {
            $db = DB::table('hki')->where('id', $request->id_subjek)->get();
            $prodi = "-";
            $judul = ($db[0]->judul == null ? '-' : $db[0]->judul);
            $ketua = "-";
            $fakultas = "-";
            $kelompok_keahlian = "-";
            $total_bantuan = "-";
            $skema = "-";
        }

        if (Auth::user()->role != 'admin') {
            $id_user = Auth::user()->id;
        } else {
            $id_user = $request->id_user;
        }

        DB::table('isi_target')->insert([
            'id_user' => $id_user,
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
