<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = DB::table('pic')
            ->join('target', 'pic.id_target', '=', 'target.id')
            ->join('users', 'pic.id_user', '=', 'users.id')
            ->where('pic.id_target', $id)
            ->select('pic.*', 'target.tahun', 'target.sumber', 'target.indikator')
            ->get();
        // dd($data);
        $awal = DB::table('target')->where('id', $id)->get();
        $user = DB::table('users')->where('role', 'user')->get();
        return view('admin.pic.pic', ['data' => $data, 'awal' => $awal[0], 'user' => $user]);
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
        $request->validate([
            'id_user' => 'required',
            'target' => 'required',
        ]);

        $pic = new Pic();
        $pic->id_target = $id;
        $pic->id_user = $request->id_user;
        $pic->target = $request->target;
        $pic->save();

        return redirect()->route('pic.index', $id)->with('success', 'PIC berhasil ditambahkan');
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
        $pic = Pic::find($id_delete);
        $pic->delete();
        return redirect()->route('pic.index', $pic->id_target)->with('success', 'PIC berhasil dihapus');
    }
}
