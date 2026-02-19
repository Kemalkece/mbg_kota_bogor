<section id="faq" class="regulations-section py-20 bg-[#F5FAFB]">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-10" data-aos="fade-up">
            <h2 class="section-title text-3xl font-extrabold text-[#2d3436] mb-3">Pertanyaan Seputar MBG</h2>
            <p class="section-subtitle text-sm text-[#636e72]">Informasi penting tentang Program Makan Bergizi Gratis</p>
        </div>

        <div class="regulasi-wrapper" data-aos="fade-up">
            <div class="regulasi-sidebar">
                <h6>Pertanyaan Umum</h6>
                <ul class="regulasi-menu">
                    @foreach($faqs as $index => $item)
                    <li>
                        <a href="#faq-{{ $item->id }}"
                            class="regulasi-item {{ $index === 0 ? 'active' : '' }}"
                            data-target="faq-card-{{ $item->id }}">
                            {{ $item->pertanyaan }}
                        </a>
                    </li>
                    @endforeach

                    <button onclick="window.location.href='/faq-detail'" class="btn-faq mt-4">
                        Selengkapnya
                    </button>
                </ul>
            </div>

            <div class="regulasi-content w-full lg:w-3/4">
                @forelse($faqs as $index => $item)
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex-col lg:flex-row gap-6 animate-[fadeIn_0.5s_ease-out]"
                    id="faq-card-{{ $item->id }}"
                    style="display: {{ $index === 0 ? 'flex' : 'none' }};">
                    <div class="regulasi-card-icon w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-3xl shrink-0">
                        <i class="bi bi-question-circle-fill"></i>
                    </div>
                    <div class="regulasi-card-main flex-1">
                        <div class="regulasi-badges flex gap-2 mb-3">
                            <span class="reg_badge badge-type bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Info MBG</span>
                            <span class="reg_badge badge-status bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Aktif</span>
                        </div>
                        <h4 class="text-xl font-bold text-[#071E49] mb-2">{{ $item->pertanyaan }}</h4>
                        <div class="regulasi-card-desc text-gray-600 leading-relaxed">
                            {!! nl2br(e($item->jawaban)) !!}
                        </div>
                    </div>
                </div>
                @empty
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex items-center justify-center text-center">
                    <div>
                        <div class="regulasi-card-icon w-16 h-16 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 text-3xl mx-auto mb-4">
                            <i class="bi bi-inbox"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-400 mb-2">Belum ada FAQ</h4>
                        <p class="text-gray-500">Silakan tambahkan pertanyaan melalui Admin Panel.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>