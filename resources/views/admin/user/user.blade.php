@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
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
            <a href={{ route('research.create') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                Penelitian</a>

        </div>

        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($user as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->username }}</td>
                            <td>{{ $r->password }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $r->id]) }}"
                                    class="bg-yellow-500 px-4 py-1 rounded-lg text-white">Edit</a>

                                <form method="POST" action="{{ route('user.destroy', ['id' => $r->id]) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 px-4 py-1 rounded-lg text-white"
                                        onclick="return confirm('Delete?')">Hapus</button>
                                </form>
                                <a href="{{ route('user.edit', ['id' => $r->id]) }}"
                                    class="bg-green-500 px-4 py-1 rounded-lg text-white">Verifikasi</a>
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
