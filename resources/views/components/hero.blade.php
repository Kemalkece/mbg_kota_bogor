<section id="beranda" class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            {{-- @php
            $firstBerita = $beritas->first();
            @endphp --}}

            <!-- CAROUSEL -->
            <div class="col-lg-6">
                <div class="hero-carousel-container">
                    <div class="hero-carousel" id="heroCarousel">

                        {{-- @foreach($beritas as $berita)
                        <div class="carousel-slide"
                            data-title="{{ $berita->title }}"
                            data-desc="{{ $berita->deskripsi }}">
                            <img src="{{ asset('storage/' . $berita->image) }}"
                                alt="{{ $berita->title }}">
                        </div> --}}
                        {{-- @endforeach --}}

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
            <div class="col-lg-3" style="flex:0 0 28%; max-width:28%;">

                <div class="hero-content" id="heroContent">
                    <h1 class="hero-title" id="newsTitle">
                        {{ $firstBerita->title ?? '' }}
                    </h1>

                    <p class="hero-description" id="newsDesc">
                        {{ $firstBerita->deskripsi ?? '' }}
                    </p>

                    <a href="{{ route('berita.show', $firstBerita->id ?? 0) }}"
                    class="btn-hero-primary"
                    id="newsLink">
                        Baca Selengkapnya
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>