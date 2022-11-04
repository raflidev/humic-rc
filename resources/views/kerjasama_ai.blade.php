@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Kerjasama AI</h1>
                    @include('layout.navbar')
                </div>
            </div>
            <a href={{ route('kerjasama.create_ai') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                AI</a>
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
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
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
