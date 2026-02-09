<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Makan Bergizi Gratis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/pages/gabung.css') }}">
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Inter', sans-serif;
        }

        .header-section {
            background: linear-gradient(135deg, #0F2347 0%, #1a365d 100%);
            color: white;
            padding: 80px 0;
            border-radius: 0 0 50px 50px;
            text-align: center;

             display: flex;
    align-items: center;     
    justify-content: center;  
    flex-direction: column;
        }
        .header-section .container {
    margin-top: 70px; 
}


        .faq-accordion .accordion-item {
            border-radius: 12px;
            border: 1px solid #eee;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .faq-accordion .accordion-button {
            font-weight: 600;
            color: #133056;
            background: #fff;
        }

        .faq-accordion .accordion-button:not(.collapsed) {
            background: #D1B06C;
            color: white;
        }

        .faq-accordion .accordion-body {
            background: #fafafa;
        }
                .navbar-toggler {
            border: 1px solid #133056;
        }
       .btn-masuk {
            background-color: #fff;
            color: #D1B06C;
            border: 1px solid #D1B06C;
            padding: 6px 16px;
            border-radius: 8px;
        }

        .btn-masuk:hover {
            background-color: #ffffff;
            color: #D1B06C;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container-xl">
            <a class="navbar-brand" href="dashboard_mbg.html">
                <img src="{{ asset('images/logo.png') }}" alt="Kota Bogor">
                <div class="navbar-brand-text">
                    <span class="brand-label">Program Nasional</span>
                    <span class="brand-name">Makan Bergizi Gratis</span>
                </div>
            </a>
            <a href="{{ route('home') }}" class="btn-back">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>

        </div>
    </nav>

<!-- Header -->
<div class="header-section text-center">
    <div class="container">
        <h1 class="fw-bold">FAQ</h1>
        <p class="text-white-50">
            Pertanyaan yang sering ditanyakan seputar program MBG
        </p>
    </div>
</div>

<!-- FAQ -->
<div class="container py-5">

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="faqSearch" class="form-control" placeholder="Cari pertanyaan atau jawaban..." style="border-radius: 8px; border: 1px solid #D1B06C; padding: 10px;">
    </div>

    <div class="accordion faq-accordion" id="faqExample">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Apa itu Program Makan Bergizi Gratis?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Program nasional untuk menyediakan makanan bergizi bagi siswa sekolah guna meningkatkan kesehatan dan kualitas belajar.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Siapa saja penerima manfaat program?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Siswa sekolah, pesantren, dan kelompok masyarakat yang ditetapkan pemerintah.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Bagaimana cara menjadi mitra dapur umum?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Mitra dapat mendaftar melalui formulir kerjasama yang tersedia di halaman regulasi & dokumen.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Dimana saya bisa mengunduh dokumen resmi?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Dokumen resmi tersedia pada halaman Pusat Regulasi & Dokumen.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Bagaimana cara mendaftar sebagai penerima manfaat?
                </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Pendaftaran dilakukan melalui sekolah atau lembaga pendidikan. Siswa yang memenuhi kriteria akan didaftarkan oleh pihak sekolah ke sistem MBG. Pastikan data siswa lengkap dan akurat untuk proses verifikasi.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq6">
                    Apa saja manfaat dari program ini bagi siswa?
                </button>
            </h2>
            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Program ini memberikan makanan bergizi gratis yang membantu meningkatkan nutrisi, kesehatan fisik, dan kemampuan belajar siswa. Selain itu, mendukung pencegahan stunting dan meningkatkan produktivitas generasi muda.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq7">
                    Bagaimana proses distribusi makanan?
                </button>
            </h2>
            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Makanan disiapkan oleh mitra dapur umum yang telah terverifikasi dan didistribusikan ke sekolah melalui sistem logistik yang terkoordinasi. Distribusi dilakukan secara rutin sesuai jadwal, dengan pengawasan ketat untuk memastikan kualitas dan keamanan.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq8">
                    Siapa yang mengelola program MBG?
                </button>
            </h2>
            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Program ini dikelola oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek) bekerja sama dengan kementerian terkait seperti Kementerian Kesehatan dan Kementerian Sosial, serta pemerintah daerah.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq9">
                    Bagaimana cara menghubungi dukungan jika ada masalah?
                </button>
            </h2>
            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqExample">
                <div class="accordion-body">
                    Untuk pertanyaan atau keluhan, hubungi hotline MBG di nomor 0800-XXXX-XXXX atau email ke support@mbg.go.id. Tim dukungan siap membantu dengan informasi lebih lanjut dan penyelesaian masalah.
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('faqSearch').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll('.accordion-item');
        items.forEach(item => {
            const question = item.querySelector('.accordion-button').textContent.toLowerCase();
            const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
            if (question.includes(query) || answer.includes(query)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
