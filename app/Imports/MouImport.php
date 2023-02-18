<?php

namespace App\Imports;

use App\Models\Mou;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MouImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mou([
            'year' => $row['tahun'],
            'faculty' => $row['fakultas'],
            'telu_number' => $row['nomor_telu'],
            'partner_number' => $row['nomor_mitra'],
            'title' => $row['judul_kegiatan'],
            'partner_name' => $row['instansi_mitra'],
            'partner_type' => $row['jenis_mitra'],
            'date_start' => $row['tanggal_pengesahan'],
            'date_end' => $row['tanggal_berakhir'],
            'duration' => $row['durasi'],
            'status' => $row['status'],
            'lndn' => $row['ln_dn'],
            'pnp' => $row['p_np'],
            'akd' => $row['akd_nonakd'],
            'file' => $row['file_mou'],
            'activity_real' => $row['kegiatan'],
        ]);
    }
}
