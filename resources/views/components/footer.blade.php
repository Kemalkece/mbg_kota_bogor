<footer class="footer-modern bg-[#071E49] text-white pt-20 pb-8 rounded-t-[50px] mt-20 relative overflow-hidden">
    <!-- Overlay/Effect -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-gradient-to-br from-blue-500/10 to-transparent rounded-full blur-3xl -z-0"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">

            <!-- KIRI : BRAND + ALAMAT -->
            <div class="mb-4">
                <h3 class="footer-brand text-2xl font-bold mb-4 bg-gradient-to-r from-[#D1B06C] to-[#E8D4A2] text-transparent bg-clip-text">Makan Bergizi Gratis</h3>
                <p class="footer-description text-white/70 mb-6 leading-relaxed text-sm">
                    Program nasional untuk Indonesia sehat dan bebas stunting.
                    Mewujudkan generasi emas yang cerdas dan produktif melalui nutrisi terbaik.
                </p>

                <div class="footer-address">
                    <h3 class="text-lg font-bold text-white mb-2 flex items-center gap-2">
                         <i class="bi bi-geo-alt text-[#D1B06C]"></i> Alamat
                    </h3>
                    <p class="text-white/70 text-sm leading-relaxed ml-6">
                        Jl. Ir. H. Juanda No.10<br>
                        Kecamatan Bogor Tengah<br>
                        Kota Bogor, Jawa Barat 16121<br>
                        Indonesia
                    </p>
                </div>

                <div class="social-icons-modern flex gap-3 mt-6">
                    @foreach(['facebook', 'twitter', 'instagram', 'youtube', 'whatsapp'] as $social)
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white transition-all duration-300 hover:bg-[#D1B06C] hover:text-white hover:-translate-y-1">
                        <i class="bi bi-{{ $social }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- KANAN : NEWSLETTER -->
            <div class="mb-4">
                <h5 class="text-xl font-bold text-white mb-4 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-10 after:h-1 after:bg-[#D1B06C] after:rounded">Newsletter</h5>
                <p class="text-white/70 mb-6 text-sm">
                    Dapatkan informasi terbaru tentang program dan tips gizi seimbang
                    langsung di email Anda.
                </p>

                <form class="newsletter-form relative mb-3 flex">
                    <input type="email" class="w-full py-3 px-5 rounded-l-full border-none outline-none bg-white/10 text-white placeholder-white/50 focus:bg-white/20" placeholder="Email Anda">
                    <button type="submit" class="bg-[#D1B06C] text-white px-6 rounded-r-full hover:bg-[#C49955] transition-colors duration-300 flex items-center justify-center">
                        <i class="bi bi-send"></i>
                    </button>
                </form>

                <small class="text-white/60 text-xs block mt-4">
                    Hotline: 1500-234<br>
                    Email: info@makanbergizigratis.go.id
                </small>
            </div>

            <!-- TENGAH : VISITOR -->
            <div class="mb-8 lg:mt-[-25px]">
                <div class="footer-stats-widget bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 shadow-xl">
                    <div class="flex justify-between items-center py-3 border-b border-white/10 last:border-0 last:pb-0">
                        <div class="flex items-center gap-3 text-white/80"><i class="bi bi-calendar2-check-fill text-[#D1B06C]"></i> Hari Ini</div>
                        <span class="font-bold text-white text-lg" id="stat-today">1,245</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-white/10 last:border-0 last:pb-0">
                        <div class="flex items-center gap-3 text-white/80"><i class="bi bi-people-fill text-[#D1B06C]"></i> Total</div>
                        <span class="font-bold text-white text-lg" id="stat-total">856,432</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-white/10 last:border-0 last:pb-0">
                        <div class="flex items-center gap-3 text-white/80"><i class="bi bi-broadcast text-green-400 animate-pulse"></i> Online</div>
                        <span class="font-bold text-white text-lg" id="stat-online">243</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-bottom border-t border-white/10 pt-6 text-center">
            <p class="mb-0 text-white/60 text-sm">&copy; Pemerintah Kota Bogor. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>
