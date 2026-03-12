<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log as LaravelLog;

trait LogActivity
{
    /**
     * Catat aktivitas user
     */
    public static function logActivity(
        ?string $action = null,
        ?string $modelName = null,
        ?int $modelId = null,
        ?array $changes = null,
        ?string $description = null,
        ?string $email = null
    ): ?ActivityLog {
        try {
            // Jika tidak authenticated, gunakan email yang diberikan (untuk failed login logging)
            if (!Auth::check() && !$email) {
                return null;
            }

            // Get user ID jika authenticated, atau null untuk unauthenticated actions
            $userId = Auth::check() ? Auth::user()->id : null;

            // Generate description jika kosong
            if (!$description && $modelName) {
                $actionLabel = match ($action) {
                    'create' => 'Menambah',
                    'update' => 'Mengubah',
                    'delete' => 'Menghapus',
                    'view' => 'Melihat',
                    'download' => 'Download',
                    'export' => 'Export',
                    'login' => 'Login',
                    'login_failed' => 'Login gagal',
                    default => ucfirst($action ?? 'aktivitas'),
                };
                $description = "$actionLabel $modelName";
            }

            // Jika unauthenticated action, cari user by email untuk user_id
            if (!$userId && $email) {
                $user = \App\Models\User::where('email', $email)->first();
                $userId = $user?->id;
            }

            return ActivityLog::create([
                'user_id' => $userId,
                'action' => $action ?? 'view',
                'model_type' => $modelName,
                'model_id' => $modelId,
                'model_name' => $modelName,
                'changes' => $changes ? json_encode($changes) : null,
                'description' => $description ?? ($email ? "Login attempt untuk email: $email" : 'Aktivitas tanpa deskripsi'),
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
            ]);
        } catch (\Exception $e) {
            LaravelLog::error('Error logging activity: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Log create action
     */
    public static function logCreate(string $modelName, int $modelId, ?array $data = null): ?ActivityLog
    {
        return self::logActivity('create', $modelName, $modelId, $data, "Menambah $modelName");
    }

    /**
     * Log update action
     */
    public static function logUpdate(string $modelName, int $modelId, ?array $changes = null): ?ActivityLog
    {
        return self::logActivity('update', $modelName, $modelId, $changes, "Mengubah $modelName");
    }

    /**
     * Log delete action
     */
    public static function logDelete(string $modelName, int $modelId): ?ActivityLog
    {
        return self::logActivity('delete', $modelName, $modelId, null, "Menghapus $modelName");
    }

    /**
     * Log login action
     */
    public static function logLogin(): ?ActivityLog
    {
        return self::logActivity('login', null, null, null, 'User login');
    }

    /**
     * Log logout action
     */
    public static function logLogout(): ?ActivityLog
    {
        return self::logActivity('logout', null, null, null, 'User logout');
    }

    /**
     * Log failed login attempt
     */
    public static function logFailedLogin(string $email, ?string $reason = null): ?ActivityLog
    {
        return self::logActivity(
            action: 'login_failed',
            modelName: 'Authentication',
            description: ($reason ? "Login gagal: $reason" : "Login gagal dengan email: $email"),
            email: $email
        );
    }

    /**
     * Log successful login
     */
    public static function logSuccessfulLogin(string $email): ?ActivityLog
    {
        return self::logActivity(
            action: 'login',
            modelName: 'Authentication',
            description: "Login berhasil",
            email: $email
        );
    }
}
