@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    @include('layout.navbar')
                </div>
            </div>
            <a href={{ route('pengabdian.create') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                Pengabdian Masyarakat</a>
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
                        <th>Judul Abdimas</th>
                        <th>Nama Ketua</th>
                        <th>Anggota Dosen</th>
                        <th>Jumlah Dosen</th>
                        <th>Anggota Mahasiswa</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Dana</th>
                        <th>Masyarakat Sasar</th>
                        <th>Kota</th>
                        <th>Skema Masyarakat</th>
                        <th>Alamat Skema Masyarakat</th>
                        <th>Fakultas Masyarakat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($pengabdian as $p)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $p->period }}</td>
                            <td>{{ $p->scheme }}</td>
                            <td>{{ $p->faculty }}</td>
                            <td>{{ $p->study_program }}</td>
                            <td>{{ $p->skill_group }}</td>
                            <td>{{ $p->title_abdimas }}</td>
                            <td>{{ $p->head }}</td>
                            <td>{{ $p->lecturer }}</td>
                            <td>{{ $p->lecturer }}</td>
                            <td>{{ $p->student }}</td>
                            <td>{{ $p->student_total }}</td>
                            <td>{{ $p->fund }}</td>
                            <td>{{ $p->society }}</td>
                            <td>{{ $p->society_address }}</td>
                            <td>{{ $p->city }}</td>
                            <td>{{ $p->society_scheme }}</td>
                            <td>{{ $p->society_faculty }}</td>
                            <td>
                                <a href="{{ route('pengabdian.edit', ['id' => $p->pengnas_id]) }}"
                                    class="bg-yellow-500 px-4 py-1 rounded-lg">Edit</a>

                                <form method="POST" action="{{ route('pengabdian.destroy', ['id' => $p->pengnas_id]) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 px-4 py-1 rounded-lg"
                                        onclick="return confirm('Delete?')">Hapus</button>
                                </form>

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
