@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    @include('layout.navbar')
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
                                        {{ $penelitian_internal  }}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir
                                    </div>
                                    <div class="font-semibold">
                                       Rp {{number_format($internal,0,',','.');}}
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
                                        {{ $penelitian_eksternal }}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir
                                    </div>
                                    <div class="font-semibold">
                                        Rp {{number_format($external,0,',','.');}}
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
                    <canvas class="bg-gray-300 bg-opacity-90 p-5 rounded-md" id="myChartTest"></canvas>
                </div>
            </div>
        </div>
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Judul Penelitian</th>
                        <th>Kelompok Keahlian</th>
                        <th>Nama Ketua</th>
                        <th>Total Dana</th>
                        <th>Jenis/Skema Penelitian</th>
                        <th>Tahun Pelaksanaan</th>
                        <th>Jenis Pendanaan</th>
                        <th>Kelompok Masyarakat</th>
                        <th>Dana Kelompok Masyarakat</th>
                        <th>Kemenristek/BRIN</th>
                        <th>Dana Kemenristek/BRIN</th>
                        <th>Tanggal Kontrak</th>
                        <th>Nomor Kontrak</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($research as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>{{ $r->study_program }}</td>
                            <td>{{ $r->research_title }}</td>
                            <td>{{ $r->skill_group }}</td>
                            <td>{{ $r->head_name }}</td>
                            <td>{{ $r->fund_total }}</td>
                            <td>{{ $r->research_type }}</td>
                            <td>{{ $r->year }}</td>
                            <td>{{ $r->fund_type }}</td>
                            <td>{{ $r->group_society }}</td>
                            <td>{{ $r->fund_group_society }}</td>
                            <td>{{ $r->brim }}</td>
                            <td>{{ $r->fund_brim }}</td>
                            <td>{{ $r->date_start }} - {{ $r->date_end }}</td>
                            <td>{{ $r->contract_number }}</td>
                            <td>{{ $r->description }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
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
