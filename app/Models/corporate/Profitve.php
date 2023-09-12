<?php

namespace App\Models\corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;

class Profitve extends Model
{
    use HasFactory;
    protected $fillable = ['event_id','value'];

    public function Event()
    {
        return $this->hasMany(Event::class);
    }
}
