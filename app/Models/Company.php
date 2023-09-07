<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Revenue;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the company for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function revenue()
    {
        return $this->hasMany(Revenue::class);
    }
    
}
