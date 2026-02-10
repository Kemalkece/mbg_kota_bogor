<section id="sasaran" class="sasaran-section py-20 bg-white relative">
    <div class="container mx-auto px-4">
        <div class="sasaran-header text-center mb-10" data-aos="fade-up">
            <h2 class="sasaran-title text-3xl font-extrabold text-[#2d3436] mb-3 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-1/2 after:-translate-x-1/2 after:w-12 after:h-1 after:bg-gradient-to-r after:from-[#D1B06C] after:to-[#B8964F] after:rounded">Makan Bergizi Gratis (MBG)</h2>
            <p class="sasaran-subtitle text-sm text-[#636e72] max-w-[600px] mx-auto mt-4">Program komprehensif yang dirancang untuk memastikan setiap individu
                mendapatkan asupan gizi optimal, mendukung tercapainya Indonesia Emas melalui generasi yang sehat
                dan berkualitas.</p>
        </div>

        <div class="sasaran-slider-wrapper relative group" data-aos="fade-up">
            <button class="slider-nav prev absolute top-1/2 -translate-y-1/2 left-0 z-10 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-[#071E49] transition-all hover:bg-[#D1B06C] hover:text-white" onclick="slideSasaran(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="sasaran-slider-container flex gap-6 overflow-x-auto snap-mandatory snap-x scrollbar-hide py-4 px-2" id="sasaranSlider" style="scrollbar-width: none; -ms-overflow-style: none;">
                
                <!-- Card 1: Text Info -->
                <div class="sasaran-slider-item min-w-[300px] lg:min-w-[350px] h-[400px] snap-center perspective-[1000px]">
                    <div class="flip-card w-full h-full relative preserve-3d transition-transform duration-700 hover:rotate-y-180 cursor-pointer group-hover/card:rotate-y-180">
                        <div class="flip-card-inner w-full h-full relative text-center transition-transform duration-700 transform-style-3d shadow-lg rounded-2xl">
                           
                            <div class="flip-card-front text-card absolute w-full h-full backface-hidden bg-gradient-to-br from-[#071E49] to-[#1a2e5a] text-white flex flex-col justify-center items-center p-6 rounded-2xl">
                                <h3 class="text-xl font-bold mb-4 text-[#D1B06C]">Sasaran Pemenuhan Gizi MBG</h3>
                                <p class="text-sm">Kami mendukung kesehatan gizi melalui berbagai program untuk memastikan setiap
                                    individu mendapatkan kebutuhan gizi yang optimal.</p>
                            </div>
                            <div class="flip-card-back absolute w-full h-full backface-hidden bg-white text-[#071E49] flex flex-col justify-center items-center p-6 rounded-2xl rotate-y-180 border-2 border-[#D1B06C]">
                                <h3 class="text-xl font-bold mb-4">Komitmen Kami</h3>
                                <p class="text-sm">Melayani seluruh lapisan masyarakat dari Sabang sampai Merauke dengan standar
                                    gizi
                                    terbaik dan pengawasan ketat demi masa depan bangsa.</p>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $cards = [
                        ['img' => '/images/siswa.jpg', 'label' => 'Anak Sekolah', 'title' => 'Siswa Sekolah', 'desc' => 'Pemberian makan bergizi gratis untuk siswa PAUD hingga SMA/SMK untuk mendukung konsentrasi belajar dan pertumbuhan fisik yang optimal.'],
                        ['img' => '/images/balita.png', 'label' => 'Balita & Anak', 'title' => 'Balita & Anak', 'desc' => 'Intervensi gizi dini untuk anak usia 0-5 tahun guna mencegah stunting dan memastikan perkembangan otak yang maksimal di masa emas.'],
                        ['img' => '/images/ibumenyusui.png', 'label' => 'Ibu Hamil & Menyusui', 'title' => 'Ibu Hamil & Menyusui', 'desc' => 'Pemenuhan nutrisi bagi ibu hamil dan menyusui untuk kesehatan ibu dan janin, serta mendukung pemberian ASI eksklusif berkualitas.'],
                        ['img' => '/images/lansia.png', 'label' => 'Lansia', 'title' => 'Lansia', 'desc' => 'Pemenuhan gizi bagi lanjut usia untuk menjaga daya tahan tubuh dan kualitas hidup.']
                    ];
                @endphp

                @foreach($cards as $card)
                <div class="sasaran-slider-item min-w-[300px] lg:min-w-[350px] h-[400px] snap-center perspective-[1000px]">
                    <div class="flip-card w-full h-full relative group/card cursor-pointer">
                        <div class="flip-card-inner w-full h-full relative transition-transform duration-700 transform-style-3d group-hover/card:rotate-y-180 shadow-lg rounded-2xl">
                            <div class="flip-card-front absolute w-full h-full backface-hidden rounded-2xl overflow-hidden">
                                <img src="{{ $card['img'] }}" alt="{{ $card['label'] }}" loading="lazy" class="w-full h-full object-cover">
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <span class="text-white font-bold text-lg shadow-black/50 drop-shadow-md">{{ $card['label'] }}</span>
                                </div>
                            </div>
                            <div class="flip-card-back absolute w-full h-full backface-hidden bg-white text-[#071E49] flex flex-col justify-center items-center p-6 rounded-2xl rotate-y-180 border-t-4 border-[#D1B06C]">
                                <h3 class="text-xl font-bold mb-4">{{ $card['title'] }}</h3>
                                <p class="text-sm text-center text-gray-600">{{ $card['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <button class="slider-nav next absolute top-1/2 -translate-y-1/2 right-0 z-10 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-[#071E49] transition-all hover:bg-[#D1B06C] hover:text-white" onclick="slideSasaran(1)">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
</div>
</section>

<style>
/* Utilities for 3D flip since Tailwind v3/v4 might need plugins or arbitrary values */
.perspective-[1000px] { perspective: 1000px; }
.transform-style-3d { transform-style: preserve-3d; }
.backface-hidden { backface-visibility: hidden; }
.rotate-y-180 { transform: rotateY(180deg); }
.group-hover\/card\:rotate-y-180:hover { transform: rotateY(180deg); } /* Fallback normal hover if group variant fails */
</style>
