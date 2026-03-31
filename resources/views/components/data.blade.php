@props(['dataPenyalurans', 'statsData' => \App\Http\Controllers\DataPenyaluranController::getDashboardStats()])

<section id="data" style="padding:60px 0;position:relative;z-index:5;background:#F8F9FC;">
    <div class="container">

        <div class="data-header" style="text-align:center;margin-bottom:40px;">
            <h2 style="font-weight:900;color:#071E49;">
                Data Penyaluran Program MBG di Kota Bogor
            </h2>
            <p style="color:#6B7280;">
                Cakupan penerima manfaat per kategori
            </p>
        </div>

        {{-- Stats Cards Grid --}}
        <div class="stats-grid" style="
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:24px;
            margin-bottom:48px;
        ">
            @foreach ($statsData as $stat)
            <div class="stat-card" style="
                background:white;
                border-radius:20px;
                padding:28px 24px 24px;
                box-shadow:0 4px 20px rgba(0,0,0,0.06);
                position:relative;
                overflow:hidden;
            ">
                {{-- Top accent line --}}
                <div class="stat-accent-line" style="
                    position:absolute;top:0;left:0;right:0;height:4px;
                    background:{{ $stat['gradient'] }};
                    border-radius:20px 20px 0 0;
                "></div>

                {{-- Icon --}}
                <div class="stat-icon" style="
                    width:56px;height:56px;border-radius:16px;
                    background:{{ $stat['gradient'] }};
                    display:flex;align-items:center;justify-content:center;
                    margin-bottom:20px;
                    box-shadow:0 8px 20px rgba(0,0,0,0.15);
                ">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="white"/>
                    </svg>
                </div>


                {{-- Value --}}
                <div style="
                    font-size:36px;
                    font-weight:900;
                    color:#4C3FB5;
                    letter-spacing:-1px;
                    margin-bottom:8px;
                    line-height:1;
                ">{{ $stat['value'] }}</div>

                {{-- Label --}}
                <div style="font-size:15px;font-weight:700;color:#1E1E2E;margin-bottom:4px;">
                    {{ $stat['label'] }}
                </div>
                <div style="font-size:13px;color:#9CA3AF;font-weight:400;">
                    {{ $stat['sublabel'] }}
                </div>
            </div>
            @endforeach
        </div>

        {{-- Slider Section --}}

            <div style="text-align:center;margin-top:40px;">
                <button id="btnLihatDetail" style="padding:12px 28px;border:none;border-radius:30px;background:#C7A14A;color:white;font-weight:700;cursor:pointer;box-shadow:0 6px 16px rgba(199,161,74,0.4);">
                    Lihat Detail
                </button>
            </div>
        </div>
    </div>
</section>

<style>
/* ── Hide scrollbar ── */
#slider {
    scrollbar-width: none;
    -ms-overflow-style: none;
}
#slider::-webkit-scrollbar {
    display: none;
}

/* ── Stat Card Hover Effects ── */
.stat-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: default;
}
.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 52px rgba(0,0,0,0.13) !important;
}
.stat-accent-line {
    transition: height 0.25s ease;
}
.stat-card:hover .stat-accent-line {
    height: 7px !important;
}
.stat-icon {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.stat-card:hover .stat-icon {
    transform: scale(1.1);
    box-shadow: 0 14px 30px rgba(0,0,0,0.25) !important;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}
@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>