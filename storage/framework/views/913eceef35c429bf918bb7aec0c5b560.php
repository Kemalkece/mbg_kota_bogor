<?php
$navData = [
['label' => 'Beranda', 'type' => 'anchor', 'target' => 'beranda'],
['label' => 'Sasaran', 'type' => 'anchor', 'target' => 'sasaran'],
['label' => 'Tentang', 'type' => 'anchor', 'target' => 'tentang'],
['label' => 'Data', 'type' => 'route', 'route' => 'detail_data'],
['label' => 'Regulasi', 'type' => 'route', 'route' => 'detail_regulasi'],
['label' => 'Peta MBG', 'type' => 'anchor', 'target' => 'peta-mbg'],
['label' => 'FAQ', 'type' => 'route', 'route' => 'detail_faq'],
];
?>

<nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
    <div class="container-xl">

        
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>" onclick="window.location.href=this.href;">
            <img src="/images/logo.png">
            <div class="navbar-brand-text">
                <span class="brand-label">Program Nasional</span>
                <span class="brand-name">Makan Bergizi Gratis</span>
            </div>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $navData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">

                    <?php
                    // compute href based on type
                    $link = '#';
                    if ($nav['type'] === 'route' && isset($nav['route']) && Route::has($nav['route'])) {
                    $link = route($nav['route']);
                    } elseif ($nav['type'] === 'anchor' && isset($nav['target'])) {
                    // always navigate to homepage anchor (ensure slash before #)
                    $link = url('/') . '/#' . $nav['target'];
                    }
                    ?>
                    <a class="nav-link" href="<?php echo e($link); ?>" onclick="window.location.href=this.href;">
                        <?php echo e($nav['label']); ?>

                    </a>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>

    </div>
</nav><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\components\navbar.blade.php ENDPATH**/ ?>