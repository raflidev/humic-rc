@extends('layout.laporan')

@section('title')
Pengabdian
@endsection

@section('content')
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Fakultas</th>
            <th>Nomor Tel-u</th>
            <th>Nomor Mitra</th>
            <th>Judul/Kegiatan</th>
            <th>Instansi Mitra</th>
            <th>Tanggal Pengesahan</th>
            <th>Tanggal Berakhir</th>
            <th>Durasi</th>
            <th>Status</th>
            <th>LN/DN</th>
            <th>P/NP</th>
            <th>Akd/Non Akd</th>
            <th>File MoU</th>
            <th>Kegiatan yang telah terealisasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($data as $r)
            <tr>
                <td>{{ $nomor }}</td>
                <td>{{ $r->faculty }}</td>
                <td>{{ $r->telu_number }}</td>
                <td>{{ $r->partner_number }}</td>
                <td>{{ $r->title }}</td>
                <td>{{ $r->partner_name }}</td>
                <td>{{ $r->date_start }}</td>
                <td>{{ $r->date_end }}</td>
                <td>{{ $r->duration }}</td>
                <td>{{ $r->status_real }}</td>
                <td>{{ $r->lndn }}</td>
                <td>{{ $r->pnp }}</td>
                <td>{{ $r->akd }}</td>
                <td>{{ $r->file }}</td>
                <td>{{ $r->activity_real }}</td>
                @endif
            </tr>
            <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>
@endsection
