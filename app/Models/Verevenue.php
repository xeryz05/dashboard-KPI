<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\TypeJob;
use App\models\company;
use App\models\Period;

class Verevenue extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'type_jobs',
        'target_perbulan',
        'target_pertahun',
        'grand_total',
        'value_jan',
        'value_feb',
        'value_mar',
        'value_apr',
        'value_mei',
        'value_juni',
        'value_juli',
        'value_agust',
        'value_sept',
        'value_okt',
        'value_nov',
        'value_des',
    ];

    public function vislider()
    {
        return $this->hasMany(Vislider::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
