<section id="data" class="data-section py-8 bg-[#F5FAFB] relative w-full">
    <div class="container mx-auto px-4">
        <div class="data-header text-center bg-[#F5FAFB] mb-10">
            <h2 class="text-3xl font-extrabold text-[#2d3436] mb-3">Data Penyaluran Program MBG di Kota Bogor</h2>
            <p class="text-sm text-[#636e72]">Cakupan penerima manfaat per kategori</p>
        </div>

        <div class="data-wrapper py-8 bg-[#F5FAFB] relative w-full">
            <!-- Wrapper -->
            <div class="slider-container relative w-full max-w-[1100px] mx-auto">
                <!-- LEFT/RIGHT BUTTONS -->
                <button aria-label="Geser Kiri" onclick="scrollSlider(-1)" class="slider-btn prev absolute top-1/2 -translate-y-1/2 -left-7 z-10 w-[46px] h-[46px] rounded-full bg-white shadow-md border-0 text-[#071E49] text-xl cursor-pointer flex items-center justify-center transition hover:scale-110">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button aria-label="Geser Kanan" onclick="scrollSlider(1)" class="slider-btn next absolute top-1/2 -translate-y-1/2 -right-7 z-10 w-[46px] h-[46px] rounded-full bg-white shadow-md border-0 text-[#071E49] text-xl cursor-pointer flex items-center justify-center transition hover:scale-110">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <!-- Slider -->
                <div id="slider" class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide p-4" style="scrollbar-width: none; -ms-overflow-style: none;">
                    
                    @php
                        $items = [
                            ['title' => 'Penerima Manfaat', 'desc' => 'Mendukung pemenuhan gizi bagi penerima manfaat guna menunjang kesehatan, pertumbuhan optimal, serta pencegahan stunting di Kota Bogor.', 'img' => '/images/penerimamanfaat.jpg', 'theme' => 'gold'],
                            ['title' => 'Wilayah Terjangkau', 'desc' => 'Program Makan Bergizi Gratis menjangkau berbagai area di Kota Bogor sebagai upaya pemerataan akses gizi bagi masyarakat.', 'img' => '/images/bogorkota.jpg', 'theme' => 'dark'],
                            ['title' => 'Sekolah & Fasilitas', 'desc' => 'Program ini menjangkau berbagai provinsi guna memastikan akses gizi yang merata bagi penerima manfaat di berbagai wilayah.', 'img' => '/images/fasilitas.jpg', 'theme' => 'gold'],
                            ['title' => 'Komite Kesehatan', 'desc' => 'Bekerja sama dengan komite kesehatan untuk memastikan standar gizi, keamanan pangan, dan pemantauan kesehatan penerima manfaat berjalan berkelanjutan.', 'img' => '/images/kesehatan.jpg', 'theme' => 'dark'],
                            ['title' => 'SPPG', 'desc' => 'Dilaksanakan melalui SPPG sebagai pusat pengelolaan dan distribusi makanan bergizi yang terstandar dan tepat sasaran bagi penerima manfaat.', 'img' => '/images/sppg.jpg', 'theme' => 'gold']
                        ];
                    @endphp

                    @foreach($items as $item)
                    <div class="slider-item min-w-[360px] h-[160px] rounded-2xl p-4 flex gap-4 items-start snap-center {{ $item['theme'] === 'gold' ? 'bg-[#F3E5AB] text-[#071E49]' : 'bg-[#071E49] text-white' }} shadow-lg transition-transform hover:-translate-y-1">
                        <div class="slider-content flex-1 flex flex-col gap-1.5">
                            <h3 class="font-bold text-lg m-0 {{ $item['theme'] === 'gold' ? 'text-[#071E49]' : 'text-white' }}">{{ $item['title'] }}</h3>
                            <p class="text-xs leading-snug m-0 {{ $item['theme'] === 'gold' ? 'text-[#071E49]' : 'text-white/80' }}">{{ $item['desc'] }}</p>
                        </div>
                        <div class="slider-image w-24 h-[130px] rounded-xl overflow-hidden shrink-0 shadow-md">
                            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="data-btn-wrapper text-center mt-6">
                <button class="detail-btn bg-[#CDAA66] text-white border-0 py-3 px-7 rounded-full text-sm cursor-pointer shadow-md transition-all hover:bg-[#b8975a] hover:-translate-y-0.5 hover:shadow-lg" onclick="window.location.href='#'">
                    Lihat Detail
                </button>
            </div>
        </div>
    </div>
</section>
