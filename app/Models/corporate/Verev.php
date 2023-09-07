<?php

namespace App\Models\corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;

class Verev extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','type_job','value','profit','physical_availability'];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
