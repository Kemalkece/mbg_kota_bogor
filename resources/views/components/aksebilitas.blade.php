    <div class="fab-container" id="radialFab">
        <button class="fab-main" onclick="toggleFab()">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="fab-items">
            <button class="fab-item item-1" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                <i class="bi bi-heart-pulse"></i>
                <span class="fab-label-radial">Cek Gizi</span>
            </button>
            <button class="fab-item item-2" data-bs-toggle="modal" data-bs-target="#disabilitasModal">
                <i class="bi bi-person-wheelchair"></i>
                <span class="fab-label-radial">Disabilitas</span>
            </button>
            <a class="fab-item item-3">
                <i class="bi bi-building"></i>
                <span class="fab-label-radial">Data Sekolah</span>
            </a>
            <a href="https://wa.me/6285175220149" class="fab-item item-4" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-megaphone"></i>
                <span class="fab-label-radial">Lapor MBG</span>
            </a>
        </div>
    </div>

        <!-- Modal Layanan Disabilitas -->
    <div class="modal fade" id="disabilitasModal" tabindex="-1" aria-labelledby="disabilitasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-header modal-header-disabilitas">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="disabilitasModalLabel">
                        <i class="bi bi-person-wheelchair"></i> Layanan Inklusif MBG
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="accessibility-grid">
                        <div class="accessibility-btn" onclick="increaseFontSize()">
                            <i class="bi bi-fonts"></i>
                            <span>Perbesar Teks</span>
                        </div>
                        <div class="accessibility-btn" onclick="decreaseFontSize()">
                            <i class="bi bi-textarea-t"></i>
                            <span>Perkecil Teks</span>
                        </div>
                        <div class="accessibility-btn" id="btnGrayscale" onclick="toggleGrayscale()">
                            <i class="bi bi-circle-half"></i>
                            <span>Monokrom</span>
                        </div>
                        <div class="accessibility-btn" id="btnContrast" onclick="toggleHighContrast()">
                            <i class="bi bi-brightness-high-fill"></i>
                            <span>Kontras Tinggi</span>
                        </div>
                        <div class="accessibility-btn" id="btnUnderline" onclick="toggleUnderline()">
                            <i class="bi bi-type-underline"></i>
                            <span>Garis Bawahi Tautan</span>
                        </div>
                        <div class="accessibility-btn" id="btnCursor" onclick="toggleBigCursor()">
                            <i class="bi bi-cursor-fill"></i>
                            <span>Kursor Besar</span>
                        </div>
                        <div class="accessibility-btn" id="btnReadText" onclick="toggleReadMode()">
                            <i class="bi bi-volume-up-fill"></i>
                            <span>Baca Teks</span>
                        </div>
                        <div class="accessibility-btn" onclick="resetAccessibility()">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            <span>Reset Pengaturan</span>
                        </div>
                    </div>
                    <div class="alert alert-info border-0 rounded-4 mt-2 mb-0">
                        <small><i class="bi bi-info-circle me-1"></i> Gunakan menu di atas untuk menyesuaikan kenyamanan
                            tampilan Anda saat menjelajahi portal Makan Bergizi Gratis.</small>
                    </div>
                    <div class="d-flex justify-content-center mt-3 pt-3 border-top">
                        <button type="button" class="btn btn-login px-5 rounded-pill" data-bs-dismiss="modal">
                            Selesai & Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>