@extends('layout.laporan')

@section('title')
Pengabdian
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Fakultas</th>
            <th>No Tel-U</th>
            <th>Nomor Mitra</th>
            <th>Uraian Kegiatan</th>
            <th>Instansi Mitra</th>
            <th>Jenis Mitra</th>
            <th>Tanggal Penandatanganan</th>
            <th>Status</th>
            <th>LN/DN</th>
            <th>Link eviden</th>
            <th>Kegiatan yang telah terealiasasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor3 = 1; ?>
        @foreach ($data as $r)
            <tr>
                <td>{{ $nomor3 }}</td>
                <td>{{ $r->year }}</td>
                <td>{{ $r->faculty }}</td>
                <td>{{ $r->telu_number }}</td>
                <td>{{ $r->partner_number }}</td>
                <td>{{ $r->title }}</td>
                <td>{{ $r->partner_name }}</td>
                <td>{{ $r->partner_type }}</td>
                <td>{{ $r->date }}</td>
                <td>{{ $r->status_real }}</td>
                <td>{{ $r->lndn }}</td>
                <td>{{ $r->link }}</td>
                <td>{{ $r->activity_real }}</td>
            </tr>
            <?php $nomor3++; ?>
        @endforeach
    </tbody>
</table>
@endsection
