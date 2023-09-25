<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Revenue;
use App\Models\Verevenue;
use App\Models\Department\viitem;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['month','year'];

    public function revenue()
    {
        return $this->hasMany(Revenue::class);
    }
    public function verevenue()
    {
        return $this->hasMany(Verevenue::class);
    }

    public function viitem()
    {
        return $this->hasMany(viitem::class);
    }
    public function veitem()
    {
        return $this->hasMany(viitem::class);
    }
}