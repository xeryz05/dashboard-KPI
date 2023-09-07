<?php

namespace App\Models\corporate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function Virev()
    {
        return $this->hasMany(Virev::class);
    }
}
