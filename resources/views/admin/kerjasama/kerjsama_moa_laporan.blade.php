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
            <th>Nomor MoA</th>
            <th>Nomor MoA Mitra</th>
            <th>Judul/Kegiatan</th>
            <th>Instansi Mitra</th>
            <th>Jenis Mitra</th>
            <th>Tanggal Pengesahan</th>
            <th>Tanggal Berakhir</th>
            <th>Durasi</th>
            <th>Status</th>
            <th>LN/DN</th>
            <th>P/NP</th>
            <th>Akd/Non Akd</th>
            <th>Link eviden</th>
            <th>Kegiatan yang telah terealiasasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        @foreach ($data as $r)
            <tr>
                <td>{{ $nomor }}</td>
                <td>{{ $r->year }}</td>
                <td>{{ $r->faculty }}</td>
                <td>{{ $r->moa_number }}</td>
                <td>{{ $r->moa_number_partner }}</td>
                <td>{{ $r->title }}</td>
                <td>{{ $r->partner_name }}</td>
                <td>{{ $r->partner_type }}</td>
                <td>{{ $r->date_start }}</td>
                <td>{{ $r->date_end }}</td>
                <td>{{ $r->duration }}</td>
                <td>{{ $r->status_real }}</td>
                <td>{{ $r->lndn }}</td>
                <td>{{ $r->pnp }}</td>
                <td>{{ $r->akd }}</td>
                <td>{{ $r->link }}</td>
                <td>{{ $r->activity_real }}</td>
                @endif
            </tr>
            <?php $nomor++; ?>
        @endforeach
    </tbody>
</table>
@endsection
