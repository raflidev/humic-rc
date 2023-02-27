@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 rounded my-4 items-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    @include('layout.navbar')
                </div>
            </div>
            <a href={{ route('research.create') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                Penelitian</a>
            <a href="{{route('research.excel_import')}}"class="px-4 py-2 bg-green-600 font-medium rounded text-white">Import Excel</a>

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
                        <th>Pemberi Dana</th>
                        <th>Dana Pemberi Dana</th>
                        <th>Tanggal Kontrak</th>
                        <th>Nomor Kontrak</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                        @if (Auth::user()->role == 'user')
                            <th>Status</th>
                        @endif
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
                            <td>
                                  @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $r->status == False))
                                    <a href="{{ route('research.edit', ['id' => $r->research_id]) }}"
                                        class="bg-yellow-500 px-4 py-1 rounded-lg">Edit</a>

                                    <form method="POST"
                                        action="{{ route('research.destroy', ['id' => $r->research_id]) }}"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 px-4 py-1 rounded-lg"
                                            onclick="return confirm('Delete?')">Hapus</button>
                                    </form>
                                      @if (Auth::user()->role == 'superadmin' && $r->status == False)
                                        <form method="POST" action="{{ route('research.verifikasi', ['id' => $r->research_id]) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-green-500 px-4 py-1 rounded-lg text-white"
                                                onclick="return confirm('Verifikasi?')">Verifikasi</button>
                                        </form>
                                      @endif
                                    @endif
                              </td>
                              @if (Auth::user()->role == 'user')
                              <td>
                                    @if ($r->status == True)
                                        <span class="bg-green-500 px-4 py-1 rounded-lg text-white">Terverifikasi</span>
                                    @else
                                        <span class="bg-red-500 px-4 py-1 rounded-lg text-white">Belum Terverifikasi</span>
                                    @endif
                              </td>
                              @endif
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
