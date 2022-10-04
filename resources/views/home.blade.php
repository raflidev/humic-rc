@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    <div class="rounded-md bg-blue-500 px-5 py-2">
                        Login
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Penelitian Nasional</div>
                                    <div class="text-2xl font-semibold">
                                        20
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir
                                    </div>
                                    <div class="font-semibold">
                                        Rp.300.000.000
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
                                    <div class="text-gray-500 text-sm uppercase">Penelitian Internasional</div>
                                    <div class="text-2xl font-semibold">
                                        5
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir
                                    </div>
                                    <div class="font-semibold">
                                        Rp.300.000.000
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
                    <canvas class="bg-slate-300 p-5 rounded-md" id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
