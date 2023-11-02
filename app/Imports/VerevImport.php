<?php

namespace App\Imports;

use App\Models\corporate\Verev;
use App\Models\periode\Event;
use App\Models\corporate\Job;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VerevImport implements ToModel, WithHeadingRow
{ 
    public function model(array $row)
    {
        {
            return new Verev([
                'job_id' => $row['job'],
                'value' => $row['value'],
                'event_id' => $row['periode'],
            ]);
        }
    }
}

