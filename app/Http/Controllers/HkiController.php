<?php

namespace App\Http\Controllers;

use App\Imports\HkiImport;
use App\Models\Hki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hki::all()->where('status_post', true);
        return view('hki', ['data' => $data]);
    }

    public function create_index()
    {
        $data = Hki::all();
        return view('admin.hki.hki', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hki.hki_add');
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
            "jenis" => 'required',
            "judul" => 'required',
            "tahun" => 'required',
            "status" => 'required',
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

        $data = new Hki();
        $data->jenis = $request->jenis;
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->member = implode("|", $dataMember);
        $data->partner = implode("|", $dataMemberPartner);
        $data->status = $request->status;
        if (Auth::user()->role == 'user') {
            $data->status_post = false;
        } else {
            $data->status_post = true;
        }
        $data->save();

        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Ditambahkan!');
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
        $data = Hki::where('id', $id)->firstOrFail();
        return view('admin.hki.hki_edit', ['data' => $data]);
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
            "jenis" => 'required',
            "judul" => 'required',
            "tahun" => 'required',
            "status" => 'required',
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

        $data = Hki::where('id', $id)->firstOrFail();
        $data->jenis = $request->jenis;
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->member = implode("|", $dataMember);
        $data->partner = implode("|", $dataMemberPartner);
        $data->status = $request->status;
        $data->save();

        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Diubah!');
    }

    public function excel_import()
    {
        return view('admin.hki.hki_excel');
    }

    public function excel_import_post(Request $request)
    {
        Excel::import(new HkiImport, $request->file('File'));
        return redirect()->route('hki.create_index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function verifikasi($id)
    {
        $data = Hki::where('id', $id)->firstOrFail();
        $data->status_post = 1;
        $data->save();
        return redirect()->route('hki.create_index')->with('success', 'Berhasil Verifikasi Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hki::where('id', $id)->delete();
        return redirect()->route('hki.create_index')->with('success', 'Data HKI Berhasil Dihapus!');
    }
}
