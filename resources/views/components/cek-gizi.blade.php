    <section id="cek-gizi" class="cek-gizi-section" style="display: none;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Cek Status Gizi</h2>
                <p class="section-subtitle">Pantau kesehatan Anda dengan mudah</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mx-auto" data-aos="fade-up">
                    <div class="cek-gizi-card">
                        <div class="cek-gizi-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h3 class="cek-gizi-title">Hitung BMI</h3>
                        <p class="cek-gizi-description">Masukkan data untuk mengetahui status gizi dan rekomendasi
                            kesehatan.</p>
                        <button class="cek-gizi-button" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                            <i class="bi bi-calculator"></i> Mulai
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cek Gizi Modal -->
    <div class="modal fade" id="cekGiziModal" tabindex="-1" aria-labelledby="cekGiziModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-content-modern">
                <div class="modal-header modal-header-modern">
                    <h5 class="modal-title" id="cekGiziModalLabel">
                        <i class="bi bi-bar-chart-line text-primary"></i>
                        <span id="giziModalTitle">Form Cek Gizi</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-modern">
                    <div id="giziFormContainer">
                        <div class="text-center mb-4">
                            <div class="d-inline-block p-3 rounded-circle bg-light text-primary mb-2">
                                <i class="bi bi-calculator fs-2"></i>
                            </div>
                        </div>

                        <form class="form-gizi-modern" id="formCekGizi">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="umur">Umur (tahun)</label>
                                        <input type="number" id="umur" name="umur" required min="1" max="120"
                                            placeholder="Contoh: 25" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="jenisKelamin">JenisKelamin</label>
                                        <select id="jenisKelamin" name="jenisKelamin" required class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="tinggiBadan">Tinggi (cm)</label>
                                        <input type="number" id="tinggiBadan" name="tinggiBadan" required min="30"
                                            max="300" placeholder="Contoh: 170" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-gizi">
                                        <label for="beratBadan">Berat (kg)</label>
                                        <input type="number" id="beratBadan" name="beratBadan" required min="1"
                                            max="500" placeholder="Contoh: 65" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group-gizi">
                                        <label for="aktivitas">Tingkat Aktivitas</label>
                                        <select id="aktivitas" name="aktivitas" required class="form-select">
                                            <option value="">Pilih Aktivitas...</option>
                                            <option value="1.2">Sangat Jarang (Tidak Olahraga)</option>
                                            <option value="1.375">Jarang (Olahraga 1-3x/minggu)</option>
                                            <option value="1.55">Normal (Olahraga 3-5x/minggu)</option>
                                            <option value="1.725">Sering (Olahraga 6-7x/minggu)</option>
                                            <option value="1.9">Sangat Sering (Olahraga Berat)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-cek-gizi">
                                Hitung Gizi Saya
                            </button>
                        </form>
                    </div>

                    <div id="hasilGizi" class="hasil-gizi-container p-0 border-0 bg-transparent">
                        <div class="text-end mb-3">
                            <span class="badge bg-soft-primary text-primary py-2 px-3 rounded-pill" id="sourceBadge">
                                <i class="bi bi-patch-check me-1"></i>Sumber: Kemenkes RI
                            </span>
                        </div>

                        <div class="hasil-gizi-status text-center" id="statusGiziBox">
                            <span id="statusGizi">Normal</span>
                        </div>

                        <div class="hasil-gizi-info">
                            <div class="info-item">
                                <div class="info-label">Indeks Massa Tubuh (BMI)</div>
                                <div class="info-value" id="nilaiIMT">22.5</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Kategori</div>
                                <div class="info-value" id="kategoriIMT">Ideal</div>
                            </div>
                        </div>
                    </div>

                    <!-- Expert Quote Section -->
                    <div class="expert-quote-box mb-3">
                        <div class="d-flex">
                            <div class="quote-icon me-3">
                                <i class="bi bi-chat-quote-fill text-primary fs-3"></i>
                            </div>
                            <div>
                                <p class="expert-text mb-1" id="deskripsiGizi">Deskripsi...</p>
                                <div class="expert-source text-muted fst-italic small" id="expertSource">-
                                    Menurut Penjelasan Medis</div>
                            </div>
                        </div>
                    </div>

                    <div class="hasil-gizi-rekomendasi">
                        <h4><i class="bi bi-lightbulb me-2 text-warning"></i>Rekomendasi Ahli:</h4>
                        <ul id="listaRekomendasi">
                            <!-- JS will populate this -->
                        </ul>
                    </div>

                    <div class="text-center mt-4 pt-3 border-top">
                        <button class="btn btn-outline-primary rounded-pill px-4" onclick="resetGiziForm()">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>Cek Ulang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>