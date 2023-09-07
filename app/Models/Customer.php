<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Revenue;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','total','value_jan',
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

    public function Revenue()
    {
        return $this->hasMany(Revenue::class);
    }
}
