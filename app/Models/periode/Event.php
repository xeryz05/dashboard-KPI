<?php

namespace App\Models\periode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\corporate\Verev;
use App\Models\corporate\Virev;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['start', 'end'];

    public function Verev()
    {
        return $this->hasMany(Verev::class);
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
}
