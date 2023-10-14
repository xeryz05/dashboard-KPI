<?php

namespace App\Imports;

use App\Models\corporate\Verev;
use App\Models\periode\Event;
use App\Models\corporate\Job;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VerevImport implements ToCollection, WithHeadingRow
{ 
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Verev::create([
                'value' => $row['value'],
                'event_id' => $row['periode'], 
                'job_id' => $row['job'],
            ]);
        }
    }
}

