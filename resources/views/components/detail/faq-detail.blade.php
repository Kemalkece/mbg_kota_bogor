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

    <nav class="navbar-detail">
        <div class="container-xl d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" width="40">
                <div>
                    <div class="brand-label">Program Nasional</div>
                    <div class="brand-name">Makan Bergizi Gratis</div>
                </div>
            </div>

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

        <div class="accordion faq-accordion" id="faqExample">
            @forelse($faqs as $index => $item)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq-{{ $item->id }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $item->pertanyaan }}
                    </button>
                </h2>
                <div id="faq-{{ $item->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqExample">
                    <div class="accordion-body">
                        {!! nl2br(e($item->jawaban)) !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <p class="text-muted">Belum ada pertanyaan yang tersedia.</p>
            </div>
            @endforelse
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