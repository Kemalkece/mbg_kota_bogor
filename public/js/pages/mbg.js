document.addEventListener('DOMContentLoaded', function () {

    // ============================
    // INISIALISASI AOS (jika ada)
    // ============================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    }

    // ============================
    // LOADER
    // ============================
    var loader = document.getElementById('loader');
    if (loader) {
        setTimeout(function () {
            loader.classList.add('hidden');
        }, 800);

        setTimeout(function () {
            if (!loader.classList.contains('hidden')) {
                loader.classList.add('hidden');
            }
        }, 3000);
    }

    // ============================
    // SIMULASI STATISTIK PENGUNJUNG
    // ============================
    function simulateStats() {
        var todayEl = document.getElementById('stat-today');
        var totalEl = document.getElementById('stat-total');
        var onlineEl = document.getElementById('stat-online');

        if (todayEl && totalEl && onlineEl) {
            var today = 1245;
            var total = 856432;
            var online = 243;

            setInterval(function () {
                online += Math.floor(Math.random() * 5) - 2;
                if (online < 200) online = 200;
                onlineEl.innerText = online.toLocaleString();

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

    // ============================
    // NAVBAR SCROLL EFFECT
    // ============================
    var navbar = document.getElementById('mainNav');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // ============================
    // TOMBOL BACK TO TOP
    // ============================
    var backToTop = document.getElementById('backToTop');
    if (backToTop) {
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
    }

    // ============================
    // HERO CAROUSEL
    // ============================
    var currentSlide = 0;
    var autoSlideInterval;
    var carousel = document.getElementById('heroCarousel');

    if (carousel) {
        var slides = carousel.querySelectorAll('.carousel-slide');
        var totalSlides = slides.length;

        console.log('Hero Carousel: ' + totalSlides + ' slide ditemukan.');

        function moveCarousel(direction) {
            currentSlide += direction;
            if (currentSlide < 0) currentSlide = totalSlides - 1;
            if (currentSlide >= totalSlides) currentSlide = 0;
            updateCarousel();
            resetAutoSlide();
        }

        // Expose moveCarousel ke global supaya bisa dipanggil dari onclick HTML
        window.moveCarousel = moveCarousel;

        function updateCarousel() {
            carousel.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

            // Update teks berita dengan animasi
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
                    var currentSlideEl = slides[currentSlide];
                    var title = currentSlideEl.getAttribute('data-title') || '';
                    var desc = currentSlideEl.getAttribute('data-desc') || '';

                    newsTitle.innerText = title;
                    if (newsDesc) newsDesc.innerText = desc;
                    if (newsLink) newsLink.setAttribute('href', '#');

                    if (heroContent) {
                        heroContent.style.opacity = '1';
                        heroContent.style.transform = 'translateX(0)';
                    }
                }, 300);
            }

            // Update dots aktif
            document.querySelectorAll('.carousel-dot').forEach(function (dot, index) {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(function () {
                moveCarousel(1);
            }, 8000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Buat dots navigasi carousel
        var dotsContainer = document.getElementById('carouselDots');
        if (dotsContainer) {
            for (var i = 0; i < totalSlides; i++) {
                (function (index) {
                    var dot = document.createElement('div');
                    dot.className = 'carousel-dot';
                    if (index === 0) dot.classList.add('active');
                    dot.addEventListener('click', function () {
                        currentSlide = index;
                        updateCarousel();
                        resetAutoSlide();
                    });
                    dotsContainer.appendChild(dot);
                })(i);
            }
        }

        // Mulai auto-slide
        if (totalSlides > 1) {
            startAutoSlide();
            console.log('Hero Carousel: auto-slide dimulai.');
        }
    } else {
        console.warn('Hero Carousel: elemen #heroCarousel tidak ditemukan.');
    }

    // ============================
    // SASARAN SLIDER NAVIGASI
    // ============================
    window.slideSasaran = function (direction) {
        var slider = document.getElementById('sasaranSlider');
        if (slider) {
            var item = slider.querySelector('.sasaran-slider-item');
            var itemWidth = item ? item.offsetWidth + 25 : 350;
            slider.scrollBy({
                left: direction * itemWidth,
                behavior: 'smooth'
            });
        }
    };

    // ============================
    // STATS SLIDER NAVIGASI
    // ============================
    window.slideStats = function (direction) {
        var slider = document.getElementById('statsSlider');
        if (slider) {
            var item = slider.querySelector('.stats-slider-item');
            var itemWidth = item ? item.offsetWidth + 25 : 300;
            slider.scrollBy({
                left: direction * itemWidth,
                behavior: 'smooth'
            });
        }
    };

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
                var offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ============================
    // NAVIGASI AKTIF BERDASARKAN SCROLL
    // ============================
    window.addEventListener('scroll', function () {
        var sections = document.querySelectorAll('section[id]');
        var scrollY = window.pageYOffset;
        var currentSection = '';

        sections.forEach(function (section) {
            var sectionTop = section.offsetTop - 150;
            var sectionHeight = section.offsetHeight;
            var sectionId = section.getAttribute('id');

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                currentSection = sectionId;
            }
        });

        document.querySelectorAll('.navbar-nav .nav-link').forEach(function (link) {
            var section = link.getAttribute('data-section');
            if (section === currentSection) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    });

    // ============================
    // REGULASI MENU NAVIGASI
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

            var target = this.dataset.target;
            var targetCard = document.getElementById(target);
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
            if (loginModal) {
                bootstrap.Modal.getInstance(loginModal).hide();
            }
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
    window.toggleFab = function () {
        var fab = document.getElementById('radialFab');
        if (fab) fab.classList.toggle('active');
    };

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

    window.increaseFontSize = function () {
        if (currentFontSize < 150) {
            currentFontSize += 10;
            updateFontSize();
        }
    };

    window.decreaseFontSize = function () {
        if (currentFontSize > 80) {
            currentFontSize -= 10;
            updateFontSize();
        }
    };

    window.toggleGrayscale = function () {
        document.body.classList.toggle('accessibility-grayscale');
        var btn = document.getElementById('btnGrayscale');
        if (btn) btn.classList.toggle('active');
    };

    window.toggleHighContrast = function () {
        document.body.classList.toggle('accessibility-high-contrast');
        var btn = document.getElementById('btnContrast');
        if (btn) btn.classList.toggle('active');
    };

    window.toggleUnderline = function () {
        document.body.classList.toggle('accessibility-underlined');
        var btn = document.getElementById('btnUnderline');
        if (btn) btn.classList.toggle('active');
    };

    window.toggleBigCursor = function () {
        document.body.classList.toggle('accessibility-big-cursor');
        var btn = document.getElementById('btnCursor');
        if (btn) btn.classList.toggle('active');
    };

    window.toggleReadMode = function () {
        var btn = document.getElementById('btnReadText');
        if (!isReadMode) {
            isReadMode = true;
            if (btn) {
                btn.classList.add('active');
                btn.querySelector('span').innerText = 'Berhenti Membaca';
            }
            startReading();
        } else {
            stopReading();
        }
    };

    function startReading() {
        if ('speechSynthesis' in window) {
            var elements = document.querySelectorAll('body > *:not(.modal)');
            var textToRead = '';
            elements.forEach(function (el) {
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
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
        }
        isReadMode = false;
        var btn = document.getElementById('btnReadText');
        if (btn) {
            btn.classList.remove('active');
            btn.querySelector('span').innerText = 'Baca Teks';
        }
    }

    window.resetAccessibility = function () {
        currentFontSize = 100;
        updateFontSize();
        document.body.classList.remove('accessibility-grayscale', 'accessibility-high-contrast', 'accessibility-underlined', 'accessibility-big-cursor');
        stopReading();
        document.querySelectorAll('.accessibility-btn').forEach(function (btn) {
            btn.classList.remove('active');
        });
    };

    // ============================
    // FORM CEK GIZI
    // ============================
    var formCekGizi = document.getElementById('formCekGizi');
    if (formCekGizi) {
        formCekGizi.addEventListener('submit', function (e) {
            e.preventDefault();

            var umur = parseFloat(document.getElementById('umur').value);
            var tinggiBadan = parseFloat(document.getElementById('tinggiBadan').value);
            var beratBadan = parseFloat(document.getElementById('beratBadan').value);

            var tinggiMeter = tinggiBadan / 100;
            var bmi = beratBadan / (tinggiMeter * tinggiMeter);

            var status = '';
            var kategori = '';
            var deskripsi = '';
            var rekomendasi = [];
            var source = 'Kemenkes RI';

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
            document.getElementById('expertSource').textContent = '- Berdasarkan Standar ' + source;

            var sourceBadge = document.querySelector('.badge.bg-soft-primary');
            if (sourceBadge) {
                sourceBadge.innerHTML = '<i class="bi bi-patch-check me-1"></i>Sumber: ' + source;
            }

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

    window.resetGiziForm = function () {
        document.getElementById('formCekGizi').reset();
        document.getElementById('hasilGizi').classList.remove('show');
        document.getElementById('giziFormContainer').style.display = 'block';
        document.getElementById('giziModalTitle').innerText = 'Form Cek Gizi';
    };

    // ============================
    // NAVIGASI HALAMAN
    // ============================
    var sections = document.querySelectorAll('section');
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    function hideAllSections() {
        sections.forEach(function (section) {
            section.classList.remove('active');
        });
    }

    function showSection(id) {
        var targetSection = document.getElementById(id);
        if (targetSection) {
            hideAllSections();
            targetSection.classList.add('active');
            window.scrollTo({
                top: targetSection.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    }

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var targetId = this.getAttribute('href').substring(1);
            showSection(targetId);
        });
    });

    // Setup awal
    hideAllSections();
    var berandaSection = document.getElementById('beranda');
    if (berandaSection) berandaSection.classList.add('active');

    // ============================
    // NAVIGASI DETAIL
    // ============================
    var btnLihatDetail = document.getElementById('btnLihatDetail');
    if (btnLihatDetail) {
        btnLihatDetail.addEventListener('click', function () {
            window.location.href = 'statistik-detail.html';
        });
    }

    var btnSelengkapnyaRegulasi = document.querySelector('.btn-selengkapnya-regulasi');
    if (btnSelengkapnyaRegulasi) {
        btnSelengkapnyaRegulasi.addEventListener('click', function () {
            window.location.href = 'regulasi-detail.html';
        });
    }

    var faqBtn = document.getElementById('faqBtn');
    if (faqBtn) {
        faqBtn.addEventListener('click', function () {
            window.location.href = '/faq_detail';
        });
    }

    // ============================
    // SCROLL DATA SLIDER
    // ============================
    window.scrollSlider = function (direction) {
        var slider = document.getElementById('slider');
        if (!slider) return;
        var firstItem = slider.querySelector('div[style*="min-width"]') || slider.firstElementChild;
        var gap = 20;
        var itemWidth = firstItem ? (firstItem.offsetWidth + gap) : 360;
        slider.scrollBy({ left: direction * itemWidth, behavior: 'smooth' });
    };

}); // Akhir DOMContentLoaded
