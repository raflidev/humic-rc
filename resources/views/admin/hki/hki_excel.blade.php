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
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="">{{ $err }}</p>
                @endforeach
            @endif
            <div class="w-1/2 p-3 bg-green-500 mb-6 text-sm rounded">
                Berikut adalah lampiran Template yang dapat anda download untuk mengisi data
                pada excel, pastikan anda mengisi data dengan benar dan sesuai dengan template yang telah disediakan.
                <a class="underline font-bold" href="/template_hki.xlsx" target="_blank">Download Disini</a>
            </div>
            <form action="{{route('hki.excel_import_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="File Excel" class="block mb-2 text-sm font-medium ">File Excel</label>
                            <input type="file" name="File"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="File Excel" required="" value="">
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
