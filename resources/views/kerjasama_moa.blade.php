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

            <a href={{ route('kerjasama.create_moa') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                MOA</a>
            <a href="{{route('kerjasama.excel_import_moa')}}"class="px-4 py-2 bg-green-600 font-medium rounded text-white">Import Excel</a>
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
                        <th>Action</th>
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
                            <td>
                                <a href="{{ route('kerjasama.edit_moa', ['id' => $r->moa_id]) }}"
                                    class="bg-yellow-500 px-4 py-1 rounded-lg">Edit</a>

                                <form method="POST" action="{{ route('kerjasama.destroy_moa', ['id' => $r->moa_id]) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 px-4 py-1 rounded-lg"
                                        onclick="return confirm('Delete?')">Hapus</button>
                                </form>
                                @if (Auth::user()->role == 'superadmin' && $r->status == False)
                                        <form method="POST" action="{{ route('kerjasama.verifikasi_moa', ['id' => $r->moa_id]) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-green-500 px-4 py-1 rounded-lg text-white"
                                                onclick="return confirm('Verifikasi?')">Verifikasi</button>
                                        </form>
                                      @endif
                            </td>
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
