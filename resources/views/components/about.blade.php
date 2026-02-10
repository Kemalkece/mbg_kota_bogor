<section id="tentang" class="about-section py-20 bg-[#F5FAFB] relative overflow-hidden -mt-[30px]">
    <!-- Background Decor -->
    <div class="absolute -top-1/2 -right-[10%] w-[600px] h-[600px] bg-[radial-gradient(circle,rgba(30,144,255,0.08)_0%,transparent_70%)] rounded-full z-[1]"></div>
    <div class="absolute -bottom-10 left-0 right-0 h-10 bg-[#F5FAFB] rounded-t-[100%] z-[1]"></div>

    <div class="container mx-auto px-4 relative z-[2]">

        <!-- HEADER -->
        <div class="section-header text-left mb-0" data-aos="fade-up">
            <h2 class="text-mbg text-[#071E49]/50 text-base font-semibold uppercase tracking-[2px] mb-4 block">MBG Kota Bogor</h2>
        </div>

        <!-- ATAS -->
        <div class="about-wrapper grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-[2]" data-aos="fade-up">

            <!-- ILUSTRASI -->
            <div class="about-illustration-side relative flex justify-center items-center min-h-[400px] lg:min-h-[550px]">
                <div class="about-dino-container relative w-full h-full flex justify-center items-center">
                    <div class="about-deco-circle-bg absolute w-[300px] h-[300px] lg:w-[400px] lg:h-[400px] bg-[radial-gradient(circle_at_30%_30%,rgba(30,144,255,0.35)_0%,rgba(30,144,255,0)_70%)] rounded-full z-[1] -top-[50px] -left-[50px] lg:-left-[100px] shadow-[0_0_80px_rgba(30,144,255,0.25)]"></div>
                    <div class="about-deco-dots absolute top-[50px] left-[30px] w-[150px] h-[150px] lg:w-[220px] lg:h-[220px] z-[1] opacity-90 drop-shadow-xl" style="background-image: radial-gradient(circle, rgba(102, 126, 234, 0.6) 2px, transparent 2px); background-size: 20px 20px;"></div>
                    <div class="about-deco-yellow-blob absolute bottom-0 -left-[50px] w-[350px] h-[250px] lg:w-[450px] lg:h-[350px] bg-[radial-gradient(ellipse_at_center,rgba(255,215,0,0.25)_0%,transparent_70%)] rounded-full z-[1] shadow-[0_0_100px_rgba(255,215,0,0.15)]"></div>
                    <div class="about-dino-image relative z-[3] w-[280px] h-[320px] lg:w-[380px] lg:h-[420px] animate-[floatDino_4s_ease-in-out_infinite]">
                        <img src="/images/animasi.gif" alt="Rubo" class="w-full h-full object-contain drop-shadow-2xl">
                    </div>
                </div>
            </div>

            <!-- TEKS KANAN -->
            <div class="about-content-side relative z-[2]">
                <h3 class="about-title text-3xl lg:text-5xl font-black text-[#D1B06C] mb-8 leading-[1.1]">Program Makan Bergizi Gratis</h3>
                <p class="about-description text-base text-[#071E49]/85 leading-loose mb-6 text-justify">
                    Program Makan Bergizi Gratis (MBG) Kota Bogor resmi dilaksanakan
                    secara serentak mulai 6 Januari 2025. Pada tahap awal, program ini
                    menjangkau 39 sekolah dengan total 8.667 siswa sebagai penerima manfaat
                    dan terus diperluas cakupannya.
                </p>

                <div class="about-info-item mb-6 pl-5 border-l-4 border-blue-500 bg-blue-500/5 p-4 rounded-r-lg transition-transform hover:translate-x-2">
                    <div>
                        <h5 class="font-bold text-blue-600 mb-1 text-sm lg:text-base">Pembangunan Infrastruktur</h5>
                        <p class="text-[#071E49]/80 text-sm leading-relaxed">
                            Pemanfaatan aset Pemda untuk Dapur SPPG sebanyak 238 aset,
                            dengan 94 lokasi direkomendasikan untuk operasional.
                            Pembangunan juga didukung oleh Kemen PU dan BGN
                            di beberapa wilayah Kabupaten Bogor.
                        </p>
                    </div>
                </div>

                <div class="about-info-item pl-5 border-l-4 border-blue-500 bg-blue-500/5 p-4 rounded-r-lg transition-transform hover:translate-x-2">
                    <div>
                        <h5 class="font-bold text-blue-600 mb-1 text-sm lg:text-base">Dukungan Anggaran</h5>
                        <p class="text-[#071E49]/80 text-sm leading-relaxed">
                            Pemerintah Kota Bogor mengalokasikan anggaran
                            melalui APBD untuk mendukung keberlangsungan program MBG.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- BAWAH -->
        <div class="about-bottom-grid grid grid-cols-1 md:grid-cols-3 gap-6 mt-16" data-aos="fade-up">

            @foreach([
                ['title' => 'Dukungan Pangan Lokal', 'desc' => 'Pemenuhan kebutuhan MBG per hari melibatkan potensi lokal, seperti sayuran, telur ayam, ayam/ikan, serta bumbu dapur untuk mendorong ekonomi masyarakat.'],
                ['title' => 'Sinergi Stakeholder', 'desc' => 'Program MBG dilaksanakan melalui sinergi Pemkab Bogor dengan TNI, POLRI, KADIN, PKK, organisasi keagamaan, organisasi kepemudaan, serta unsur masyarakat lainnya.'],
                ['title' => 'Pengawasan & Evaluasi', 'desc' => 'Dilakukan pelatihan keamanan pangan, pemeriksaan laboratorium, sertifikasi laik higiene sanitasi, serta inspeksi kesehatan lingkungan bersama Puskesmas.']
            ] as $item)
            <div class="about-bottom-item bg-white p-6 rounded-2xl shadow-lg border-t-4 border-[#D1B06C] transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <h5 class="font-bold text-[#071E49] mb-3 text-lg">{{ $item['title'] }}</h5>
                <p class="text-[#636e72] text-sm leading-relaxed">
                    {{ $item['desc'] }}
                </p>
            </div>
            @endforeach

        </div>
    </div>
</section>

<style>
@keyframes floatDino {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-40px); }
}
</style>
