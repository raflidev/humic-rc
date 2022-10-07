@extends('layout.app')

@section('content')
    @include('layout.sidebar')
    <div class="w-10/12" id="sidebar">
        <div class="bg-slate-700 pb-36 px-16 py-10 text-white">
            <div class="" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard - TOTAL NTF</h1>
                    <div class="rounded-md bg-blue-500 px-5 py-2">
                        Login
                    </div>
                </div>
            </div>

        </div>

        <div class="-mt-20 px-16">
            <div class="flex ">
                <div class="w-4/6">
                    <canvas class="bg-slate-300 p-5 rounded-md" id="myChart"></canvas>
                </div>
            </div>
        </div>
    @endsection
