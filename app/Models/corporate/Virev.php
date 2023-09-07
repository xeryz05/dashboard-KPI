<?php

namespace App\Models\corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\periode\Event;
use App\Models\corporate\Profit;

class Virev extends Model
{
    use HasFactory;

    protected $fillable = ['job_id','event_id','value'];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
    public function Job()
    {
        return $this->belongsTo(Job::class);
    }
    public function profits()
    {
        return $this->hasMany(Profit::class, 'event_id', 'event_id');
    }
}
