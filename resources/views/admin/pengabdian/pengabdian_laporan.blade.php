@extends('layout.laporan')

@section('title')
Pengabdian
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Periode</th>
            <th>Skema</th>
            <th>Fakultas</th>
            <th>Prodi</th>
            <th>Kelompok Keahlian</th>
            <th>Judul Abdimas</th>
            <th>Dana</th>
            <th>Masyarakat Sasar</th>
            <th>Alamat Skema Masyarakat</th>
            <th>Kota</th>
            <th>Skema Masyarakat</th>
            <th>Fakultas Masyarakat</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($data as $p)
            <tr>
                <td>{{ $nomor }}</td>
                <td>{{ $p->period }}</td>
                <td>{{ $p->scheme }}</td>
                <td>{{ $p->faculty }}</td>
                <td>{{ $p->study_program }}</td>
                <td>{{ $p->skill_group }}</td>
                <td>{{ $p->title_abdimas }}</td>
                <td>{{ $p->fund }}</td>
                <td>{{ $p->society }}</td>
                <td>{{ $p->society_address }}</td>
                <td>{{ $p->city }}</td>
                <td>{{ $p->society_scheme }}</td>
                <td>{{ $p->society_faculty }}</td>
            </tr>
            <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>
@endsection
