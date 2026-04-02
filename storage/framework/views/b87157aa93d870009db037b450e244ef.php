<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Makan Bergizi Gratis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/mbg.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/gabung.css')); ?>">
    <style nonce="<?php echo e(Vite::cspNonce()); ?>">
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

            <a href="<?php echo e(route('beranda')); ?>" class="d-flex align-items-center gap-2 text-decoration-none">
                <img src="<?php echo e(asset('images/logo.png')); ?>" width="40">
                <div>
                    <div class="brand-label">Program Nasional</div>
                    <div class="brand-name">Makan Bergizi Gratis</div>
                </div>
            </a>

            <a href="<?php echo e(route('beranda')); ?>" class="btn-back">
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

            
            <div class="regulasi-sidebar">
                <h6>Pertanyaan Umum</h6>

                <ul class="regulasi-menu">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#"
                            class="regulasi-item <?php echo e($index == 0 ? 'active' : ''); ?>"
                            data-target="faq-card-<?php echo e($faq->id); ?>">
                            <?php echo e($faq->pertanyaan); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>

            
            <div class="regulasi-content" id="faqContent">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="regulasi-card-compact faq-card"
                    id="faq-card-<?php echo e($faq->id); ?>"
                    data-question="<?php echo e($faq->pertanyaan); ?>"
                    style="display: <?php echo e($index == 0 ? 'flex' : 'none'); ?>;">

                    <div class="regulasi-card-icon">
                        <i class="bi bi-question-circle-fill"></i>
                    </div>

                    <div class="regulasi-card-main">
                        <h4><?php echo e($faq->pertanyaan); ?></h4>

                        <div class="regulasi-card-desc">
                            <?php echo nl2br(e($faq->jawaban)); ?>

                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faq->penjelasan): ?>
                        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                            <h6 style="font-weight: 600; color: #133056; margin-bottom: 16px; font-size: 1.1rem;">Poin Penjelasan</h6>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <?php
                                $poin = array_filter(array_map('trim', explode("\n", $faq->penjelasan)));
                                $poin = array_slice($poin, 0, 6);
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $poin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px;">
                                    <span style="color: #4ade80; font-size: 1.5rem; font-weight: bold; margin-top: -6px; flex-shrink: 0;">✓</span>
                                    <span style="color: #636e72; font-size: 1rem; line-height: 1.5;"><?php echo e($point); ?></span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="regulasi-card-compact text-center">
                    <div>
                        <h4>Belum ada FAQ</h4>
                        <p>Silakan tambahkan melalui Admin Panel.</p>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- No Results Message -->
                <div id="faqNoResults" class="text-center py-5" style="display: none; padding: 60px 20px !important;">
                    <div class="mb-4">
                        <i class="bi bi-search text-muted" style="font-size: 5rem; opacity: 0.5;"></i>
                    </div>
                    <h3 class="fw-bold text-secondary mb-3" style="font-size: 1.8rem;">Pertanyaan tidak ditemukan</h3>
                    <p class="text-muted" style="font-size: 1rem; max-width: 500px; margin: 0 auto;">Coba kata kunci lain atau periksa kembali ejaan Anda.</p>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" nonce="<?php echo e(Vite::cspNonce()); ?>"></script>
    <script nonce="<?php echo e(Vite::cspNonce()); ?>">
        document.addEventListener('DOMContentLoaded', function() {
            const faqSearch = document.getElementById('faqSearch');
            const faqItems = document.querySelectorAll('.regulasi-item');
            const faqNoResults = document.getElementById('faqNoResults');
            const faqCards = document.querySelectorAll('.faq-card');

            function doFaqFilter() {
                const query = faqSearch.value.toLowerCase().trim();
                let visibleSidebarCount = 0;
                let firstVisibleItem = null;

                // Filter sidebar items
                faqItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    
                    if (query === '' || text.includes(query)) {
                        item.style.display = 'block';
                        visibleSidebarCount++;
                        if (firstVisibleItem === null) {
                            firstVisibleItem = item;
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Sembunyikan semua FAQ cards dulu
                faqCards.forEach(card => card.style.display = 'none');

                if (visibleSidebarCount === 0) {
                    // Tidak ada item yang match - tampilkan no results message
                    if (faqNoResults) {
                        faqNoResults.style.display = 'block';
                    }
                } else {
                    // Ada item yang match
                    if (faqNoResults) {
                        faqNoResults.style.display = 'none';
                    }
                    
                    // Auto-select first visible item dan tampilkan cardnya
                    if (firstVisibleItem) {
                        faqItems.forEach(el => el.classList.remove('active'));
                        firstVisibleItem.classList.add('active');
                        
                        const cardId = firstVisibleItem.dataset.target;
                        if (cardId) {
                            const targetCard = document.getElementById(cardId);
                            if (targetCard) {
                                targetCard.style.display = 'flex';
                            }
                        }
                    }
                }
            }

            // Search event
            if (faqSearch) {
                faqSearch.addEventListener('input', doFaqFilter);
            }

            // Sidebar click event
            faqItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();

                    faqItems.forEach(el => el.classList.remove('active'));
                    this.classList.add('active');

                    faqCards.forEach(card => card.style.display = 'none');
                    
                    const cardId = this.dataset.target;
                    const targetCard = document.getElementById(cardId);
                    if (targetCard) {
                        targetCard.style.display = 'flex';
                    }

                    if (faqNoResults) {
                        faqNoResults.style.display = 'none';
                    }
                    
                    faqSearch.value = '';
                });
            });
        });
    </script>

</body>

</html><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/detail/detail_faq.blade.php ENDPATH**/ ?>