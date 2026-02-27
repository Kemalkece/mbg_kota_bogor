@props(['beritas'])
<section id="beranda" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            @if($beritas->isEmpty())
            {{-- Kiri: Placeholder Carousel --}}
            <div class="col-lg-6">
                <div class="hero-carousel-container" style="display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);position:relative;overflow:hidden;">
                    <div style="position:absolute;width:300px;height:300px;background:radial-gradient(circle,rgba(209,176,108,0.12) 0%,transparent 70%);border-radius:50%;top:-50px;left:-50px;pointer-events:none;"></div>
                    <div style="position:absolute;width:200px;height:200px;background:radial-gradient(circle,rgba(30,144,255,0.08) 0%,transparent 70%);border-radius:50%;bottom:-30px;right:-30px;pointer-events:none;"></div>
                    <div style="text-align:center;position:relative;z-index:2;padding:40px 20px;">
                        <div style="width:110px;height:110px;border-radius:24px;background:linear-gradient(135deg,rgba(209,176,108,0.15),rgba(184,150,79,0.08));border:1px solid rgba(209,176,108,0.25);display:flex;align-items:center;justify-content:center;margin:0 auto 24px;box-shadow:0 0 40px rgba(209,176,108,0.08);">
                            <i class="bi bi-newspaper" style="font-size:3rem;color:#D1B06C;opacity:0.8;"></i>
                        </div>
                        <div style="display:inline-block;padding:6px 16px;border-radius:999px;background:rgba(209,176,108,0.12);border:1px solid rgba(209,176,108,0.25);color:#D1B06C;font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;">
                            Warta Segera Hadir
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kanan: Teks info --}}
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Belum Ada<br>Berita Terbaru
                    </h1>
                    <p class="hero-description">
                        Berita dan informasi terbaru seputar program MBG Kota Bogor akan segera hadir untuk Anda.
                    </p>
                    <div class="hero-buttons">
                        <a href="#tentang" class="btn-hero-primary" style="text-decoration:none;">
                            Tentang Program
                        </a>
                        <a href="#sasaran" class="btn-hero-secondary" style="text-decoration:none;">
                            Sasaran MBG
                        </a>
                    </div>
                </div>
            </div>
            @else
            @php
            $firstBerita = $beritas->first();
            @endphp

            <!-- CAROUSEL -->
            <div class="col-lg-6">
                <div class="hero-carousel-container">
                    <div class="hero-carousel" id="heroCarousel">

                        @foreach($beritas as $berita)
                        <div class="carousel-slide"
                            data-title="{{ $berita->judul }}"
                            data-desc="{{ \Illuminate\Support\Str::limit(strip_tags($berita->deskripsi), 150) }}"
                            data-url="{{ route('berita.show', $berita->id) }}">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="{{ $berita->judul }}">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-arrow prev" onclick="moveCarousel(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="carousel-arrow next" onclick="moveCarousel(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="carousel-dots" id="carouselDots"></div>

                </div>
            </div>

            <!-- KONTEN -->
            <!-- KONTEN -->
            <div class="col-lg-6">
                <div class="hero-content" id="heroContent">
                    <h1 class="hero-title" id="newsTitle">
                        {{ $firstBerita->judul ?? '' }}
                    </h1>

                    <p class="hero-description" id="newsDesc">
                        {{ \Illuminate\Support\Str::limit(strip_tags($firstBerita->deskripsi ?? ''), 150) }}
                    </p>

                    <a href="{{ route('berita.show', $firstBerita->id ?? 0) }}"
                        class="btn-hero-primary"
                        id="newsLink">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>