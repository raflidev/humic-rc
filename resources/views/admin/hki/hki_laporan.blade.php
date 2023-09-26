@extends('layout.laporan')

@section('title')
HKI
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Judul</th>
            <th>Jenis</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($data as $r)
            <tr>
                <td>{{ $nomor }}</td>
                <td>{{$r->tahun}}</td>
                <td>{{$r->judul}}</td>
                <td>{{$r->jenis}}</td>
                <td>{{$r->status}}</td>
            </tr>
            <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>
@endsection
