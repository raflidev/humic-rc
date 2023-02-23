<?php

namespace App\Imports;

use App\Models\Ai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ai([
            "year" => $row['tahun'],
            "faculty" => $row['fakultas'],
            "telu_number" => $row['no_telu'],
            "title" => $row['uraian_kegiatan'],
            "partner_number" => $row['no_mitra'],
            "partner_name" => $row['instansi_mitra'],
            "partner_type" => $row['jenis'],
            "date" => Carbon::parse($row['tgl_penandatanganan']),
            "status_real" => $row['status'],
            "lndn" => $row['dn_ln'],
            "link" => $row['link_eviden'],
            "activity_real" => $row['kegiatan'],
            'status' => false,
        ]);
    }
}
