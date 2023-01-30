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
            <form action="{{ route('pengabdian.store') }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="periode" class="block mb-2 text-sm font-medium ">Periode</label>
                            <input type="text" name="periode"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Periode" required="" value="{{ old('periode') }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema" class="block mb-2 text-sm font-medium ">Skema</label>
                            <input type="text" name="skema"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema" required="" value="{{ old('skema') }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema_dana" class="block mb-2 text-sm font-medium ">Skema Pendanaan</label>
                            <select name="skema_dana" id="" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @empty(!old('skema_dana'))
                                    @if(old('skema_dana') == 'regular')
                                        <option value="regular" selected>Regular</option>
                                    @elseif (old('skema_dana') == 'mandiri')
                                        <option value="mandiri" selected>Mandiri</option>
                                    @elseif (old('skema_dana') == 'kolaborasi internal')
                                        <option value="kolaborasi internal" selected>Kolaborasi Internal</option>
                                    @elseif (old('skema_dana') == 'kolaborasi internasional')
                                        <option value="kolaborasi internasional" selected>Kolaborasi Internasional</option>
                                    @endif
                                @else
                                    <option value="regular">Regular</option>
                                    <option value="mandiri">Mandiri</option>
                                    <option value="kolaborasi internal">Kolaborasi Internal</option>
                                    <option value="kolaborasi internasional">kolaborasi internal</option>
                                @endempty
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="jenis_pendanaan" class="block mb-2 text-sm font-medium ">Jenis Pendanaan</label>
                            <select name="jenis_pendanaan" id="" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @empty(!old('jenis_pendanaan'))
                                    @if(old('jenis_pendanaan') == 'eksternal')
                                        <option value="eksternal" selected>Eksternal</option>
                                        <option value="internal">Internal</option>
                                    @else
                                        <option value="internal" selected>Internal</option>
                                        <option value="eksternal">Eksternal</option>
                                    @endif
                                @else
                                    <option value="internal">Internal</option>
                                    <option value="eksternal">Eksternal</option>
                                @endempty
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas') }}">
                        </div>
                        <div class="mb-6">
                            <label for="prodi" class="block mb-2 text-sm font-medium ">Prodi</label>
                            <input type="text" name="prodi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Prodi" required="" value="{{ old('prodi') }}">
                        </div>
                        <div class="mb-6">
                            <label for="kelompok_keahlian" class="block mb-2 text-sm font-medium ">Kelompok Keahlian</label>
                            <input type="text" name="kelompok_keahlian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kelompok Keahlian" required="" value="{{ old('kelompok_keahlian') }}">
                        </div>
                        <div class="mb-6">
                            <label for="judul_abdimas" class="block mb-2 text-sm font-medium ">Judul Abdimas</label>
                            <input type="text" name="judul_abdimas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul Abdimas" required="" value="{{ old('judul_abdimas') }}">
                        </div>
                        <div class="mb-6">
                            <label for="nama_ketua" class="block mb-2 text-sm font-medium ">Nama Ketua</label>
                            <input type="text" name="nama_ketua"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Ketua" required="" value="{{ old('nama_ketua') }}">
                        </div>
                        <div class="mb-6">
                            <div class="flex items-end space-x-3">
                                <div class="w-5/6">
                                    <label for="jumlah_dosen" class="block mb-2 text-sm font-medium ">Jumlah Dosen</label>
                                    <input type="text" id="jumlah_dosen" name="jumlah_dosen"
                                        class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Jumlah Dosen" required="" value="{{ old('jumlah_dosen') }}">
                                </div>
                                <div class="w-1/6">
                                    <button id="buttonDosen"
                                        class="font-medium block w-full py-2 rounded-lg bg-slate-500 hover:bg-slate-400">+</button>
                                </div>
                            </div>
                            <div id="dosen" class="mt-4 bg-slate-400 rounded py-2 hidden">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">

                        <div class="mb-6">
                            <div class="flex items-end space-x-3">
                                <div class="w-5/6">
                                    <label for="jumlah_mahasiswa" class="block mb-2 text-sm font-medium ">Jumlah
                                        Mahasiswa</label>
                                    <input type="text" id="jumlah_mahasiswa" name="jumlah_mahasiswa"
                                        class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Jumlah Mahasiswa" required=""
                                        value="{{ old('jumlah_mahasiswa') }}">
                                </div>
                                <div class="w-1/6">
                                    <button id="buttonMahasiswa"
                                        class="font-medium block w-full py-2 rounded-lg bg-slate-500 hover:bg-slate-400">+</button>
                                </div>
                            </div>
                            <div id="mahasiswa" class="mt-4 bg-slate-400 rounded py-2 hidden">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="dana" class="block mb-2 text-sm font-medium ">Dana</label>
                            <input type="number" name="dana"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana" required="" value="{{ old('dana') }}">
                        </div>
                        <div class="mb-6">
                            <label for="masyarakat_sasar" class="block mb-2 text-sm font-medium ">Masyarakat Sasar</label>
                            <input type="text" name="masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masyarakat Sasar" required="" value="{{ old('masyarakat_sasar') }}">
                        </div>
                        <div class="mb-6">
                            <label for="kota" class="block mb-2 text-sm font-medium ">Kota</label>
                            <input type="text" name="kota"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kota" required="" value="{{ old('kota') }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema_masyarakat" class="block mb-2 text-sm font-medium ">Skema Masyarakat</label>
                            <input type="text" name="skema_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema Masyarakat" required="" value="{{ old('skema_masyarakat') }}">
                        </div>
                        <div class="mb-6">
                            <label for="alamat_masyarakat_sasar" class="block mb-2 text-sm font-medium ">Alamat Skema
                                Masyarakat</label>
                            <input type="text" name="alamat_masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Alamat Skema Masyarakat" required=""
                                value="{{ old('alamat_masyarakat_sasar') }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas_masyarakat" class="block mb-2 text-sm font-medium ">Fakultas
                                Masyarakat</label>
                            <input type="text" name="fakultas_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas Masyarakat" required=""
                                value="{{ old('fakultas_masyarakat') }}">
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

    @section('scripts')
        <script>
            document.getElementById('buttonDosen').addEventListener('click', (event) => {
                event.preventDefault();
                var container = document.getElementById('dosen');
                container.classList.remove('hidden');
                var count = container.childElementCount;
                if (count > 0) {
                    container.innerHTML = "";
                }
                var jumlah = document.getElementById('jumlah_dosen').value
                if (jumlah == 0) {
                    container.classList.add('hidden');
                }
                for (let i = 1; i <= jumlah; i++) {
                    container.innerHTML +=
                        `<div class="mb-6 px-2">
                            <label for="nama_dosen${i}" class="block text-sm font-medium">Nama Dosen ${i}</label>
                            <input type="text" name="nama_dosen${i}"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Dosen ${i}" required="" value="{{ old('nama_dosen${i}') }}">
                        </div>`;
                }
            });

            document.getElementById('buttonMahasiswa').addEventListener('click', (event) => {
                event.preventDefault();
                var container = document.getElementById('mahasiswa');
                container.classList.remove('hidden');
                var count = container.childElementCount;
                if (count > 0) {
                    container.innerHTML = "";
                }
                var jumlah = document.getElementById('jumlah_mahasiswa').value
                if (jumlah == 0) {
                    container.classList.add('hidden');
                }
                for (let i = 1; i <= jumlah; i++) {
                    container.innerHTML +=
                        `<div class="mb-6 px-2">
                            <label for="nama_mahasiswa${i}" class="block text-sm font-medium">Nama Mahasiswa ${i}</label>
                            <input type="text" name="nama_mahasiswa${i}"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Mahasiswa ${i}" required="" value="{{ old('nama_mahasiswa${i}') }}">
                        </div>`;
                }
            });
        </script>
    @endsection
