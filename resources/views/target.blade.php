@extends('layout.app')

@section('content')
@include('layout.sidebar')
<div class="w-10/12" id="sidebar">
    <div class="bg-slate-700 pb-20 px-16 py-10 text-white">
        <div class="pb-10" id="navbar">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold uppercase">Target</h1>
                @include('layout.navbar')
            </div>
        </div>

        <div>
            <div class="grid grid-cols-4 gap-5">
                <div class="px-5 py-3 bg-white rounded-md text-black">
                    <div class="flex items-center">
                        <div class="w-5/6 space-y-5">
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Target</div>
                                <div class="text-2xl font-semibold">
                                    {{$target_sum}}
                                </div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Target tahun ini
                                </div>
                                <div class="font-semibold">
                                    {{$target_tahun_ini}}
                                </div>
                            </div>

                        </div>
                        <div class="w-1/6">
                            <div class="flex justify-center">
                                <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                    <i class="far fa-chart-bar text-white text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 bg-white rounded-md text-black">
                    <div class="flex items-center">
                        <div class="w-5/6 space-y-5">
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Capaian</div>
                                <div class="text-2xl font-semibold">
                                    {{$capaian_sum}}
                                </div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Capaian tahun ini
                                </div>
                                <div class="font-semibold">
                                    {{$capaian_tahun_ini}}
                                </div>
                            </div>

                        </div>
                        <div class="w-1/6">
                            <div class="flex justify-center">
                                <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                    <i class="fas fa-globe-asia text-white text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="">
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Tanggung Jawab</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Capaian</th>
                        <th>Gap</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->tahun }}</td>
                            <td>{{ $r->sumber }}</td>
                            <td>{{ $r->indikator }}</td>
                            <td>{{ $r->target }}</td>
                            <td>{{ $r->capaian }}</td>
                            <td>{{ $r->capaian - $r->target }}</td>
                            @if($r->capaian - $r->target > 0)
                                <td  class="bg-green-500 text-white">Telah Tercapai</td>
                            @else
                                <td class="bg-red-500 text-white">Belum Tercapai</td>
                            @endif
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
