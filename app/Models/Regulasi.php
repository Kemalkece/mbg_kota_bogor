<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    protected $table = 'regulasi';

    protected $fillable = [
        'file_pdf',
        'judul',
        'deskripsi',
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
