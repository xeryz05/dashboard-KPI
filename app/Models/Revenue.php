<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\company;
use App\models\Period;
use App\models\Customer;
use App\Models\Admin\TypeJob;

class Revenue extends Model
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

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
