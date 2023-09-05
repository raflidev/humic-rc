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
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="w-full px-5 bg-red-500 text-white py-3 rounded my-4 items-center">{{ $err }}</p>
                @endforeach
            @endif

            <div class="flex space-x-3 mb-4">
                <div>Judul Penelitian: </div>
                <div>{{$data->research_title}}</div>
            </div>

            @if(Auth::user()->role == "superadmin" || $research[0]->status == false)
            <form action="{{ route('research.mitra_store', ['id' => $id]) }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="nama_mitra" class="block mb-2 text-sm font-medium ">Nama Mitra</label>
                            <input name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra"
                                class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                required/>
                        </div>
                        <div class="mb-6">
                            <label for="role" class="block mb-2 text-sm font-medium ">Role</label>
                            <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required="">
                                <option value="Ketua">Ketua</option>
                                <option value="Member">Member</option>
                            </select>
                        </select>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
                        </div>

                    </div>
                </div>
            </form>
            @endif

        </div>
        <div class="pt-10 px-10">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($mitra as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->nama_mitra }}</td>
                            <td>{{ $r->role }}</td>
                            <td>
                                  @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user'))

                                    <form method="POST"
                                        action="{{ route('research.mitra_destroy', ['id' => $r->id]) }}"
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

