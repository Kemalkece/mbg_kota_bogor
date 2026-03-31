<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'menus' => [
        [
            'hari' => 'Senin',
            'makanan_pokok' => 'Nasi Putih',
            'lauk_hewani' => 'Ayam Teriyaki',
            'lauk_nabati' => 'Tahu Crispy',
            'sayur' => 'Tumis Brokoli',
            'buah' => 'Jeruk Manis',
            'susu' => 'Susu UHT Coklat',
            'kalori' => '650 Kkal',
            'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #10B981 0%, #059669 100%)'
        ],
        [
            'hari' => 'Selasa',
            'makanan_pokok' => 'Nasi Merah',
            'lauk_hewani' => 'Ikan Kembung Balado',
            'lauk_nabati' => 'Tempe Orek',
            'sayur' => 'Sayur Sop Macaroni',
            'buah' => 'Pisang Ambon',
            'susu' => 'Susu UHT Full Cream',
            'kalori' => '620 Kkal',
            'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #3B82F6 0%, #2563EB 100%)'
        ],
        [
            'hari' => 'Rabu',
            'makanan_pokok' => 'Nasi Uduk',
            'lauk_hewani' => 'Telur Balado',
            'lauk_nabati' => 'Perkedel Kentang',
            'sayur' => 'Sayur Lodeh',
            'buah' => 'Pepaya Potong',
            'susu' => 'Susu UHT Coklat',
            'kalori' => '680 Kkal',
            'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #F59E0B 0%, #D97706 100%)'
        ],
        [
            'hari' => 'Kamis',
            'makanan_pokok' => 'Nasi Kuning',
            'lauk_hewani' => 'Ayam Goreng Lengkuas',
            'lauk_nabati' => 'Kering Tempe',
            'sayur' => 'Lalapan & Sambal',
            'buah' => 'Semangka Merah',
            'susu' => 'Susu UHT Full Cream',
            'kalori' => '700 Kkal',
            'image' => 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%)'
        ],
        [
            'hari' => 'Jumat',
            'makanan_pokok' => 'Nasi Putih',
            'lauk_hewani' => 'Daging Sapi Lada Hitam',
            'lauk_nabati' => 'Tahu Isi Sayur',
            'sayur' => 'Buncis Bawang Putih',
            'buah' => 'Melon Hijau',
            'susu' => 'Susu UHT Stroberi',
            'kalori' => '640 Kkal',
            'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #EC4899 0%, #DB2777 100%)'
        ]
    ]
]));

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

