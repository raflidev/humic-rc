@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="pb-10" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - TOTAL NTF</h1>
                    @include('layout.navbar')
                </div>
            </div>

        </div>

        <div class="-mt-20 px-16">
            <div class="flex ">
                <div class="w-4/6">
                    <canvas class="bg-slate-300 p-5 rounded-md" id="ntf"></canvas>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    <script>
         const labels = [
                '2020',
                '2021',
                '2022'
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Dana NTF',
                    backgroundColor: 'rgba(255, 159, 64, 0.8)',
                    borderColor: '#fff',
                    color: 'rgba(255, 159, 64, 0.2)',
                    data: [1000000, 1100000, 1200000],
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };

            new Chart(
                document.getElementById('ntf'),
                config
            );
    </script>
    @endsection
