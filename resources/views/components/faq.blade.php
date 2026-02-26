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
                    @foreach($faqs->take(3) as $index => $item)
                    <li>
                        <a href="#faq-{{ $item->id }}"
                            class="regulasi-item {{ $index === 0 ? 'active' : '' }}"
                            data-target="faq-card-{{ $item->id }}">
                            {{ $item->pertanyaan }}
                        </a>
                    </li>
                    @endforeach

                    <button onclick="window.location.href='/detail-faq'" class="btn-faq mt-4">
                        Selengkapnya
                    </button>
                </ul>
            </div>

            <!-- Content -->
            <div class="regulasi-content w-full lg:w-3/4">
                @forelse($faqs->take(3) as $index => $item)
                <div class="regulasi-card-compact bg-white p-8 rounded-2xl shadow-lg flex-col lg:flex-row gap-6 animate-[fadeIn_0.5s_ease-out]"
                    id="faq-card-{{ $item->id }}"
                    style="display: {{ $index === 0 ? 'flex' : 'none' }};">

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
                            {{ $item->pertanyaan }}
                        </h4>

                        <div class="regulasi-card-desc text-gray-600 leading-relaxed">
                            {!! nl2br(e($item->jawaban)) !!}
                        </div>
                    </div>
                </div>

                @empty
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
                @endforelse
            </div>

        </div>
    </div>
</section>