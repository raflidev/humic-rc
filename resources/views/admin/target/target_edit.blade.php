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
            <form action="{{ route('target.update', ['id' => $data->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="tahun" class="block mb-2 text-sm font-medium ">Tahun</label>
                            <input type="number" name="tahun"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="tahun" required="" value="{{ old('tahun', $data->tahun) }}">
                        </div>

                        <div class="mb-6">
                            <label for="sumber" class="block mb-2 text-sm font-medium ">Sumber</label>
                            <input type="text" name="sumber"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="sumber" required="" value="{{ old('sumber', $data->sumber) }}">
                        </div>

                        <div class="mb-6">
                            <label for="indikator" class="block mb-2 text-sm font-medium ">Indikator</label>
                            <input type="text" name="indikator"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="indikator" required="" value="{{ old('indikator', $data->indikator ) }}">
                        </div>
                        
                        

                    </div>

                    <div class="w-1/2">

                        <div class="mb-6">
                            <label for="target" class="block mb-2 text-sm font-medium ">Target</label>
                            <input type="number" name="target"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="target" required="" value="{{ old('target', $data->target ) }}">
                        </div>

                        <div class="mb-6">
                            <label for="keterangan" class="block mb-2 text-sm font-medium ">Keterangan</label>
                            <input type="text" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="keterangan" required="" value="{{ old('keterangan', $data->keterangan ) }}">
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
