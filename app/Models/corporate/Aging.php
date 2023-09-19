<?php

namespace App\Models\corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;

class Aging extends Model
{
    use HasFactory;
    protected $fillable = ['event_id','value'];

    /**
     * Get the user that owns the Profit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
