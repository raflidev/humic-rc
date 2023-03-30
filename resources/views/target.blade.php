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

    </div>
    <div class="">
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Sumber</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Capaian</th>
                        <th>Gap</th>
                        <th>Kesimpulan</th>
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
                            {{-- <td>{{ $r->capaian }}</td>
                            <td>{{ $r->gap }}</td> --}}
                            <td>{{ $r->kesimpulan }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection