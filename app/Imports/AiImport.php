<?php

namespace App\Imports;

use App\Models\Ai;
use Maatwebsite\Excel\Concerns\ToModel;

class AiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ai([
            "year",
            "faculty",
            "telu_number",
            "partner_number",
            "activity",
            "partner_name",
            "partner_type",
            "type",
            "date",
            "status",
            "lndn",
            "link",
            "file",
            "activity_real",
        ]);
    }
}
