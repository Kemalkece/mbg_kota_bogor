<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    protected $table = "regulasis";

    protected $fillable = [
        'pdf_file',
        'title',
        'description',
        'status',
        'tahun',
        'kategori_id',
        'urutan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
