@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    @guest
                        <a href="/login" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
                            Login
                        </a>
                    @endguest
                    @auth
                        @if (Auth::user()->status == true)
                            <div>
                                <a href="profile" class="hover:underline mr-4">
                                    Halo, {{ Auth::user()->name }}
                                </a>
                                <a href="/logout" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
                                    Logout
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('kerjasama.store_moa') }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="tahun" class="block mb-2 text-sm font-medium ">Tahun</label>
                            <input type="text" name="tahun"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tahun" required="" value="{{ old('tahun') }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas/Direktorat</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas') }}">
                        </div>
                        <div class="mb-6">
                            <label for="moanumber" class="block mb-2 text-sm font-medium ">Nomor MoA</label>
                            <input type="text" name="moanumber"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nomor MoA" required="" value="{{ old('moanumber') }}">
                        </div>
                        <div class="mb-6">
                            <label for="nomormitra" class="block mb-2 text-sm font-medium ">Nomor MoA Mitra</label>
                            <input type="text" name="nomormitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nomor Mitra" required="" value="{{ old('nomormitra') }}">
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium ">Judul/Kegiatan</label>
                            <input type="text" name="title"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul/Kegiatan" required="" value="{{ old('title') }}">
                        </div>
                        <div class="mb-6">
                            <label for="instansiMitra" class="block mb-2 text-sm font-medium ">Instansi Mitra</label>
                            <input type="text" name="instansiMitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Instansi Mitra" required="" value="{{ old('instansiMitra') }}">
                        </div>
                        <div class="mb-6">
                            <label for="jenisMitra" class="block mb-2 text-sm font-medium ">Jenis Mitra</label>
                            <input type="text" name="jenisMitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Jenis Mitra" required="" value="{{ old('jenisMitra') }}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggalPengesahan" class="block mb-2 text-sm font-medium ">Tanggal
                                Pengesahan</label>
                            <input type="text" name="tanggalPengesahan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tanggal Pengesahan" required="" value="{{ old('tanggalPengesahan') }}">
                        </div>

                    </div>
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="tanggalBerakhir" class="block mb-2 text-sm font-medium ">Tanggal Berakhir</label>
                            <input type="number" name="tanggalBerakhir"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tanggal Berakhir" required="" value="{{ old('tanggalBerakhir') }}">
                        </div>
                        <div class="mb-6">
                            <label for="durasi" class="block mb-2 text-sm font-medium ">Durasi</label>
                            <input type="number" name="durasi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Durasi" required="" value="{{ old('durasi') }}">
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium ">Status</label>
                            <input type="number" name="status"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Status" required="" value="{{ old('status') }}">
                        </div>
                        <div class="mb-6">
                            <label for="lndn" class="block mb-2 text-sm font-medium ">Luar Negeri / Dalam
                                Negeri</label>
                            <input type="text" name="lndn"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Luar Negeri / Dalam Negeri" required="" value="{{ old('lndn') }}">
                        </div>
                        <div class="mb-6">
                            <label for="pnp" class="block mb-2 text-sm font-medium ">Profit / Non Profit</label>
                            <input type="text" name="pnp"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Profit / Non Profit" required="" value="{{ old('pnp') }}">
                        </div>
                        <div class="mb-6">
                            <label for="akd" class="block mb-2 text-sm font-medium ">Akademik / Non</label>
                            <input type="text" name="akd"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Akademik / Non" required="" value="{{ old('akd') }}">
                        </div>
                        <div class="mb-6">
                            <label for="link" class="block mb-2 text-sm font-medium ">Link Eviden</label>
                            <input type="text" name="link"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Link Eviden" required="" value="{{ old('link') }}">
                        </div>
                        <div class="mb-6">
                            <label for="aktifitas" class="block mb-2 text-sm font-medium ">Kegiatan yang Telah
                                Terealisasi</label>
                            <input type="text" name="aktifitas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kegiatan yang Telah Terealisasi" required=""
                                value="{{ old('aktifitas') }}">
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
