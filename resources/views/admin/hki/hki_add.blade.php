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
            <form action="{{ route('hki.store') }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="tahun" class="block mb-2 text-sm font-medium ">Tahun</label>
                            <input type="number" name="tahun"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tahun" required="" value="{{ old('tahun') }}">
                        </div>
                        <div class="mb-6">
                            <label for="judul" class="block mb-2 text-sm font-medium ">Judul</label>
                            <input type="text" name="judul"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul" required="" value="{{ old('judul') }}">
                        </div>
                        <div class="mb-6">
                            <div class="flex items-end space-x-3">
                                <div class="w-5/6">
                                    <label for="jumlah_member" class="block mb-2 text-sm font-medium ">Jumlah Member</label>
                                    <input type="number" id="jumlah_member" name="jumlah_member"
                                        class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Jumlah Member" required="" value="{{ old('jumlah_member') }}">
                                </div>
                                <div class="w-1/6">
                                    <button id="buttonAnggota"
                                        class="font-medium block w-full py-2 rounded-lg bg-slate-500 hover:bg-slate-400">+</button>
                                </div>
                            </div>
                            <div id="anggota" class="mt-4 bg-slate-400 rounded py-2 hidden">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex items-end space-x-3">
                                <div class="w-5/6">
                                    <label for="jumlah_partner" class="block mb-2 text-sm font-medium ">Jumlah Partner</label>
                                    <input type="number" id="jumlah_partner" name="jumlah_partner"
                                        class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Jumlah Partner" required=""
                                        value="{{ old('jumlah_partner') }}">
                                </div>
                                <div class="w-1/6">
                                    <button id="buttonAnggotaMitra"
                                        class="font-medium block w-full py-2 rounded-lg bg-slate-500 hover:bg-slate-400">+</button>
                                </div>
                            </div>
                            <div id="anggotaMitra" class="mt-4 bg-slate-400 rounded py-2 hidden">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="jenis" class="block mb-2 text-sm font-medium ">Jenis</label>
                            <select name="jenis" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="MEREK">MEREK</option>
                                <option value="HAK CIPTA">HAK CIPTA</option>
                                <option value="DESAIN INDUSTRI">DESAIN INDUSTRI</option>
                                <option value="PATEN SEDERHANA">PATEN SEDERHANA</option>
                                <option value="RAHASIA DAGANG">RAHASIA DAGANG</option>
                                <option value="DESAIN TATA LETAK SIRKUIT TERPADU">DESAIN TATA LETAK SIRKUIT TERPADU</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium ">Status</label>
                            <select name="status" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="GRANTED">GRANTED</option>
                                <option value="PROCESS">PROCESS</option>
                            </select>
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
