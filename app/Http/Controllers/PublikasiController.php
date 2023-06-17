<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Publikasi::all();
        return view('publikasi', ['data' => $data]);
    }

    public function create_index()
    {
        $data = Publikasi::all();
        return view('admin.publikasi.publikasi', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publikasi.publikasi_add');
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
            "jenis_publikasi" => 'required',
            "judul" => 'required',
            "nama_jurnal" => 'required',
            "issue" => 'required',
            "volume" => 'required',
            "tahun" => 'required',
            "quartile" => 'required',
            "indexed" => 'required',
            "link_makalah" => 'required',
        ]);

        $dataMember = [];
        $input = $request->input();
        $member = $request->jumlah_member;
        if ($member > 0) {
            for ($i = 1; $i <= $member; $i++) {
                $dataMember[$i] = $input["nama_member$i"];
            }
        }

        $dataMemberPartner = [];
        $input = $request->input();
        $partner = $request->jumlah_partner;
        if ($partner > 0) {
            for ($i = 1; $i <= $partner; $i++) {
                $dataMemberPartner[$i] = $input["nama_partner$i"];
            }
        }

        $data = new Publikasi();
        $data->jenis_publikasi = $request->jenis_publikasi;
        $data->judul = $request->judul;
        $data->member = implode("|", $dataMember);
        $data->partner = implode("|", $dataMemberPartner);
        $data->nama_jurnal = $request->nama_jurnal;
        $data->issue = $request->issue;
        $data->volume = $request->volume;
        $data->tahun = $request->tahun;
        $data->quartile = $request->quartile;
        $data->indexed = $request->indexed;
        $data->link_makalah = $request->link_makalah;
        $data->save();

        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Publikasi::where('id', $id)->firstOrFail();
        return view('admin.publikasi.publikasi_edit', ['data' => $data]);
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
            "jenis_publikasi" => 'required',
            "judul" => 'required',
            "nama_jurnal" => 'required',
            "issue" => 'required',
            "volume" => 'required',
            "tahun" => 'required',
            "quartile" => 'required',
            "indexed" => 'required',
            "link_makalah" => 'required',
        ]);

        $dataMember = [];
        $input = $request->input();
        $member = $request->jumlah_member;
        if ($member > 0) {
            for ($i = 1; $i <= $member; $i++) {
                $dataMember[$i] = $input["nama_member$i"];
            }
        }

        $dataMemberPartner = [];
        $input = $request->input();
        $partner = $request->jumlah_partner;
        if ($partner > 0) {
            for ($i = 1; $i <= $partner; $i++) {
                $dataMemberPartner[$i] = $input["nama_partner$i"];
            }
        }

        $data = Publikasi::where('id', $id)->firstOrFail();
        $data->jenis_publikasi = $request->jenis_publikasi;
        $data->judul = $request->judul;
        $data->member = implode("|", $dataMember);
        $data->partner = implode("|", $dataMemberPartner);
        $data->nama_jurnal = $request->nama_jurnal;
        $data->issue = $request->issue;
        $data->volume = $request->volume;
        $data->tahun = $request->tahun;
        $data->quartile = $request->quartile;
        $data->indexed = $request->indexed;
        $data->link_makalah = $request->link_makalah;
        $data->save();

        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publikasi = Publikasi::where('id', $id)->firstOrFail();
        $publikasi->delete();
        return redirect()->route('publikasi.create_index')->with('success', 'Berhasil Menghapus Data');
    }
}
