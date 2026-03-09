<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['kolaborasi']));

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

foreach (array_filter((['kolaborasi']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<section class="logo-bar py-12 relative overflow-hidden flex flex-col items-center"
    style="background:#071E49;">

    <img src="<?php echo e(asset('images/rubo_mencari.png')); ?>" alt="Batik kanan" class="batik-img batik-right absolute -right-10 top-1/2 -translate-y-1/2 h-40 opacity-10 pointer-events-none">
    <img src="<?php echo e(asset('images/rubo_mencari.png')); ?>" alt="Batik kiri" class="batik-img batik-left absolute -left-10 top-1/2 -translate-y-1/2 h-40 opacity-10 scale-x-[-1] pointer-events-none">

    <div class="container mx-auto px-6 relative z-10 w-full">
        <div class="logo-title text-center text-gray-500 text-xs md:text-sm font-bold uppercase tracking-widest mb-10">
            Berkolaborasi dan Bersinergi Bersama
        </div>

        <div class="logo-container flex flex-wrap justify-center items-center gap-8 md:gap-16 w-full">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kolaborasi->isEmpty()): ?>
            <div style="width:100%;text-align:center;padding:20px 0;">
                <div style="display:flex;align-items:center;justify-content:center;gap:16px;flex-wrap:wrap;">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = range(1,5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="width:90px;height:40px;border-radius:10px;background:rgba(255,255,255,0.05);border:1px dashed rgba(255,255,255,0.1);"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <p style="color:rgba(255,255,255,0.25);font-size:12px;margin-top:20px;letter-spacing:0.1em;text-transform:uppercase;font-weight:600;">
                    Partner logo akan ditampilkan di sini
                </p>
            </div>
            <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $kolaborasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="logo-item grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-300 cursor-pointer logo-tooltip-wrapper">
                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->nama_instansi); ?>" class="h-10 md:h-14 w-auto object-contain">
                <span class="logo-tooltip-text"><?php echo e($item->nama_instansi); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/logo_bar.blade.php ENDPATH**/ ?>