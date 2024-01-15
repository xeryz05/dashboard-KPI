<?php

namespace App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;

class deptViSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester','year','value'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
