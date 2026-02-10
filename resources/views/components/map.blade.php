    <!-- Map Section -->
    <section id="peta-mbg" class="map-section">
        <div class="map-card-container">
            <div class="map-info-card">
                <div class="map-info-content">
                    <h3 class="map-info-title">Portal Geospatial</h3>
                    <p class="map-info-description">Temukan data spasial terkait Program Pemenuhan Gizi, mulai dari
                        persebaran lokasi hingga informasi capaian di setiap wilayah. Halaman ini mengarahkan Anda ke
                        portal resmi gina.bgn.go.id yang menyajikan informasi geospasial terkini untuk mendukung
                        pemerataan gizi nasional.</p>
                    <button class="btn-view-map" data-bs-toggle="modal" data-bs-target="#mapsModalCustom">
                        Buka Peta
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Maps Modal -->
    <div class="modal fade modal-maps-custom" id="mapsModalCustom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-content-modern">
                <div class="modal-header modal-header-modern">
                    <h5 class="modal-title">
                        Peta Interaktif Sebaran SPPG
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-modern">
                    <div class="map-container-modal"
                        style="width: 100%; height: 400px; border-radius: 15px; overflow: hidden; margin-bottom: 20px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.78959492354284!3d-6.186740766349471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sBogor%2C%20West%20Java!5e0!3m2!1sen%2sus!4v1234567890"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="map-controls-bottom">
                        <div class="map-control-group" style="margin-bottom: 12px;">
                            <label style="font-weight: 600; margin-bottom: 6px; display: block;"> Cari Lokasi</label>
                            <input type="text" placeholder="Masukkan nama kecamatan atau sekolah..."
                                style="width: 100%; padding: 10px; border: 2px solid #e0e0e0; border-radius: 10px;">
                        </div>
                        <div class="map-control-group" id="provinsiCombo">
                            <label class="map-label">Filter Provinsi</label>

                            <input type="text" class="map-combobox" placeholder="Ketik atau pilih provinsi..."
                                autocomplete="off">

                            <div class="combo-dropdown">
                                <div class="combo-option">Semua Provinsi</div>
                                <div class="combo-option">DKI Jakarta</div>
                                <div class="combo-option">Jawa Barat</div>
                                <div class="combo-option">Jawa Tengah</div>
                                <div class="combo-option">Jawa Timur</div>
                                <div class="combo-option">Banten</div>
                            </div>
                        </div>
                        <script>
                            const combo = document.getElementById('provinsiCombo');
                            const input = combo.querySelector('.map-combobox');
                            const dropdown = combo.querySelector('.combo-dropdown');
                            const options = combo.querySelectorAll('.combo-option');

                            /* buka dropdown */
                            input.addEventListener('focus', () => {
                                dropdown.classList.add('show');
                            });

                            /* filter */
                            input.addEventListener('input', () => {
                                const val = input.value.toLowerCase();
                                options.forEach(opt => {
                                    opt.style.display = opt.textContent.toLowerCase().includes(val)
                                        ? 'block'
                                        : 'none';
                                });
                            });

                            /* klik option */
                            options.forEach(opt => {
                                opt.addEventListener('click', () => {
                                    input.value = opt.textContent;
                                    dropdown.classList.remove('show');
                                });
                            });

                            /* 🔥 INI KUNCINYA — KLIK LUAR = TUTUP */
                            document.addEventListener('mousedown', (e) => {
                                if (!combo.contains(e.target)) {
                                    dropdown.classList.remove('show');
                                }
                            });

                            /* optional: pas input blur */
                            input.addEventListener('blur', () => {
                                setTimeout(() => {
                                    dropdown.classList.remove('show');
                                }, 150);
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>