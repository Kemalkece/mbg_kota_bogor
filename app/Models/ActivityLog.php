<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'model_name',
        'changes',
        'description',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'changes' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get deskripsi aksi dalam bahasa Indonesia
     */
    public function getActionLabelAttribute(): string
    {
        return match ($this->action) {
            'create' => 'Menambah',
            'update' => 'Mengubah',
            'delete' => 'Menghapus',
            'view' => 'Melihat',
            'login' => 'Login',
            'logout' => 'Logout',
            'download' => 'Download',
            'export' => 'Export',
            'import' => 'Import',
            default => ucfirst($this->action),
        };
    }
}
