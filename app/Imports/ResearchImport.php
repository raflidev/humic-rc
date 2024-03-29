<?php

namespace App\Imports;

use App\Models\Research;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResearchImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Research([
            'user_id' => Auth::user()->id,
            'faculty' => $row['fakultas'],
            'study_program' => $row['prodi'],
            'research_title' => $row['judul_penelitian'],
            'tkt' => $row['tkt'],
            'skill_group' => $row['kelompok_keahlian'],
            'head_name' => $row['nama_ketua'],
            'member' => $row['anggota'],
            'head_partner_name' => $row['nama_ketua_mitra'],
            'student' => $row['mahasiswa'],
            'member_partner' => $row['anggota_mitra'],
            'fund_external' => $row['dana_external'],
            'fund_total' => $row['total_dana'],
            'research_type' => $row['jenis_penelitian'],
            'year' => $row['tahun'],
            'fund_type' => $row['jenis_pendanaan'],
            'group_society' => $row['kelompok_masyarakat'],
            'fund_group_society' => $row['dana_kelompok_masyarakat'],
            'brim' => $row['pemberi_dana'],
            'fund_brim' => $row['dana_brin'],
            'date_start' =>  Carbon::parse($row['tanggal_mulai_kontrak']),
            'date_end' =>  Carbon::parse($row['tanggal_selesai_kontrak']),
            'contract_number' => $row['nomor_kontrak'],
            'description' => $row['keterangan'],
            'status' => False,
        ]);
    }
}
