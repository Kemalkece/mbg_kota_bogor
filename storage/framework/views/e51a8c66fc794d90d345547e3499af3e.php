<div x-data="{
    get checks() {
        let val = $wire.get('<?php echo e($statePath); ?>') || '';
        return [
            { label: '8+ Karakter', met: val.length >= 8 },
            { label: 'Huruf Besar & Kecil', met: /[A-Z]/.test(val) && /[a-z]/.test(val) },
            { label: 'Angka (0-9)', met: /[0-9]/.test(val) },
            { label: 'Simbol (!@#$)', met: /[^A-Za-z0-9]/.test(val) }
        ];
    }
}" class="mt-4 block w-full rounded-xl border border-gray-200 bg-white p-4 shadow-sm dark:border-white/10 dark:bg-white/5">

    <!-- Header -->
    <div class="mb-4 flex flex-row items-center justify-between gap-4" style="display: flex !important; flex-direction: row !important; align-items: center !important;">
        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 whitespace-nowrap">
            Keamanan Password
        </span>
        <div class="flex flex-row gap-1" style="display: flex !important; flex-direction: row !important;">
            <template x-for="i in 4">
                <div style="width: 12px; height: 4px;" class="rounded-full transition-all duration-500"
                    :class="checks.filter(c => c.met).length >= i ? (checks.filter(c => c.met).length <= 2 ? 'bg-danger-500' : 'bg-success-500') : 'bg-gray-200 dark:bg-gray-700'"></div>
            </template>
        </div>
    </div>

    <!-- Grid List (Text on Left, Icon on Right) -->
    <div class="grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-2" style="display: grid !important;">
        <template x-for="item in checks">
            <div class="flex flex-row items-center justify-between gap-3" style="display: flex !important; flex-direction: row !important; align-items: center !important;">

                <!-- Label Text (Left) -->
                <span :class="item.met ? 'text-gray-900 dark:text-white font-semibold' : 'text-gray-400 dark:text-gray-500'"
                    class="text-[12px] whitespace-nowrap leading-none transition-colors duration-300"
                    x-text="item.label">
                </span>

                <!-- Circle Icon (Right) -->
                <div style="width: 16px; height: 16px; min-width: 16px; max-width: 16px; flex-shrink: 0; display: flex !important; align-items: center !important; justify-content: center !important;"
                    class="rounded-full border transition-all duration-300 shadow-inner"
                    :class="item.met ? 'border-success-500 bg-success-500 text-white' : 'border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800'">

                    <!-- SVG Check -->
                    <svg style="width: 10px !important; height: 10px !important; display: block !important;"
                        x-show="item.met"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>

                    <!-- Empty Dot (Placeholder) -->
                    <div x-show="!item.met" style="width: 4px; height: 4px;" class="rounded-full bg-gray-300 dark:bg-gray-600"></div>
                </div>
            </div>
        </template>
    </div>
</div><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/filament/admin/password-strength.blade.php ENDPATH**/ ?>