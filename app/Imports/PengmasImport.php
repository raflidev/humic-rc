<?php

namespace App\Imports;

use App\Models\Pengnas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengmasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // dd($row);
        return new Pengnas([
            'period' => strval($row['periode']),
            'scheme' => $row['skema'],
            'faculty' => $row['fakultas'],
            'study_program' => $row['program_studi'],
            'skill_group' => $row['kk'],
            'title_abdimas' => $row['judul_abdimas'],
            'lecturer' => $row['anggota_dosen'],
            'lecturer_total' => $row['jumlah_dosen'],
            'student' => $row['anggota_mahasiswa'],
            'student_total' => $row['jumlah_mahasiswa'],
            'head' => $row['ketua'],
            'fund' => $row['dana'],
            'society' => $row['masyarakat_sasar'],
            'society_address' => $row['alamat_masyarakat_sasar'],
            'city' => $row['kota_masyarakat'],
            'society_scheme' => $row['skema_masyarakat'],
            'society_faculty' => $row['fakultas_masyarakat'],
            'status' => False,
            'fund_scheme' => $row['skema_dana'],
            'fund_type' => $row['jenis_pendanaan'],
        ]);
    }
}
