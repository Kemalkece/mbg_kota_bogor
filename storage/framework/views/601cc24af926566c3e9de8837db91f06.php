<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['dataPenyalurans']));

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

foreach (array_filter((['dataPenyalurans']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="data" style="padding:60px 0; position:relative; z-index:5;">
    <div class="container">

        <div class="data-header" style="text-align:center; margin-bottom:40px;">
            <h2 style="font-weight:900; color:#071E49;">
                Data Penyaluran Program MBG di Kota Bogor
            </h2>
            <p style="color:#6B7280;">
                Cakupan penerima manfaat per kategori
            </p>
        </div>

        <div class="data-wrapper">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dataPenyalurans->isEmpty()): ?>

                <div style="text-align:center; padding:40px 0;">
                    <h4 style="font-weight:800; color:#071E49;">
                        Belum Ada Data Penyaluran
                    </h4>
                    <p style="color:#9CA3AF;">
                        Data distribusi akan diperbarui secara berkala.
                    </p>
                </div>
            <?php else: ?>
                <div class="slider-container" style="position:relative;">

                    <!-- LEFT BUTTON -->
                    <style>
                        .slider-btn {
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                            border: none;
                            background: white;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            cursor: pointer;
                            z-index: 20;
                            font-size: 24px;
                            transition: all 0.3s ease;
                        }

                        .slider-btn:hover {
                            background: #D1B06C;
                            /* warna hover */
                            color: white;
                            /* warna icon */
                            transform: translateY(-50%) scale(1.1);
                            /* sedikit membesar */
                            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
                        }

                        .slider-btn-left {
                            left: -25px;
                        }

                        .slider-btn-right {
                            right: -15px;
                        }
                    </style>

                    <!-- LEFT BUTTON -->
                    <button onclick="scrollSlider(-1)" class="slider-btn slider-btn-left">
                        ‹
                    </button>

                    <!-- RIGHT BUTTON -->
                    <button onclick="scrollSlider(1)" class="slider-btn slider-btn-right">
                        ›
                    </button>

                    <!-- SLIDER -->
                    <div id="slider"
                        style="
                    display:flex;
                    gap:24px;
                    overflow-x:auto;
                    scroll-behavior:smooth;
                    padding:10px 5px;
                ">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $dataPenyalurans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                style="
                        min-width:280px;
                        max-width:400px;
                        min-height:100px;
                        max-height:170px;
                        border-radius:20px;
                        padding:20px;
                        display:flex;
                        align-items:flex-start;
                        justify-content:space-between;
                        gap:20px;
                        background: <?php echo e($index % 2 == 0 ? '#F3E5AB' : '#071E49'); ?>;
                        color: <?php echo e($index % 2 == 0 ? '#071E49' : 'white'); ?>;
                        box-shadow:0 8px 20px rgba(0,0,0,0.08);
                        flex-shrink:0;
                    ">

                                <!-- TEXT -->
                                <div style="flex:1;">
                                    <h3
                                        style="
                                font-size:18px;
                                font-weight:800;
                                margin-bottom:8px;
                            ">
                                        <?php echo e($data->judul); ?>

                                    </h3>

                                    <p
                                        style="
                                font-size:14px;
                                line-height:1.6;
                            ">
                                        <?php echo e($data->deskripsi); ?>

                                    </p>
                                </div>

                                <!-- IMAGE -->
                                <div style="flex-shrink:0;">
                                    <img src="<?php echo e(asset('storage/' . $data->gambar)); ?>" alt="<?php echo e($data->judul); ?>"
                                        style="
                                    width:95px;
                                    height:130px;
                                    object-fit:cover;
                                    border-radius:14px;
                                ">
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    </div>

                </div>

                <div style="text-align:center; margin-top:40px;">
                    <button onclick="window.location.href='/detail-data'"
                        style="
                    padding:12px 28px;
                    border:none;
                    border-radius:30px;
                    background:#C7A14A;
                    color:white;
                    font-weight:700;
                    cursor:pointer;
                    box-shadow:0 6px 16px rgba(199,161,74,0.4);
                ">
                        Lihat Detail
                    </button>
                </div>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>

<script>
    function scrollSlider(direction) {
        const slider = document.getElementById('slider');
        slider.scrollBy({
            left: direction * 520,
            behavior: 'smooth'
        });
    }
</script>
<?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/data.blade.php ENDPATH**/ ?>