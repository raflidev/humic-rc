<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('role', 'user')->get();
        return view('admin.user.user', ['user' => $user]);
    }

    public function index_admin()
    {
        $user = DB::table('users')->where('role', 'superadmin')->get();
        return view('admin.user.user', ['user' => $user]);
    }

    public function login_index()
    {
        return view('login');
    }

    public function register_index()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('nip', 'password'))) {
            return redirect()->route('research.index');
        }

        return back()->withErrors([
            'wrong' => 'NIP atau Password anda salah!',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:users|min:8',
            'password' => 'required|min:8',
            'confirmed_password' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'status' => false,
            'role' => 'user',
        ]);

        $user->save();
        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.user_add');
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
            'nama' => 'required',
            'nip' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User([
            'name' => $request->nama,
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'status' => true,
            'role' => 'user',
        ]);

        $user->save();
        return redirect()->route('user.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function verifikasi($id)
    {
        $user = User::find($id);
        $user->update(['status' => true]);
        return redirect()->route('user.index')->with('success', 'Berhasil Verifikasi Data');
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
        $user = DB::table('users')->where('id', $id)->get();
        return view('admin.user.user_edit', ['user' => $user]);
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
        $user = User::find($id);
        $user->update([
            'name' => $request->nama,
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('user.index')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Berhasil Hapus Data');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('research.index')->with('success', 'Berhasil Logout');
    }
}