foreach (array_filter(([
    'menus' => [
        [
            'hari' => 'Senin',
            'makanan_pokok' => 'Nasi Putih',
            'lauk_hewani' => 'Ayam Teriyaki',
            'lauk_nabati' => 'Tahu Crispy',
            'sayur' => 'Tumis Brokoli',
            'buah' => 'Jeruk Manis',
            'susu' => 'Susu UHT Coklat',
            'kalori' => '650 Kkal',
            'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #10B981 0%, #059669 100%)'
        ],
        [
            'hari' => 'Selasa',
            'makanan_pokok' => 'Nasi Merah',
            'lauk_hewani' => 'Ikan Kembung Balado',
            'lauk_nabati' => 'Tempe Orek',
            'sayur' => 'Sayur Sop Macaroni',
            'buah' => 'Pisang Ambon',
            'susu' => 'Susu UHT Full Cream',
            'kalori' => '620 Kkal',
            'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #3B82F6 0%, #2563EB 100%)'
        ],
        [
            'hari' => 'Rabu',
            'makanan_pokok' => 'Nasi Uduk',
            'lauk_hewani' => 'Telur Balado',
            'lauk_nabati' => 'Perkedel Kentang',
            'sayur' => 'Sayur Lodeh',
            'buah' => 'Pepaya Potong',
            'susu' => 'Susu UHT Coklat',
            'kalori' => '680 Kkal',
            'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #F59E0B 0%, #D97706 100%)'
        ],
        [
            'hari' => 'Kamis',
            'makanan_pokok' => 'Nasi Kuning',
            'lauk_hewani' => 'Ayam Goreng Lengkuas',
            'lauk_nabati' => 'Kering Tempe',
            'sayur' => 'Lalapan & Sambal',
            'buah' => 'Semangka Merah',
            'susu' => 'Susu UHT Full Cream',
            'kalori' => '700 Kkal',
            'image' => 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%)'
        ],
        [
            'hari' => 'Jumat',
            'makanan_pokok' => 'Nasi Putih',
            'lauk_hewani' => 'Daging Sapi Lada Hitam',
            'lauk_nabati' => 'Tahu Isi Sayur',
            'sayur' => 'Buncis Bawang Putih',
            'buah' => 'Melon Hijau',
            'susu' => 'Susu UHT Stroberi',
            'kalori' => '640 Kkal',
            'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=800&auto=format&fit=crop',
            'gradient' => 'linear-gradient(135deg, #EC4899 0%, #DB2777 100%)'
        ]
    ]
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="menu-harian" style="padding:80px 0; background: #ffffff; position:relative; overflow:hidden;">
    
    <div style="position:absolute; top:-100px; left:-100px; width:300px; height:300px; background:radial-gradient(circle, rgba(16,185,129,0.06) 0%, rgba(255,255,255,0) 70%); border-radius:50%; z-index:1; pointer-events:none;"></div>
    <div style="position:absolute; bottom:-150px; right:-50px; width:400px; height:400px; background:radial-gradient(circle, rgba(59,130,246,0.06) 0%, rgba(255,255,255,0) 70%); border-radius:50%; z-index:1; pointer-events:none;"></div>

    <div class="container" style="position:relative; z-index:2;">
        <div class="menu-header" style="text-align:center; margin-bottom:50px;">
            <span style="display:inline-block; padding:8px 16px; background:rgba(37,99,235,0.1); color:#2563EB; font-weight:700; border-radius:30px; margin-bottom:16px; font-size:14px; letter-spacing:1px; text-transform:uppercase;">
                Nutrisi Terjaga
            </span>
            <h2 style="font-weight:900; color:#0f172a; font-size:36px; margin-bottom:16px; letter-spacing:-0.5px;">
                Daftar Makanan Harian MBG
            </h2>
            <p style="color:#64748b; font-size:16px; max-width:600px; margin:0 auto; line-height:1.6;">
                Jadwal menu bergizi ini telah disusun oleh ahli gizi untuk memastikan kebutuhan energi dan nutrisi anak-anak di Kota Bogor terpenuhi secara optimal.
            </p>
        </div>

        <div class="menu-scroll-container" style="
            display:flex; 
            gap:24px; 
            overflow-x:auto; 
            padding-bottom:32px;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        ">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="menu-card" style="
                min-width:320px; 
                flex: 0 0 auto;
                background:white; 
                border-radius:24px; 
                overflow:hidden;
                box-shadow:0 10px 30px -10px rgba(0,0,0,0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                scroll-snap-align: start;
                border: 1px solid #f8fafc;
                display:flex;
                flex-direction:column;
            ">
                
                <div style="height:180px; position:relative; overflow:hidden;">
                    <img src="<?php echo e($menu['image']); ?>" loading="lazy" alt="Menu <?php echo e($menu['hari']); ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.5s ease;" class="menu-img">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(15,23,42,0.8) 0%, transparent 100%);"></div>
                    <div style="position:absolute; bottom:16px; left:20px; right:20px; display:flex; justify-content:space-between; align-items:flex-end;">
                        <h3 style="color:white; font-size:24px; font-weight:800; margin:0; letter-spacing:-0.5px;"><?php echo e($menu['hari']); ?></h3>
                        <span style="font-size:13px; font-weight:700; background:white; color:#0f172a; padding:4px 10px; border-radius:12px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                            🔥 <?php echo e($menu['kalori']); ?>

                        </span>
                    </div>
                </div>

                
                <div style="padding:24px; flex-grow:1; display:flex; flex-direction:column; gap:20px;">
                    
                    
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:40px; height:40px; border-radius:12px; background:rgba(245,158,11,0.1); color:#f59e0b; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Makanan Pokok</div>
                            <div style="font-size:15px; font-weight:700; color:#0f172a; margin-top:2px;"><?php echo e($menu['makanan_pokok']); ?></div>
                        </div>
                    </div>

                    
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:40px; height:40px; border-radius:12px; background:rgba(239,68,68,0.1); color:#ef4444; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Lauk Pauk</div>
                            <div style="font-size:15px; font-weight:700; color:#0f172a; margin-top:2px; line-height:1.4;"><?php echo e($menu['lauk_hewani']); ?> & <?php echo e($menu['lauk_nabati']); ?></div>
                        </div>
                    </div>

                    
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:40px; height:40px; border-radius:12px; background:rgba(34,197,94,0.1); color:#22c55e; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Sayur & Buah</div>
                            <div style="font-size:15px; font-weight:700; color:#0f172a; margin-top:2px; line-height:1.4;"><?php echo e($menu['sayur']); ?> & <?php echo e($menu['buah']); ?></div>
                        </div>
                    </div>

                    
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:40px; height:40px; border-radius:12px; background:rgba(59,130,246,0.1); color:#3b82f6; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" x2="6" y1="2" y2="4"/><line x1="10" x2="10" y1="2" y2="4"/><line x1="14" x2="14" y1="2" y2="4"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Minuman</div>
                            <div style="font-size:15px; font-weight:700; color:#0f172a; margin-top:2px;"><?php echo e($menu['susu']); ?></div>
                        </div>
                    </div>

                </div>
                
                
                <div style="padding:0 24px 24px;">
                    <button style="width:100%; padding:14px; border-radius:14px; border:none; color:white; font-size:15px; font-weight:700; cursor:pointer; background:<?php echo e($menu['gradient']); ?>; box-shadow:0 4px 14px rgba(0,0,0,0.15); transition:transform 0.2s, box-shadow 0.2s;" class="btn-menu">
                        Lihat Nutrisi Lengkap
                    </button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<style>
/* Custom Webkit Scrollbar for Menu */
.menu-scroll-container::-webkit-scrollbar {
    height: 8px;
}
.menu-scroll-container::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}
.menu-scroll-container::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}
.menu-scroll-container::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Hover Animations */
.menu-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -15px rgba(0,0,0,0.12) !important;
}
.menu-card:hover .menu-img {
    transform: scale(1.08); /* slight zoom on image hover */
}
.btn-menu:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2) !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .menu-card {
        min-width: 280px;
    }
}
</style>
<?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\components\menu.blade.php ENDPATH**/ ?>