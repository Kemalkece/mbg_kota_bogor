<section id="peta-mbg" class="map-section py-12 bg-[#F5FAFB]">
    <div class="container mx-auto px-4">
        <div class="map-card-container relative rounded-[30px] overflow-hidden shadow-2xl h-[400px] bg-[url('https://picsum.photos/seed/map/1200/600')] bg-cover bg-center">
             <!-- Overlay -->
             <div class="absolute inset-0 bg-gradient-to-r from-[#071E49]/90 to-transparent"></div>

            <div class="map-info-card absolute top-1/2 -translate-y-1/2 left-8 md:left-16 text-white max-w-[500px] z-10">
                <div class="map-info-content">
                    <h3 class="map-info-title text-3xl font-bold mb-4">Portal Geospatial</h3>
                    <p class="map-info-description text-white/90 leading-relaxed mb-6">Temukan data spasial terkait Program Pemenuhan Gizi, mulai dari
                        persebaran lokasi hingga informasi capaian di setiap wilayah. Halaman ini mengarahkan Anda ke
                        portal resmi gina.bgn.go.id yang menyajikan informasi geospasial terkini untuk mendukung
                        pemerataan gizi nasional.</p>
                    <button class="btn-view-map bg-gradient-to-br from-[#D1B06C] to-[#C49955] text-white border-0 py-3 px-8 rounded-full font-bold shadow-lg transition hover:scale-105 active:scale-95" data-bs-toggle="modal" data-bs-target="#mapsModalCustom">
                        Buka Peta
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Maps Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="mapsModalCustom" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg relative w-auto pointer-events-none max-w-4xl mx-auto my-7 px-4">
        <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white rounded-2xl overflow-hidden">
            <div class="modal-header bg-[#071E49] text-white p-5 flex items-center justify-between">
                <h5 class="modal-title font-bold">
                    Peta Interaktif Sebaran SPPG
                </h5>
                <button type="button" class="btn-close invert brightness-0 filter" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-6">
                <div class="map-container-modal w-full h-[400px] rounded-xl overflow-hidden mb-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.78959492354284!3d-6.186740766349471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sBogor%2C%20West%20Java!5e0!3m2!1sen%2sus!4v1234567890"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div class="map-controls-bottom grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="map-control-group">
                        <label class="font-bold mb-2 block text-gray-700"> Cari Lokasi</label>
                        <input type="text" placeholder="Masukkan nama kecamatan atau sekolah..."
                            class="w-full p-2.5 border-2 border-gray-200 rounded-lg focus:border-blue-500 outline-none transition">
                    </div>
                    <div class="map-control-group relative" id="provinsiCombo">
                        <label class="font-bold mb-2 block text-gray-700">Filter Provinsi</label>

                        <input type="text" class="map-combobox w-full p-2.5 border-2 border-gray-200 rounded-lg focus:border-blue-500 outline-none transition bg-white" placeholder="Ketik atau pilih provinsi..."
                            autocomplete="off">

                        <div class="combo-dropdown absolute top-full left-0 w-full bg-white border border-gray-200 shadow-lg rounded-lg z-50 hidden mt-1 max-h-[200px] overflow-y-auto">
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">Semua Provinsi</div>
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">DKI Jakarta</div>
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">Jawa Barat</div>
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">Jawa Tengah</div>
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">Jawa Timur</div>
                            <div class="combo-option p-2 hover:bg-gray-100 cursor-pointer">Banten</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
