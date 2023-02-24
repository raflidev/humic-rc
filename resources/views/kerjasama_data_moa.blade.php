@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Kerjasama MOA</h1>
                    @include('layout.navbar')
                </div>
            </div>
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
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
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
                            <td>{{ $r->status_real }}</td>
                            <td>{{ $r->lndn }}</td>
                            <td>{{ $r->pnp }}</td>
                            <td>{{ $r->akd }}</td>
                            <td>{{ $r->link }}</td>
                            <td>{{ $r->activity_real }}</td>
                        </tr>
                        <?php $nomor++; ?>
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
