<?php

namespace App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Period;
use App\Models\Departement;

class veitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_id','departement_id','area','kpi','calculation','target','weight','realization'
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}