@props(['regulasis'])
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
                    @foreach ($regulasis as $index => $regulasi)
                    <li>
                        <a href="#reg-{{ $regulasi->id }}"
                            class="regulasi-item block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-blue-600 [&.active]:bg-blue-50 [&.active]:text-blue-600 [&.active]:font-bold border-l-4 border-transparent [&.active]:border-blue-500 {{ $index === 0 ? 'active' : '' }}"
                            data-target="card-{{ $regulasi->id }}">
                            {{ $regulasi->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('regulasi_detail') }}" class="btn-selengkapnya-regulasi">
                    Selengkapnya
                </a>

            </div>

            <!-- Content -->
            <div class="regulasi-content w-full lg:w-3/4">
                @foreach($regulasis as $index => $regulasi)
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex-col lg:flex-row gap-6 animate-[fadeIn_0.5s_ease-out]"
                    id="card-{{ $regulasi->id }}"
                    style="display: {{ $index === 0 ? 'flex' : 'none' }};">
                    <div class="regulasi-card-icon w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-3xl shrink-0">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                    <div class="regulasi-card-main flex-1">
                        <div class="regulasi-badges flex gap-2 mb-3">
                            <span class="reg_badge badge-type bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Regulasi</span>
                            <span class="reg_badge badge-status bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $regulasi->status }}</span>
                        </div>
                        <h4 class="text-xl font-bold text-[#071E49] mb-2">{{ $regulasi->title }}</h4>
                        <div class="regulasi-card-meta text-sm text-gray-500 mb-4 flex items-center gap-2">
                            <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($regulasi->tahun)->format('Y') }}
                        </div>
                        <p class="regulasi-card-desc text-gray-600 leading-relaxed mb-6">{{ $regulasi->description }}</p>

                        <div class="regulasi-download-wrapper">
                            <a href="{{ asset('storage/' . $regulasi->pdf_file) }}"
                                target="_blank"
                                download
                                rel="noopener noreferrer"
                                class="btn-download-regulasi-circle inline-flex items-center gap-2 px-5 py-2.5 bg-[#D1B06C] text-white rounded-xl font-bold text-sm transition hover:bg-[#b8975a] hover:scale-105 shadow-md"
                                title="Download PDF">
                                <i class="bi bi-file-earmark-pdf"></i> Download PDF
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>