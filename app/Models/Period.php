<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\corporate\Verev;
use App\Models\corporate\Virev;
use App\Models\Departement\veitem;
use App\Models\Departement\viitem;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['month', 'year'];

    public function Verev()
    {
        return $this->hasMany(Verev::class);
    }
    public function Virev()
    {
        return $this->hasMany(Virev::class);
    }

    public function veitem()
    {
        return $this->hasMany(veitem::class);
    }
    public function viitem()
    {
        return $this->hasMany(viitem::class);
    }
}