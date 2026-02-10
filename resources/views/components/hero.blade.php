<section id="beranda" class="hero-section min-h-screen bg-[#071E49] relative pt-20 overflow-hidden flex items-center justify-center -mt-0">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-[url('https://picsum.photos/seed/healthy-food/1920/1080')] bg-cover bg-center opacity-[0.08] z-0 pointer-events-none"></div>

    <!-- Deer Images -->
    <div class="hidden lg:block absolute bottom-0 left-0 w-[350px] h-[400px] bg-[url('/images/bogor.png')] bg-contain bg-no-repeat bg-bottom z-[1] opacity-90 scale-x-[-1]"></div>
    <div class="hidden lg:block absolute bottom-0 right-0 w-[350px] h-[400px] bg-[url('/images/bogor.png')] bg-contain bg-no-repeat bg-bottom z-[1] opacity-90"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

            <!-- CAROUSEL -->
            <div class="order-2 lg:order-1">
                <div class="hero-carousel-container relative w-full h-[300px] lg:h-[450px] overflow-hidden z-20 rounded-[30px] shadow-2xl animate-[slideInLeft_0.8s_ease-out]">
                    <div class="hero-carousel flex w-full h-full transition-transform duration-500 ease-[cubic-bezier(0.25,0.46,0.45,0.94)]" id="heroCarousel">
                        <div class="carousel-slide min-w-full relative flex-1 h-full">
                            <img src="/images/6.png" alt="Slide 1" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide min-w-full relative flex-1 h-full">
                            <img src="/images/5.png" alt="Slide 2" loading="lazy" class="w-full h-full object-cover">
                        </div>
                        <div class="carousel-slide min-w-full relative flex-1 h-full">
                            <img src="/images/3.png" alt="Slide 3" loading="lazy" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <button class="carousel-arrow prev absolute top-1/2 -translate-y-1/2 left-4 w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm border-0 flex items-center justify-center text-white text-xl cursor-pointer transition-all duration-300 z-30 hover:bg-[#D1B06C]/90 hover:scale-110" onclick="moveCarousel(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="carousel-arrow next absolute top-1/2 -translate-y-1/2 right-4 w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm border-0 flex items-center justify-center text-white text-xl cursor-pointer transition-all duration-300 z-30 hover:bg-[#D1B06C]/90 hover:scale-110" onclick="moveCarousel(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="carousel-controls absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-3 z-30" id="carouselDots">
                        <!-- Dots populated by JS, we need to style styling in global CSS or ensure JS adds classes that exist? 
                             Wait, JS creates div with class 'carousel-dot'. I should add that style to app.css or inline it if possible? 
                             JS creates: <div class="carousel-dot"></div>.
                             I cannot modify created elements easily unless I change JS.
                             Or I add .carousel-dot styles to app.css inside @layer components.
                             I'll do that.
                        -->
                    </div>
                </div>
            </div>

            <!-- KONTEN -->
            <div class="order-1 lg:order-2">
                <div class="hero-content relative z-30 w-full text-white flex flex-col justify-center animate-[slideInRight_0.8s_ease-out]" id="heroContent">
                    <h1 class="hero-title text-4xl lg:text-6xl font-extrabold mb-5 leading-[1.3] bg-gradient-to-br from-[#D1B06C] to-[#E8D4A2] text-transparent bg-clip-text" id="newsTitle">
                        MBG Kota Bogor
                    </h1>

                    <p class="hero-description text-base text-white/85 mb-10 leading-[1.8] max-w-[500px]" id="newsDesc">
                        Program Makan Bergizi Gratis (MBG) di Kota Bogor mulai dilaksanakan pada 6 Januari 2025.
                        Pada tahap awal, program ini menjangkau 25 sekolah dengan sekitar 6.000 siswa sebagai
                        penerima manfaat.
                    </p>

                    <div class="hero-buttons flex gap-4 flex-wrap">
                        <a href="#" class="btn-hero-primary inline-flex items-center gap-2 bg-gradient-to-br from-[#D1B06C] to-[#C49955] text-white border-0 py-[14px] px-[40px] rounded-[30px] font-semibold text-[0.95rem] shadow-lg shadow-[#d1b06c]/30 hover:shadow-[#d1b06c]/40 hover:-translate-y-1 transition-all duration-300" id="newsLink">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
