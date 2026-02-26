@props(['dataPenyalurans'])
<section id="data">
    <div class="container">
        <div class="data-header">
            <h2>Data Penyaluran Program MBG di Kota Bogor</h2>
            <p>Cakupan penerima manfaat per kategori</p>
        </div>

        <div class="data-wrapper">
            @if($dataPenyalurans->isEmpty())
            <div style="width:100%;padding:20px 0;">
                {{-- Ghost slider cards --}}
                <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;margin-bottom:32px;">
                    <div style="min-width:260px;height:140px;border-radius:18px;background:#F3E5AB;display:flex;align-items:center;justify-content:center;gap:12px;padding:16px;opacity:0.5;">
                        <div style="flex:1;">
                            <div style="height:14px;border-radius:6px;background:#D1B06C;margin-bottom:10px;width:60%;opacity:0.4;"></div>
                            <div style="height:10px;border-radius:6px;background:#D1B06C;margin-bottom:6px;width:80%;opacity:0.25;"></div>
                            <div style="height:10px;border-radius:6px;background:#D1B06C;width:50%;opacity:0.2;"></div>
                        </div>
                        <div style="width:80px;height:110px;border-radius:12px;background:#D1B06C;opacity:0.2;flex-shrink:0;"></div>
                    </div>
                    <div style="min-width:260px;height:140px;border-radius:18px;background:#071E49;display:flex;align-items:center;justify-content:center;gap:12px;padding:16px;opacity:0.35;">
                        <div style="flex:1;">
                            <div style="height:14px;border-radius:6px;background:white;margin-bottom:10px;width:60%;opacity:0.3;"></div>
                            <div style="height:10px;border-radius:6px;background:white;margin-bottom:6px;width:80%;opacity:0.2;"></div>
                            <div style="height:10px;border-radius:6px;background:white;width:50%;opacity:0.15;"></div>
                        </div>
                        <div style="width:80px;height:110px;border-radius:12px;background:white;opacity:0.1;flex-shrink:0;"></div>
                    </div>
                    <div style="min-width:260px;height:140px;border-radius:18px;background:#F3E5AB;display:flex;align-items:center;justify-content:center;gap:12px;padding:16px;opacity:0.25;">
                        <div style="flex:1;">
                            <div style="height:14px;border-radius:6px;background:#D1B06C;margin-bottom:10px;width:60%;opacity:0.4;"></div>
                            <div style="height:10px;border-radius:6px;background:#D1B06C;width:70%;opacity:0.2;"></div>
                        </div>
                        <div style="width:80px;height:110px;border-radius:12px;background:#D1B06C;opacity:0.15;flex-shrink:0;"></div>
                    </div>
                </div>
                <div style="text-align:center;">
                    <div style="width:60px;height:60px;border-radius:16px;background:linear-gradient(135deg,#F3E5AB,#EDD689);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;box-shadow:0 4px 16px rgba(209,176,108,0.2);">
                        <i class="bi bi-bar-chart-line" style="font-size:1.6rem;color:#B8964F;"></i>
                    </div>
                    <h4 style="font-size:1.3rem;font-weight:900;color:#071E49;margin-bottom:8px;">Belum Ada Data Penyaluran</h4>
                    <p style="color:#9CA3AF;font-size:0.9rem;max-width:320px;margin:0 auto;line-height:1.7;">
                        Data distribusi dan cakupan penerima manfaat program MBG akan diperbarui secara berkala.
                    </p>
                </div>
            </div>
            @else
            <div class="slider-container">
                <!-- LEFT/RIGHT BUTTONS -->
                <button aria-label="Geser Kiri" onclick="scrollSlider(-1)" class="slider-btn prev">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button aria-label="Geser Kanan" onclick="scrollSlider(1)" class="slider-btn next">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <!-- Slider -->
                <div id="slider">
                    @foreach ($dataPenyalurans as $index => $data)
                    <div class="slider-item {{ $index % 2 == 0 ? 'gold' : 'dark' }}">
                        <div class="slider-content">
                            <h3>{{ $data->judul }}</h3>
                            <p>{{ $data->deskripsi }}</p>
                        </div>
                        <div class="slider-image">
                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="data-btn-wrapper">
                <button onclick="window.location.href='/detail-data'" class="detail-btn">
                    Lihat Detail
                </button>
            </div>
            @endif
        </div>
    </div>
</section>