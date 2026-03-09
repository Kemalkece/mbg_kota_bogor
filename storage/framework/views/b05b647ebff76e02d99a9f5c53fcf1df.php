<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['tentang']));

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

foreach (array_filter((['tentang']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<section id="tentang" class="about-section">
    <div class="container">

        <!-- HEADER -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="text-mbg">
                <?php echo e($tentang?->judul ?? 'MBG Kota Bogor'); ?>

            </h2>
        </div>

        <!-- CONTENT -->
        <div class="about-wrapper" data-aos="fade-up">

            <!-- ILUSTRASI (STATIS / TETAP) -->
            <div class="about-illustration-side">
                <div class="about-dino-container">
                    <div class="about-deco-circle-bg"></div>
                    <div class="about-deco-dots"></div>
                    <div class="about-deco-yellow-blob"></div>
                    <div class="about-dino-image">
                        <img src="<?php echo e(asset('images/animasi.gif')); ?>" alt="Rubo">
                    </div>
                </div>
            </div>

            <!-- TEKS KANAN -->
            <div class="about-content-side">

                <h3 class="about-title">
                    <?php echo e($tentang?->judul ?? 'Makan Bergizi Gratis (MBG)'); ?>

                </h3>

                <p class="about-description">
                    <?php echo e($tentang?->deskripsi_1 ?? 'Program Makan Bergizi Gratis (MBG) adalah inisiatif pemerintah untuk memastikan setiap warga Kota Bogor mendapatkan asupan gizi yang cukup dan berkualitas setiap harinya.'); ?>

                </p>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tentang?->deskripsi_2): ?>
                <p class="about-description">
                    <?php echo e($tentang->deskripsi_2); ?>

                </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <ul class="about-list">
                    <?php
                    $listItems = [];

                    if($tentang && $tentang->list) {
                    if(is_array($tentang->list)) {
                    $listItems = $tentang->list;
                    } else {
                    $decoded = json_decode($tentang->list, true);
                    if(is_array($decoded)) {
                    $listItems = $decoded;
                    } else {
                    $listItems = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $tentang->list)));
                    }
                    }
                    }
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($listItems)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $listItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                    <li>Mendukung pemenuhan gizi seluruh lapisan masyarakat</li>
                    <li>Distribusi makanan bergizi kepada anak usia sekolah</li>
                    <li>Penguatan program gizi ibu hamil dan menyusui</li>
                    <li>Kemitraan bersama SPPG dan mitra lokal Kota Bogor</li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>

            </div>

        </div>
    </div>
</section><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/tentang.blade.php ENDPATH**/ ?>