<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['beritas']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['beritas']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<section id="beranda" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($beritas->isEmpty()): ?>
            
            <div class="col-lg-6">
                <div class="hero-carousel-container" style="display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);position:relative;overflow:hidden;">
                    <div style="position:absolute;width:300px;height:300px;background:radial-gradient(circle,rgba(209,176,108,0.12) 0%,transparent 70%);border-radius:50%;top:-50px;left:-50px;pointer-events:none;"></div>
                    <div style="position:absolute;width:200px;height:200px;background:radial-gradient(circle,rgba(30,144,255,0.08) 0%,transparent 70%);border-radius:50%;bottom:-30px;right:-30px;pointer-events:none;"></div>
                    <div style="text-align:center;position:relative;z-index:2;padding:40px 20px;">
                        <div style="width:110px;height:110px;border-radius:24px;background:linear-gradient(135deg,rgba(209,176,108,0.15),rgba(184,150,79,0.08));border:1px solid rgba(209,176,108,0.25);display:flex;align-items:center;justify-content:center;margin:0 auto 24px;box-shadow:0 0 40px rgba(209,176,108,0.08);">
                            <i class="bi bi-newspaper" style="font-size:3rem;color:#D1B06C;opacity:0.8;"></i>
                        </div>
                        <div style="display:inline-block;padding:6px 16px;border-radius:999px;background:rgba(209,176,108,0.12);border:1px solid rgba(209,176,108,0.25);color:#D1B06C;font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;">
                            Warta Segera Hadir
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Belum Ada<br>Berita Terbaru
                    </h1>
                    <p class="hero-description">
                        Berita dan informasi terbaru seputar program MBG Kota Bogor akan segera hadir untuk Anda.
                    </p>
                    <div class="hero-buttons">
                        <a href="#tentang" class="btn-hero-primary" style="text-decoration:none;">
                            Tentang Program
                        </a>
                        <a href="#sasaran" class="btn-hero-secondary" style="text-decoration:none;">
                            Sasaran MBG
                        </a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <?php
            $firstBerita = $beritas->first();
            ?>

            <!-- CAROUSEL -->
            <div class="col-lg-6">
                <div class="hero-carousel-container">
                    <div class="hero-carousel" id="heroCarousel">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-slide"
                            data-title="<?php echo e($berita->judul); ?>"
                            data-desc="<?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->deskripsi), 150)); ?>"
                            data-url="<?php echo e(route('berita.show', $berita->id)); ?>">
                            <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>"
                                alt="<?php echo e($berita->judul); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <button class="carousel-arrow prev" onclick="moveCarousel(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="carousel-arrow next" onclick="moveCarousel(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="carousel-dots" id="carouselDots"></div>

                </div>
            </div>

            <!-- KONTEN -->
            <!-- KONTEN -->
            <div class="col-lg-6">
                <div class="hero-content" id="heroContent">
                    <h1 class="hero-title" id="newsTitle">
                        <?php echo e($firstBerita->judul ?? ''); ?>

                    </h1>

                    <p class="hero-description" id="newsDesc">
                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($firstBerita->deskripsi ?? ''), 150)); ?>

                    </p>

                    <a href="<?php echo e(route('berita.show', $firstBerita->id ?? 0)); ?>"
                        class="btn-hero-primary"
                        id="newsLink">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/hero.blade.php ENDPATH**/ ?>