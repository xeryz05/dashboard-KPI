<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Departement\viitem;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get all of the comments for the Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function veitem()
    {
        return $this->hasMany(viitem::class);
    }
}