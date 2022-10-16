@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Kerjasama</h1>
                    <div class="rounded-md bg-blue-500 px-5 py-2">
                        Login
                    </div>
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
                                    <div class="text-gray-500 text-sm uppercase pb-2">Skema Dana Internal</div>
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
                    <canvas class="bg-slate-300 p-5 rounded-md" id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="pt-10 px-10">
            <table id="MOU" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fakultas</th>
                        <th>Nomor Tel-u</th>
                        <th>Nomor Mitra</th>
                        <th>Judul/Kegiatan</th>
                        <th>Instansi Mitra</th>
                        <th>Tanggal Pengesahan</th>
                        <th>Tanggal Berakhir</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th>LN/DN</th>
                        <th>P/NP</th>
                        <th>Akd/Non Akd</th>
                        <th>File MoU</th>
                        <th>Kegiatan yang telah terealisasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>{{ $r->telu_number }}</td>
                            <td>{{ $r->partner_number }}</td>
                            <td>{{ $r->title }}</td>
                            <td>{{ $r->partner_name }}</td>
                            <td>{{ $r->date_start }}</td>
                            <td>{{ $r->date_end }}</td>
                            <td>{{ $r->duration }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ $r->lndn }}</td>
                            <td>{{ $r->pnp }}</td>
                            <td>{{ $r->akd }}</td>
                            <td>{{ $r->file }}</td>
                            <td>{{ $r->activity_real }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-10 px-10">
            <table id="MOA" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Fakultas</th>
                        <th>Nomor MoA</th>
                        <th>Nomor MoA Mitra</th>
                        <th>Judul/Kegiatan</th>
                        <th>Instansi Mitra</th>
                        <th>Jenis Mitra</th>
                        <th>Tanggal Pengesahan</th>
                        <th>Tanggal Berakhir</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th>LN/DN</th>
                        <th>P/NP</th>
                        <th>Akd/Non Akd</th>
                        <th>Link eviden</th>
                        <th>Kegiatan yang telah terealiasasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor2 = 1; ?>
                    @foreach ($data2 as $r)
                        <tr>
                            <td>{{ $nomor2 }}</td>
                            <td>{{ $r->year }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>{{ $r->moa_number }}</td>
                            <td>{{ $r->moa_number_partner }}</td>
                            <td>{{ $r->title }}</td>
                            <td>{{ $r->partner_name }}</td>
                            <td>{{ $r->partner_type }}</td>
                            <td>{{ $r->date_start }}</td>
                            <td>{{ $r->date_end }}</td>
                            <td>{{ $r->duration }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ $r->lndn }}</td>
                            <td>{{ $r->pnp }}</td>
                            <td>{{ $r->akd }}</td>
                            <td>{{ $r->link }}</td>
                            <td>{{ $r->activity_real }}</td>

                        </tr>
                        <?php $nomor2++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-10 px-10">
            <table id="AI" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Fakultas</th>
                        <th>No Tel-U</th>
                        <th>Nomor Mitra</th>
                        <th>Uraian Kegiatan</th>
                        <th>Instansi Mitra</th>
                        <th>Jenis Mitra</th>
                        <th>Type</th>
                        <th>Tanggal Penandatanganan</th>
                        <th>Status</th>
                        <th>LN/DN</th>
                        <th>Link eviden</th>
                        <th>Kegiatan yang telah terealiasasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor3 = 1; ?>
                    @foreach ($data3 as $r)
                        <tr>
                            <td>{{ $nomor3 }}</td>
                            <td>{{ $r->year }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>{{ $r->telu_number }}</td>
                            <td>{{ $r->partner_number }}</td>
                            <td>{{ $r->activity }}</td>
                            <td>{{ $r->partner_name }}</td>
                            <td>{{ $r->partner_type }}</td>
                            <td>{{ $r->type }}</td>
                            <td>{{ $r->date }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ $r->lndn }}</td>
                            <td>{{ $r->link }}</td>
                            <td>{{ $r->activity_real }}</td>
                        </tr>
                        <?php $nomor3++; ?>
                    @endforeach
                </tbody>
            </table>
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
        </script>
    @endsection
