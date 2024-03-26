<?php

namespace App\Models\corporate;

use App\Models\periode\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UtilisasiAsset extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','value'];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
