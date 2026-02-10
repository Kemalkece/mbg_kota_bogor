    <!-- Beranda -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- CAROUSEL -->
                <div class="col-lg-6">
                    <div class="hero-carousel-container">
                        <div class="hero-carousel" id="heroCarousel">
                            <div class="carousel-slide">
                                <img src="/images/6.png" alt="Slide 1">
                            </div>
                            <div class="carousel-slide">
                                <img src="/images/5.png" alt="Slide 2" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="/images/3.png" alt="Slide 3" loading="lazy">
                            </div>
                        </div>

                        <button class="carousel-arrow prev" onclick="moveCarousel(-1)">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="carousel-arrow next" onclick="moveCarousel(1)">
                            <i class="bi bi-chevron-right"></i>
                        </button>

                        <div class="carousel-controls" id="carouselDots"></div>
                    </div>
                </div>

                <!-- KONTEN -->
                <div class="col-lg-6">
                    <div class="hero-content" id="heroContent">
                        <h1 class="hero-title" id="newsTitle">
                            MBG Kota Bogor
                        </h1>

                        <p class="hero-description" id="newsDesc">
                            Program Makan Bergizi Gratis (MBG) di Kota Bogor mulai dilaksanakan pada 6 Januari 2025.
                            Pada tahap awal, program ini menjangkau 25 sekolah dengan sekitar 6.000 siswa sebagai
                            penerima manfaat.
                        </p>

                        <div class="hero-buttons">
                            <a href="#" class="btn-hero-primary" id="newsLink">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
