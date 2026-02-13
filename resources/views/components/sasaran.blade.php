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
            <button class="slider-nav prev" onclick="slideSasaran(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="sasaran-slider-container" id="sasaranSlider">
                <!-- Card 1: Text Info (Always show first if there is data) -->
                @if($sasarans->count() > 0)
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
                @endif

                @forelse ($sasarans as $s)
                <!-- Card: Dynamic Sasaran Item -->
                <div class="sasaran-slider-item">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->klasifikasi }}" loading="lazy">
                                <span class="flip-card-label">{{ $s->klasifikasi }}</span>
                            </div>
                            <div class="flip-card-back">
                                <h3>{{ $s->title_deskripsi }}</h3>
                                <p>{{ $s->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
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
                @endforelse
            </div>

            <button class="slider-nav next" onclick="slideSasaran(1)">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
</section>