<x-filament-panels::page>
    <div class="fi-ta-ctn border border-gray-200 dark:border-white/10 rounded-xl shadow-sm bg-white dark:bg-gray-900 overflow-hidden">
        {{ $this->table }}
    </div>

    <div style="margin-top: 3rem;">
        <x-filament::section collapsible icon="heroicon-o-shield-check">
            <x-slot name="heading">
                Prosedur Keamanan & Tata Kelola Data (IT SOP)
            </x-slot>
            
            <x-slot name="description">
                Standar operasional prosedur untuk menjaga kerahasiaan, integritas, dan ketersediaan data.
            </x-slot>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Otomatisasi --}}
                <div class="p-4 rounded-xl border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                    <div class="flex items-center gap-x-2">
                        <div class="flex-shrink-0 p-1.5 rounded-lg bg-primary-100 dark:bg-primary-950 text-primary-600 dark:text-primary-400">
                            <svg class="hi-mini hi-clock inline-block" style="width: 1.25rem; height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-950 dark:text-white">Automated</span>
                    </div>
                    <p class="mt-3 text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                        Backup terjadwal otomatis setiap hari pukul <span class="text-primary-600 dark:text-primary-400 font-bold">01:30 WIB</span>.
                    </p>
                </div>

                {{-- Integritas --}}
                <div class="p-4 rounded-xl border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                    <div class="flex items-center gap-x-2">
                        <div class="flex-shrink-0 p-1.5 rounded-lg bg-primary-100 dark:bg-primary-950 text-primary-600 dark:text-primary-400">
                            <svg class="hi-mini hi-circle-stack inline-block" style="width: 1.25rem; height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 4.5c4.142 0 7.5 1.12 7.5 2.5s-3.358 2.5-7.5 2.5-7.5-1.12-7.5-2.5 3.358-2.5 7.5-2.5z" />
                                <path d="M10 11c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 8.5c0-.12-.008-.239-.025-.355C16.48 9.135 13.51 9.75 10 9.75c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 8.5c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 10.292 6.73 11 10 11z" />
                                <path d="M10 14.5c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 12c0-.12-.008-.239-.025-.355C16.48 12.635 13.51 13.25 10 13.25c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 12c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 13.792 6.73 14.5 10 14.5z" />
                                <path d="M10 18c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 15.5c0-.12-.008-.239-.025-.355C16.48 16.135 13.51 16.75 10 16.75c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 15.5c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 17.292 6.73 18 10 18z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-950 dark:text-white">Integrity</span>
                    </div>
                    <p class="mt-3 text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                        Mencakup pengamanan seluruh <span class="font-bold">Skema Database & File Upload</span> (Gambar/Dokumen).
                    </p>
                </div>

                {{-- Retensi --}}
                <div class="p-4 rounded-xl border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                    <div class="flex items-center gap-x-2">
                        <div class="flex-shrink-0 p-1.5 rounded-lg bg-primary-100 dark:bg-primary-950 text-primary-600 dark:text-primary-400">
                            <svg class="hi-mini hi-arrow-path inline-block" style="width: 1.25rem; height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.451a.75.75 0 000-1.5H4.125a.75.75 0 00-.75.75v4.125a.75.75 0 001.5 0v-2.108l.315.315a7 7 0 0011.711-3.138.75.75 0 10-1.59-.344zM4.688 8.576a5.5 5.5 0 019.201-2.466l.312.311h-2.451a.75.75 0 000 1.5h4.125a.75.75 0 00.75-.75V3.046a.75.75 0 00-1.5 0v2.108l-.315-.315a7 7 0 00-11.711 3.138.75.75 0 001.59.344z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-950 dark:text-white">Retention</span>
                    </div>
                    <p class="mt-3 text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                        Pembersihan otomatis file usang untuk <span class="font-bold">Optimasi Server</span> berkala.
                    </p>
                </div>

                {{-- Aksesibilitas --}}
                <div class="p-4 rounded-xl border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                    <div class="flex items-center gap-x-2">
                        <div class="flex-shrink-0 p-1.5 rounded-lg bg-primary-100 dark:bg-primary-950 text-primary-600 dark:text-primary-400">
                            <svg class="hi-mini hi-key inline-block" style="width: 1.25rem; height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M15.75 2a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0V3.53l-1.47 1.47a.75.75 0 11-1.06-1.06l2.5-2.5a.75.75 0 01.53-.22zM2.75 2a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0V3.53l-1.47 1.47a.75.75 0 11-1.06-1.06l2.5-2.5a.75.75 0 01.53-.22zM10 2a.75.75 0 01.75.75v12.438l1.47-1.47a.75.75 0 111.06 1.06l-2.5 2.5a.75.75 0 01-1.06 0l-2.5-2.5a.75.75 0 111.06-1.06l1.47 1.47V2.75A.75.75 0 0110 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-950 dark:text-white">Encrypted</span>
                    </div>
                    <p class="mt-3 text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                        Arsip diproteksi enkripsi <span class="font-bold">AES-256</span>. Hanya Super Admin yang memiliki kunci akses.
                    </p>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>
