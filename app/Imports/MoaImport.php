<?php

namespace App\Imports;

use App\Models\Moa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MoaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row['fakultas']);
        return new Moa([
            'year' => strval($row['tahun']),
            'user_id' => Auth::user()->id,
            'faculty' => $row['fakultas'],
            'moa_number' => $row['nomor_moa'],
            'moa_number_partner' => $row['nomor_moa_mitra'],
            'title' => $row['judul_kegiatan'],
            'partner_name' => $row['instansi_mitra'],
            'partner_type' => $row['jenis_mitra'],
            'date_start' => Carbon::parse($row['tanggal_pengesahan']),
            'date_end' => Carbon::parse($row['tanggal_berakhir']),
            'duration' => $row['durasi'],
            'status_real' => $row['status'],
            'lndn' => $row['ln_dn'],
            'pnp' => $row['p_np'],
            'akd' => $row['akd_nonakd'],
            'link' => $row['link_eviden'],
            'activity_real' => $row['kegiatan'],
            'status' => false,
        ]);
    }
}
