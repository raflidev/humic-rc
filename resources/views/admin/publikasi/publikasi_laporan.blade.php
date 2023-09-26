@extends('layout.laporan')

@section('title')
Publikasi
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Publikasi</th>
            <th>Judul</th>
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
@endsection
