@props(['sasarans'])
<section id="sasaran" class="sasaran-section">
    <div class="container">
        <div class="sasaran-header" data-aos="fade-up">
            <h2 class="sasaran-title">Makan Bergizi Gratis (MBG)</h2>
            <p class="sasaran-subtitle">Program komprehensif yang dirancang untuk memastikan setiap individu
                mendapatkan asupan gizi optimal, mendukung tercapainya Indonesia Emas melalui generasi yang sehat
                dan berkualitas.</p>
        </div>

        <div class="sasaran-slider-wrapper" data-aos="fade-up">
            @if($sasarans->isEmpty())
            <div style="background:white;border-radius:24px;border:1px solid #F0F4F8;box-shadow:0 8px 30px rgba(0,0,0,0.06);padding:60px 40px;text-align:center;width:100%;">
                <div style="display:flex;justify-content:center;gap:12px;margin-bottom:28px;">
                    {{-- Mini ghost flip cards --}}
                    <div style="width:70px;height:90px;border-radius:14px;background:linear-gradient(135deg,#F0F4FF,#E8EFFF);border:1px dashed #C7D7F5;opacity:1;"></div>
                    <div style="width:70px;height:90px;border-radius:14px;background:linear-gradient(135deg,#F0F4FF,#E8EFFF);border:1px dashed #C7D7F5;opacity:0.6;"></div>
                    <div style="width:70px;height:90px;border-radius:14px;background:linear-gradient(135deg,#F0F4FF,#E8EFFF);border:1px dashed #C7D7F5;opacity:0.3;"></div>
                </div>
                <div style="width:70px;height:70px;border-radius:18px;background:linear-gradient(135deg,#EFF6FF,#DBEAFE);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;box-shadow:inset 0 2px 8px rgba(59,130,246,0.1);">
                    <i class="bi bi-people" style="font-size:1.8rem;color:#93C5FD;"></i>
                </div>
                <h4 style="font-size:1.3rem;font-weight:900;color:#071E49;margin-bottom:10px;">Belum Ada Data Sasaran</h4>
                <p style="color:#9CA3AF;font-size:0.9rem;max-width:320px;margin:0 auto;line-height:1.7;">
                    Informasi sasaran pemenuhan gizi program MBG akan segera ditampilkan di sini.
                </p>
            </div>
            @else
            <button class="slider-nav prev" onclick="slideSasaran(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="sasaran-slider-container" id="sasaranSlider">
                <!-- Card 1: Text Info (Always show first if there is data) -->
                <div class="sasaran-slider-item">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front text-card">
                                <h3>Sasaran Pemenuhan Gizi MBG</h3>
                                <p>Kami mendukung kesehatan gizi melalui berbagai program untuk memastikan setiap
                                    individu mendapatkan kebutuhan gizi yang optimal.</p>
                            </div>
                            <div class="flip-card-back">
                                <h3>Komitmen Kami</h3>
                                <p>Melayani seluruh lapisan masyarakat dari Sabang sampai Merauke dengan standar
                                    gizi
                                    terbaik dan pengawasan ketat demi masa depan bangsa.</p>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($sasarans as $s)
                <!-- Card: Dynamic Sasaran Item -->
                <div class="sasaran-slider-item">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ asset('storage/' . $s->gambar) }}" alt="{{ $s->klasifikasi }}" loading="lazy">
                                <span class="flip-card-label">{{ $s->klasifikasi }}</span>
                            </div>
                            <div class="flip-card-back">
                                <h3>{{ $s->judul_deskripsi }}</h3>
                                <p>{{ $s->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="slider-nav next" onclick="slideSasaran(1)">
                <i class="bi bi-chevron-right"></i>
            </button>
            @endif
        </div>
</section>