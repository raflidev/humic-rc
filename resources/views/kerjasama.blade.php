@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Kerjasama</h1>
                    @include('layout.navbar')
                </div>
            </div>

            <div>
                <div class="grid grid-cols-3 gap-5">
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase pb-2">Kerjasama dalam negeri</div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <div class="text-gray-500 text-sm uppercase">Total Mitra</div>
                                            <div class="font-semibold text-2xl">
                                                2
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-gray-500 text-sm uppercase">MOU</div>
                                            <div class="font-semibold text-2xl">
                                                2
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-gray-500 text-sm uppercase">MOA</div>
                                            <div class="font-semibold text-2xl">
                                                5
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-gray-500 text-sm uppercase">IA</div>
                                            <div class="font-semibold text-2xl">
                                                8
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="w-1/6">
                                <div class="flex justify-center">
                                    <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                        <i class="far fa-chart-bar text-white text-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase pb-2">Kerjasama luar negeri</div>
                                    <div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">Total Mitra</div>
                                                <div class="font-semibold text-2xl">
                                                    3
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">MOU</div>
                                                <div class="font-semibold text-2xl">
                                                    1
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">MOA</div>
                                                <div class="font-semibold text-2xl">
                                                    5
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">IA</div>
                                                <div class="font-semibold text-2xl">
                                                    4
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="w-1/6">
                                <div class="flex justify-center">
                                    <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                        <i class="fas fa-globe-asia text-white text-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="-mt-20 px-16">
            <div class="flex ">
                <div class="w-4/6">
                    <canvas class="bg-slate-300 p-5 rounded-md" id="kerjasamaChart"></canvas>
                </div>
            </div>
        </div>
        <div class="pt-10 px-16">
            <a href="{{ route('kerjasama.moa') }}" class="py-2 px-4 bg-yellow-400 rounded hover:bg-yellow-500">Data MOA</a>
            <a href="{{ route('kerjasama.mou') }}" class="py-2 px-4 bg-yellow-400 rounded hover:bg-yellow-500">Data MOU</a>
            <a href="{{ route('kerjasama.ai') }}" class="py-2 px-4 bg-yellow-400 rounded hover:bg-yellow-500">Data AI</a>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#MOU').DataTable({
                    scrollX: true,
                });
                $('#MOA').DataTable({
                    scrollX: true,
                });
                $('#AI').DataTable({
                    scrollX: true,
                });
            });

            const labels = [
                'Kerjasama Dalam Negeri',
                'Kerjasama Luar Negeri',
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Kerjasama',
                    backgroundColor: 'rgba(255, 159, 64, 0.8)',
                    borderColor: '#fff',
                    color: 'rgba(255, 159, 64, 0.2)',
                    data: [17 ,13],
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };

            new Chart(
                document.getElementById('kerjasamaChart'),
                config
            );
        </script>
    @endsection
