<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PA extends Model
{
    use HasFactory;

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
