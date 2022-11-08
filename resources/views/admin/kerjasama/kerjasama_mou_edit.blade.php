@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    @include('layout.navbar')
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('kerjasama.update_mou', ['id' => $data->mou_id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="tahun" class="block mb-2 text-sm font-medium ">Tahun</label>
                            <input type="number" name="tahun"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tahun" required="" value="{{ old('tahun', $data->year) }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas/Direktorat</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas', $data->faculty) }}">
                        </div>
                        <div class="mb-6">
                            <label for="telunumber" class="block mb-2 text-sm font-medium ">Nomor Tel-U</label>
                            <input type="text" name="telunumber"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nomor Tel-U" required=""
                                value="{{ old('telunumber', $data->telu_number) }}">
                        </div>
                        <div class="mb-6">
                            <label for="nomormitra" class="block mb-2 text-sm font-medium ">Nomor Mitra</label>
                            <input type="text" name="nomormitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nomor Mitra" required=""
                                value="{{ old('nomormitra', $data->partner_number) }}">
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium ">Judul/Kegiatan</label>
                            <input type="text" name="title"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul/Kegiatan" required="" value="{{ old('title', $data->title) }}">
                        </div>
                        <div class="mb-6">
                            <label for="instansiMitra" class="block mb-2 text-sm font-medium ">Instansi Mitra</label>
                            <input type="text" name="instansiMitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Instansi Mitra" required=""
                                value="{{ old('instansiMitra', $data->partner_name) }}">
                        </div>
                        <div class="mb-6">
                            <label for="jenisMitra" class="block mb-2 text-sm font-medium ">Jenis Mitra</label>
                            <input type="text" name="jenisMitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Jenis Mitra" required=""
                                value="{{ old('jenisMitra', $data->partner_type) }}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggalPengesahan" class="block mb-2 text-sm font-medium ">Tanggal
                                Pengesahan</label>
                            <input type="date" name="tanggalPengesahan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tanggal Pengesahan" required=""
                                value="{{ old('tanggalPengesahan', $data->date_start) }}">
                        </div>

                    </div>
                    <div class="w-1/2">

                        <div class="mb-6">
                            <label for="tanggalBerakhir" class="block mb-2 text-sm font-medium ">Tanggal Berakhir</label>
                            <input type="date" name="tanggalBerakhir"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tanggal Berakhir" required=""
                                value="{{ old('tanggalBerakhir', $data->date_end) }}">
                        </div>
                        <div class="mb-6">
                            <label for="durasi" class="block mb-2 text-sm font-medium ">Durasi</label>
                            <input type="number" name="durasi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Durasi" required="" value="{{ old('durasi', $data->duration) }}">
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium ">Status</label>
                            <input type="text" name="status"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Status" required="" value="{{ old('status', $data->status) }}">
                        </div>
                        <div class="mb-6">
                            <label for="lndn" class="block mb-2 text-sm font-medium ">Luar Negeri / Dalam
                                Negeri</label>
                            <select name="lndn" id="" {{ old('lndn', $data->lndn) }}
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Luar Negeri">Luar Negeri</option>
                                <option value="Dalam Negeri">Dalam Negeri</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="pnp" class="block mb-2 text-sm font-medium ">Profit / Non Profit</label>
                            <select name="pnp" id="" {{ old('pnp', $data->pnp) }}
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Profit">Profit</option>
                                <option value="Non Profit">Non Profit</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="akd" class="block mb-2 text-sm font-medium ">Akademik / Non</label>
                            <select name="akd" id="" {{ old('akd', $data->akd) }}
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Akademik">Akademik</option>
                                <option value="Non Akademik">Non Akademik</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="filemou" class="block mb-2 text-sm font-medium ">File MOU</label>
                            <input type="text" name="filemou"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="File MOU" required="" value="{{ old('filemou', $data->file) }}">
                        </div>
                        <div class="mb-6">
                            <label for="aktifitas" class="block mb-2 text-sm font-medium ">Kegiatan yang Telah
                                Terealisasi</label>
                            <input type="text" name="aktifitas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kegiatan yang Telah Terealisasi" required=""
                                value="{{ old('aktifitas', $data->activity_real) }}">
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
