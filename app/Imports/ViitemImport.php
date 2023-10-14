<?php

namespace App\Imports;

use App\Models\Departement\Viitem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ViitemImport implements ToCollection, WithHeadingRow
{ 
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Viitem::create([
                'departement_id' => $row['departement'],
                'period_id' => $row['periode'], 
                'area' => $row['area'],
                'kpi' => $row['kpi'],
                'calculation' => $row['calculation'],
                'target' => $row['target'],
                'weight' => $row['weight'],
                'realization' => $row['realization'],
                'created_by' => $row['created'],
                'updated_by' => $row['updated'],
            ]);
        }
    }
}
