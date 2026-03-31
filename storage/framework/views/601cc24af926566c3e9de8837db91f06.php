<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['dataPenyalurans', 'statsData' => \App\Http\Controllers\DataPenyaluranController::getDashboardStats()]));

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

foreach (array_filter((['dataPenyalurans', 'statsData' => \App\Http\Controllers\DataPenyaluranController::getDashboardStats()]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="data" style="padding:60px 0;position:relative;z-index:5;background:#F8F9FC;">
    <div class="container">

        <div class="data-header" style="text-align:center;margin-bottom:40px;">
            <h2 style="font-weight:900;color:#071E49;">
                Data Penyaluran Program MBG di Kota Bogor
            </h2>
            <p style="color:#6B7280;">
                Cakupan penerima manfaat per kategori
            </p>
        </div>

        
        <div class="stats-grid" style="
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:24px;
            margin-bottom:48px;
        ">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="stat-card" style="
                background:white;
                border-radius:20px;
                padding:28px 24px 24px;
                box-shadow:0 4px 20px rgba(0,0,0,0.06);
                position:relative;
                overflow:hidden;
            ">
                
                <div class="stat-accent-line" style="
                    position:absolute;top:0;left:0;right:0;height:4px;
                    background:<?php echo e($stat['gradient']); ?>;
                    border-radius:20px 20px 0 0;
                "></div>

                
<<<<<<< HEAD
                <div class="stat-icon" style="
                    width:56px;height:56px;border-radius:16px;
                    background:<?php echo e($stat['gradient']); ?>;
                    display:flex;align-items:center;justify-content:center;
                    margin-bottom:20px;
                    box-shadow:0 8px 20px rgba(0,0,0,0.15);
                ">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="white"/>
                    </svg>
                </div>

                
                <div style="
                    font-size:36px;
                    font-weight:900;
                    color:#4C3FB5;
                    letter-spacing:-1px;
                    margin-bottom:8px;
                    line-height:1;
                "><?php echo e($stat['value']); ?></div>

                
                <div style="font-size:15px;font-weight:700;color:#1E1E2E;margin-bottom:4px;">
                    <?php echo e($stat['label']); ?>

                </div>
                <div style="font-size:13px;color:#9CA3AF;font-weight:400;">
                    <?php echo e($stat['sublabel']); ?>
=======
                <button id="sliderPrev" style="position:absolute;top:50%;transform:translateY(-50%);left:-40px;width:50px;height:50px;border-radius:50%;border:none;background:white;box-shadow:0 4px 12px rgba(0,0,0,0.15);cursor:pointer;z-index:30;font-size:24px;display:flex;align-items:center;justify-content:center;color:#071E49;font-weight:bold;">
                    ‹
                </button>
                <button id="sliderNext" style="position:absolute;top:50%;transform:translateY(-50%);right:-40px;width:50px;height:50px;border-radius:50%;border:none;background:white;box-shadow:0 4px 12px rgba(0,0,0,0.15);cursor:pointer;z-index:30;font-size:24px;display:flex;align-items:center;justify-content:center;color:#071E49;font-weight:bold;">
                    ›
                </button>
>>>>>>> 7f9d534 (backup sebelum pull)

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        

            <div style="text-align:center;margin-top:40px;">
                <button id="btnLihatDetail" style="padding:12px 28px;border:none;border-radius:30px;background:#C7A14A;color:white;font-weight:700;cursor:pointer;box-shadow:0 6px 16px rgba(199,161,74,0.4);">
                    Lihat Detail
                </button>
            </div>
        </div>
    </div>
</section>

<style>
/* ── Hide scrollbar ── */
#slider {
    scrollbar-width: none;
    -ms-overflow-style: none;
}
#slider::-webkit-scrollbar {
    display: none;
}

/* ── Stat Card Hover Effects ── */
.stat-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: default;
}
.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 52px rgba(0,0,0,0.13) !important;
}
.stat-accent-line {
    transition: height 0.25s ease;
}
.stat-card:hover .stat-accent-line {
    height: 7px !important;
}
.stat-icon {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.stat-card:hover .stat-icon {
    transform: scale(1.1);
    box-shadow: 0 14px 30px rgba(0,0,0,0.25) !important;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}
@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr !important;
    }
}
</style><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/data.blade.php ENDPATH**/ ?>