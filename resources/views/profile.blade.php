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
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="">{{ $err }}</p>
                @endforeach
            @endif
            <form action="{{ route('user.profile_post', ['id' => $user[0]->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium ">Nama</label>
                            <input type="text" name="nama"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Nama" required="" value="{{ old('nama', $user[0]->name) }}">
                        </div>
                        <div class="mb-6">
                            <label for="nip" class="block mb-2 text-sm font-medium ">nip</label>
                            <input type="text" name="nip"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="nip" required="" value="{{ old('nip', $user[0]->nip) }}">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium ">Password</label>
                            <input type="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Password" required="" value="{{ old('password') }}">
                        </div>
                        <div class="mb-6    ">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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
