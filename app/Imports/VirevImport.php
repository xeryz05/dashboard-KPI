<?php

namespace App\Imports;

use App\Models\corporate\Virev;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VirevImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Virev::create([
                'job_id' => $row['job'],
                'value' => $row['value'],
                'event_id' => $row['periode'], 
            ]);
        }
    }
}
