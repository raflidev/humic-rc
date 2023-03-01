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
            <a href={{ route('ntf.create') }} class="px-4 py-2 bg-green-600 font-medium rounded text-white">Tambah
                NTF</a>
        </div>
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Dana</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $p)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $p->tahun }}</td>
                            <td>{{ $p->dana }}</td>
                            <td>
                                @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $p->status == False))
                                    <a href="{{ route('ntf.edit', ['id' => $p->id]) }}"
                                        class="bg-yellow-500 px-4 py-1 rounded-lg">Edit</a>

                                    <form method="POST" action="{{ route('ntf.destroy', ['id' => $p->id]) }}"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 px-4 py-1 rounded-lg"
                                            onclick="return confirm('Delete?')">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
