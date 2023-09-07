<?php

namespace App\Imports;

use App\Models\Revenue;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RevenueImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Revenue([
            'company_id' => $row[0],
            'type_jobs' => $row[1],
            'target_perbulan' => $row[2],
            'target_pertahun' => $row[3],
            'grand_total' => $row[4],
            'value_jan' => $row[5],
            'value_feb' => $row[6],
            'value_mar' => $row[7],
            'value_apr' => $row[8],
            'value_mei' => $row[9],
            'value_juni' => $row[10],
            'value_juli' => $row[11],
            'value_agust' => $row[12],
            'value_sept' => $row[13],
            'value_okt' => $row[14],
            'value_nov' => $row[15],
            'value_des' => $row[16],
        ]);
    }
}
