<?php

namespace App\Imports;

use App\Models\Publikasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PublikasiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Publikasi([
            "jenis_publikasi" => $row['jenis_publikasi'],
            "judul" => $row['judul'],
            "member" => $row['member'],
            "partner" => $row['partner'],
            "nama_jurnal" => $row['nama_jurnal'],
            "issue" => $row['issue'],
            "volume" => $row['volume'],
            "tahun" => $row['tahun'],
            "quartile" => $row['quartile'],
            "indexed" => $row['indexed'],
            "link_makalah" => $row['link_makalah'],
            'status' => False,
        ]);
    }
}
