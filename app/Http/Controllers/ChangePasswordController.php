<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Traits\LogActivity;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
            ]);

            $user = Auth::user();

            // Update password
            $user->update([
                'password' => Hash::make($validated['password']),
                'password_changed_at' => now(),
            ]);

            // Log successful password change
            LogActivity::logActivity(
                action: 'password_changed',
                modelName: 'User',
                modelId: $user->id,
                description: "Password changed by user {$user->email}",
                email: $user->email
            );

            return redirect()->route('filament.admin.auth.login')
                ->with('success', 'Password berhasil diubah. Silakan login kembali.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation failure
            LogActivity::logActivity(
                action: 'password_change_failed',
                modelName: 'User',
                modelId: Auth::id(),
                description: "Password change validation failed",
                email: Auth::user()->email
            );

            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Log unexpected error
            LogActivity::logActivity(
                action: 'password_change_failed',
                modelName: 'User',
                modelId: Auth::id(),
                description: "Password change failed: {$e->getMessage()}",
                email: Auth::user()->email
            );

            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}
