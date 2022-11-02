@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - Kerjasama MOA</h1>
                    @guest
                        <a href="/login" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
                            Login
                        </a>
                    @endguest
                    @auth
                        @if (Auth::user()->status == true)
                            <div>
                                <a href="profile" class="hover:underline mr-4">
                                    Halo, {{ Auth::user()->name }}
                                </a>
                                <a href="/logout" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
                                    Logout
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>

            <a href={{ route('kerjasama.create_moa') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                MOA</a>
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
