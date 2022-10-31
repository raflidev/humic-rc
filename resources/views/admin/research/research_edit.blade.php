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
            <form action="{{ route('research.update', ['id' => $research[0]->research_id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas', $research[0]->faculty) }}">
                        </div>
                        <div class="mb-6">
                            <label for="prodi" class="block mb-2 text-sm font-medium ">Prodi</label>
                            <input type="text" name="prodi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Prodi" required="" value="{{ old('prodi', $research[0]->study_program) }}">
                        </div>
                        <div class="mb-6">
                            <label for="judul_penelitian" class="block mb-2 text-sm font-medium ">Judul Penelitian</label>
                            <input type="text" name="judul_penelitian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="judul Penelitian" required=""
                                value="{{ old('judul_penelitian', $research[0]->research_title) }}">
                        </div>
                        <div class="mb-6">
                            <label for="kelompok_keahlian" class="block mb-2 text-sm font-medium ">Kelompok Keahlian</label>
                            <input type="text" name="kelompok_keahlian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kelompok Keahlian" required=""
                                value="{{ old('kelompok_keahlian', $research[0]->skill_group) }}">
                        </div>
                        <div class="mb-6">
                            <label for="nama_ketua" class="block mb-2 text-sm font-medium ">Nama Ketua</label>
                            <input type="text" name="nama_ketua"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Ketua" required=""
                                value="{{ old('nama_ketua', $research[0]->head_name) }}">
                        </div>
                        <div class="mb-6">
                            <label for="total_dana_external" class="block mb-2 text-sm font-medium ">Dana External</label>
                            <input type="number" name="total_dana_external"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana External" required=""
                                value="{{ old('total_dana_external', $research[0]->fund_external) }}">
                        </div>
                        <div class="mb-6">
                            <label for="total_dana" class="block mb-2 text-sm font-medium ">Total Dana</label>
                            <input type="number" name="total_dana"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Total Dana" required=""
                                value="{{ old('total_dana', $research[0]->fund_total) }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema_penelitian" class="block mb-2 text-sm font-medium ">Jenis/Skema
                                Penelitian</label>
                            <input type="text" name="skema_penelitian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Jenis/Skema Penelitian" required=""
                                value="{{ old('skema_penelitian', $research[0]->research_type) }}">
                        </div>
                        <div class="mb-6">
                            <label for="tahun_pelaksanaan" class="block mb-2 text-sm font-medium ">Tahun Pelaksanaan</label>
                            <input type="date" name="tahun_pelaksanaan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tahun Pelaksanaan" required=""
                                value="{{ old('tahun_pelaksanaan', $research[0]->year) }}">
                        </div>
                    </div>
                    <div class="w-1/2">

                        <div class="mb-6">
                            <label for="jenis_pendanaan" class="block mb-2 text-sm font-medium ">Jenis Pendanaan</label>
                            <input type="text" name="jenis_pendanaan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Jenis Pendanaan" required=""
                                value="{{ old('jenis_pendanaan', $research[0]->fund_type) }}">
                        </div>
                        <div class="mb-6">
                            <label for="kelompok_masyarakat" class="block mb-2 text-sm font-medium ">Kelompok
                                Masyarakat</label>
                            <input type="text" name="kelompok_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kelompok Masyarakat" required=""
                                value="{{ old('kelompok_masyarakat', $research[0]->group_society) }}">
                        </div>
                        <div class="mb-6">
                            <label for="dana_kelompok_masyarakat" class="block mb-2 text-sm font-medium ">Dana Kelompok
                                Masyarakat</label>
                            <input type="number" name="dana_kelompok_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana Kelompok Masyarakat" required=""
                                value="{{ old('dana_kelompok_masyarakat', $research[0]->fund_group_society) }}">
                        </div>
                        <div class="mb-6">
                            <label for="brim" class="block mb-2 text-sm font-medium ">BRIM</label>
                            <input type="text" name="brim"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="BRIM" required="" value="{{ old('brim', $research[0]->brim) }}">
                        </div>
                        <div class="mb-6">
                            <label for="dana_brim" class="block mb-2 text-sm font-medium ">Dana Kemenristek/BRIN</label>
                            <input type="number" name="dana_brim"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana Kemenristek/BRIN" required=""
                                value="{{ old('dana_brim', $research[0]->fund_brim) }}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggal_kontrak_start" class="block mb-2 text-sm font-medium ">Awal Tanggal
                                Kontrak</label>
                            <input type="date" name="tanggal_kontrak_start"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Awal Tanggal Kontrak" required=""
                                value="{{ old('tanggal_kontrak_start', $research[0]->date_start) }}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggal_kontrak_end" class="block mb-2 text-sm font-medium ">Akhir Tanggal
                                Kontrak</label>
                            <input type="date" name="tanggal_kontrak_end"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Akhir Tanggal Kontrak" required=""
                                value="{{ old('tanggal_kontrak_end', $research[0]->date_end) }}">
                        </div>
                        <div class="mb-6">
                            <label for="nomor_kontrak" class="block mb-2 text-sm font-medium ">Nomor Kontrak</label>
                            <input type="text" name="nomor_kontrak"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nomor Kontrak" required=""
                                value="{{ old('nomor_kontrak', $research[0]->contract_number) }}">
                        </div>
                        <div class="mb-6">
                            <label for="keterangan" class="block mb-2 text-sm font-medium ">Keterangan</label>
                            <input type="text" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Keterangan" required=""
                                value="{{ old('keterangan', $research[0]->description) }}">
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

    @section('scripts')
        <script>
            const labels = [
                '2019',
                '2020',
                '2021',
                '2022',
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Dana pertahun',
                    backgroundColor: 'rgba(255, 159, 64, 0.8)',
                    borderColor: '#fff',
                    color: 'rgba(255, 159, 64, 0.2)',
                    data: [3, 350000000000, 5, 2],
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };

            new Chart(
                document.getElementById('myChartTest'),
                config
            );
        </script>
    @endsection
