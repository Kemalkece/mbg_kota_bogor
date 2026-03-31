<section id="faq" class="regulations-section py-20 bg-[#F5FAFB]">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-10" data-aos="fade-up">
            <h2 class="section-title text-3xl font-extrabold text-[#2d3436] mb-3">
                Pertanyaan Seputar MBG
            </h2>
            <p class="section-subtitle text-sm text-[#636e72]">
                Informasi penting tentang Program Makan Bergizi Gratis
            </p>
        </div>

        <div class="regulasi-wrapper" data-aos="fade-up">

            <!-- Sidebar -->
            <div class="regulasi-sidebar">
                <h6>Pertanyaan Umum</h6>

                <ul class="regulasi-menu">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faqs->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#faq-<?php echo e($item->id); ?>"
                            class="regulasi-item <?php echo e($index === 0 ? 'active' : ''); ?>"
                            data-target="faq-card-<?php echo e($item->id); ?>">
                            <?php echo e($item->pertanyaan); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>

                <a href="/detail-faq" class="btn-faq mt-4">
                    Selengkapnya
                </a>
            </div>

            <!-- Content -->
            <div class="regulasi-content w-full lg:w-3/4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faqs->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex-col lg:flex-row gap-6 animate-[fadeIn_0.5s_ease-out]"
                    id="faq-card-<?php echo e($item->id); ?>"
                    style="display: <?php echo e($index === 0 ? 'flex' : 'none'); ?>;">

                    <div class="regulasi-card-icon w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-3xl shrink-0">
                        <i class="bi bi-question-circle-fill"></i>
                    </div>

                    <div class="regulasi-card-main flex-1">
                        <div class="regulasi-badges flex gap-2 mb-3">
                            <span class="reg_badge badge-type bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                                Info MBG
                            </span>
                            <span class="reg_badge badge-status bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                                Aktif
                            </span>
                        </div>

                        <h4 class="text-xl font-bold text-[#071E49] mb-2">
                            <?php echo e($item->pertanyaan); ?>

                        </h4>

                        <div class="regulasi-card-desc text-gray-600 leading-relaxed mb-6">
                            <?php echo nl2br(e($item->jawaban)); ?>

                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->penjelasan): ?>
                        <div class="faq-poin-wrapper pb-2 border-b border-gray-200">
                            <ul class="list-none pl-0" style="margin:0; list-style:none; padding-left:0;">
                                <?php
                                $poin = array_filter(array_map('trim', explode("\n", $item->penjelasan)));
                                $poin = array_slice($poin, 0, 6);
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $poin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600" style="margin-bottom:4px;">
                                    <span style="color: #D1B06C; font-size: 1.5rem; font-weight: bold; line-height:1;">✓</span>
                                    <span style="line-height: 1.4;"><?php echo e($point); ?></span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="regulasi-card-compact bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm w-full" style="min-height:250px;display:flex;align-items:center;justify-content:center;">
                    <div style="text-align:center;padding:60px 40px;">
                        <div style="width:80px;height:80px;border-radius:20px;background:linear-gradient(135deg,#EFF6FF,#DBEAFE);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;box-shadow:inset 0 2px 8px rgba(59,130,246,0.1);">
                            <i class="bi bi-chat-dots" style="font-size:2rem;color:#93C5FD;"></i>
                        </div>
                        <h4 style="font-size:1.3rem;font-weight:900;color:#071E49;margin-bottom:10px;">Belum Ada FAQ</h4>
                        <p style="color:#9CA3AF;font-size:0.9rem;max-width:300px;margin:0 auto;line-height:1.7;">
                            Pertanyaan yang sering diajukan seputar program MBG akan segera hadir di sini.
                        </p>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

        </div>
    </div>
</section><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\components\faq.blade.php ENDPATH**/ ?>