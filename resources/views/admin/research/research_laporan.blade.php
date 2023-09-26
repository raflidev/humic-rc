@extends('layout.laporan')

@section('title')
Penelitian
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Fakultas</th>
            <th>Prodi</th>
            <th>Judul Penelitian</th>
            <th>TKT</th>
            <th>Kelompok Keahlian</th>
            <th>Total Dana</th>
            <th>Jenis/Skema Penelitian</th>
            <th>Tahun Pelaksanaan</th>
            <th>Jenis Pendanaan</th>
            <th>Kelompok Masyarakat</th>
            <th>Dana Kelompok Masyarakat</th>
            <th>Pemberi Dana</th>
            <th>Dana Pemberi Dana</th>
            <th>Tanggal Kontrak</th>
            <th>Nomor Kontrak</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($data as $r)
            <tr>
                <td>{{ $nomor }}</td>
                <td>{{ $r->faculty }}</td>
                <td>{{ $r->study_program }}</td>
                <td>{{ $r->research_title }}</td>
                <td>{{ $r->tkt }}</td>
                <td>{{ $r->skill_group }}</td>
                <td>{{ $r->fund_total }}</td>
                <td>{{ $r->research_type }}</td>
                <td>{{ $r->year }}</td>
                <td>{{ $r->fund_type }}</td>
                <td>{{ $r->group_society }}</td>
                <td>{{ $r->fund_group_society }}</td>
                <td>{{ $r->brim }}</td>
                <td>{{ $r->fund_brim }}</td>
                <td>{{ $r->date_start }} - {{ $r->date_end }}</td>
                <td>{{ $r->contract_number }}</td>
                <td>{{ $r->description }}</td>
            </tr>
            <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>
@endsection
