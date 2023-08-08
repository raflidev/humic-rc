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
            <form action="{{ route('research.member_store', ['id' => $id]) }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="member" class="block mb-2 text-sm font-medium ">Member</label>
                            <select name="member" id="member"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                required="">
                                <option value="">Pilih Member</option>
                                @foreach ($user as $f)
                                    <option value="{{ $f->id }}">{{ $f->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>TKT</th>
                        <th>Judul Penelitian</th>
                        <th>Action</th>
                        @if (Auth::user()->role == 'user')
                            <th>Status</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($research as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->tkt }}</td>
                            <td>{{ $r->faculty }}</td>
                            <td>
                                  @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $r->status == False))

                                    <form method="POST"
                                        action="{{ route('research.destroy', ['id' => 1]) }}"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 px-4 py-1 rounded-lg"
                                            onclick="return confirm('Delete?')">Hapus</button>
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

