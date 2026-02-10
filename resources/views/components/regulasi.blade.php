<section id="regulasi" class="regulations-section py-20 bg-[#F5FAFB]">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-10" data-aos="fade-up">
            <h2 class="section-title text-3xl font-extrabold text-[#2d3436] mb-3">Peraturan & Regulasi</h2>
            <p class="section-subtitle text-sm text-[#636e72]">Dokumen resmi program Makan Bergizi Gratis</p>
        </div>
        <div class="regulasi-wrapper flex flex-col lg:flex-row gap-8" data-aos="fade-up">
            <!-- Sidebar -->
            <div class="regulasi-sidebar w-full lg:w-1/4 bg-white p-6 rounded-2xl shadow-lg h-fit sticky top-24">
                <h6 class="font-bold text-[#071E49] mb-4 border-b pb-2">Peraturan Terkait BGN</h6>
                <ul class="regulasi-menu list-none pl-0 space-y-2">
                    <li><a href="#reg-1" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500 active" data-target="card-1">Perpres BGN 2024</a></li>
                    <li><a href="#reg-2" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="card-2">SOP Program MBG</a></li>
                    <li><a href="#reg-3" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="card-3">Pedoman MBG Sekolah</a></li>
                    <li><a href="#reg-4" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="card-4">Permohonan SLHS</a></li>
                    <li><a href="#reg-5" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="card-5">Juknis Pelaksanaan MBG</a></li>
                    <li><a href="#reg-6" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="card-6">Standar Keamanan Pangan</a></li>
                </ul>
                <a href="#" class="btn-selengkapnya-regulasi-disabled mt-6 w-full bg-gradient-to-r from-[#D1B06C] to-[#C49955] text-white py-2.5 rounded-full font-semibold text-sm flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-1 transition"> Selengkapnya</a>
            </div>

            <!-- Content -->
            <div class="regulasi-content w-full lg:w-3/4">
                @php
                    $regulasiItems = [
                        [
                            'id' => 'card-1',
                            'icon' => 'file-earmark-text-fill',
                            'type' => 'Perpres',
                            'status' => 'Berlaku',
                            'title' => 'Peraturan Presiden Nomor 83 Tahun 2024',
                            'meta' => 'Ditetapkan: 2024',
                            'desc' => 'Instrumen hukum utama yang melandasi pembentukan Badan Gizi Nasional sebagai motor penggerak perbaikan gizi nasional.',
                            'points' => [
                                'Pembentukan struktur organisasi Badan Gizi Nasional.',
                                'Penetapan tugas dan fungsi koordinasi lintas kementerian.',
                                'Landasan hukum pendanaan program MBG secara nasional.'
                            ],
                            'display' => 'flex' // first one visible
                        ],
                        [
                            'id' => 'card-2',
                            'icon' => 'clipboard-check-fill',
                            'type' => 'SOP',
                            'status' => 'Berlaku',
                            'title' => 'SOP Pelaksanaan Program MBG',
                            'meta' => 'Versi 1.0 - 2024',
                            'desc' => 'Standar operasional baku yang mengatur dari proses pengadaan bahan hingga distribusi makanan ke penerima.',
                            'points' => [
                                'Prosedur kebersihan dan sanitasi dapur.',
                                'Mekanisme distribusi tepat waktu.',
                                'Sistem pelaporan dan evaluasi harian.'
                            ],
                            'display' => 'none'
                        ],
                         [
                            'id' => 'card-3',
                            'icon' => 'book-half',
                            'type' => 'Pedoman',
                            'status' => 'Aktif',
                            'title' => 'Pedoman Gizi Sekolah (MBG Sekolah)',
                            'meta' => 'Edisi 2024',
                            'desc' => 'Buku paduan komprehensif untuk sekolah dalam mengelola dan mengawasi jalannya program MBG.',
                            'points' => [
                                'Kriteria menu seimbang untuk anak sekolah.',
                                'Manajemen kantin dan ruang makan sekolah.',
                                'Edukasi gizi bagi siswa dan orang tua.'
                            ],
                            'display' => 'none'
                        ],
                         [
                            'id' => 'card-4',
                            'icon' => 'shield-check',
                            'type' => 'Formulir',
                            'status' => 'Wajib',
                            'title' => 'Permohonan SLHS (Higiene Sanitasi)',
                            'meta' => 'Updated 2024',
                            'desc' => 'Formulir pendaftaran untuk memastikan fasilitas dapur penyedia jasa makanan memenuhi standar sanitasi nasional.',
                            'points' => [
                                'Kelengkapan dokumen administrasi penyedia.',
                                'Checklist standar kelayakan dapur umum.',
                                'Alur verifikasi tim pemeriksa kesehatan.'
                            ],
                            'display' => 'none'
                        ],
                         [
                            'id' => 'card-5',
                            'icon' => 'journal-text',
                            'type' => 'Juknis',
                            'status' => 'Aktif',
                            'title' => 'Petunjuk Teknis Pelaksanaan Program MBG',
                            'meta' => 'Tahun 2024',
                            'desc' => 'Dokumen teknis sebagai panduan operasional pelaksanaan MBG di lapangan bagi sekolah dan mitra penyedia makanan.',
                            'points' => [
                                'Alur pelaksanaan MBG dari persiapan hingga distribusi.',
                                'Peran sekolah, penyedia, dan pemerintah daerah.',
                                'Standar pelaporan dan monitoring kegiatan.'
                            ],
                            'display' => 'none'
                        ],
                         [
                            'id' => 'card-6',
                            'icon' => 'shield-fill-check',
                            'type' => 'Standar',
                            'status' => 'Wajib',
                            'title' => 'Standar Keamanan & Mutu Pangan MBG',
                            'meta' => 'Berlaku Nasional',
                            'desc' => 'Standar wajib yang mengatur keamanan pangan untuk menjamin makanan MBG aman, higienis, dan layak konsumsi.',
                            'points' => [
                                'Standar bahan baku dan penyimpanan makanan.',
                                'Prosedur pengolahan makanan yang aman.',
                                'Pencegahan kontaminasi dan keracunan pangan.'
                            ],
                            'display' => 'none'
                        ],
                    ];
                @endphp

                @foreach($regulasiItems as $item)
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex-col lg:flex-row gap-6 animate-[fadeIn_0.5s_ease-out]" id="{{ $item['id'] }}" style="display: {{ $item['display'] }};">
                    <div class="regulasi-card-icon w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-3xl shrink-0">
                        <i class="bi bi-{{ $item['icon'] }}"></i>
                    </div>
                    <div class="regulasi-card-main flex-1">
                        <div class="regulasi-badges flex gap-2 mb-3">
                            <span class="reg_badge badge-type bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $item['type'] }}</span>
                            <span class="reg_badge badge-status bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $item['status'] }}</span>
                        </div>
                        <h4 class="text-xl font-bold text-[#071E49] mb-2">{{ $item['title'] }}</h4>
                        <div class="regulasi-card-meta text-sm text-gray-500 mb-4 flex items-center gap-2"> <i class="bi bi-calendar3"></i> {{ $item['meta'] }} </div>
                        <p class="regulasi-card-desc text-gray-600 leading-relaxed mb-6">{{ $item['desc'] }}</p>

                        <ul class="regulasi-points list-disc pl-5 text-gray-600 mb-6 space-y-1">
                            @foreach($item['points'] as $point)
                            <li>{{ $point }}</li>
                            @endforeach
                        </ul>

                        <div class="regulasi-download-wrapper">
                            <a href="#" class="btn-download-regulasi-circle inline-flex items-center gap-2 px-5 py-2.5 bg-[#D1B06C] text-white rounded-xl font-bold text-sm transition hover:bg-[#b8975a] hover:scale-105 shadow-md" title="Download PDF"> <i class="bi bi-file-earmark-pdf"></i> Download PDF</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
