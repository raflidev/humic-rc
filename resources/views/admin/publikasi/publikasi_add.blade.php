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
            <form action="{{ route('publikasi.store') }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="judul" class="block mb-2 text-sm font-medium ">Judul</label>
                            <input type="text" name="judul"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul" required="" value="{{ old('judul') }}">
                        </div>
                        <div class="mb-6">
                            <label for="jenis_publikasi" class="block mb-2 text-sm font-medium ">Jenis Publikasi</label>
                            <select name="jenis_publikasi" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="International Conference">International Conference</option>
                                <option value="International Journal">International Journal</option>
                                <option value="National Conference">National Conference</option>
                                <option value="National Journal">National Journal</option>
                                <option value="Book Chapter">Book Chapter</option>
                                <option value="Book ISBN">Book ISBN</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="nama_jurnal" class="block mb-2 text-sm font-medium ">Nama Jurnal</label>
                            <input type="text" name="nama_jurnal"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Jurnal" required="" value="{{ old('nama_jurnal') }}">
                        </div>

                        <div class="mb-6">
                            <label for="issue" class="block mb-2 text-sm font-medium ">Issue / NO</label>
                            <input type="text" name="issue"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Issue / NO" required=""
                                value="{{ old('issue') }}">
                        </div>
                        <div class="mb-6">
                            <label for="volume" class="block mb-2 text-sm font-medium ">Volume</label>
                            <input type="text" name="volume"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Volume" required="" value="{{ old('volume') }}">
                        </div>
                    </div>
                    <div class="w-1/2">

                        <div class="mb-6">
                            <label for="tahun" class="block mb-2 text-sm font-medium ">Tahun</label>
                            <input type="number" name="tahun"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tahun" required=""
                                value="{{ old('tahun') }}">
                        </div>
                        <div class="mb-6">
                            <label for="quartile" class="block mb-2 text-sm font-medium ">Quartil</label>
                            <select name="quartile" id="" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Q1">Q1</option>
                                <option value="Q2">Q2</option>
                                <option value="Q3">Q3</option>
                                <option value="Q4">Q4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="S4">S4</option>
                                <option value="S5">S5</option>
                                <option value="S6">S6</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="indexed" class="block mb-2 text-sm font-medium ">Indexed</label>
                            <select name="indexed" id="" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="SCOPUS">SCOPUS</option>
                                <option value="DOAJ">DOAJ</option>
                                <option value="GOOGLE SCHOOLAR">GOOGLE SCHOOLAR</option>
                                <option value="NOT INDEXED">NOT INDEXED</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="link_makalah" class="block mb-2 text-sm font-medium ">Link Makalah</label>
                            <input type="text" name="link_makalah"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Link Makalah" required="" value="{{ old('link_makalah') }}">
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

            document.getElementById('buttonAnggota').addEventListener('click', (event) => {
                event.preventDefault();
                var container = document.getElementById('anggota');
                container.classList.remove('hidden');
                var count = container.childElementCount;
                if (count > 0) {
                    container.innerHTML = "";
                }
                var jumlah = document.getElementById('jumlah_member').value
                if (jumlah == 0) {
                    container.classList.add('hidden');
                }
                for (let i = 1; i <= jumlah; i++) {
                    container.innerHTML +=
                        `<div class="mb-6 px-2">
                            <label for="nama_member${i}" class="block text-sm font-medium">Nama Member ${i}</label>
                            <input type="text" name="nama_member${i}"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Member ${i}" required="" value="{{ old('nama_member${i}') }}">
                        </div>`;
                }
            });

            document.getElementById('buttonAnggotaMitra').addEventListener('click', (event) => {
                event.preventDefault();
                var container = document.getElementById('anggotaMitra');
                container.classList.remove('hidden');
                var count = container.childElementCount;
                if (count > 0) {
                    container.innerHTML = "";
                }
                var jumlah = document.getElementById('jumlah_partner').value
                if (jumlah == 0) {
                    container.classList.add('hidden');
                }
                for (let i = 1; i <= jumlah; i++) {
                    container.innerHTML +=
                        `<div class="mb-6 px-2">
                            <label for="nama_partner${i}" class="block text-sm font-medium">Nama Partner ${i}</label>
                            <input type="text" name="nama_partner${i}"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Partner ${i}" required="" value="{{ old('nama_partner${i}') }}">
                        </div>`;
                }
            });
        </script>
    @endsection
