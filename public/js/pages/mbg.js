document.addEventListener('DOMContentLoaded', function () {

    // ============================
    // INISIALISASI AOS
    // ============================
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 1000, once: true, offset: 100 });
    }

    // ============================
    // LOADER
    // ============================
    var loader = document.getElementById('loader');
    if (loader) {
        setTimeout(function () { loader.classList.add('hidden'); }, 800);
        setTimeout(function () {
            if (!loader.classList.contains('hidden')) loader.classList.add('hidden');
        }, 3000);
    }

    // ============================
    // NAVBAR SCROLL EFFECT
    // ============================
    var navbar = document.getElementById('mainNav');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });
    }

    // ============================
    // BACK TO TOP
    // ============================
    var backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', function () {
            backToTop.classList.toggle('show', window.scrollY > 300);
        });
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ============================
    // HERO CAROUSEL
    // ============================
    var carousel = document.getElementById('heroCarousel');
    if (carousel) {
        var slides = carousel.querySelectorAll('.carousel-slide');
        var totalSlides = slides.length;
        var currentSlide = 0;
        var autoSlideInterval;

        console.log('Hero Carousel: ' + totalSlides + ' slide ditemukan.');

        function moveCarousel(direction) {
            currentSlide += direction;
            if (currentSlide < 0) currentSlide = totalSlides - 1;
            if (currentSlide >= totalSlides) currentSlide = 0;
            updateCarousel();
            resetAutoSlide();
        }

        function updateCarousel() {
            carousel.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

            var heroContent = document.getElementById('heroContent');
            var newsTitle = document.getElementById('newsTitle');
            var newsDesc = document.getElementById('newsDesc');
            var newsLink = document.getElementById('newsLink');

            if (newsTitle && slides[currentSlide]) {
                if (heroContent) {
                    heroContent.style.opacity = '0';
                    heroContent.style.transform = 'translateX(20px)';
                }
                setTimeout(function () {
                    var el = slides[currentSlide];
                    newsTitle.innerText = el.getAttribute('data-title') || '';
                    if (newsDesc) newsDesc.innerText = el.getAttribute('data-desc') || '';
                    if (newsLink) newsLink.setAttribute('href', el.getAttribute('data-url') || '#');
                    if (heroContent) {
                        heroContent.style.opacity = '1';
                        heroContent.style.transform = 'translateX(0)';
                    }
                }, 300);
            }

            document.querySelectorAll('.carousel-dot').forEach(function (dot, i) {
                dot.classList.toggle('active', i === currentSlide);
            });
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(function () { moveCarousel(1); }, 8000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Bind tombol prev & next (tidak pakai onclick inline)
        var prevBtn = document.getElementById('carouselPrev');
        var nextBtn = document.getElementById('carouselNext');
        if (prevBtn) prevBtn.addEventListener('click', function () { moveCarousel(-1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { moveCarousel(1); });

        // Buat dots
        var dotsContainer = document.getElementById('carouselDots');
        if (dotsContainer) {
            for (var i = 0; i < totalSlides; i++) {
                (function (index) {
                    var dot = document.createElement('div');
                    dot.className = 'carousel-dot' + (index === 0 ? ' active' : '');
                    dot.addEventListener('click', function () {
                        currentSlide = index;
                        updateCarousel();
                        resetAutoSlide();
                    });
                    dotsContainer.appendChild(dot);
                })(i);
            }
        }

        if (totalSlides > 1) {
            startAutoSlide();
            console.log('Hero Carousel: auto-slide dimulai.');
        }
    } else {
        console.warn('Hero Carousel: elemen #heroCarousel tidak ditemukan.');
    }

    // ============================
    // SASARAN SLIDER
    // ============================
    function slideSasaran(direction) {
        var slider = document.getElementById('sasaranSlider');
        if (!slider) return;
        slider.scrollBy({ left: direction * 400, behavior: 'smooth' });
    }

    var sasaranPrev = document.getElementById('sasaranPrev');
    var sasaranNext = document.getElementById('sasaranNext');
    if (sasaranPrev) sasaranPrev.addEventListener('click', function () { slideSasaran(-1); });
    if (sasaranNext) sasaranNext.addEventListener('click', function () { slideSasaran(1); });

    // ============================
    // STATS SLIDER
    // ============================
    function slideStats(direction) {
        var slider = document.getElementById('statsSlider');
        if (!slider) return;
        var item = slider.querySelector('.stats-slider-item');
        var itemWidth = item ? item.offsetWidth + 25 : 300;
        slider.scrollBy({ left: direction * itemWidth, behavior: 'smooth' });
    }

    var statsPrev = document.getElementById('statsPrev');
    var statsNext = document.getElementById('statsNext');
    if (statsPrev) statsPrev.addEventListener('click', function () { slideStats(-1); });
    if (statsNext) statsNext.addEventListener('click', function () { slideStats(1); });

    // ============================
    // DATA PENYALURAN SLIDER
    // ============================
    function scrollSlider(direction) {
        var slider = document.getElementById('slider');
        if (!slider) return;
        slider.scrollBy({ left: direction * 520, behavior: 'smooth' });
    }

    var sliderPrev = document.getElementById('sliderPrev');
    var sliderNext = document.getElementById('sliderNext');
    if (sliderPrev) sliderPrev.addEventListener('click', function () { scrollSlider(-1); });
    if (sliderNext) sliderNext.addEventListener('click', function () { scrollSlider(1); });

    // ============================
    // SMOOTH SCROLLING
    // ============================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var href = this.getAttribute('href');
            if (href === '#') return;
            var target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
            }
        });
    });

    // ============================
    // NAVIGASI AKTIF BERDASARKAN SCROLL
    // ============================
    window.addEventListener('scroll', function () {
        var scrollY = window.pageYOffset;
        var currentSection = '';

        document.querySelectorAll('section[id]').forEach(function (section) {
            var top = section.offsetTop - 150;
            if (scrollY >= top && scrollY < top + section.offsetHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        document.querySelectorAll('.navbar-nav .nav-link').forEach(function (link) {
            link.classList.toggle('active', link.getAttribute('data-section') === currentSection);
        });
    });

    // ============================
    // REGULASI MENU
    // ============================
    document.querySelectorAll('.regulasi-item').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            var wrapper = this.closest('.regulasi-wrapper');
            if (!wrapper) return;

            wrapper.querySelectorAll('.regulasi-card-compact').forEach(function (card) {
                card.style.display = 'none';
            });
            wrapper.querySelectorAll('.regulasi-item').forEach(function (menu) {
                menu.classList.remove('active');
            });

            var targetCard = document.getElementById(this.dataset.target);
            if (targetCard) {
                targetCard.style.display = 'flex';
                this.classList.add('active');
            }
        });
    });

    // ============================
    // FORM SUBMISSIONS
    // ============================
    var loginForm = document.querySelector('.login-form-modern');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Login functionality coming soon!');
            var loginModal = document.getElementById('loginModal');
            if (loginModal) bootstrap.Modal.getInstance(loginModal).hide();
        });
    }

    var newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Terima kasih telah subscribe!');
            e.target.reset();
        });
    }

    // ============================
    // FLOATING ACTION BUTTON (FAB)
    // ============================
    var fabToggleBtn = document.getElementById('fabToggleBtn');
    if (fabToggleBtn) {
        fabToggleBtn.addEventListener('click', function () {
            var fab = document.getElementById('radialFab');
            if (fab) fab.classList.toggle('active');
        });
    }

    document.addEventListener('click', function (event) {
        var fab = document.getElementById('radialFab');
        if (fab && !fab.contains(event.target) && fab.classList.contains('active')) {
            fab.classList.remove('active');
        }
    });

    // ============================
    // AKSESIBILITAS
    // ============================
    var currentFontSize = 100;
    var isReadMode = false;
    var speechUtterance = null;

    function updateFontSize() {
        document.documentElement.style.fontSize = currentFontSize + '%';
    }

    var btnIncFont = document.getElementById('btnIncFont');
    var btnDecFont = document.getElementById('btnDecFont');
    var btnGrayscale = document.getElementById('btnGrayscale');
    var btnContrast = document.getElementById('btnContrast');
    var btnUnderline = document.getElementById('btnUnderline');
    var btnCursor = document.getElementById('btnCursor');
    var btnReadText = document.getElementById('btnReadText');
    var btnReset = document.getElementById('btnResetAccessibility');

    if (btnIncFont) btnIncFont.addEventListener('click', function () {
        if (currentFontSize < 150) { currentFontSize += 10; updateFontSize(); }
    });
    if (btnDecFont) btnDecFont.addEventListener('click', function () {
        if (currentFontSize > 80) { currentFontSize -= 10; updateFontSize(); }
    });
    if (btnGrayscale) btnGrayscale.addEventListener('click', function () {
        document.body.classList.toggle('accessibility-grayscale');
        this.classList.toggle('active');
    });
    if (btnContrast) btnContrast.addEventListener('click', function () {
        document.body.classList.toggle('accessibility-high-contrast');
        this.classList.toggle('active');
    });
    if (btnUnderline) btnUnderline.addEventListener('click', function () {
        document.body.classList.toggle('accessibility-underlined');
        this.classList.toggle('active');
    });
    if (btnCursor) btnCursor.addEventListener('click', function () {
        document.body.classList.toggle('accessibility-big-cursor');
        this.classList.toggle('active');
    });

    function startReading() {
        if ('speechSynthesis' in window) {
            var textToRead = '';
            document.querySelectorAll('body > *:not(.modal)').forEach(function (el) {
                if (el.innerText) textToRead += el.innerText + ' ';
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
        if ('speechSynthesis' in window) window.speechSynthesis.cancel();
        isReadMode = false;
        if (btnReadText) {
            btnReadText.classList.remove('active');
            var span = btnReadText.querySelector('span');
            if (span) span.innerText = 'Baca Teks';
        }
    }

    if (btnReadText) {
        btnReadText.addEventListener('click', function () {
            if (!isReadMode) {
                isReadMode = true;
                this.classList.add('active');
                var span = this.querySelector('span');
                if (span) span.innerText = 'Berhenti Membaca';
                startReading();
            } else {
                stopReading();
            }
        });
    }

    if (btnReset) {
        btnReset.addEventListener('click', function () {
            currentFontSize = 100;
            updateFontSize();
            document.body.classList.remove('accessibility-grayscale', 'accessibility-high-contrast', 'accessibility-underlined', 'accessibility-big-cursor');
            stopReading();
            document.querySelectorAll('.accessibility-btn').forEach(function (btn) {
                btn.classList.remove('active');
            });
        });
    }

    // ============================
    // FORM CEK GIZI
    // ============================
    var formCekGizi = document.getElementById('formCekGizi');
    if (formCekGizi) {
        formCekGizi.addEventListener('submit', function (e) {
            e.preventDefault();

            var tinggiBadan = parseFloat(document.getElementById('tinggiBadan').value);
            var beratBadan = parseFloat(document.getElementById('beratBadan').value);
            var tinggiMeter = tinggiBadan / 100;
            var bmi = beratBadan / (tinggiMeter * tinggiMeter);

            var status, kategori, deskripsi, rekomendasi, source;

            if (bmi < 18.5) {
                status = 'Berat Kurang (Underweight)'; kategori = 'Underweight'; source = 'Kemenkes RI';
                deskripsi = 'Indeks Massa Tubuh (IMT) Anda di bawah batas normal. Kondisi ini dapat menurunkan daya tahan tubuh dan meningkatkan risiko infeksi.';
                rekomendasi = [
                    'Tingkatkan frekuensi makan menjadi 5-6 kali sehari dengan porsi kecil tapi sering.',
                    'Pilih makanan padat energi dan protein seperti kacang-kacangan, keju, dan daging.',
                    'Hindari minum air sebelum makan agar lambung tidak cepat penuh.',
                    'Konsultasikan dengan Ahli Gizi Puskesmas terdekat untuk pengaturan menu.'
                ];
            } else if (bmi < 25.0) {
                status = 'Normal (Ideal)'; kategori = 'Normal'; source = 'WHO (World Health Organization)';
                deskripsi = 'Selamat! Status gizi Anda optimal. Menurut WHO, menjaga IMT normal secara konsisten dapat menurunkan risiko penyakit jantung, stroke, dan diabetes tipe 2 secara signifikan.';
                rekomendasi = [
                    'Pertahankan pola makan gizi seimbang "Isi Piringku".',
                    'Rutin berolahraga minimal 150 menit per minggu.',
                    'Jaga hidrasi dengan minum 8 gelas air per hari.',
                    'Lakukan cek kesehatan rutin setiap 6 bulan.'
                ];
            } else if (bmi < 30.0) {
                status = 'Berat Lebih (Overweight)'; kategori = 'Overweight'; source = 'Kemenkes RI';
                deskripsi = 'Berat badan Anda berlebih. Kelebihan berat badan awal dapat menjadi faktor risiko sindrom metabolik jika tidak dikendalikan.';
                rekomendasi = [
                    'Kurangi asupan gula, garam, dan lemak (GGL).',
                    'Tingkatkan konsumsi serat dari sayur dan buah sebelum makan utama.',
                    'Lakukan aktivitas fisik aerobik (jalan cepat, berenang) minimal 30 menit sehari.',
                    'Batasi camilan tinggi kalori.'
                ];
            } else {
                status = 'Obesitas'; kategori = 'Obese'; source = 'WHO (World Health Organization)';
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
            document.getElementById('expertSource').textContent = '- Berdasarkan Standar ' + source;

            var sourceBadge = document.querySelector('.badge.bg-soft-primary');
            if (sourceBadge) sourceBadge.innerHTML = '<i class="bi bi-patch-check me-1"></i>Sumber: ' + source;

            var listaRekomendasi = document.getElementById('listaRekomendasi');
            if (listaRekomendasi) {
                listaRekomendasi.innerHTML = '';
                rekomendasi.forEach(function (item) {
                    var li = document.createElement('li');
                    li.textContent = item;
                    listaRekomendasi.appendChild(li);
                });
            }

            document.getElementById('hasilGizi').classList.add('show');
            document.getElementById('giziFormContainer').style.display = 'none';
            document.getElementById('giziModalTitle').innerText = 'Hasil Analisis Gizi';
        });
    }

    var btnResetGizi = document.getElementById('btnResetGizi');
    if (btnResetGizi) {
        btnResetGizi.addEventListener('click', function () {
            document.getElementById('formCekGizi').reset();
            document.getElementById('hasilGizi').classList.remove('show');
            document.getElementById('giziFormContainer').style.display = 'block';
            document.getElementById('giziModalTitle').innerText = 'Form Cek Gizi';
        });
    }

    // ============================
    // NAVIGASI HALAMAN (SPA)
    // ============================
    var sections = document.querySelectorAll('section');
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    if (sections.length && document.getElementById('beranda')) {
        function hideAllSections() {
            sections.forEach(function (s) { s.classList.remove('active'); });
        }

        navLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var targetId = this.getAttribute('href').substring(1);
                var target = document.getElementById(targetId);
                if (target) {
                    hideAllSections();
                    target.classList.add('active');
                    window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
                }
            });
        });

        hideAllSections();
        document.getElementById('beranda').classList.add('active');
    }

    // ============================
    // NAVIGASI DETAIL
    // ============================
    var btnLihatDetail = document.getElementById('btnLihatDetail');
    if (btnLihatDetail) btnLihatDetail.addEventListener('click', function () {
        window.location.href = '/detail-data';
    });

    var btnSelengkapnyaRegulasi = document.querySelector('.btn-selengkapnya-regulasi');
    if (btnSelengkapnyaRegulasi) btnSelengkapnyaRegulasi.addEventListener('click', function () {
        window.location.href = '/detail-regulasi';
    });

    var faqBtn = document.getElementById('faqBtn');
    if (faqBtn) faqBtn.addEventListener('click', function () {
        window.location.href = '/detail-faq';
    });

}); // Akhir DOMContentLoaded