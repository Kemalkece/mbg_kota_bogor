<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Makan Bergizi Gratis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/pages/mbg.css">

<body>
    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="loader-circle"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
        <div class="container-xl">
            <a class="navbar-brand" href="#beranda">
                <img src="/images/logo.png" alt="BGN Logo">
                <div class="navbar-brand-text">
                    <span class="brand-label">Program Nasional</span>
                    <span class="brand-name">Makan Bergizi Gratis</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#beranda" data-section="beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sasaran" data-section="sasaran">Sasaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="#data" data-section="data">Data</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#regulasi" data-section="regulasi">Regulasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#peta-mbg" data-section="peta-mbg">Peta MBG</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq" data-section="faq">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>

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

    <!-- Sasaran  -->
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
                    <!-- Card 1: Text Info -->
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

                    <!-- Card 2: Siswa Sekolah -->
                    <div class="sasaran-slider-item">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="/images/siswa.jpg" alt="Siswa Sekolah" loading="lazy">
                                    <span class="flip-card-label">Anak Sekolah</span>
                                </div>
                                <div class="flip-card-back">
                                    <h3>Siswa Sekolah</h3>
                                    <p>Pemberian makan bergizi gratis untuk siswa PAUD hingga SMA/SMK untuk mendukung
                                        konsentrasi belajar dan pertumbuhan fisik yang optimal.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Balita -->
                    <div class="sasaran-slider-item">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="/images/balita.png" alt="Balita" loading="lazy">
                                    <span class="flip-card-label">Balita & Anak</span>
                                </div>
                                <div class="flip-card-back">
                                    <h3>Balita & Anak</h3>
                                    <p>Intervensi gizi dini untuk anak usia 0-5 tahun guna mencegah stunting dan
                                        memastikan
                                        perkembangan otak yang maksimal di masa emas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Ibu Hamil -->
                    <div class="sasaran-slider-item">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="/images/ibumenyusui.png" alt="Ibu Hamil" loading="lazy">
                                    <span class="flip-card-label">Ibu Hamil & Menyusui</span>
                                </div>
                                <div class="flip-card-back">
                                    <h3>Ibu Hamil & Menyusui</h3>
                                    <p>Pemenuhan nutrisi bagi ibu hamil dan menyusui untuk kesehatan ibu dan janin,
                                        serta
                                        mendukung pemberian ASI eksklusif berkualitas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5: Lansia -->
                    <div class="sasaran-slider-item">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="/images/lansia.png" alt="Lansia">
                                    <span class="flip-card-label">Lansia</span>
                                </div>
                                <div class="flip-card-back">
                                    <h3>Lansia</h3>
                                    <p>Pemenuhan gizi bagi lanjut usia untuk menjaga daya tahan tubuh dan kualitas
                                        hidup.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="slider-nav next" onclick="slideSasaran(1)">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

    </section>

    <!-- About -->
    <section id="program-mbg" class="about-section">
        <div class="container">

            <!-- HEADER -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="text-mbg">MBG Kota Bogor</h2>
            </div>

            <!-- ATAS -->
            <div class="about-wrapper" data-aos="fade-up">

                <!-- ILUSTRASI (TETAP) -->
                <div class="about-illustration-side">
                    <div class="about-dino-container">
                        <div class="about-deco-circle-bg"></div>
                        <div class="about-deco-dots"></div>
                        <div class="about-deco-yellow-blob"></div>
                        <div class="about-dino-image">
                            <img src="/images/animasi.gif" alt="Rubo">
                        </div>
                    </div>
                </div>

                <!-- TEKS KANAN -->
                <div class="about-content-side">

                    <h3 class="about-title">Program Makan Bergizi Gratis</h3>
                    <p class="about-description">
                        Program Makan Bergizi Gratis (MBG) KOta Bogor resmi dilaksanakan
                        secara serentak mulai 6 Januari 2025. Pada tahap awal, program ini
                        menjangkau 39 sekolah dengan total 8.667 siswa sebagai penerima manfaat
                        dan terus diperluas cakupannya.
                    </p>

                    <div class="about-info-item">
                        <div>
                            <h5>Pembangunan Infrastruktur</h5>
                            <p>
                                Pemanfaatan aset Pemda untuk Dapur SPPG sebanyak 238 aset,
                                dengan 94 lokasi direkomendasikan untuk operasional.
                                Pembangunan juga didukung oleh Kemen PU dan BGN
                                di beberapa wilayah Kabupaten Bogor.
                            </p>
                        </div>
                    </div>

                    <div class="about-info-item">
                        <div>
                            <h5>Dukungan Anggaran</h5>
                            <p>
                                Pemerintah Kota Bogor mengalokasikan anggaran
                                melalui APBD untuk mendukung keberlangsungan program MBG.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- BAWAH -->
            <div class="about-bottom-grid" data-aos="fade-up">

                <div class="about-bottom-item">
                    <h5>Dukungan Pangan Lokal</h5>
                    <p>
                        Pemenuhan kebutuhan MBG per hari melibatkan potensi lokal,
                        seperti sayuran, telur ayam, ayam/ikan, serta bumbu dapur
                        untuk mendorong ekonomi masyarakat.
                    </p>
                </div>

                <div class="about-bottom-item">
                    <h5>Sinergi Stakeholder</h5>
                    <p>
                        Program MBG dilaksanakan melalui sinergi Pemkab Bogor dengan
                        TNI, POLRI, KADIN, PKK, organisasi keagamaan, organisasi kepemudaan,
                        serta unsur masyarakat lainnya.
                    </p>
                </div>

                <div class="about-bottom-item">
                    <h5>Pengawasan & Evaluasi</h5>
                    <p>
                        Dilakukan pelatihan keamanan pangan, pemeriksaan laboratorium,
                        sertifikasi laik higiene sanitasi, serta inspeksi kesehatan
                        lingkungan bersama Puskesmas.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Data -->
    <section id="data">
        <div class="container">
            <div class="data-header">
                <h2>Data Penyaluran Program MBG di Kota Bogor</h2>
                <p>Cakupan penerima manfaat per kategori</p>
            </div>

            <div class="data-wrapper">
                <!-- Wrapper -->
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
                        <!-- Penerima Manfaat -->
                        <div class="slider-item gold">
                            <div class="slider-content">
                                <h3>Penerima Manfaat</h3>
                                <p>Mendukung pemenuhan gizi bagi penerima manfaat guna menunjang kesehatan, pertumbuhan optimal, serta pencegahan stunting di Kota Bogor.</p>
                            </div>
                            <div class="slider-image">
                                <img src="/images/penerimamanfaat.jpg" alt="Penerima Manfaat">
                            </div>
                        </div>

                        <!-- Wilayah Terjangkau -->
                        <div class="slider-item dark">
                            <div class="slider-content">
                                <h3>Wilayah Terjangkau</h3>
                                <p>Program Makan Bergizi Gratis menjangkau berbagai area di Kota Bogor sebagai upaya pemerataan akses gizi bagi masyarakat.</p>
                            </div>
                            <div class="slider-image">
                                <img src="/images/bogorkota.jpg" alt="Wilayah Terjangkau">
                            </div>
                        </div>

                        <!-- Sekolah & Fasilitas -->
                        <div class="slider-item gold">
                            <div class="slider-content">
                                <h3>Sekolah & Fasilitas</h3>
                                <p>Program ini menjangkau berbagai provinsi guna memastikan akses gizi yang merata bagi penerima manfaat di berbagai wilayah.</p>
                            </div>
                            <div class="slider-image">
                                <img src="/images/fasilitas.jpg" alt="Sekolah & Fasilitas">
                            </div>
                        </div>

                        <!-- Komite Kesehatan -->
                        <div class="slider-item dark">
                            <div class="slider-content">
                                <h3>Komite Kesehatan</h3>
                                <p>Bekerja sama dengan komite kesehatan untuk memastikan standar gizi, keamanan pangan, dan pemantauan kesehatan penerima manfaat berjalan berkelanjutan.</p>
                            </div>
                            <div class="slider-image">
                                <img src="/images/kesehatan.jpg" alt="Komite Kesehatan">
                            </div>
                        </div>

                        <!-- SPPG -->
                        <div class="slider-item gold">
                            <div class="slider-content">
                                <h3>SPPG</h3>
                                <p>Dilaksanakan melalui SPPG sebagai pusat pengelolaan dan distribusi makanan bergizi yang terstandar dan tepat sasaran bagi penerima manfaat.</p>
                            </div>
                            <div class="slider-image">
                                <img src="/images/sppg.jpg" alt="SPPG">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data-btn-wrapper">
                    <button class="detail-btn" onclick="window.location.href='{{ route('data') }}'">
    Lihat Detail
