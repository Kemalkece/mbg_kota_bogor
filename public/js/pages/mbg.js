
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Loader
        window.addEventListener('load', function () {
            setTimeout(function () {
                document.getElementById('loader').classList.add('hidden');
            }, 800);

            // Visitor Statistics Simulation
            function simulateStats() {
                const todayEl = document.getElementById('stat-today');
                const totalEl = document.getElementById('stat-total');
                const onlineEl = document.getElementById('stat-online');

                if (todayEl && totalEl && onlineEl) {
                    let today = 1245;
                    let total = 856432;
                    let online = 243;

                    setInterval(() => {
                        // Fluctuate online count
                        online += Math.floor(Math.random() * 5) - 2;
                        if (online < 200) online = 200;
                        onlineEl.innerText = online.toLocaleString();

                        // Increment daily and total
                        if (Math.random() > 0.7) {
                            today++;
                            total++;
                            todayEl.innerText = today.toLocaleString();
                            totalEl.innerText = total.toLocaleString();
                        }
                    }, 3000);
                }
            }
            simulateStats();
        });

        setTimeout(function () {
            const loader = document.getElementById('loader');
            if (loader && !loader.classList.contains('hidden')) {
                loader.classList.add('hidden');
            }
        }, 3000);

        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Carousel variables
        let currentSlide = 0;
        let autoSlideInterval;
        const carousel = document.getElementById('heroCarousel');
        const slides = carousel.querySelectorAll('.carousel-slide');
        const totalSlides = slides.length;

        // Carousel news data
        const newsData = [
            {
                title: "MBG Kota Bogor",
                desc: "Program Makan Bergizi Gratis (MBG) di Kota Bogor mulai dilaksanakan pada 6 Januari 2025. Pada tahap awal, program ini menjangkau 25 sekolah dengan sekitar 6.000 siswa sebagai penerima manfaat.",
                link: "https://www.idntimes.com/news/indonesia/dari-90-dapur-mbg-siap-di-bogor-baru-31-punya-slhs-ini-kata-jenal-00-sk545-7y42x7"
            },
            {
                title: "Standar Gizi Nasional",
                desc: "Berdasarkan standar terbaru, setiap paket makanan MBG harus mengandung protein, serat, dan mikronutrisi yang seimbang. Program ini diawasi ketat oleh ahli gizi untuk memastikan kualitas terbaik.",
                link: "https://news.ralali.com/standarisasi-dan-kelengkapan-dapur-bgn-mewujudkan-program-makan-bergizi-gratis-yang-aman-dan-berkualitas/"
            },
            {
                title: "Implementasi Sekolah",
                desc: "Setiap sekolah atau titik distribusi kini dilengkapi dengan standar dapur higienis yang modern. Proses pengolahan hingga distribusi dilakukan dengan protokol keamanan pangan yang ketat.",
                link: "https://djpb.kemenkeu.go.id/kppn/manna/id/data-publikasi/artikel/3240-implementasi-program-makan-bergizi-gratis-pada-wilayah-semaku.html"
            }
        ];

        // Sasaran Slider Navigation
        function slideSasaran(direction) {
            const slider = document.getElementById('sasaranSlider');
            if (slider) {
                const item = slider.querySelector('.sasaran-slider-item');
                const itemWidth = item ? item.offsetWidth + 25 : 350;
                slider.scrollBy({
                    left: direction * itemWidth,
                    behavior: 'smooth'
                });
            }
        }

        // Stats Slider Navigation
        function slideStats(direction) {
            const slider = document.getElementById('statsSlider');
            if (slider) {
                const item = slider.querySelector('.stats-slider-item');
                const itemWidth = item ? item.offsetWidth + 25 : 300;
                slider.scrollBy({
                    left: direction * itemWidth,
                    behavior: 'smooth'
                });
            }
        }

        function moveCarousel(direction) {
            currentSlide += direction;
            if (currentSlide < 0) currentSlide = totalSlides - 1;
            if (currentSlide >= totalSlides) currentSlide = 0;
            updateCarousel();
            resetAutoSlide();
        }

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;

            // Update news text with animation
            const heroContent = document.getElementById('heroContent');
            const newsTitle = document.getElementById('newsTitle');
            const newsDesc = document.getElementById('newsDesc');
            const newsLink = document.getElementById('newsLink');

            if (newsTitle && newsData[currentSlide]) {
                heroContent.style.opacity = "0";
                heroContent.style.transform = "translateX(20px)";

                setTimeout(() => {
                    const currentNews = newsData[currentSlide];
                    newsTitle.innerText = currentNews.title;
                    newsDesc.innerText = currentNews.desc;
                    newsLink.setAttribute('href', currentNews.link);

                    heroContent.style.opacity = "1";
                    heroContent.style.transform = "translateX(0)";
                }, 300);
            }

            document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                moveCarousel(1);
            }, 8000); // Slightly slower for reading
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Create carousel dots
        const dotsContainer = document.getElementById('carouselDots');
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.className = 'carousel-dot';
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                currentSlide = i;
                updateCarousel();
                resetAutoSlide();
            });
            dotsContainer.appendChild(dot);
        }

        startAutoSlide();

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('section[id]');
            const scrollY = window.pageYOffset;

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    currentSection = sectionId;
                }
            });

            document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                const section = link.getAttribute('data-section');
                if (section === currentSection) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });

        // Regulasi menu navigation
        document.querySelectorAll('.regulasi-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                const wrapper = this.closest('.regulasi-wrapper');
                if (!wrapper) return;

                wrapper.querySelectorAll('.regulasi-card-compact').forEach(card => {
                    card.style.display = 'none';
                });
                wrapper.querySelectorAll('.regulasi-item').forEach(menu => {
                    menu.classList.remove('active');
                });

                const target = this.dataset.target;
                const targetCard = document.getElementById(target);
                if (targetCard) {
                    targetCard.style.display = 'flex'; // Use flex to maintain layout
                    this.classList.add('active');
                }
            });
        });

        // Form submissions
        const loginForm = document.querySelector('.login-form-modern');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Login functionality coming soon!');
                const loginModal = document.getElementById('loginModal');
                if (loginModal) {
                    bootstrap.Modal.getInstance(loginModal).hide();
                }
            });
        }

        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Terima kasih telah subscribe!');
                e.target.reset();
            });
        }

        // Form Cek Gizi
        function toggleFab() {
            document.getElementById('radialFab').classList.toggle('active');
        }

        // Close FAB when clicking outside
        document.addEventListener('click', function (event) {
            const fab = document.getElementById('radialFab');
            if (!fab.contains(event.target) && fab.classList.contains('active')) {
                fab.classList.remove('active');
            }
        });

        // Form Disabilitas - REMOVED (Replaced by Accessibility Tools)

        // Accessibility Logic
        let currentFontSize = 100;
        let isReadMode = false;
        let speechUtterance = null;

        function updateFontSize() {
            document.documentElement.style.fontSize = currentFontSize + '%';
        }

        function increaseFontSize() {
            if (currentFontSize < 150) {
                currentFontSize += 10;
                updateFontSize();
            }
        }

        function decreaseFontSize() {
            if (currentFontSize > 80) {
                currentFontSize -= 10;
                updateFontSize();
            }
        }

        function toggleGrayscale() {
            document.body.classList.toggle('accessibility-grayscale');
            document.getElementById('btnGrayscale').classList.toggle('active');
        }

        function toggleHighContrast() {
            document.body.classList.toggle('accessibility-high-contrast');
            document.getElementById('btnContrast').classList.toggle('active');
        }

        function toggleUnderline() {
            document.body.classList.toggle('accessibility-underlined');
            document.getElementById('btnUnderline').classList.toggle('active');
        }

        function toggleBigCursor() {
            document.body.classList.toggle('accessibility-big-cursor');
            document.getElementById('btnCursor').classList.toggle('active');
        }

        function toggleReadMode() {
            const btn = document.getElementById('btnReadText');
            if (!isReadMode) {
                isReadMode = true;
                btn.classList.add('active');
                btn.querySelector('span').innerText = 'Berhenti Membaca';
                startReading();
            } else {
                stopReading();
            }
        }

        function startReading() {
            if ('speechSynthesis' in window) {
                // Ambil semua teks kecuali yang di dalam modal
                const elements = document.querySelectorAll('body > *:not(.modal)');
                let textToRead = "";
                elements.forEach(el => {
                    if (el.innerText) textToRead += el.innerText + " ";
                });

                speechUtterance = new SpeechSynthesisUtterance(textToRead);
                speechUtterance.lang = 'id-ID';
                speechUtterance.onend = stopReading;
                window.speechSynthesis.speak(speechUtterance);
            } else {
                alert('Maaf, peramban Anda tidak mendukung fitur Baca Teks.');
                stopReading();
            }
        }

        function stopReading() {
            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
            }
            isReadMode = false;
            const btn = document.getElementById('btnReadText');
            if (btn) {
                btn.classList.remove('active');
                btn.querySelector('span').innerText = 'Baca Teks';
            }
        }

        function resetAccessibility() {
            currentFontSize = 100;
            updateFontSize();
            document.body.classList.remove('accessibility-grayscale', 'accessibility-high-contrast', 'accessibility-underlined', 'accessibility-big-cursor');
            stopReading();

            // Reset active states on buttons
            document.querySelectorAll('.accessibility-btn').forEach(btn => btn.classList.remove('active'));
        }

        const formCekGizi = document.getElementById('formCekGizi');
        if (formCekGizi) {
            formCekGizi.addEventListener('submit', function (e) {
                e.preventDefault();

                const umur = parseFloat(document.getElementById('umur').value);
                const tinggiBadan = parseFloat(document.getElementById('tinggiBadan').value);
                const beratBadan = parseFloat(document.getElementById('beratBadan').value);

                const tinggiMeter = tinggiBadan / 100;
                const bmi = beratBadan / (tinggiMeter * tinggiMeter);

                let status = '';
                let kategori = '';
                let deskripsi = '';
                let rekomendasi = [];

                let source = 'Kemenkes RI';

                if (bmi < 18.5) {
                    status = 'Berat Kurang (Underweight)';
                    kategori = 'Underweight';
                    source = 'Kemenkes RI';
                    deskripsi = 'Indeks Massa Tubuh (IMT) Anda di bawah batas normal. Kondisi ini dapat menurunkan daya tahan tubuh dan meningkatkan risiko infeksi.';
                    rekomendasi = [
                        'Tingkatkan frekuensi makan menjadi 5-6 kali sehari dengan porsi kecil tapi sering.',
                        'Pilih makanan padat energi dan protein seperti kacang-kacangan, keju, dan daging.',
                        'Hindari minum air sebelum makan agar lambung tidak cepat penuh.',
                        'Konsultasikan dengan Ahli Gizi Puskesmas terdekat untuk pengaturan menu.'
                    ];
                } else if (bmi >= 18.5 && bmi < 25.0) {
                    status = 'Normal (Ideal)';
                    kategori = 'Normal';
                    source = 'WHO (World Health Organization)';
                    deskripsi = 'Selamat! Status gizi Anda optimal. Menurut WHO, menjaga IMT normal secara konsisten dapat menurunkan risiko penyakit jantung, stroke, dan diabetes tipe 2 secara signifikan.';
                    rekomendasi = [
                        'Pertahankan pola makan gizi seimbang "Isi Piringku".',
                        'Rutin berolahraga minimal 150 menit per minggu.',
                        'Jaga hidrasi dengan minum 8 gelas air per hari.',
                        'Lakukan cek kesehatan rutin setiap 6 bulan.'
                    ];
                } else if (bmi >= 25.0 && bmi < 30.0) {
                    status = 'Berat Lebih (Overweight)';
                    kategori = 'Overweight';
                    source = 'Kemenkes RI';
                    deskripsi = 'Berat badan Anda berlebih. Kelebihan berat badan awal dapat menjadi faktor risiko sindrom metabolik jika tidak dikendalikan.';
                    rekomendasi = [
                        'Kurangi asupan gula, garam, dan lemak (GGL).',
                        'Tingkatkan konsumsi serat dari sayur dan buah sebelum makan utama.',
                        'Lakukan aktivitas fisik aerobik (jalan cepat, berenang) minimal 30 menit sehari.',
                        'Batasi camilan tinggi kalori.'
                    ];
                } else {
                    status = 'Obesitas';
                    kategori = 'Obese';
                    source = 'WHO (World Health Organization)';
                    deskripsi = 'Perhatian Khusus. Obesitas adalah penyakit kronis yang memerlukan penanganan medis untuk mencegah komplikasi seperti hipertensi dan gangguan sendi.';
                    rekomendasi = [
                        'Segera konsultasikan ke Dokter atau Klinik Gizi di Puskesmas/RSUD.',
                        'Hindari diet ekstrem tanpa pengawasan medis.',
                        'Mulai aktivitas fisik ringan bertahap sesuai kemampuan.',
                        'Catat asupan makan harian (food diary) untuk memantau kalori.'
                    ];
                }

                document.getElementById('nilaiIMT').textContent = bmi.toFixed(1);
                document.getElementById('kategoriIMT').textContent = kategori;
                document.getElementById('statusGizi').textContent = status;
                document.getElementById('deskripsiGizi').textContent = deskripsi;
                document.getElementById('expertSource').textContent = `- Berdasarkan Standar ${source}`;

                // Update badge source in header
                const sourceBadge = document.querySelector('.badge.bg-soft-primary');
                if (sourceBadge) {
                    sourceBadge.innerHTML = `<i class="bi bi-patch-check me-1"></i>Sumber: ${source}`;
                }

                const listaRekomendasi = document.getElementById('listaRekomendasi');
                listaRekomendasi.innerHTML = '';
                rekomendasi.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    listaRekomendasi.appendChild(li);
                });

                document.getElementById('hasilGizi').classList.add('show');
                document.getElementById('giziFormContainer').style.display = 'none';
                document.getElementById('giziModalTitle').innerText = 'Hasil Analisis Gizi';
            });
        }

        function resetGiziForm() {
            document.getElementById('formCekGizi').reset();
            document.getElementById('hasilGizi').classList.remove('show');
            document.getElementById('giziFormContainer').style.display = 'block';
            document.getElementById('giziModalTitle').innerText = 'Form Cek Gizi';
        }

        // FAB Menu Toggle - REMOVED (Single button mode)

        // Page navigation
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        function hideAllSections() {
            sections.forEach(section => {
                section.classList.remove('active');
            });
        }

        function showSection(id) {
            const targetSection = document.getElementById(id);
            if (targetSection) {
                hideAllSections();
                targetSection.classList.add('active');
                window.scrollTo({
                    top: targetSection.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        }

        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                showSection(targetId);
            });
        });

        // Initial setup
        hideAllSections();
        document.getElementById('beranda').classList.add('active');
        // Distribution Detail Navigation
        const btnLihatDetail = document.getElementById('btnLihatDetail');
        if (btnLihatDetail) {
            btnLihatDetail.addEventListener('click', function () {
                window.location.href = 'statistik-detail.html';
            });
        }

        // Regulasi Selengkapnya Navigation
        const btnSelengkapnyaRegulasi = document.querySelector('.btn-selengkapnya-regulasi');
        if (btnSelengkapnyaRegulasi) {
            btnSelengkapnyaRegulasi.addEventListener('click', function () {
                window.location.href = 'regulasi-detail.html';
            });
        }

       <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("faqBtn").addEventListener("click", function() {
        window.location.href = "/faq_detail";
    });
});
</script>

	// scroll data slider
	function scrollSlider(direction) {
		const slider = document.getElementById('slider');
		if (!slider) return;
		const firstItem = slider.querySelector('div[style*="min-width"]') || slider.firstElementChild;
		const gap = 20;
		const itemWidth = firstItem ? (firstItem.offsetWidth + gap) : 360;
		slider.scrollBy({ left: direction * itemWidth, behavior: 'smooth' });
	}
