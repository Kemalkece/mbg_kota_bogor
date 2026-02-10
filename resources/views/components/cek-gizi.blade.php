<section id="cek-gizi" class="cek-gizi-section py-12 bg-[#F5FAFB] hidden">
    <div class="container mx-auto px-4">
        <div class="section-header text-center mb-10" data-aos="fade-up">
            <h2 class="section-title text-3xl font-extrabold text-[#2d3436] mb-3">Cek Status Gizi</h2>
            <p class="section-subtitle text-sm text-[#636e72]">Pantau kesehatan Anda dengan mudah</p>
        </div>

        <div class="row flex justify-center">
            <div class="col-lg-4 mx-auto w-full max-w-md" data-aos="fade-up">
                <div class="cek-gizi-card bg-white rounded-2xl p-7 shadow-lg text-center cursor-pointer border-t-[3px] border-[#D1B06C] transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="cek-gizi-icon w-[75px] h-[75px] rounded-2xl bg-[#D4A017] flex items-center justify-center mx-auto mb-4 text-white text-4xl shadow-md">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h3 class="cek-gizi-title text-lg font-bold text-[#071E49] mb-2">Hitung BMI</h3>
                    <p class="cek-gizi-description text-sm text-[#636e72] mb-4">Masukkan data untuk mengetahui status gizi dan rekomendasi
                        kesehatan.</p>
                    <button class="cek-gizi-button bg-[#D1B06C] text-white border-0 py-2.5 px-7 rounded-full font-semibold text-sm cursor-pointer shadow-md transition hover:bg-[#C49955] hover:-translate-y-0.5 inline-flex items-center gap-2" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                        <i class="bi bi-calculator"></i> Mulai
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cek Gizi Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="cekGiziModal" tabindex="-1" aria-labelledby="cekGiziModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none max-w-2xl mx-auto my-7 px-4">
        <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-2xl outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-2xl bg-gray-50">
                <h5 class="modal-title text-xl font-bold leading-normal text-gray-800 flex items-center gap-2" id="cekGiziModalLabel">
                    <i class="bi bi-bar-chart-line text-blue-600"></i>
                    <span id="giziModalTitle">Form Cek Gizi</span>
                </h5>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-6">
                <div id="giziFormContainer">
                    <div class="text-center mb-6">
                        <div class="inline-block p-4 rounded-full bg-blue-50 text-blue-600 mb-2">
                            <i class="bi bi-calculator text-3xl"></i>
                        </div>
                    </div>

                    <form class="form-gizi-modern grid grid-cols-1 md:grid-cols-2 gap-4" id="formCekGizi">
                        <div class="form-group-gizi">
                            <label for="umur" class="block text-sm font-medium text-gray-700 mb-1">Umur (tahun)</label>
                            <input type="number" id="umur" name="umur" required min="1" max="120" placeholder="Contoh: 25" class="form-control w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div class="form-group-gizi">
                            <label for="jenisKelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin" required class="form-select w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                <option value="">Pilih...</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group-gizi">
                            <label for="tinggiBadan" class="block text-sm font-medium text-gray-700 mb-1">Tinggi (cm)</label>
                            <input type="number" id="tinggiBadan" name="tinggiBadan" required min="30" max="300" placeholder="Contoh: 170" class="form-control w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div class="form-group-gizi">
                            <label for="beratBadan" class="block text-sm font-medium text-gray-700 mb-1">Berat (kg)</label>
                            <input type="number" id="beratBadan" name="beratBadan" required min="1" max="500" placeholder="Contoh: 65" class="form-control w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <label for="aktivitas" class="block text-sm font-medium text-gray-700 mb-1">Tingkat Aktivitas</label>
                            <select id="aktivitas" name="aktivitas" required class="form-select w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                <option value="">Pilih Aktivitas...</option>
                                <option value="1.2">Sangat Jarang (Tidak Olahraga)</option>
                                <option value="1.375">Jarang (Olahraga 1-3x/minggu)</option>
                                <option value="1.55">Normal (Olahraga 3-5x/minggu)</option>
                                <option value="1.725">Sering (Olahraga 6-7x/minggu)</option>
                                <option value="1.9">Sangat Sering (Olahraga Berat)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-cek-gizi col-span-1 md:col-span-2 w-full bg-[#D1B06C] text-white py-3 rounded-xl font-bold hover:bg-[#C49955] transition shadow-md mt-2">
                            Hitung Gizi Saya
                        </button>
                    </form>
                </div>

                <div id="hasilGizi" class="hasil-gizi-container hidden">
                    <div class="text-end mb-4">
                        <span class="badge bg-blue-50 text-blue-600 py-1 px-3 rounded-full text-xs font-semibold" id="sourceBadge">
                            <i class="bi bi-patch-check me-1"></i>Sumber: Kemenkes RI
                        </span>
                    </div>

                    <div class="hasil-gizi-status text-center mb-6" id="statusGiziBox">
                        <span id="statusGizi" class="text-2xl font-bold text-[#071E49] bg-green-100 px-6 py-2 rounded-full border border-green-200">Normal</span>
                    </div>

                    <div class="hasil-gizi-info flex justify-between bg-gray-50 p-4 rounded-xl mb-6">
                        <div class="info-item text-center flex-1 border-r border-gray-200 last:border-0">
                            <div class="info-label text-sm text-gray-500 mb-1">Indeks Massa Tubuh (BMI)</div>
                            <div class="info-value text-xl font-bold text-[#D1B06C]" id="nilaiIMT">22.5</div>
                        </div>
                        <div class="info-item text-center flex-1">
                            <div class="info-label text-sm text-gray-500 mb-1">Kategori</div>
                            <div class="info-value text-xl font-bold text-[#071E49]" id="kategoriIMT">Ideal</div>
                        </div>
                    </div>

                    <!-- Expert Quote Section -->
                    <div class="expert-quote-box mb-6 bg-yellow-50 p-4 rounded-xl border-l-4 border-yellow-400">
                        <div class="flex">
                            <div class="quote-icon me-3">
                                <i class="bi bi-chat-quote-fill text-yellow-500 fs-3"></i>
                            </div>
                            <div>
                                <p class="expert-text mb-1 text-sm text-gray-700 italic" id="deskripsiGizi">Deskripsi...</p>
                                <div class="expert-source text-gray-500 text-xs font-semibold mt-2" id="expertSource">- Menurut Penjelasan Medis</div>
                            </div>
                        </div>
                    </div>

                    <div class="hasil-gizi-rekomendasi bg-white border border-gray-100 p-5 rounded-xl shadow-sm">
                        <h4 class="font-bold text-[#071E49] mb-3 flex items-center gap-2"><i class="bi bi-lightbulb text-yellow-400"></i>Rekomendasi Ahli:</h4>
                        <ul id="listaRekomendasi" class="list-disc pl-5 text-sm text-gray-600 space-y-1">
                            <!-- JS will populate this -->
                        </ul>
                    </div>

                    <div class="text-center mt-6 pt-4 border-t border-gray-100">
                        <button class="btn btn-outline-primary rounded-full px-6 py-2 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition" onclick="resetGiziForm()">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>Cek Ulang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Layanan Disabilitas -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="disabilitasModal" tabindex="-1" aria-labelledby="disabilitasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none max-w-2xl mx-auto my-7 px-4">
        <div class="modal-content border-none shadow-2xl relative flex flex-col w-full pointer-events-auto bg-white rounded-3xl overflow-hidden">
            <div class="modal-header bg-[#071E49] text-white p-5 flex items-center justify-between">
                <h5 class="modal-title font-bold flex items-center gap-2" id="disabilitasModalLabel">
                    <i class="bi bi-person-wheelchair"></i> Layanan Inklusif MBG
                </h5>
                <button type="button" class="btn-close btn-close-white invert brightness-0 filter" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <!-- Accessibility grid similar implementation to above -->
                 <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                     <!-- Buttons mimicking original buttons structure using Tailwind -->
                 </div>
                <div class="text-center mt-4">
                    <button type="button" class="bg-[#D1B06C] text-white px-8 py-2 rounded-full font-bold hover:bg-[#C49955]" data-bs-dismiss="modal">
                        Selesai & Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
