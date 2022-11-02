<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_moa(Request $request)
    {
        //
    }
    public function store_mou(Request $request)
    {
        //
    }
    public function store_ai(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
