<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address','user_agent','visited_at','unique_token'];

    public static function isDuplicateVisitor($userAgent, $ipAddress)
    {
        $oneDayAgo = Carbon::now()->subDay();
        return Visitor::where('user_agent', $userAgent)
            ->where('ip_address', $ipAddress)
            ->where('visited_at', '>=', $oneDayAgo)
            ->exists();
    }

    public static function isDuplicate($userAgent, $ipAddress)
    {
        $oneDayAgo = Carbon::now()->subDay();
        return Visitor::where('user_agent', $userAgent)
        ->where('ip_address', $ipAddress)
        ->where('visited_at', '>=', $oneDayAgo)
        ->exists();
    }


}
