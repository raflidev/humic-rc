@extends('layout.app')

@section('content')
@include('layout.sidebar')
<div class="w-10/12" id="sidebar">
    <div class="bg-slate-700 pb-20 px-16 py-10 text-white">
        <div class="pb-10" id="navbar">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold uppercase">Dashboard - Publikasi</h1>
                @include('layout.navbar')
            </div>
        </div>

        <div>
            <div class="grid grid-cols-4 gap-5">
                <div class="px-5 py-3 bg-white rounded-md text-black">
                    <div class="flex items-center">
                        <div class="w-5/6 space-y-5">
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Publikasi</div>
                                <div class="text-2xl font-semibold">
                                    {{$data_count}}
                                </div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-sm uppercase">Publikasi tahun ini
                                </div>
                                <div class="font-semibold">
                                    {{$data_count_tahun_ini}}
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
                        <th>Jenis Publikasi</th>
                        <th>Judul</th>
                        {{-- <th>Member</th>
                        <th>Partner</th> --}}
                        <th>Nama Jurnal</th>
                        <th>Issue / No</th>
                        <th>Volume</th>
                        <th>Tahun</th>
                        <th>Quartile</th>
                        <th>Indexed</th>
                        <th>Link Makalah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                       <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->jenis_publikasi }}</td>
                            <td>{{ $r->judul }}</td>
                            {{-- <td>{{ $r->member }}</td>
                            <td>{{ $r->partner }}</td> --}}
                            <td>{{ $r->nama_jurnal }}</td>
                            <td>{{ $r->issue }}</td>
                            <td>{{ $r->volume }}</td>
                            <td>{{ $r->tahun }}</td>
                            <td>{{ $r->quartile }}</td>
                            <td>{{ $r->indexed }}</td>
                            <td>{{ $r->link_makalah }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
