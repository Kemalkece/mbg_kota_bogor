<section id="faq" class="regulations-section py-20 bg-[#F5FAFB]">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-10" data-aos="fade-up">
            <h2 class="section-title text-3xl font-extrabold text-[#2d3436] mb-3">Pertanyaan Seputar MBG</h2>
            <p class="section-subtitle text-sm text-[#636e72]">Informasi penting tentang Program Makan Bergizi Gratis</p>
        </div>

        <div class="regulasi-wrapper flex flex-col lg:flex-row gap-8" data-aos="fade-up">
            <div class="regulasi-sidebar w-full lg:w-1/4 bg-white p-6 rounded-2xl shadow-lg h-fit sticky top-24">
                <h6 class="font-bold text-[#071E49] mb-4 border-b pb-2">Pertanyaan Umum</h6>
                <ul class="regulasi-menu list-none pl-0 space-y-2">
                    <li><a href="#faq-1" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500 active" data-target="faq-card-1">Apakah makanan MBG
                            halal?</a></li>
                    <li><a href="#faq-2" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="faq-card-2">Apakah makanan MBG aman?</a>
                    </li>
                    <li><a href="#faq-3" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="faq-card-3">Siapa saja penerima MBG?</a>
                    </li>
                    <li><a href="#faq-4" class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500" data-target="faq-card-4">Bagaimana proses
                            pengawasan?</a>
                    </li>
                     <button class="btn-faq mt-4 w-full bg-[#f0f2f5] text-[#071E49] py-2.5 rounded-full font-semibold text-sm hover:bg-[#e0e4eb] transition">
                         Selengkapnya
                    </button>
                </ul>   
            </div>

            <div class="regulasi-content w-full lg:w-3/4">
                @php
                    $faqs = [
                        [
                            'id' => 'faq-card-1',
                            'icon' => 'question-circle-fill',
                            'type' => 'Status Halal',
                            'status' => 'Terjamin',
                            'title' => 'Apakah makanan Program MBG halal?',
                            'desc' => 'Keamanan spiritual penerima adalah prioritas kami. Seluruh rantai pasokan bahan makanan hingga pengolahan dipastikan memenuhi standar kehalalan.',
                            'points' => [
                                'Bahan baku bersertifikat halal MUI/Kemenag.',
                                'Dapur Satuan Pelayanan (SP) menerapkan prinsip higiene sanitasi halal.',
                                'Pengawasan berkala oleh tim audit mutu eksternal.'
                            ],
                            'display' => 'flex'
                        ],
                        [
                            'id' => 'faq-card-2',
                            'icon' => 'shield-shaded',
                            'type' => 'Keamanan Pangan',
                            'status' => 'Sangat Ketat',
                            'title' => 'Seberapa aman kualitas makanan MBG?',
                            'desc' => 'Kami menerapkan sistem kontrol kualitas yang ketat untuk memastikan setiap porsi aman, bersih, dan bergizi tinggi.',
                            'points' => [
                                'Pemeriksaan rutin oleh BPOM dan Dinas Kesehatan.',
                                'Laboratorium mini di setiap Satuan Pelayanan (SP).',
                                'Sertifikasi Laik Higiene Sanitasi (SLHS) wajib bagi mitra.'
                            ],
                            'display' => 'none'
                        ],
                        [
                            'id' => 'faq-card-3',
                            'icon' => 'people-fill',
                            'type' => 'Penerima Manfaat',
                            'status' => 'Targeted',
                            'title' => 'Siapa saja yang berhak menerima MBG?',
                            'desc' => 'Program ini dirancang menyasar kelompok rentan dan strategis untuk mendukung pertumbuhan generasi emas Indonesia.',
                            'points' => [
                                'Siswa sekolah (PAUD, SD, SMP, SMA).',
                                'Santri di lingkungan pesantren.',
                                'Ibu hamil dan ibu menyusui.',
                                'Anak balita untuk pencegahan stunting.'
                            ],
                            'display' => 'none'
                        ],
                        [
                            'id' => 'faq-card-4',
                            'icon' => 'eye-fill',
                            'type' => 'Pengawasan',
                            'status' => 'Transparan',
                            'title' => 'Bagaimana proses pengawasan program?',
                            'desc' => 'Masyarakat berpartisipasi penuh dalam mengawasi jalannya program melalui sistem pelaporan digital yang transparan.',
                            'points' => [
                                'Aplikasi monitoring real-time berbasis geospasial.',
                                'Pelaporan langsung melalui kanal pengaduan resmi.',
                                'Verifikasi lapangan oleh pendamping gizi nasional.'
                            ],
                            'display' => 'none'
                        ]
                    ];
                @endphp

                @foreach($faqs as $item)
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
                        <p class="regulasi-card-desc text-gray-600 leading-relaxed mb-6">{{ $item['desc'] }}</p>

                        <ul class="regulasi-points list-disc pl-5 text-gray-600 space-y-1">
                            @foreach($item['points'] as $point)
                            <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
