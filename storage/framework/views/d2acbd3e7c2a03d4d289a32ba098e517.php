<div
    x-data="{ state: <?php if ((object) ($getStatePath()) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($getStatePath()->value()); ?>')<?php echo e($getStatePath()->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($getStatePath()); ?>')<?php endif; ?> }"
    x-init="
        // if the field already has a value we hide the warning
        // the entangled state will update automatically when file is selected
    "
    x-show="!state || state.length === 0"
    class="text-red-600 text-sm">
    File PDF wajib diisi.
</div><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\components\file-warning.blade.php ENDPATH**/ ?>