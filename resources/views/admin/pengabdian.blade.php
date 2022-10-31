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
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('pengabdian.store') }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="periode" class="block mb-2 text-sm font-medium ">Periode</label>
                            <input type="text" name="periode"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Periode" required="" value="{{ old('periode') }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema" class="block mb-2 text-sm font-medium ">Skema</label>
                            <input type="text" name="skema"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema" required="" value="{{ old('skema') }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas" class="block mb-2 text-sm font-medium ">Fakultas</label>
                            <input type="text" name="fakultas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas" required="" value="{{ old('fakultas') }}">
                        </div>
                        <div class="mb-6">
                            <label for="prodi" class="block mb-2 text-sm font-medium ">Prodi</label>
                            <input type="text" name="prodi"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Prodi" required="" value="{{ old('prodi') }}">
                        </div>
                        <div class="mb-6">
                            <label for="kelompok_keahlian" class="block mb-2 text-sm font-medium ">Kelompok Keahlian</label>
                            <input type="text" name="kelompok_keahlian"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kelompok Keahlian" required="" value="{{ old('kelompok_keahlian') }}">
                        </div>
                        <div class="mb-6">
                            <label for="judul_abdimas" class="block mb-2 text-sm font-medium ">Judul Abdimas</label>
                            <input type="text" name="judul_abdimas"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Judul Abdimas" required="" value="{{ old('judul_abdimas') }}">
                        </div>


                    </div>
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="nama_ketua" class="block mb-2 text-sm font-medium ">Nama Ketua</label>
                            <input type="text" name="nama_ketua"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama Ketua" required="" value="{{ old('nama_ketua') }}">
                        </div>
                        <div class="mb-6">
                            <label for="dana" class="block mb-2 text-sm font-medium ">Dana</label>
                            <input type="number" name="dana"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Dana" required="" value="{{ old('dana') }}">
                        </div>
                        <div class="mb-6">
                            <label for="masyarakat_sasar" class="block mb-2 text-sm font-medium ">Masyarakat Sasar</label>
                            <input type="number" name="masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masyarakat Sasar" required="" value="{{ old('masyarakat_sasar') }}">
                        </div>
                        <div class="mb-6">
                            <label for="kota" class="block mb-2 text-sm font-medium ">Kota</label>
                            <input type="text" name="kota"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Kota" required="" value="{{ old('kota') }}">
                        </div>
                        <div class="mb-6">
                            <label for="skema_masyarakat" class="block mb-2 text-sm font-medium ">Skema Masyarakat</label>
                            <input type="text" name="skema_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Skema Masyarakat" required="" value="{{ old('skema_masyarakat') }}">
                        </div>
                        <div class="mb-6">
                            <label for="alamat_masyarakat_sasar" class="block mb-2 text-sm font-medium ">Alamat Skema
                                Masyarakat</label>
                            <input type="text" name="alamat_masyarakat_sasar"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Alamat Skema Masyarakat" required=""
                                value="{{ old('alamat_masyarakat_sasar') }}">
                        </div>
                        <div class="mb-6">
                            <label for="fakultas_masyarakat" class="block mb-2 text-sm font-medium ">Fakultas
                                Masyarakat</label>
                            <input type="text" name="fakultas_masyarakat"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Fakultas Masyarakat" required=""
                                value="{{ old('fakultas_masyarakat') }}">
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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
                        <th>Dana</th>
                        <th>Masyarakat Sasar</th>
                        <th>Kota</th>
                        <th>Skema Masyarakat</th>
                        <th>Alamat Skema Masyarakat</th>
                        <th>Fakultas Masyarakat</th>
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
                            <td>{{ $p->fund }}</td>
                            <td>{{ $p->society }}</td>
                            <td>{{ $p->society_address }}</td>
                            <td>{{ $p->city }}</td>
                            <td>{{ $p->society_scheme }}</td>
                            <td>{{ $p->society_faculty }}</td>
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
