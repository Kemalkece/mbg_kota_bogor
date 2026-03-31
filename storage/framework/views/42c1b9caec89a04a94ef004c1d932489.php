<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Detail Berita'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\layouts\app-nofooter.blade.php ENDPATH**/ ?>