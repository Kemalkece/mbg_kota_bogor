<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'visited_date',
        'last_active_at',
    ];

    protected $casts = [
        'visited_date' => 'date',
        'last_active_at' => 'datetime',
    ];

    public static function getTodayCount(): int
    {
        return self::where('visited_date', now()->toDateString())->count();
    }

    public static function getTotalCount(): int
    {
        return self::count();
    }

    public static function getOnlineCount(): int
    {
        // Online if active within last 5 minutes
        return self::where('last_active_at', '>=', now()->subMinutes(5))->count();
    }
}
