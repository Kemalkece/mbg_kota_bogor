<?php

namespace App\Policies;

use App\Models\LogAktivitas;
use App\Models\User;

class LogAktivitasPolicy
{
    /**
     * Menentukan apakah pengguna dapat melihat daftar log/aktivitas (Semua data).
     */
    public function viewAny(User $user): bool
    {
        return $user->isSuperAdmin();
    }

    /**
     * Menentukan apakah pengguna dapat melihat rincian salah satu log (Detail view).
     */
    public function view(User $user, LogAktivitas $logAktivitas): bool
    {
        return $user->isSuperAdmin();
    }

    /**
     * Menentukan apakah pengguna dapat membuat/menambah log baru.
     */
    public function create(User $user): bool
    {
        // Fitur tambah data dinonaktifkan. Keamanan: Log hanya digenerate murni dari sistem.
        return false;
    }

    /**
     * Menentukan apakah pengguna dapat memperbarui log.
     */
    public function update(User $user, LogAktivitas $logAktivitas): bool
    {
        // Keamanan: Data log tidak boleh dimanipulasi atau diubah setelah terekam.
        return false;
    }

    /**
     * Menentukan apakah pengguna dapat menghapus log.
     */
    public function delete(User $user, LogAktivitas $logAktivitas): bool
    {
        // Keamanan: Riwayat log tidak boleh dihapus sama sekali demi audit (Audit Trail).
        return false;
    }

    /**
     * Menentukan apakah pengguna dapat memulihkan log yang terhapus (Soft Delete/Restore).
     */
    public function restore(User $user, LogAktivitas $logAktivitas): bool
    {
        return false;
    }

    /**
     * Menentukan apakah pengguna dapat menghapus log secara permanen dari database (Force Delete).
     */
    public function forceDelete(User $user, LogAktivitas $logAktivitas): bool
    {
        return false;
    }
}
