<?php

namespace App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;
use App\Models\periode\Event;

class viitem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event_id','departement_id','area','kpi','calculation','target','weight','realization','created_by','updated_by'
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
