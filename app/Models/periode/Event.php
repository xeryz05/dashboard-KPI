<?php

namespace App\Models\periode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\corporate\Verev;
use App\Models\corporate\Virev;
use App\Models\Departement\veitem;
use App\Models\Departement\viitem;
use App\Models\corporate\PhysicalAvailability;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['start', 'end', 'year'];

    public function Verev()
    {
        return $this->hasMany(Verev::class);
    }
    public function veitem()
    {
        return $this->hasMany(veitem::class);
    }
    public function viitem()
    {
        return $this->hasMany(viitem::class);
    }
    public function Virev()
    {
        return $this->hasMany(Virev::class);
    }
    public function Aging()
    {
        return $this->hasMany(Aging::class);
    }
    public function Profit()
    {
        return $this->hasMany(Profit::class);
    }
    public function Profitve()
    {
        return $this->hasMany(Profitve::class);
    }
    public function PhysicalAvailability()
    {
        return $this->hasMany(PhysicalAvailability::class);
    }
}