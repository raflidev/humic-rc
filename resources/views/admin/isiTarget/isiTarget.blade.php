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

            <form action="{{ route('isitarget.store', ['id' => $awal->id]) }}" method="post">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <label for="subjek" class="block mb-2 text-sm font-medium ">Subjek</label>
                            <select name="subjek" id="select" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Pilih" disabled selected>Pilih</option>
                                <option value="Penelitian">Penelitian</option>
                                <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                                <option value="MOA">MOA</option>
                                <option value="MOU">MOU</option>
                                <option value="IA">IA</option>
                            </select>
                        </div>
                        <div class="mb-6" id="capaian">
                            <label for="capaian" class="block mb-2 text-sm font-medium ">Capaian</label>
                            <select name="id_subjek" id="capaian_val" class="bg-gray-50 border border-gray-300 text-sm text-black rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @if ($penelitian->count() == 0)
                                    <option value="kosong" disabled selected>kosong</option>
                                @endif
                                @foreach($penelitian as $p):
                                    <option value="penelitian_{{$p->research_title}}">{{$p->research_title}} | {{$p->head_name}}</option>
                                @endforeach
                            </select>
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
                        <th>Judul</th>
                        <th>Subjek</th>
                        <th>Ketua</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Kelompok Keahlian</th>
                        <th>Skema</th>
                        <th>Total Bantuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $r->judul }}</td>
                            <td>{{ $r->subjek }}</td>
                            <td>{{ $r->ketua }}</td>
                            <td>{{ $r->fakultas }}</td>
                            <td>{{ $r->prodi }}</td>
                            <td>{{ $r->kelompok_keahlian }}</td>
                            <td>{{ $r->skema }}</td>
                            <td>{{ $r->total_bantuan }}</td>
                            <td>
                                @if (Auth::user()->role == 'superadmin' || (Auth::user()->role == 'user' && $r->status == False))

                                  <form method="POST"
                                      action="{{ route('isitarget.destroy', ['id' => $r->id_target, 'id_delete' => $r->id ]) }}"
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

    @section('scripts')
    <?php $a ?>
        <script>
            let penelitian = {!! json_encode($penelitian) !!};
            let pengmas = {!! json_encode($pengnas) !!};
            let mou = {!! json_encode($mou) !!};
            let moa = {!! json_encode($moa) !!};
            let ai = {!! json_encode($ai) !!};

            $(document).ready(function() {
                $('#capaian').hide()
                $('#submit').hide()

                $('#select').on('change',function() {
                    $('#capaian').show()
                    $('#submit').show()
                    var value = $(this).val();
                    if(value == "Penelitian"){
                        var data = penelitian;
                        $('#capaian_val').empty();
                        $.each(data, function(index, value) {
                            if (value.research_title != null) {
                                $('#capaian_val').append('<option value="' + value.research_id + '">' + value.research_title + ' | ' + value.head_name + ' | ' + value.year + '</option>');
                            }
                        });
                    }
                    if(value == "Pengabdian Masyarakat"){
                        var data = pengmas;
                        $('#capaian_val').empty();
                        $.each(data, function(index, value) {
                            if (value.title_abdimas != null) {
                                $('#capaian_val').append('<option value="' + value.pengnas_id + '">' + value.title_abdimas + ' | ' + value.head + '</option>');
                            }
                        });
                    }
                    if(value == "MOA"){
                        var data = moa;
                        $('#capaian_val').empty();
                        $.each(data, function(index, value) {
                            if (value.moa_id != null) {
                                $('#capaian_val').append('<option value="' + value.moa_id + '">' + value.moa_number + ' | ' + value.partner_name + ' | ' + value.year + '</option>');
                            }
                        });
                    }
                    if(value == "MOU"){
                        var data = mou;
                        $('#capaian_val').empty();
                        $.each(data, function(index, value) {
                            if (value.mou_id != null) {
                                $('#capaian_val').append('<option value="' + value.mou_id + '">' + value.telu_number + ' | ' + value.partner_name + '</option>');
                            }
                        });
                    }

                    if(value == "IA"){
                        var data = ai;
                        $('#capaian_val').empty();
                        $.each(data, function(index, value) {
                            if (value.ai_id != null) {
                                $('#capaian_val').append('<option value="' + value.ai_id + '">' + value.telu_number + ' | ' + value.partner_name + '</option>');
                            }
                        });
                    }

                })
            });


        </script>
    @endsection