</button>

                </div>
            </div>
        </div>
    </section>
    <!-- Cek Gizi Section -->
    <section id="cek-gizi" class="cek-gizi-section" style="display: none;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Cek Status Gizi</h2>
                <p class="section-subtitle">Pantau kesehatan Anda dengan mudah</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mx-auto" data-aos="fade-up">
                    <div class="cek-gizi-card">
                        <div class="cek-gizi-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h3 class="cek-gizi-title">Hitung BMI</h3>
                        <p class="cek-gizi-description">Masukkan data untuk mengetahui status gizi dan rekomendasi
                            kesehatan.</p>
                        <button class="cek-gizi-button" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                            <i class="bi bi-calculator"></i> Mulai
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cek Gizi Modal -->
    <div class="modal fade" id="cekGiziModal" tabindex="-1" aria-labelledby="cekGiziModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-content-modern">
                <div class="modal-header modal-header-modern">
                    <h5 class="modal-title" id="cekGiziModalLabel">
                        <i class="bi bi-bar-chart-line text-primary"></i>
                        <span id="giziModalTitle">Form Cek Gizi</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-modern">
                    <div id="giziFormContainer">
                        <div class="text-center mb-4">
                            <div class="d-inline-block p-3 rounded-circle bg-light text-primary mb-2">
                                <i class="bi bi-calculator fs-2"></i>
                            </div>
                        </div>

                        <form class="form-gizi-modern" id="formCekGizi">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="umur">Umur (tahun)</label>
                                        <input type="number" id="umur" name="umur" required min="1" max="120"
                                            placeholder="Contoh: 25" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="jenisKelamin">JenisKelamin</label>
                                        <select id="jenisKelamin" name="jenisKelamin" required class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="tinggiBadan">Tinggi (cm)</label>
                                        <input type="number" id="tinggiBadan" name="tinggiBadan" required min="30"
                                            max="300" placeholder="Contoh: 170" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="beratBadan">Berat (kg)</label>
                                        <input type="number" id="beratBadan" name="beratBadan" required min="1"
                                            max="500" placeholder="Contoh: 65" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group-gizi">
                                        <label for="aktivitas">Tingkat Aktivitas</label>
                                        <select id="aktivitas" name="aktivitas" required class="form-select">
                                            <option value="">Pilih Aktivitas...</option>
                                            <option value="1.2">Sangat Jarang (Tidak Olahraga)</option>
                                            <option value="1.375">Jarang (Olahraga 1-3x/minggu)</option>
                                            <option value="1.55">Normal (Olahraga 3-5x/minggu)</option>
                                            <option value="1.725">Sering (Olahraga 6-7x/minggu)</option>
                                            <option value="1.9">Sangat Sering (Olahraga Berat)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-cek-gizi">
                                Hitung Gizi Saya
                            </button>
                        </form>
                    </div>

                    <div id="hasilGizi" class="hasil-gizi-container p-0 border-0 bg-transparent">
                        <div class="text-end mb-3">
                            <span class="badge bg-soft-primary text-primary py-2 px-3 rounded-pill" id="sourceBadge">
                                <i class="bi bi-patch-check me-1"></i>Sumber: Kemenkes RI
                            </span>
                        </div>

                        <div class="hasil-gizi-status text-center" id="statusGiziBox">
                            <span id="statusGizi">Normal</span>
                        </div>

                        <div class="hasil-gizi-info">
                            <div class="info-item">
                                <div class="info-label">Indeks Massa Tubuh (BMI)</div>
                                <div class="info-value" id="nilaiIMT">22.5</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Kategori</div>
                                <div class="info-value" id="kategoriIMT">Ideal</div>
                            </div>
                        </div>
                    </div>

                    <!-- Expert Quote Section -->
                    <div class="expert-quote-box mb-3">
                        <div class="d-flex">
                            <div class="quote-icon me-3">
                                <i class="bi bi-chat-quote-fill text-primary fs-3"></i>
                            </div>
                            <div>
                                <p class="expert-text mb-1" id="deskripsiGizi">Deskripsi...</p>
                                <div class="expert-source text-muted fst-italic small" id="expertSource">-
                                    Menurut Penjelasan Medis</div>
                            </div>
                        </div>
                    </div>

                    <div class="hasil-gizi-rekomendasi">
                        <h4><i class="bi bi-lightbulb me-2 text-warning"></i>Rekomendasi Ahli:</h4>
                        <ul id="listaRekomendasi">
                            <!-- JS will populate this -->
                        </ul>
                    </div>

                    <div class="text-center mt-4 pt-3 border-top">
                        <button class="btn btn-outline-primary rounded-pill px-4" onclick="resetGiziForm()">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>Cek Ulang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Layanan Disabilitas -->
    <div class="modal fade" id="disabilitasModal" tabindex="-1" aria-labelledby="disabilitasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-header modal-header-disabilitas">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="disabilitasModalLabel">
                        <i class="bi bi-person-wheelchair"></i> Layanan Inklusif MBG
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="accessibility-grid">
                        <div class="accessibility-btn" onclick="increaseFontSize()">
                            <i class="bi bi-fonts"></i>
                            <span>Perbesar Teks</span>
                        </div>
                        <div class="accessibility-btn" onclick="decreaseFontSize()">
                            <i class="bi bi-textarea-t"></i>
                            <span>Perkecil Teks</span>
                        </div>
                        <div class="accessibility-btn" id="btnGrayscale" onclick="toggleGrayscale()">
                            <i class="bi bi-circle-half"></i>
                            <span>Monokrom</span>
                        </div>
                        <div class="accessibility-btn" id="btnContrast" onclick="toggleHighContrast()">
                            <i class="bi bi-brightness-high-fill"></i>
                            <span>Kontras Tinggi</span>
                        </div>
                        <div class="accessibility-btn" id="btnUnderline" onclick="toggleUnderline()">
                            <i class="bi bi-type-underline"></i>
                            <span>Garis Bawahi Tautan</span>
                        </div>
                        <div class="accessibility-btn" id="btnCursor" onclick="toggleBigCursor()">
                            <i class="bi bi-cursor-fill"></i>
                            <span>Kursor Besar</span>
                        </div>
                        <div class="accessibility-btn" id="btnReadText" onclick="toggleReadMode()">
                            <i class="bi bi-volume-up-fill"></i>
                            <span>Baca Teks</span>
                        </div>
                        <div class="accessibility-btn" onclick="resetAccessibility()">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            <span>Reset Pengaturan</span>
                        </div>
                    </div>
                    <div class="alert alert-info border-0 rounded-4 mt-2 mb-0">
                        <small><i class="bi bi-info-circle me-1"></i> Gunakan menu di atas untuk menyesuaikan kenyamanan
                            tampilan Anda saat menjelajahi portal Makan Bergizi Gratis.</small>
                    </div>
                    <div class="d-flex justify-content-center mt-3 pt-3 border-top">
                        <button type="button" class="btn btn-login px-5 rounded-pill" data-bs-dismiss="modal">
                            Selesai & Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Regulasi Section -->
    <section id="regulasi" class="regulations-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Peraturan & Regulasi</h2>
                <p class="section-subtitle">Dokumen resmi program Makan Bergizi Gratis</p>
            </div>
            <div class="regulasi-wrapper" data-aos="fade-up">
                <div class="regulasi-sidebar">
                    <h6>Peraturan Terkait BGN</h6>
                    <ul class="regulasi-menu">
                        <li><a href="#reg-1" class="regulasi-item active" data-target="card-1">Perpres BGN 2024</a></li>
                        <li><a href="#reg-2" class="regulasi-item" data-target="card-2">SOP Program MBG</a></li>
                        <li><a href="#reg-3" class="regulasi-item" data-target="card-3">Pedoman MBG Sekolah</a></li>
                        <li><a href="#reg-4" class="regulasi-item" data-target="card-4">Permohonan SLHS</a></li>
                        <li><a href="#reg-5" class="regulasi-item" data-target="card-5">Juknis Pelaksanaan MBG</a></li>
                        <li><a href="#reg-6" class="regulasi-item" data-target="card-6">Standar Keamanan Pangan</a></li>
                    </ul><a href="{{ route('regulasi') }}" class="btn-selengkapnya-regulasi"> Selengkapnya</a>

                </div>
                <div class="regulasi-content">
                    <!-- Card 1 -->
                    <div class="regulasi-card-compact" id="card-1">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Perpres</span>
                                <span class="reg_badge badge-status">Berlaku</span>
                            </div>
                            <h4>Peraturan Presiden Nomor 83 Tahun 2024</h4>
                            <div class="regulasi-card-meta"> <i class="bi bi-calendar3 me-1"></i> Ditetapkan: 2024
                            </div>
                            <p class="regulasi-card-desc">Instrumen hukum utama yang melandasi pembentukan Badan Gizi
                                Nasional sebagai motor penggerak perbaikan gizi nasional.</p>

                            <ul class="regulasi-points">
                                <li>Pembentukan struktur organisasi Badan Gizi Nasional.</li>
                                <li>Penetapan tugas dan fungsi koordinasi lintas kementerian.</li>
                                <li>Landasan hukum pendanaan program MBG secara nasional.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle" title="Download PDF"> <i
                                        class="bi bi-file-earmark-pdf"></i> Download PDF</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="regulasi-card-compact" id="card-2" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">SOP</span>
                                <span class="reg_badge badge-status">Berlaku</span>
                            </div>
                            <h4>SOP Pelaksanaan Program MBG</h4>
                            <div class="regulasi-card-meta"> <i class="bi bi-calendar3 me-1"></i> Versi 1.0 - 2024
                            </div>
                            <p class="regulasi-card-desc">Standar operasional baku yang mengatur dari proses pengadaan
                                bahan hingga distribusi makanan ke penerima.</p>

                            <ul class="regulasi-points">
                                <li>Prosedur kebersihan dan sanitasi dapur.</li>
                                <li>Mekanisme distribusi tepat waktu.</li>
                                <li>Sistem pelaporan dan evaluasi harian.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle"> <i class="bi bi-file-earmark-pdf"></i>
                                    Download PDF</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="regulasi-card-compact" id="card-3" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-book-half"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Pedoman</span>
                                <span class="reg_badge badge-status">Aktif</span>
                            </div>
                            <h4>Pedoman Gizi Sekolah (MBG Sekolah)</h4>
                            <div class="regulasi-card-meta"> <i class="bi bi-calendar3 me-1"></i> Edisi 2024 </div>
                            <p class="regulasi-card-desc">Buku paduan komprehensif untuk sekolah dalam mengelola dan
                                mengawasi jalannya program MBG.</p>

                            <ul class="regulasi-points">
                                <li>Kriteria menu seimbang untuk anak sekolah.</li>
                                <li>Manajemen kantin dan ruang makan sekolah.</li>
                                <li>Edukasi gizi bagi siswa dan orang tua.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle"> <i class="bi bi-file-earmark-pdf"></i>
                                    Download PDF</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="regulasi-card-compact" id="card-4" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Formulir</span>
                                <span class="reg_badge badge-status">Wajib</span>
                            </div>
                            <h4>Permohonan SLHS (Higiene Sanitasi)</h4>
                            <div class="regulasi-card-meta"> <i class="bi bi-calendar3 me-1"></i> Updated 2024 </div>
                            <p class="regulasi-card-desc">Formulir pendaftaran untuk memastikan fasilitas dapur penyedia
                                jasa makanan memenuhi standar sanitasi nasional.</p>

                            <ul class="regulasi-points">
                                <li>Kelengkapan dokumen administrasi penyedia.</li>
                                <li>Checklist standar kelayakan dapur umum.</li>
                                <li>Alur verifikasi tim pemeriksa kesehatan.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle"> <i class="bi bi-file-earmark-pdf"></i>
                                    Download PDF</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="regulasi-card-compact" id="card-5" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Juknis</span>
                                <span class="reg_badge badge-status">Aktif</span>
                            </div>

                            <h4>Petunjuk Teknis Pelaksanaan Program MBG</h4>
                            <div class="regulasi-card-meta">
                                <i class="bi bi-calendar3 me-1"></i> Tahun 2024
                            </div>

                            <p class="regulasi-card-desc">
                                Dokumen teknis sebagai panduan operasional pelaksanaan MBG di lapangan
                                bagi sekolah dan mitra penyedia makanan.
                            </p>

                            <ul class="regulasi-points">
                                <li>Alur pelaksanaan MBG dari persiapan hingga distribusi.</li>
                                <li>Peran sekolah, penyedia, dan pemerintah daerah.</li>
                                <li>Standar pelaporan dan monitoring kegiatan.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle">
                                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="regulasi-card-compact" id="card-6" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>

                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Standar</span>
                                <span class="reg_badge badge-status">Wajib</span>
                            </div>

                            <h4>Standar Keamanan & Mutu Pangan MBG</h4>
                            <div class="regulasi-card-meta">
                                <i class="bi bi-calendar3 me-1"></i> Berlaku Nasional
                            </div>

                            <p class="regulasi-card-desc">
                                Standar wajib yang mengatur keamanan pangan untuk menjamin
                                makanan MBG aman, higienis, dan layak konsumsi.
                            </p>

                            <ul class="regulasi-points">
                                <li>Standar bahan baku dan penyimpanan makanan.</li>
                                <li>Prosedur pengolahan makanan yang aman.</li>
                                <li>Pencegahan kontaminasi dan keracunan pangan.</li>
                            </ul>

                            <div class="regulasi-download-wrapper">
                                <a href="#" class="btn-download-regulasi-circle">
                                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="peta-mbg" class="map-section">
        <div class="map-card-container">
            <div class="map-info-card">
                <div class="map-info-content">
                    <h3 class="map-info-title">Portal Geospatial</h3>
                    <p class="map-info-description">Temukan data spasial terkait Program Pemenuhan Gizi, mulai dari
                        persebaran lokasi hingga informasi capaian di setiap wilayah. Halaman ini mengarahkan Anda ke
                        portal resmi gina.bgn.go.id yang menyajikan informasi geospasial terkini untuk mendukung
                        pemerataan gizi nasional.</p>
                    <button class="btn-view-map" data-bs-toggle="modal" data-bs-target="#mapsModalCustom">
                        Buka Peta
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Maps Modal -->
    <div class="modal fade modal-maps-custom" id="mapsModalCustom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-content-modern">
                <div class="modal-header modal-header-modern">
                    <h5 class="modal-title">
                        Peta Interaktif Sebaran SPPG
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-modern">
                    <div class="map-container-modal"
                        style="width: 100%; height: 400px; border-radius: 15px; overflow: hidden; margin-bottom: 20px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.78959492354284!3d-6.186740766349471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sBogor%2C%20West%20Java!5e0!3m2!1sen%2sus!4v1234567890"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="map-controls-bottom">
                        <div class="map-control-group" style="margin-bottom: 12px;">
                            <label style="font-weight: 600; margin-bottom: 6px; display: block;"> Cari Lokasi</label>
                            <input type="text" placeholder="Masukkan nama kecamatan atau sekolah..."
                                style="width: 100%; padding: 10px; border: 2px solid #e0e0e0; border-radius: 10px;">
                        </div>
                        <div class="map-control-group" id="provinsiCombo">
                            <label class="map-label">Filter Provinsi</label>

                            <input type="text" class="map-combobox" placeholder="Ketik atau pilih provinsi..."
                                autocomplete="off">

                            <div class="combo-dropdown">
                                <div class="combo-option">Semua Provinsi</div>
                                <div class="combo-option">DKI Jakarta</div>
                                <div class="combo-option">Jawa Barat</div>
                                <div class="combo-option">Jawa Tengah</div>
                                <div class="combo-option">Jawa Timur</div>
                                <div class="combo-option">Banten</div>
                            </div>
                        </div>
                        <script>
                            const combo = document.getElementById('provinsiCombo');
                            const input = combo.querySelector('.map-combobox');
                            const dropdown = combo.querySelector('.combo-dropdown');
                            const options = combo.querySelectorAll('.combo-option');

                            /* buka dropdown */
                            input.addEventListener('focus', () => {
                                dropdown.classList.add('show');
                            });

                            /* filter */
                            input.addEventListener('input', () => {
                                const val = input.value.toLowerCase();
                                options.forEach(opt => {
                                    opt.style.display = opt.textContent.toLowerCase().includes(val)
                                        ? 'block'
                                        : 'none';
                                });
                            });

                            /* klik option */
                            options.forEach(opt => {
                                opt.addEventListener('click', () => {
                                    input.value = opt.textContent;
                                    dropdown.classList.remove('show');
                                });
                            });

                            /* 🔥 INI KUNCINYA — KLIK LUAR = TUTUP */
                            document.addEventListener('mousedown', (e) => {
                                if (!combo.contains(e.target)) {
                                    dropdown.classList.remove('show');
                                }
                            });

                            /* optional: pas input blur */
                            input.addEventListener('blur', () => {
                                setTimeout(() => {
                                    dropdown.classList.remove('show');
                                }, 150);
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <section id="faq" class="regulations-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Pertanyaan Seputar MBG</h2>
                <p class="section-subtitle">Informasi penting tentang Program Makan Bergizi Gratis</p>
            </div>

            <div class="regulasi-wrapper" data-aos="fade-up">
                <div class="regulasi-sidebar">
                    <h6>Pertanyaan Umum</h6>
                    <ul class="regulasi-menu">
                        <li><a href="#faq-1" class="regulasi-item active" data-target="faq-card-1">Apakah makanan MBG
                                halal?</a></li>
                        <li><a href="#faq-2" class="regulasi-item" data-target="faq-card-2">Apakah makanan MBG aman?</a>
                        </li>
                        <li><a href="#faq-3" class="regulasi-item" data-target="faq-card-3">Siapa saja penerima MBG?</a>
                        </li>
                        <li><a href="#faq-4" class="regulasi-item" data-target="faq-card-4">Bagaimana proses
                                pengawasan?</a>
                        </li>
                        <button id="faqBtn" class="btn-faq">
                             Selengkapnya
                        </button>


                    </ul>
                </div>

                <div class="regulasi-content">
                    <!-- FAQ 1 -->
                    <div class="regulasi-card-compact" id="faq-card-1">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-question-circle-fill"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Status Halal</span>
                                <span class="reg_badge badge-status">Terjamin</span>
                            </div>
                            <h4>Apakah makanan Program MBG halal?</h4>
                            <p class="regulasi-card-desc">Keamanan spiritual penerima adalah prioritas kami. Seluruh
                                rantai pasokan bahan makanan hingga pengolahan dipastikan memenuhi standar kehalalan.
                            </p>

                            <ul class="regulasi-points">
                                <li>Bahan baku bersertifikat halal MUI/Kemenag.</li>
                                <li>Dapur Satuan Pelayanan (SP) menerapkan prinsip higiene sanitasi halal.</li>
                                <li>Pengawasan berkala oleh tim audit mutu eksternal.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="regulasi-card-compact" id="faq-card-2" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Keamanan Pangan</span>
                                <span class="reg_badge badge-status">Sangat Ketat</span>
                            </div>
                            <h4>Seberapa aman kualitas makanan MBG?</h4>
                            <p class="regulasi-card-desc">Kami menerapkan sistem kontrol kualitas yang ketat untuk
                                memastikan setiap porsi aman, bersih, dan bergizi tinggi.</p>

                            <ul class="regulasi-points">
                                <li>Pemeriksaan rutin oleh BPOM dan Dinas Kesehatan.</li>
                                <li>Laboratorium mini di setiap Satuan Pelayanan (SP).</li>
                                <li>Sertifikasi Laik Higiene Sanitasi (SLHS) wajib bagi mitra.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="regulasi-card-compact" id="faq-card-3" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Penerima Manfaat</span>
                                <span class="reg_badge badge-status">Targeted</span>
                            </div>
                            <h4>Siapa saja yang berhak menerima MBG?</h4>
                            <p class="regulasi-card-desc">Program ini dirancang menyasar kelompok rentan dan strategis
                                untuk mendukung pertumbuhan generasi emas Indonesia.</p>

                            <ul class="regulasi-points">
                                <li>Siswa sekolah (PAUD, SD, SMP, SMA).</li>
                                <li>Santri di lingkungan pesantren.</li>
                                <li>Ibu hamil dan ibu menyusui.</li>
                                <li>Anak balita untuk pencegahan stunting.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="regulasi-card-compact" id="faq-card-4" style="display: none;">
                        <div class="regulasi-card-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <div class="regulasi-card-main">
                            <div class="regulasi-badges">
                                <span class="reg_badge badge-type">Pengawasan</span>
                                <span class="reg_badge badge-status">Transparan</span>
                            </div>
                            <h4>Bagaimana proses pengawasan program?</h4>
                            <p class="regulasi-card-desc">Masyarakat berpartisipasi penuh dalam mengawasi jalannya
                                program melalui sistem pelaporan digital yang transparan.</p>

                            <ul class="regulasi-points">
                                <li>Aplikasi monitoring real-time berbasis geospasial.</li>
                                <li>Pelaporan langsung melalui kanal pengaduan resmi.</li>
                                <li>Verifikasi lapangan oleh pendamping gizi nasional.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Bar Section -->
    <section class="logo-bar">

       <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kanan" class="batik-img batik-right">
<img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kiri" class="batik-img batik-left">


        <div class="logo-title">
            Berkolaborasi dan Bersinergi Bersama
        </div>

       <div class="logo-container">
    <div class="logo-item">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo 1">
    </div>
    <div class="logo-item">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo 2">
    </div>
    <div class="logo-item">
        <img src="{{ asset('images/logo3.png') }}" alt="Logo 3">
    </div>
    <div class="logo-item">
        <img src="{{ asset('images/logo4.png') }}" alt="Logo 4">
    </div>
</div>

    </section>

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container footer-content">
            <div class="row">

                <!-- KIRI : BRAND + ALAMAT -->
                <div class="col-lg-4 mb-4">
                    <h3 class="footer-brand">Makan Bergizi Gratis</h3>
                    <p class="footer-description">
                        Program nasional untuk Indonesia sehat dan bebas stunting.
                        Mewujudkan generasi emas yang cerdas dan produktif melalui nutrisi terbaik.
                    </p>

                    <p class="footer-description">
                    <h3 class="footer-brand">Alamat</h3>
                    <i class="bi bi-geo-alt"></i>
                    Jl. Ir. H. Juanda No.10
                    Kecamatan Bogor Tengah
                    Kota Bogor, Jawa Barat 16121
                    Indonesia
                    </p>

                    <div class="social-icons-modern">
                        <a href="#" class="social-icon-modern"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- KANAN : NEWSLETTER -->
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Newsletter</h5>
                    <p class="footer-description">
                        Dapatkan informasi terbaru tentang program dan tips gizi seimbang
                        langsung di email Anda.
                    </p>

                    <form class="newsletter-form mb-3">
                        <input type="email" class="newsletter-input" placeholder="Email Anda">
                        <button type="submit" class="newsletter-button">
                            <i class="bi bi-send"></i>
                        </button>
                    </form>

                    <small>
                        Hotline: 1500-234<br>
                        Email: info@makanbergizigratis.go.id
                    </small>
                </div>

                <!-- TENGAH : VISITOR -->
                <div class="col-lg-4 mb-8 " style="margin-top:-25px">

                    <div class="footer-stats-widget">
                        <div class="stat-item-w">
                            <div><i class="bi bi-calendar2-check-fill"></i> Hari Ini</div>
                            <span class="stat-value-w" id="stat-today">1,245</span>
                        </div>

                        <div class="stat-item-w">
                            <div><i class="bi bi-people-fill"></i> Total</div>
                            <span class="stat-value-w" id="stat-total">856,432</span>
                        </div>

                        <div class="stat-item-w">
                            <div><i class="bi bi-broadcast text-success"></i> Online</div>
                            <span class="stat-value-w" id="stat-online">243</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <p class="mb-0 mt-3">&copy; Pemerintah Kota Bogor. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Buttons - Radial Menu -->
    <div class="fab-container" id="radialFab">
        <button class="fab-main" onclick="toggleFab()">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="fab-items">
            <button class="fab-item item-1" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                <i class="bi bi-heart-pulse"></i>
                <span class="fab-label-radial">Cek Gizi</span>
            </button>
            <button class="fab-item item-2" data-bs-toggle="modal" data-bs-target="#disabilitasModal">
                <i class="bi bi-person-wheelchair"></i>
                <span class="fab-label-radial">Disabilitas</span>
            </button>
            <a href="#statistik" class="fab-item item-3">
                <i class="bi bi-building"></i>
                <span class="fab-label-radial">Data Sekolah</span>
            </a>
            <a href="https://wa.me/6285175220149" class="fab-item item-4" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-megaphone"></i>
                <span class="fab-label-radial">Lapor MBG</span>
            </a>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="js/pages/mbg.js"></script>
</body>

</html>