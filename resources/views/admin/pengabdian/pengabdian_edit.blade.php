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
            <form action="{{ route('pengabdian.update', ['id' => $pengabdian->pengnas_id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="periode" class="block mb-2 text-sm font-medium ">Periode</label>
                            <input type="text" name="periode"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Periode" required="" value="{{ old('periode', $pengabdian->period) }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema" class="block mb-2 text-sm font-medium ">Skema</label>
                            <input type="text" name="skema"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema" required="" value="{{ old('skema', $pengabdian->scheme) }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas', $pengabdian->faculty) }}">
                        </div>
                        <div class="mb-6">
                            <label for="prodi" class="block mb-2 text-sm font-medium ">Prodi</label>
                            <input type="text" name="prodi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Prodi" required="" value="{{ old('prodi', $pengabdian->study_program) }}">
                        </div>
                        <div class="mb-6">
                            <label for="kelompok_keahlian" class="block mb-2 text-sm font-medium ">Kelompok Keahlian</label>
                            <input type="text" name="kelompok_keahlian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kelompok Keahlian" required=""
                                value="{{ old('kelompok_keahlian', $pengabdian->skill_group) }}">
                        </div>
                        <div class="mb-6">
                            <label for="judul_abdimas" class="block mb-2 text-sm font-medium ">Judul Abdimas</label>
                            <input type="text" name="judul_abdimas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul Abdimas" required=""
                                value="{{ old('judul_abdimas', $pengabdian->title_abdimas) }}">
                        </div>
                        <div class="mb-6">
                            <label for="nama_ketua" class="block mb-2 text-sm font-medium ">Nama Ketua</label>
                            <input type="text" name="nama_ketua"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Ketua" required="" value="{{ old('nama_ketua', $pengabdian->head) }}">
                        </div>
                        <div class="mb-6">
                            <?php
                            $dosen = explode('|', $pengabdian->lecturer);
                            $jumlah = $dosen[0] != '' ? count($dosen) : 0;
                            $count = 1;
                            ?>
                            <div class="">
                                <label for="jumlah_dosen" class="block mb-2 text-sm font-medium ">Jumlah Dosen</label>
                                <input type="text" id="jumlah_dosen" name="jumlah_dosen"
                                    class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Jumlah Dosen" required="" value="{{ $jumlah }}" readonly>
                            </div>
                            @if ($jumlah > 0)
                                <div class="bg-slate-400 rounded px-2 py-1">
                                    @foreach ($dosen as $a)
                                        <div class="my-3 ">
                                            <label for="nama_dosen{{ $count }}"
                                                class="block mb-2 text-sm font-medium ">Nama Dosen
                                                {{ $count }}</label>
                                            <input type="text" name="nama_dosen{{ $count }}"
                                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Nama Dosen {{ $count }}" required=""
                                                value="{{ $a }}">
                                        </div>
                                        <?php $count++; ?>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-6">
                            <?php
                            $mahasiswa = explode('|', $pengabdian->student);
                            $jumlah = $mahasiswa[0] != '' ? count($mahasiswa) : 0;
                            $count = 1;
                            ?>
                            <div class="">
                                <label for="jumlah_mahasiswa" class="block mb-2 text-sm font-medium ">Jumlah
                                    Mahasiswa</label>
                                <input type="text" id="jumlah_mahasiswa" name="jumlah_mahasiswa"
                                    class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Jumlah Mahasiswa" required="" value="{{ $jumlah }}" readonly>
                            </div>
                            @if($jumlah > 0)
                                <div class="bg-slate-400 rounded px-2 py-1">
                                    @foreach ($mahasiswa as $a)
                                        <div class="my-3 ">
                                            <label for="nama_mahasiswa{{ $count }}"
                                                class="block mb-2 text-sm font-medium ">Nama Mahasiswa
                                                {{ $count }}</label>
                                            <input type="text" name="nama_mahasiswa{{ $count }}"
                                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Nama Mahasiswa {{ $count }}" required=""
                                                value="{{ $a }}">
                                        </div>
                                        <?php $count++; ?>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="dana" class="block mb-2 text-sm font-medium ">Dana</label>
                            <input type="number" name="dana"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana" required="" value="{{ old('dana', $pengabdian->fund) }}">
                        </div>
                        <div class="mb-6">
                            <label for="masyarakat_sasar" class="block mb-2 text-sm font-medium ">Masyarakat Sasar</label>
                            <input type="number" name="masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masyarakat Sasar" required=""
                                value="{{ old('masyarakat_sasar', $pengabdian->society) }}">
                        </div>
                        <div class="mb-6">
                            <label for="kota" class="block mb-2 text-sm font-medium ">Kota</label>
                            <input type="text" name="kota"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kota" required="" value="{{ old('kota', $pengabdian->city) }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema_masyarakat" class="block mb-2 text-sm font-medium ">Skema Masyarakat</label>
                            <input type="text" name="skema_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema Masyarakat" required=""
                                value="{{ old('skema_masyarakat', $pengabdian->society_scheme) }}">
                        </div>
                        <div class="mb-6">
                            <label for="alamat_masyarakat_sasar" class="block mb-2 text-sm font-medium ">Alamat Skema
                                Masyarakat</label>
                            <input type="text" name="alamat_masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Alamat Skema Masyarakat" required=""
                                value="{{ old('alamat_masyarakat_sasar', $pengabdian->society_address) }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas_masyarakat" class="block mb-2 text-sm font-medium ">Fakultas
                                Masyarakat</label>
                            <input type="text" name="fakultas_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas Masyarakat" required=""
                                value="{{ old('fakultas_masyarakat', $pengabdian->society_faculty) }}">
                        </div>
                        <div class="mb-6 pt-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
