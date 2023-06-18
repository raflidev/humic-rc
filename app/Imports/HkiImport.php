<?php

namespace App\Imports;

use App\Models\Hki;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HkiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Hki([
            'tahun' => $row['tahun'],
            'judul' => $row['judul'],
            'member' => $row['member'],
            'partner' => $row['partner'],
            'jenis' => $row['jenis'],
            'status' => $row['status'],
            'status_post' => false,
        ]);
    }
}
