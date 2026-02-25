<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi_1',
        'deskripsi_2',
        'list',
    ];

    protected $casts = [
        'list' => 'array',
    ];
}