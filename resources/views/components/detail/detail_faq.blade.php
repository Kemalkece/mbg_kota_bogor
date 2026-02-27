<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Makan Bergizi Gratis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/pages/mbg.css') }}">
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

    <nav class="navbar-detail">
        <div class="container-xl d-flex justify-content-between align-items-center">

            <a href="{{ route('beranda') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" width="40">
                <div>
                    <div class="brand-label">Program Nasional</div>
                    <div class="brand-name">Makan Bergizi Gratis</div>
                </div>
            </a>

            <a href="{{ route('beranda') }}" class="btn-back">
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
<div class="regulasi-wrapper">

    {{-- SIDEBAR --}}
    <div class="regulasi-sidebar">
        <h6>Pertanyaan Umum</h6>

        <ul class="regulasi-menu">
            @foreach($faqs as $index => $faq)
            <li>
                <a href="#"
                   class="regulasi-item {{ $index == 0 ? 'active' : '' }}"
                   data-target="faq-card-{{ $faq->id }}">
                    {{ $faq->pertanyaan }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- CONTENT --}}
    <div class="regulasi-content">
        @forelse($faqs as $index => $faq)
        <div class="regulasi-card-compact"
             id="faq-card-{{ $faq->id }}"
             style="display: {{ $index == 0 ? 'flex' : 'none' }};">

            <div class="regulasi-card-icon">
                <i class="bi bi-question-circle-fill"></i>
            </div>

            <div class="regulasi-card-main">
                <h4>{{ $faq->pertanyaan }}</h4>

                <div class="regulasi-card-desc">
                    {!! nl2br(e($faq->jawaban)) !!}
                </div>

                @if($faq->penjelasan)
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                    <h6 style="font-weight: 600; color: #133056; margin-bottom: 16px; font-size: 1.1rem;">Poin Penjelasan</h6>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @php
                            $poin = array_filter(array_map('trim', explode("\n", $faq->penjelasan)));
                            $poin = array_slice($poin, 0, 6);
                        @endphp
                        @foreach($poin as $point)
                        <li style="margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px;">
                            <span style="color: #4ade80; font-size: 1.5rem; font-weight: bold; margin-top: -6px; flex-shrink: 0;">✓</span>
                            <span style="color: #636e72; font-size: 1rem; line-height: 1.5;">{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

        </div>
        @empty
        <div class="regulasi-card-compact text-center">
            <div>
                <h4>Belum ada FAQ</h4>
                <p>Silakan tambahkan melalui Admin Panel.</p>
            </div>
        </div>
        @endforelse
    </div>

</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.regulasi-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        // hapus active semua
        document.querySelectorAll('.regulasi-item')
            .forEach(el => el.classList.remove('active'));

        this.classList.add('active');

        // sembunyikan semua card
        document.querySelectorAll('.regulasi-card-compact')
            .forEach(card => card.style.display = 'none');

        // tampilkan card yang dipilih
        const targetId = this.dataset.target;
        document.getElementById(targetId).style.display = 'flex';
    });
});
</script>

</body>

</html>