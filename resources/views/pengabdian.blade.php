@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Pengabdian Masyarakat</h1>
                    @include('layout.navbar')
                </div>
            </div>

            <div>
                <div class="grid grid-cols-3 gap-5">
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase pb-2">Dana Internal</div>
                                    <div>
                                        <div class="text-gray-500 text-sm uppercase">Total Mitra</div>
                                        <div class="text-2xl font-semibold">
                                            5
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-500 text-sm uppercase">Total Pengnas</div>
                                        <div class="text-2xl font-semibold">
                                            5
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
                                    <div class="text-gray-500 text-sm uppercase pb-2">Skema Dana Internal</div>
                                    <div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">Regular</div>
                                                <div class="font-semibold text-2xl">
                                                    1
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">Dana Mandiri</div>
                                                <div class="font-semibold text-2xl">
                                                    0
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">Kolaborasi Internal</div>
                                                <div class="font-semibold text-2xl">
                                                    4
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-gray-500 text-sm uppercase">Kolaborasi Internasional</div>
                                                <div class="font-semibold text-2xl">
                                                    0
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
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase pb-2">Dana External</div>
                                    <div>
                                        <div class="text-gray-500 text-sm uppercase">Total Mitra</div>
                                        <div class="text-2xl font-semibold">
                                            0
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-500 text-sm uppercase">Total Pengnas</div>
                                        <div class="text-2xl font-semibold">
                                            0
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

        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Skema</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Kelompok Keahlian</th>
                        <th>Judul Penelitian</th>
                        <th>Nama Ketua</th>
                        <th>Dana</th>
                        <th>Masyarakat Sasar</th>
                        <th>Alamat Masyarakat Sasar</th>
                        <th>Kota</th>
                        <th>Skema</th>
                        <th>Fakultas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->period }}</td>
                            <td>{{ $r->scheme }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>{{ $r->study_program }}</td>
                            <td>{{ $r->skill_group }}</td>
                            <td>{{ $r->title_abdimas }}</td>
                            <td>{{ $r->head }}</td>
                            <td>{{ $r->fund }}</td>
                            <td>{{ $r->society }}</td>
                            <td>{{ $r->society_address }}</td>
                            <td>{{ $r->city }}</td>
                            <td>{{ $r->society_scheme }}</td>
                            <td>{{ $r->society_faculty }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
