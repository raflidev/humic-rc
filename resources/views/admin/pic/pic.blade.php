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

            <form action="{{ route('pic.store', ['id' => $awal->id]) }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="id_user" class="block mb-2 text-sm font-medium ">User</label>
                            <select name="id_user" id="select" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach ($user as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="target" class="block mb-2 text-sm font-medium ">Target</label>
                            <input type="text" name="target" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " id="">
                        </div>

                        <div class="mb-6" id="submit">
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 p-2.5 rounded-lg">Submit</button>
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
                        <th>Tahun</th>
                        <th>Sumber</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Action</th>
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
                            <td>
                                @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $r->status == False))

                                  <form method="POST"
                                      action="{{ route('pic.destroy', ['id' => $r->id_target, 'id_delete' => $r->id ]) }}"
                                      style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button class="bg-red-500 px-4 py-1 rounded-lg text-white"
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
