<?php $__env->startSection('content'); ?>
<div class="container py-5 mt-5" style="max-width:1200px; background:#ffffff; border-radius:22px; box-shadow:0 4px 32px rgba(17,38,77,0.13); margin-bottom:48px;">
    <div style="background:transparent; border-radius:18px; box-shadow:none; padding:40px 40px;">
        
        <a href="<?php echo e(url('/hero')); ?>"
            class="d-inline-block mb-3"
            style="background:#fff; color:#CDAA66; padding:10px 20px; border-radius:14px; text-decoration:none; box-shadow:0 2px 12px rgba(17,38,77,0.15); font-weight:600; border:1px solid #CAD3E5;">
             Kembali ke Berita
        </a>

        <h1 style="font-weight:700; line-height:1.3;">
            <?php echo e($berita->judul); ?>

        </h1>

        
        <p class="text-muted mb-4">
            <i class="bi bi-calendar"></i>
            Diterbitkan pada <?php echo e(\Carbon\Carbon::parse($berita->created_at)->format('d F Y')); ?>

        </p>

        
        <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>"
            class="img-fluid rounded mb-4"
            style="width:100%; object-fit:cover; max-height:420px;">

        
        <div style="line-height:1.9; font-size:1.05rem;">
            <?php echo $berita->deskripsi; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/detail/detail_berita.blade.php ENDPATH**/ ?>