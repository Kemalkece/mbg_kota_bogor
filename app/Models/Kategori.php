<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'nama_kategori',
    ];

    public function regulasis(): HasMany
    {
        return $this->hasMany(Regulasi::class, 'kategori_id');
    }
}
