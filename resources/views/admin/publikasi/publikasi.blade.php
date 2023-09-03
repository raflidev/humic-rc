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
            <a href={{ route('publikasi.create') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah Publikasi</a>
            <a href="{{route('publikasi.excel_import')}}"class="px-4 py-2 bg-green-600 font-medium rounded text-white">Import Excel</a>

        </div>

        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Publikasi</th>
                        <th>Judul</th>
                        <th>Member</th>
                        <th>Partner</th>
                        <th>Nama Jurnal</th>
                        <th>Issue / No</th>
                        <th>Volume</th>
                        <th>Tahun</th>
                        <th>Quartile</th>
                        <th>Indexed</th>
                        <th>Link Makalah</th>
                        <th>Action</th>
                        @if (Auth::user()->role == 'user')
                            <th>Status</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->jenis_publikasi }}</td>
                            <td>{{ $r->judul }}</td>
                            <td>{{ $r->member }}</td>
                            <td>{{ $r->partner }}</td>
                            <td>{{ $r->nama_jurnal }}</td>
                            <td>{{ $r->issue }}</td>
                            <td>{{ $r->volume }}</td>
                            <td>{{ $r->tahun }}</td>
                            <td>{{ $r->quartile }}</td>
                            <td>{{ $r->indexed }}</td>
                            <td>{{ $r->link_makalah }}</td>
                            <td>
                                <a href="{{ route('publikasi.member', ['id' => $r->id]) }}"
                                    class="bg-green-500 px-4 py-1 rounded-lg">Member</a>
                                  <a href="{{ route('publikasi.edit', ['id' => $r->id]) }}"
                                      class="bg-yellow-500 px-4 py-1 rounded-lg">Edit</a>

                                  <form method="POST"
                                      action="{{ route('publikasi.destroy', ['id' => $r->id]) }}"
                                      style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button class="bg-red-500 px-4 py-1 rounded-lg"
                                          onclick="return confirm('Delete?')">Hapus</button>
                                  </form>
                                  @if (Auth::user()->role == 'superadmin' && $r->status == False)
                                        <form method="POST" action="{{ route('publikasi.verifikasi', ['id' => $r->id]) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-green-500 px-4 py-1 rounded-lg text-white"
                                                onclick="return confirm('Verifikasi?')">Verifikasi</button>
                                        </form>
                                      @endif
                            </td>
                            @if (Auth::user()->role == 'user')
                              <td>
                                    @if ($r->status == True)
                                        <span class="bg-green-500 px-4 py-1 rounded-lg text-white">Terverifikasi</span>
                                    @else
                                        <span class="bg-red-500 px-4 py-1 rounded-lg text-white">Belum Terverifikasi</span>
                                    @endif
                              </td>
                              @endif
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
