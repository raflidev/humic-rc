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

            <div class="pb-4">
                <h1 class="font-semibold uppercase">Data</h1>
                <div><span class="font-semibold">Tahun:</span> {{$awal->tahun}}</div>
                <div><span class="font-semibold">Sumber:</span> {{$awal->sumber}}</div>
                <div><span class="font-semibold">Indikator:</span> {{$awal->indikator}}</div>
            </div>

            <form action="{{ route('isitarget.store', ['id' => $awal->id]) }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="Capaian" class="block mb-2 text-sm font-medium ">Capaian</label>
                            <select name="id_subjek" id="" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach($penelitian as $p):
                                <option value="penelitian_{{$p->research_title}}">{{$p->research_title}}</option>
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
                        <th>Id Subjek</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->id_subjek }}</td>
                            <td>
                                @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $r->status == False))

                                  <form method="POST"
                                      action="{{ route('isitarget.destroy', ['id' => $r->id_target, 'id_delete' => $r->id ]) }}"
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
