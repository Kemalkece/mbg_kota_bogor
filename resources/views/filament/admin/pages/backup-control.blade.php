<x-filament-panels::page>
    {{ $this->table }}

    <div style="margin-top: 2rem;">
        <x-filament::section collapsible icon="heroicon-o-shield-check">
            <x-slot name="heading">
                IT Standard Operating Procedure (SOP)
            </x-slot>

            <x-slot name="description">
                Standar tata kelola data untuk menjaga keamanan dan ketersediaan sistem.
            </x-slot>

            <style>
                .fi-ta-content table {
                    width: 100% !important;
                }
                .sop-grid {
                    display: grid;
                    grid-template-columns: repeat(1, minmax(0, 1fr));
                    gap: 1rem;
                    margin-top: 1rem;
                }

                @media (min-width: 640px) {
                    .sop-grid {
                        grid-template-columns: repeat(2, minmax(0, 1fr));
                    }
                }

                @media (min-width: 1024px) {
                    .sop-grid {
                        grid-template-columns: repeat(4, minmax(0, 1fr));
                    }
                }

                .sop-card {
                    padding: 1rem;
                    border-radius: 0.75rem;
                    border: 1px solid #f3f4f6;
                    background-color: #f9fafb;
                    transition: all 0.2s;
                }

                .dark .sop-card {
                    border-color: rgba(255, 255, 255, 0.05);
                    background-color: rgba(255, 255, 255, 0.03);
                }

                .sop-card:hover {
                    border-color: #d1d5db;
                }

                .dark .sop-card:hover {
                    border-color: rgba(255, 255, 255, 0.1);
                }

                .sop-header {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    margin-bottom: 0.5rem;
                }

                .sop-icon-wrapper {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0.35rem;
                    border-radius: 0.5rem;
                    background-color: #e0f2fe;
                    /* Light blue */
                    color: #0369a1;
                }

                .dark .sop-icon-wrapper {
                    background-color: rgba(3, 105, 161, 0.2);
                    color: #7dd3fc;
                }

                .sop-label {
                    font-size: 0.75rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    color: #111827;
                }

                .dark .sop-label {
                    color: #f9fafb;
                }

                .sop-desc {
                    font-size: 0.75rem;
                    line-height: 1.25;
                    color: #6b7280;
                }

                .dark .sop-desc {
                    color: #9ca3af;
                }

                .sop-highlight {
                    font-weight: 600;
                    color: #0284c7;
                }

                .dark .sop-highlight {
                    color: #38bdf8;
                }
            </style>

            <div class="sop-grid">
                {{-- Otomatisasi --}}
                <div class="sop-card">
                    <div class="sop-header">
                        <div class="sop-icon-wrapper">
                            <svg style="width: 1.15rem; height: 1.15rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="sop-label">Scheduled</span>
                    </div>
                    <p class="sop-desc">
                        Backup otomatis setiap hari pukul <span class="sop-highlight">01:30 WIB</span>.
                    </p>
                </div>

                {{-- Integritas --}}
                <div class="sop-card">
                    <div class="sop-header">
                        <div class="sop-icon-wrapper">
                            <svg style="width: 1.15rem; height: 1.15rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                <path d="M10 4.5c4.142 0 7.5 1.12 7.5 2.5s-3.358 2.5-7.5 2.5-7.5-1.12-7.5-2.5 3.358-2.5 7.5-2.5z" />
                                <path d="M10 11c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 8.5c0-.12-.008-.239-.025-.355C16.48 9.135 13.51 9.75 10 9.75c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 8.5c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 10.292 6.73 11 10 11z" />
                                <path d="M10 14.5c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 12c0-.12-.008-.239-.025-.355C16.48 12.635 13.51 13.25 10 13.25c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 12c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 13.792 6.73 14.5 10 14.5z" />
                                <path d="M10 18c3.27 0 6.13-.708 7.152-1.693A3.743 3.743 0 0017.5 15.5c0-.12-.008-.239-.025-.355C16.48 16.135 13.51 16.75 10 16.75c-3.511 0-6.482-.615-7.475-1.605A3.743 3.743 0 002.5 15.5c0 .356.05.698.144 1.02a3.737 3.737 0 00.204.287C3.87 17.292 6.73 18 10 18z" />
                            </svg>
                        </div>
                        <span class="sop-label">Full Scope</span>
                    </div>
                    <p class="sop-desc">
                        Proteksi menyeluruh <span class="sop-highlight">Database & File Upload</span>.
                    </p>
                </div>

                {{-- Retensi --}}
                <div class="sop-card">
                    <div class="sop-header">
                        <div class="sop-icon-wrapper">
                            <svg style="width: 1.15rem; height: 1.15rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.451a.75.75 0 000-1.5H4.125a.75.75 0 00-.75.75v4.125a.75.75 0 001.5 0v-2.108l.315.315a7 7 0 0011.711-3.138.75.75 0 10-1.59-.344zM4.688 8.576a5.5 5.5 0 019.201-2.466l.312.311h-2.451a.75.75 0 000 1.5h4.125a.75.75 0 00.75-.75V3.046a.75.75 0 00-1.5 0v2.108l-.315-.315a7 7 0 00-11.711 3.138.75.75 0 001.59.344z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="sop-label">Retention</span>
                    </div>
                    <p class="sop-desc">
                        Cleaning berkala file usang untuk <span class="sop-highlight">Optimasi Storage</span>.
                    </p>
                </div>

                {{-- Aksesibilitas --}}
                <div class="sop-card">
                    <div class="sop-header">
                        <div class="sop-icon-wrapper">
                            <svg style="width: 1.15rem; height: 1.15rem;" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M15.75 2a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0V3.53l-1.47 1.47a.75.75 0 11-1.06-1.06l2.5-2.5a.75.75 0 01.53-.22zM2.75 2a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0V3.53l-1.47 1.47a.75.75 0 11-1.06-1.06l2.5-2.5a.75.75 0 01.53-.22zM10 2a.75.75 0 01.75.75v12.438l1.47-1.47a.75.75 0 111.06 1.06l-2.5 2.5a.75.75 0 01-1.06 0l-2.5-2.5a.75.75 0 111.06-1.06l1.47 1.47V2.75A.75.75 0 0110 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="sop-label">Security</span>
                    </div>
                    <p class="sop-desc">
                        Enkripsi <span class="sop-highlight">AES-256</span>. Akses terbatas hanya Super Admin.
                    </p>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>