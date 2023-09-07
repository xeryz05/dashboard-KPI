<?php

namespace App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Period;
use App\Models\Departement\kpipdca;

class realization extends Model
{
    use HasFactory;

    protected $fillable = ['kpipdca_id','period_id', 'value'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

}
