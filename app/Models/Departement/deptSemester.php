<?php

namespace App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;

class deptSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester','year','value'
    ];

    public function Event()
    {
        return $this->hashMany(Event::class);
    }
}
