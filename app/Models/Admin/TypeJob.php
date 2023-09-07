<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Revenue;
use App\Models\Verevenue;

class TypeJob extends Model
{
    use HasFactory; 

    protected $fillable = ['name'];

    public function revenue()
    {
        return $this->hasMany(Revenue::class);
    }

    public function verevenue()
    {
        return $this->hasMany(Verevenue::class);
    }
}
