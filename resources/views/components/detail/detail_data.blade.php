<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Statistik - Makan Bergizi Gratis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pages/gabung.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    :root {
      --primary-color: #0F2347;
      --accent-color: #D1B06C;
      --primary-gradient: linear-gradient(135deg, #D1B06C 0%, #b8964f 100%);
      --accent-gradient: linear-gradient(135deg, #D1B06C 0%, #e6c98b 100%);
      --text-dark: #0F2347;
    }


    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #F5FAFB 0%, #E8F0F7 100%);
      color: var(--text-dark);
      min-height: 100vh;
      padding: 100px;
    }

    .btn-back:hover {
      background: #C49955;
      transform: translateY(-2px);
      color: white;
    }

    .content-card {
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      margin-top: 40px;
      margin-bottom: 40px;
    }

    .page-title {
      font-size: 2rem;
      font-weight: 800;
      color: #071E49;
      margin-bottom: 30px;
      text-align: center;
      margin-top: 50px;
    }

    .dist-detail-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
      margin-bottom: 40px;
    }

    .dist-detail-card {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 25px;
      text-align: center;
      border: 1px solid rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .dist-detail-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      background: white;
    }

    .dist-detail-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
    }

    .dist-detail-card h3 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #071E49;
      margin-bottom: 10px;
    }

    .dist-detail-number {
      font-size: 1.8rem;
      font-weight: 800;
      color: #071E49;
      margin-bottom: 15px;
    }

    .dist-detail-bar {
      background: #e0e0e0;
      height: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
      overflow: hidden;
    }

    .dist-detail-fill {
      height: 100%;
      background: var(--primary-gradient);
      border-radius: 10px;
    }

    .dist-detail-percent {
      font-size: 0.85rem;
      color: #636e72;
      font-weight: 600;
    }

    .analysis-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }

    .analysis-item {
      background: white;
      padding: 25px;
      border-radius: 15px;
      border-left: 5px solid #D1B06C;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
    }

    .analysis-item h4 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #071E49;
      margin-bottom: 15px;
    }

    .analysis-item p {
      color: #636e72;
      line-height: 1.6;
      font-size: 0.95rem;
    }

    .download-wrapper {
      text-align: center;
      margin-top: 50px;
    }

    .btn-download {
      background: linear-gradient(135deg, #D1B06C 0%, #B8964F 100%);

      color: white;
      border: none;
      padding: 15px 40px;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-download:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
      color: white;
    }

    .dist-detail-icon i {
      font-size: 2rem;
      color: #D1B06C;
    }

    /* RESPONSIVE DESIGN FOR MOBILE */
    @media (max-width: 768px) {
      body {
        padding: 80px 20px 20px;
      }

      .content-card {
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .page-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
      }

      .dist-detail-cards {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      .dist-detail-card {
        padding: 20px;
      }

      .dist-detail-icon {
        font-size: 2rem;
        margin-bottom: 10px;
      }

      .dist-detail-card h3 {
        font-size: 1rem;
      }

      .dist-detail-number {
        font-size: 1.5rem;
      }

      .analysis-section {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      .analysis-item {
        padding: 20px;
      }

      .stat-container {
        gap: 10px;
      }

      .stat-box {
        width: 140px;
        height: 110px;
        padding: 15px;
      }

      .btn-download {
        padding: 12px 30px;
        font-size: 0.9rem;
      }

      .download-wrapper {
        margin-top: 30px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 70px 15px 15px;
      }

      .content-card {
        padding: 15px;
        border-radius: 15px;
      }

      .page-title {
        font-size: 1.3rem;
        margin-bottom: 15px;
      }

      .dist-detail-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 8px;
      }

      .dist-detail-card {
        padding: 10px;
        border-radius: 8px;
      }

      .dist-detail-icon {
        font-size: 1.5rem;
        margin-bottom: 5px;
      }

      .dist-detail-card h3 {
        font-size: 0.8rem;
        margin-bottom: 5px;
      }

      .dist-detail-number {
        font-size: 1.1rem;
        margin-bottom: 5px;
      }

      .dist-detail-row {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 5px;
      }

      .dist-detail-item {
        text-align: center;
        flex: 1;
      }

      .dist-detail-item .dist-detail-number {
        font-size: 0.9rem;
        margin-bottom: 2px;
      }

      .dist-detail-item .dist-detail-percent {
        font-size: 0.7rem;
        color: #666;
      }

      .analysis-item {
        padding: 15px;
        border-radius: 12px;
      }

      .stat-box {
        width: 120px;
        height: 100px;
        padding: 12px;
      }

      .stat-box h5 {
        font-size: 1rem;
      }

      .btn-download {
        padding: 10px 25px;
        font-size: 0.8rem;
      }
    }

    /* FLOATING MENU ATAS CARD */
    /* ===== CONTENT CARD ===== */
    .content-card {
      position: relative;
    }

    /* ===== FLOATING MENU ===== */
    .floating-menu {
      position: absolute;
      top: 10 0px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
      padding: 10px;
      border-radius: 999px;
      background: #fff;
      box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
      border: 2px solid #D1B06C;
      z-index: 3;
    }

    /* ===== ITEM ===== */
    .floating-item {
      padding: 14px 28px;
      /* diperbesar */
      border-radius: 999px;
      font-size: 15px;
      font-weight: 700;
      color: #D1B06C;
      cursor: pointer;
      transition: .25s;
    }

    /* ===== HOVER ===== */
    .floating-item:hover {
      background: rgba(209, 176, 108, 0.15);
    }

    /* ===== ACTIVE ===== */
    .floating-item.active {
      background: #D1B06C;
      color: white;
      box-shadow: 0 8px 18px rgba(209, 176, 108, 0.45);
    }

    /* ===== MOBILE ===== */
    @media(max-width:768px) {
      .floating-item {
        padding: 10px 18px;
        font-size: 13px;
      }
    }

    .page-section {
      display: none;
    }

    .page-section.active {
      display: block;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar-detail">
    <div class="container-xl d-flex justify-content-between align-items-center">

      <div class="d-flex align-items-center gap-2">
        <img src="{{ asset('images/logo.png') }}" width="40">
        <div>
          <div class="brand-label">Program Nasional</div>
          <div class="brand-name">Makan Bergizi Gratis</div>
        </div>
      </div>

      <a href="{{ route('beranda') }}" class="btn-back">
        <i class="bi bi-arrow-left"></i> Kembali ke Dasbor
      </a>

    </div>
  </nav>

  <!-- FLOATING MENU -->
  <div class="floating-menu">
    <div class="floating-item active" data-target="berandaPage">Beranda</div>
    <div class="floating-item" data-target="filterPage">Penyaringan</div>
    <div class="floating-item" data-target="chartPage">Grafik</div>
    <div class="floating-item" data-target="rekapPage">Rekapitulasi</div>
  </div>

  <!-- BERANDA -->
  <div class="page-section active" id="berandaPage">
    <div class="container">
      <div class="content-card" data-aos="fade-up">
        <h1 class="page-title"> Detail Statistik Penyaluran</h1>
        <p class="text-center text-muted mb-5">Analisis mendalam mengenai penyebaran program Makan Bergizi Gratis
          berdasarkan jenjang pendidikan di seluruh Indonesia.</p>

        <!-- Cards -->
        <div class="dist-detail-cards">

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-award-fill"></i>
            </div>
            <h3>SMA & Sederajat</h3>
            <div class="dist-detail-number">650,000</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 26%;"></div>
            </div>
            <div class="dist-detail-percent">26% dari total penerima</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-journal-bookmark-fill"></i>
            </div>
            <h3>SMP & Sederajat</h3>
            <div class="dist-detail-number">915,000</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 36.6%;"></div>
            </div>
            <div class="dist-detail-percent">36.6% dari total penerima</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-pencil-square"></i>
            </div>
            <h3>SD & Sederajat</h3>
            <div class="dist-detail-number">765,000</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 30.6%;"></div>
            </div>
            <div class="dist-detail-percent">30.6% dari total penerima</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-stars"></i>
            </div>
            <h3>TK / PAUD & Sederajat</h3>
            <div class="dist-detail-number">170,000</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 6.8%;"></div>
            </div>
            <div class="dist-detail-percent">6.8% dari total penerima</div>
          </div>

        </div>
      </div>

      <!-- Analysis -->
      <h3 class="fw-bold text-center mb-4" style="color: #071E49;">Analisis & Pemahaman</h3>
      <div class="analysis-section">
        <div class="analysis-item">
          <h4> Dominasi Menengah</h4>
          <p>Jenjang SMP & Sederajat menjadi penerima manfaat terbesar dengan <strong>36.6%</strong>, diikuti
            oleh SD sebesar 30.6%. Hal ini menunjukkan fokus pemerintah dalam menjaga asupan gizi pada masa
            pertumbuhan remaja yang kritis.</p>
        </div>
        <div class="analysis-item">
          <h4>Intervensi Dini</h4>
          <p>Walaupun persentase TK/PAUD kecil (<strong>6.8%</strong>), ini adalah langkah strategis untuk
            mencegah stunting sejak dini, memastikan fondasi kesehatan yang kuat sebelum memasuki usia
            sekolah dasar.</p>
        </div>
        <div class="analysis-item">
          <h4> Target Capaian</h4>
          <p>Distribusi ini telah disesuaikan dengan data demografi siswa nasional. Program ini menargetkan
            cakupan 100% di semua daerah 3T (Tertinggal, Terdepan, dan Terluar) pada akhir tahun 2025.</p>
        </div>
      </div>



      <!-- MODAL PENYALURAN -->
      <div class="modal fade" id="modalPenyaluran" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content rounded-4">

            <div class="modal-header">
              <h5>Data Penyaluran</h5>
              <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <div class="container">
                <div class="row g-3">

                  <div class="col-md-3">
                    <div class="stat-box box1">
                      <i class="bi bi-geo"></i>
                      <h4>6</h4>
                      <p>Kecamatan</p>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="stat-box box2">
                      <i class="bi bi-building"></i>
                      <h4>68</h4>
                      <p>Kelurahan</p>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="stat-box box3">
                      <i class="bi bi-house"></i>
                      <h4>797</h4>
                      <p>RW</p>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="stat-box box4">
                      <i class="bi bi-people"></i>
                      <h4>128.579</h4>
                      <p>Penerima</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- MODAL LAINNYA -->
      <div class="modal fade" id="modalSekolah" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content rounded-4">

            <div class="modal-header">
              <h5>Satuan Pendidikan</h5>
              <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

              <div class="container">
                <div class="row g-3">

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">SMA</div>
                      <p>SMA & Sederajat</p>
                      <h4>288</h4>
                      <span>Sekolah</span><br>
                      <h5>120976</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">SMP</div>
                      <p>SMP & Sederajat</p>
                      <h4>409</h4>
                      <span>Sekolah</span><br>
                      <h5>144338</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">SD</div>
                      <p>SD & Sederajat</p>
                      <h4>1029</h4>
                      <span>Sekolah</span><br>
                      <h5>304182</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">TK</div>
                      <p>TK / PAUD</p>
                      <h4>646</h4>
                      <span>Sekolah</span><br>
                      <h5>25361</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">TK</div>
                      <p>TK / PAUD</p>
                      <h4>646</h4>
                      <span>Sekolah</span><br>
                      <h5>25361</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div style="background:#fff;border-radius:12px;padding:20px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                      <div style="width:45px;height:45px;background:#D1B06C;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-weight:bold;">TK</div>
                      <p>TK / PAUD</p>
                      <h4>646</h4>
                      <span>Sekolah</span><br>
                      <h5>25361</h5>
                      <span>Siswa</span>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </div>
  </div>

  <!-- FILTER -->
  <div class="page-section" id="filterPage">
    <div class="container">
      <div class="content-card" data-aos="fade-up">
        <h1 class="page-title">Penyaringan Data</h1>
        <p class="text-center text-muted mb-5">Pilih kriteria untuk memfilter data penyaluran program Makan Bergizi Gratis.</p>

        <form class="row g-3">
          <div class="col-md-3">
            <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
            <select class="form-select" id="tahunAjaran">
              <option selected>2025/2026</option>
              <option>2024/2025</option>
              <option>2023/2024</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="sppg" class="form-label">SPPG</label>
            <select class="form-select" id="sppg">
              <option selected>Semua SPPG</option>
              <option>SPPG Bogor Utara</option>
              <option>SPPG Bogor Selatan</option>
              <option>SPPG Bogor Timur</option>
              <option>SPPG Bogor Barat</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="filter" class="form-label">Filter</label>
            <select class="form-select" id="filter">
              <option selected>Semua Sekolah</option>
              <option>Sekolah yang belum dapat MBG</option>
              <option>Posyandu yang sudah dapat MBG</option>
              <option>Posyandu yang belum dapat MBG</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select class="form-select" id="kecamatan">
              <option selected>Semua Kecamatan</option>
              <option>Bogor Utara</option>
              <option>Bogor Selatan</option>
              <option>Bogor Timur</option>
              <option>Bogor Barat</option>
            </select>
          </div>
          <div class="col-12 text-center">
            <button type="button" id="lihatBtn"
              style="
background:#CFAE6C;
color:#fff;
border:none;
padding:10px 22px;
border-radius:30px;
font-weight:600;
cursor:pointer;
box-shadow:0 6px 18px rgba(0,0,0,0.15);
transition:.25s;
">
              Lihat
            </button>

            <script>
              const btn = document.getElementById("lihatBtn")

              btn.onmouseenter = () => btn.style.transform = "translateY(-2px)"
              btn.onmouseleave = () => btn.style.transform = "translateY(0)"
              btn.onmousedown = () => btn.style.transform = "scale(.95)"
              btn.onmouseup = () => btn.style.transform = "scale(1)"
            </script>
          </div>
        </form>

        <div id="hasilFilter" class="mt-4" style="display: none;">
          <h4>Hasil Filter</h4>
          <p>Hasil berdasarkan filter yang dipilih akan ditampilkan di sini.</p>
          <!-- Placeholder untuk hasil -->
          <div class="alert alert-info">
            Contoh: Menampilkan data sekolah berdasarkan filter.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CHART -->
  <div class="page-section" id="chartPage">
    <div class="container">
      <div class="content-card" data-aos="fade-up">
        <h1 class="page-title">Visualisasi Data</h1>
        <p class="text-center text-muted mb-5">Grafik distribusi penerima manfaat berdasarkan jenjang pendidikan.</p>

        <div class="row">
          <div class="col-md-6">
            <canvas id="distributionChart"></canvas>
          </div>
          <div class="col-md-6">
            <canvas id="trendChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- REKAP -->
  <div class="page-section" id="rekapPage">
    <div class="container">
      <div class="content-card" data-aos="fade-up">
        <h1 class="page-title">Rekap Data</h1>
        <p class="text-center text-muted mb-5">Rekapitulasi data penyaluran program Makan Bergizi Gratis per kecamatan.</p>

        <div class="dist-detail-cards">
          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <h3>Kecamatan</h3>
            <div class="dist-detail-number">6</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 100%;"></div>
            </div>
            <div class="dist-detail-percent">Total Kecamatan</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-building"></i>
            </div>
            <h3>SPPG</h3>
            <div class="dist-detail-number">95</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 100%;"></div>
            </div>
            <div class="dist-detail-percent">Total SPPG</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-people-fill"></i>
            </div>
            <h3>Kelompok Penerima</h3>
            <div class="dist-detail-number">1,209</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 100%;"></div>
            </div>
            <div class="dist-detail-percent">Total Kelompok</div>
          </div>

          <div class="dist-detail-card">
            <div class="dist-detail-icon">
              <i class="bi bi-person-fill"></i>
            </div>
            <h3>Orang Penerima</h3>
            <div class="dist-detail-number">150,155</div>
            <div class="dist-detail-bar">
              <div class="dist-detail-fill" style="width: 100%;"></div>
            </div>
            <div class="dist-detail-percent">Total Orang</div>
          </div>
        </div>

        <div class="edu-wrapper">

          <style>
            /* ===== GLOBAL ===== */
            body {
              font-family: Poppins, sans-serif;
              background: #f7f7f7
            }

            .edu-wrapper {
              max-width: 1100px;
              margin: auto
            }

            /* ===== MAIN DROPDOWN ===== */
            .edu-main {
              background: #fff;
              border-radius: 14px;
              box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
              overflow: hidden;
              margin-bottom: 20px;
            }

            .edu-title {
              padding: 20px 24px;
              font-weight: 700;
              cursor: pointer;
              display: flex;
              justify-content: space-between;
              align-items: center;
              border-left: 6px solid #D1B06C;
            }

            .edu-arrow {
              width: 12px;
              height: 12px;
              border-right: 2px solid #D1B06C;
              border-bottom: 2px solid #D1B06C;
              transform: rotate(45deg);
              transition: .3s;
            }

            .edu-main.active .edu-arrow {
              transform: rotate(-135deg)
            }

            .edu-body {
              max-height: 0;
              overflow: hidden;
              opacity: 0;
              transition: .5s;
              padding: 0 24px;
            }

            .edu-main.active .edu-body {
              max-height: 3000px;
              opacity: 1;
              padding: 20px 24px;
            }

            /* ===== CARD ===== */
            .edu-card {
              border: 1px solid #eee;
              border-radius: 12px;
              padding: 16px;
              margin-bottom: 14px;
              transition: .3s;
            }

            .edu-card:hover {
              transform: translateY(-3px);
              box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            }

            .edu-card h4 {
              margin: 0 0 10px;
              color: #D1B06C
            }

            /* ===== GRID ===== */
            .edu-grid {
              display: grid;
              grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
              gap: 15px
            }

            .edu-grid4 {
              display: grid;
              grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
              gap: 15px
            }

            .edu-item {
              text-align: center
            }

            .edu-item h3 {
              margin: 0;
              font-size: 20px
            }

            .edu-item p {
              margin: 3px 0 0;
              font-size: 12px;
              color: #777
            }

            /* ===== DROPDOWN SPPG ===== */
            .dropdown-btn {
              background: #D1B06C;
              color: #fff;
              border: none;
              padding: 14px 20px;
              border-radius: 12px;
              width: 100%;
              text-align: left;
              cursor: pointer;
              font-weight: 600;
              margin-bottom: 10px;
              transition: .3s;
            }

            .dropdown-btn:hover {
              box-shadow: 0 6px 15px rgba(0, 0, 0, .15)
            }

            .dropdown-content {
              max-height: 0;
              overflow: hidden;
              opacity: 0;
              transform: translateY(-10px);
              transition: .45s;
              background: #fff;
              border-radius: 12px;
              box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
              padding: 0 20px;
            }

            .dropdown-content.active {
              max-height: 900px;
              opacity: 1;
              transform: translateY(0);
              padding: 20px;
            }

            .table-title {
              text-align: center;
              margin-bottom: 15px;
              color: #D1B06C
            }

            /* ===== TABLE ===== */
            .pegawai-table {
              width: 100%;
              border-collapse: collapse
            }

            .pegawai-table th {
              background: #D1B06C;
              color: #fff;
              padding: 12px
            }

            .pegawai-table td {
              padding: 10px;
              text-align: center;
              border-bottom: 1px solid #eee
            }

            .pegawai-table tbody tr:hover {
              background: #faf6ea
            }

            .total {
              background: #D1B06C;
              color: #fff;
              font-weight: 700
            }
          </style>

          <script>
            function toggleMain(el) {
              el.classList.toggle("active")
            }

            function toggleTable() {
              document.getElementById("tableContent").classList.toggle("active")
            }
          </script>

          <div class="edu-wrapper">

            <h1 class="page-title">REKAP KECAMATAN</h1>
            <p class="text-center text-muted mb-5">Data Penyaluran MBG Per Kecamatan</p>

            <!-- SATUAN PENDIDIKAN -->
            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                Satuan Pendidikan
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div class="edu-card">
                  <h4>SMA</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>116</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>13.702</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>299</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>SMK</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>72</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>12.830</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>838</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>MA</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>9</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>2.280</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>220</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>SMP</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>93</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>24.306</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>1.110</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>MTS</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>13</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>3.857</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>288</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>SD</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>204</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>53.616</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>1.763</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>MI</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>32</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>5.081</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>203</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>TK</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>208</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>5.400</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>540</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>RA</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>31</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>1.364</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>171</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>PKBM</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>11</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>949</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>57</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>PESANTREN</h4>
                  <div class="edu-grid">
                    <div class="edu-item">
                      <h3>9</h3>
                      <p>Sekolah</p>
                    </div>
                    <div class="edu-item">
                      <h3>1.608</h3>
                      <p>Siswa</p>
                    </div>
                    <div class="edu-item">
                      <h3>209</h3>
                      <p>PTK</p>
                    </div>
                  </div>
                </div>

                <div class="edu-card">
                  <h4>KELOMPOK B3</h4>
                  <div class="edu-grid4">
                    <div class="edu-item">
                      <h3>484</h3>
                      <p>Posyandu</p>
                    </div>
                    <div class="edu-item">
                      <h3>13.861</h3>
                      <p>Balita</p>
                    </div>
                    <div class="edu-item">
                      <h3>1.524</h3>
                      <p>Bumil</p>
                    </div>
                    <div class="edu-item">
                      <h3>3.644</h3>
                      <p>Busui</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- DATA REKAP SPPG -->
            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                Data Rekap SPPG
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">

                <h3 style="margin-bottom:15px;color:#D1B06C;font-weight:600;text-align:center">
                  Jumlah Pegawai
                </h3>

                <div style="
      background:#fff;
      border-radius:12px;
      overflow:hidden;
      border:1px solid #eee;
    ">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;">
                    <thead style="background:#D1B06C;color:white;">
                      <tr>
                        <th style="padding:14px">No</th>
                        <th>Kecamatan</th>
                        <th>Sudah SLHS</th>
                        <th>Belum SLHS</th>
                        <th>Kota</th>
                        <th>Luar Kota</th>
                        <th>Lainnya</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td>19</td>
                        <td>303</td>
                        <td>18</td>
                        <td>10</td>
                        <td>9</td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td>15</td>
                        <td>442</td>
                        <td>40</td>
                        <td>8</td>
                        <td>7</td>
                      </tr>
                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td>8</td>
                        <td>171</td>
                        <td>13</td>
                        <td>3</td>
                        <td>5</td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td>24</td>
                        <td>469</td>
                        <td>77</td>
                        <td>13</td>
                        <td>11</td>
                      </tr>
                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td>11</td>
                        <td>205</td>
                        <td>28</td>
                        <td>5</td>
                        <td>6</td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td>18</td>
                        <td>346</td>
                        <td>36</td>
                        <td>6</td>
                        <td>12</td>
                      </tr>

                      <tr style="background:#D1B06C;color:white;font-weight:700">
                        <td colspan="2" style="padding:12px">TOTAL</td>
                        <td>95</td>
                        <td>1936</td>
                        <td>212</td>
                        <td>45</td>
                        <td>50</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>

            {{-- DATA REKAP BAHAN BAKU --}}
            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                DATA REKAP KELOMPOK PENERIMA
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1100px;">
                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KECAMATAN</th>
                        <th>SMA</th>
                        <th>SMK</th>
                        <th>MA</th>
                        <th>SMP</th>
                        <th>MTS</th>
                        <th>SD</th>
                        <th>MI</th>
                        <th>TKA/PAUD</th>
                        <th>RA</th>
                        <th>SLB</th>
                        <th>PKBM</th>
                        <th>PESANTREN</th>
                        <th>POSYANDU</th>
                        <th>JUMLAH</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td>5</td>
                        <td>15</td>
                        <td>2</td>
                        <td>12</td>
                        <td>5</td>
                        <td>33</td>
                        <td>3</td>
                        <td>35</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>103</td>
                        <td>220</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td>6</td>
                        <td>11</td>
                        <td>1</td>
                        <td>16</td>
                        <td>1</td>
                        <td>32</td>
                        <td>6</td>
                        <td>33</td>
                        <td>7</td>
                        <td>0</td>
                        <td>3</td>
                        <td>1</td>
                        <td>47</td>
                        <td>164</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td>3</td>
                        <td>9</td>
                        <td>0</td>
                        <td>7</td>
                        <td>2</td>
                        <td>18</td>
                        <td>5</td>
                        <td>19</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>29</td>
                        <td>94</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td>9</td>
                        <td>16</td>
                        <td>5</td>
                        <td>27</td>
                        <td>5</td>
                        <td>53</td>
                        <td>9</td>
                        <td>54</td>
                        <td>21</td>
                        <td>3</td>
                        <td>5</td>
                        <td>4</td>
                        <td>120</td>
                        <td>331</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td>8</td>
                        <td>8</td>
                        <td>0</td>
                        <td>17</td>
                        <td>0</td>
                        <td>29</td>
                        <td>2</td>
                        <td>32</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>1</td>
                        <td>61</td>
                        <td>159</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td>4</td>
                        <td>13</td>
                        <td>1</td>
                        <td>14</td>
                        <td>0</td>
                        <td>39</td>
                        <td>7</td>
                        <td>35</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>124</td>
                        <td>238</td>
                      </tr>

                      <tr style="background:#D1B06C;color:white;font-weight:700">
                        <td colspan="2" style="padding:12px">TOTAL</td>
                        <td>35</td>
                        <td>72</td>
                        <td>9</td>
                        <td>93</td>
                        <td>13</td>
                        <td>204</td>
                        <td>32</td>
                        <td>208</td>
                        <td>31</td>
                        <td>5</td>
                        <td>11</td>
                        <td>9</td>
                        <td>484</td>
                        <td>1206</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                DATA REKAP PENERIMA
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KECAMATAN</th>
                        <th>SMA</th>
                        <th>SMK</th>
                        <th>MA</th>
                        <th>SMP</th>
                        <th>MTS</th>
                        <th>SD</th>
                        <th>MI</th>
                        <th>TKA/PAUD</th>
                        <th>RA</th>
                        <th>SLB</th>
                        <th>PKBM</th>
                        <th>PESANTREN</th>
                        <th>PTK</th>
                        <th>BALITA</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td>1.088</td>
                        <td>3.275</td>
                        <td>51</td>
                        <td>2.425</td>
                        <td>1.681</td>
                        <td>6.286</td>
                        <td>202</td>
                        <td>597</td>
                        <td>53</td>
                        <td>75</td>
                        <td>200</td>
                        <td>85</td>
                        <td>857</td>
                        <td>3.027</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td>1.095</td>
                        <td>1.164</td>
                        <td>35</td>
                        <td>3.755</td>
                        <td>686</td>
                        <td>8.600</td>
                        <td>1.467</td>
                        <td>745</td>
                        <td>402</td>
                        <td>0</td>
                        <td>19</td>
                        <td>0</td>
                        <td>452</td>
                        <td>1.538</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td>1.916</td>
                        <td>128</td>
                        <td>0</td>
                        <td>527</td>
                        <td>285</td>
                        <td>5.013</td>
                        <td>694</td>
                        <td>434</td>
                        <td>54</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>311</td>
                        <td>488</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td>3.693</td>
                        <td>3.911</td>
                        <td>2.106</td>
                        <td>8.519</td>
                        <td>1.205</td>
                        <td>16.127</td>
                        <td>1.783</td>
                        <td>2.190</td>
                        <td>855</td>
                        <td>286</td>
                        <td>198</td>
                        <td>1.365</td>
                        <td>3.204</td>
                        <td>4.315</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td>3.280</td>
                        <td>848</td>
                        <td>0</td>
                        <td>6.173</td>
                        <td>0</td>
                        <td>8.243</td>
                        <td>0</td>
                        <td>702</td>
                        <td>0</td>
                        <td>0</td>
                        <td>532</td>
                        <td>0</td>
                        <td>377</td>
                        <td>1.109</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td>2.630</td>
                        <td>3.504</td>
                        <td>88</td>
                        <td>2.907</td>
                        <td>0</td>
                        <td>9.347</td>
                        <td>935</td>
                        <td>732</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>158</td>
                        <td>571</td>
                        <td>3.384</td>
                      </tr>

                      <tr style="background:#D1B06C;color:white;font-weight:700">
                        <td colspan="2" style="padding:12px">TOTAL</td>
                        <td>13.702</td>
                        <td>12.830</td>
                        <td>2.280</td>
                        <td>24.306</td>
                        <td>3.857</td>
                        <td>53.616</td>
                        <td>5.081</td>
                        <td>5.400</td>
                        <td>1.364</td>
                        <td>361</td>
                        <td>949</td>
                        <td>1.608</td>
                        <td>5.772</td>
                        <td>13.861</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                DATA REKAP BAHAN BAKU
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KECAMATAN</th>
                        <th>BERAS</th>
                        <th>MINYAK</th>
                        <th>TELUR</th>
                        <th>AYAM</th>
                        <th>DAGING</th>
                        <th>TAHU</th>
                        <th>TEMPE</th>
                        <th>BUAH</th>
                        <th>SUSU</th>
                        <th>MAKANAN OLAHAN</th>
                        <th>BAHAN LAINNYA</th>
                        <th>JUMLAH</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td>6</td>
                        <td>2</td>
                        <td>4</td>
                        <td>11</td>
                        <td>1</td>
                        <td>6</td>
                        <td>3</td>
                        <td>9</td>
                        <td>5</td>
                        <td>3</td>
                        <td>10</td>
                        <td>60</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td>3</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>0</td>
                        <td>2</td>
                        <td>19</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>5</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>4</td>
                        <td>3</td>
                        <td>1</td>
                        <td>1</td>
                        <td>25</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td>6</td>
                        <td>3</td>
                        <td>4</td>
                        <td>6</td>
                        <td>4</td>
                        <td>3</td>
                        <td>3</td>
                        <td>6</td>
                        <td>3</td>
                        <td>1</td>
                        <td>20</td>
                        <td>59</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td>4</td>
                        <td>5</td>
                        <td>4</td>
                        <td>6</td>
                        <td>4</td>
                        <td>5</td>
                        <td>5</td>
                        <td>8</td>
                        <td>4</td>
                        <td>4</td>
                        <td>7</td>
                        <td>56</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td>8</td>
                        <td>4</td>
                        <td>4</td>
                        <td>7</td>
                        <td>4</td>
                        <td>2</td>
                        <td>2</td>
                        <td>14</td>
                        <td>2</td>
                        <td>3</td>
                        <td>20</td>
                        <td>70</td>
                      </tr>

                      <tr style="background:#D1B06C;color:white;font-weight:700">
                        <td colspan="2" style="padding:12px">TOTAL</td>
                        <td>29</td>
                        <td>17</td>
                        <td>20</td>
                        <td>38</td>
                        <td>15</td>
                        <td>19</td>
                        <td>17</td>
                        <td>43</td>
                        <td>19</td>
                        <td>12</td>
                        <td>60</td>
                        <td>289</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                DATA REKAP TIMBUNAN SAMPAH
                <div class="edu-arrow"></div>
              </div>



              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1300px;text-align:center">

                    <!-- HEADER BULAN -->
                    <thead>
                      <tr style="background:#eee;font-weight:600">
                        <th rowspan="2" style="padding:14px">NO</th>
                        <th rowspan="2">KECAMATAN</th>
                        <th colspan="3">JULI</th>
                        <th colspan="3">AGUSTUS</th>
                        <th colspan="3">SEPTEMBER</th>
                        <th colspan="3">OKTOBER</th>
                        <th colspan="3">NOPEMBER</th>
                        <th colspan="3">DESEMBER</th>
                      </tr>

                      <!-- HEADER JENIS -->
                      <tr>
                        <!-- JULI -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>

                        <!-- AGUSTUS -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>

                        <!-- SEPTEMBER -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>

                        <!-- OKTOBER -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>

                        <!-- NOV -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>

                        <!-- DES -->
                        <th style="background:#1aa31a;color:#fff">ORGANIK</th>
                        <th style="background:#f08c00;color:#fff">ANORGANIK</th>
                        <th style="background:#c7002a;color:#fff">B3</th>
                      </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td colspan="18"> </td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td colspan="18"></td>
                      </tr>
                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td colspan="18"></td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td colspan="18"></td>
                      </tr>
                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td colspan="18"></td>
                      </tr>
                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td colspan="18"></td>
                      </tr>

                      <!-- TOTAL -->
                      <tr style="font-weight:700">
                        <td colspan="2">TOTAL</td>

                        <!-- JULI -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>

                        <!-- AGUS -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>

                        <!-- SEP -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>

                        <!-- OKT -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>

                        <!-- NOV -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>

                        <!-- DES -->
                        <td style="background:#1aa31a;color:#fff">0</td>
                        <td style="background:#f08c00;color:#fff">0</td>
                        <td style="background:#c7002a;color:#fff">0</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                DATA REKAP BAHAN BAKU
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KECAMATAN</th>
                        <th>BERAS</th>
                        <th>MINYAK</th>
                        <th>TELUR</th>
                        <th>AYAM</th>
                        <th>DAGING</th>
                        <th>TAHU</th>
                        <th>TEMPE</th>
                        <th>BUAH</th>
                        <th>SUSU</th>
                        <th>MAKANAN OLAHAN</th>
                        <th>BAHAN LAINNYA</th>
                        <th>JUMLAH</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bogor Utara</td>
                        <td>6</td>
                        <td>2</td>
                        <td>4</td>
                        <td>11</td>
                        <td>1</td>
                        <td>6</td>
                        <td>3</td>
                        <td>9</td>
                        <td>5</td>
                        <td>3</td>
                        <td>10</td>
                        <td>60</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bogor Selatan</td>
                        <td>3</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>0</td>
                        <td>2</td>
                        <td>19</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bogor Timur</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>5</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>4</td>
                        <td>3</td>
                        <td>1</td>
                        <td>1</td>
                        <td>25</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bogor Barat</td>
                        <td>6</td>
                        <td>3</td>
                        <td>4</td>
                        <td>6</td>
                        <td>4</td>
                        <td>3</td>
                        <td>3</td>
                        <td>6</td>
                        <td>3</td>
                        <td>1</td>
                        <td>20</td>
                        <td>59</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Bogor Tengah</td>
                        <td>4</td>
                        <td>5</td>
                        <td>4</td>
                        <td>6</td>
                        <td>4</td>
                        <td>5</td>
                        <td>5</td>
                        <td>8</td>
                        <td>4</td>
                        <td>4</td>
                        <td>7</td>
                        <td>56</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">6</td>
                        <td>Tanah Sareal</td>
                        <td>8</td>
                        <td>4</td>
                        <td>4</td>
                        <td>7</td>
                        <td>4</td>
                        <td>2</td>
                        <td>2</td>
                        <td>14</td>
                        <td>2</td>
                        <td>3</td>
                        <td>20</td>
                        <td>70</td>
                      </tr>

                      <tr style="background:#D1B06C;color:white;font-weight:700">
                        <td colspan="2" style="padding:12px">TOTAL</td>
                        <td>29</td>
                        <td>17</td>
                        <td>20</td>
                        <td>38</td>
                        <td>15</td>
                        <td>19</td>
                        <td>17</td>
                        <td>43</td>
                        <td>19</td>
                        <td>12</td>
                        <td>60</td>
                        <td>289</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <h1 class="page-title">DATA SEBARAN SPPG</h1>
            <p class="text-center text-muted mb-5">Data SPPG Per Kecamatan dan Kelurahan</p>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                BOGOR UTARA
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                BOGOR SELATAN
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                BOGOR TIMUR
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                BOGOR BARAT
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                BOGOR TENGAH
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="edu-main">
              <div class="edu-title" style="color:#D1B06C" onclick="toggleMain(this.parentElement)">
                TANAH SAREAL
                <div class="edu-arrow"></div>
              </div>

              <div class="edu-body">
                <div style="background:#fff;border-radius:12px;overflow:auto;border:1px solid #eee;">
                  <table style="width:100%;border-collapse:collapse;font-size:14px;min-width:1200px;">
                    <thead style="background:#D1B06C;color:#fff;">

                    </thead>

                    <thead style="background:#D1B06C;color:#fff;">
                      <tr>
                        <th style="padding:14px">NO</th>
                        <th>KELURAHAN</th>
                        <th>NAMA SPPG</th>
                        <th>YAYASAN</th>
                        <th>ALAMAT</th>
                        <th>SLHS</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td style="padding:12px">1</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati</td>
                        <td>Yayasan Bangun Bangsa Bersama</td>
                        <td>Perumahan Indraprasta Jl. Arimbi, IV No 10 Rt 07/RW 15 Kelurahan Bantarjati Bogor Utara</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">2</td>
                        <td>Bantarjati</td>
                        <td>SPPG KOTA BOGOR BOGOR UTARA BANTARJATI 04</td>
                        <td>Berkah Jalan Langit</td>
                        <td>Perumahan Indraprasta I, Jalan Arimbi Raya Nomor 05, Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">3</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 2</td>
                        <td>Yayasan Tarbiyatu Wad Dawah Alkautsar</td>
                        <td>Jl. Ceremai Ujung No. 53, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>YA</td>
                      </tr>

                      <tr style="background:#faf8f2">
                        <td style="padding:12px">4</td>
                        <td>Bantarjati</td>
                        <td>SPPG Kota Bogor Bogor Utara Bantarjati 3</td>
                        <td>Yayasan mandiri berkah group</td>
                        <td>Jl. Ceremai Ujung No.210 Rt.04 Rw.12 Kelurahan Bantarjati, Kecamatan Bogor Utara, Kota Bogor, Jawa Barat</td>
                        <td>TIDAK</td>
                      </tr>

                      <tr>
                        <td style="padding:12px">5</td>
                        <td>Cibuluh</td>
                        <td>SPPG Kota Bogor Bogor Utara Cibuluh 1</td>
                        <td>Yayasan Cipta Karya Harinny</td>
                        <td>Jl. Soleh Iskandar No 147 Kelurahan Cibuluh Kecamatan Bogor Utara Kota Bogor</td>
                        <td>YA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <style>
            /* BUTTON */
            .dropdown-btn {
              background: #ffffff;
              color: #D1B06C;
              border: none;
              padding: 14px 20px;
              border-radius: 10px;
              font-weight: 600;
              cursor: pointer;
              width: 100%;
              text-align: left;
              margin-bottom: 10px;
              transition: .3s;
            }

            .dropdown-btn:hover {
              transform: translateY(-2px);
              box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            }

            /* CONTENT SMOOTH */
            .dropdown-content {
              max-height: 0;
              overflow: hidden;
              opacity: 0;
              transform: translateY(-10px);
              transition: all .45s ease;
              background: white;
              padding: 0 20px;
              border-radius: 12px;
              box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }

            .dropdown-content.active {
              max-height: 800px;
              opacity: 1;
              transform: translateY(0);
              padding: 20px;
            }

            /* TITLE */
            .table-title {
              text-align: center;
              margin-bottom: 15px;
              color: #D1B06C;
              font-size: 20px;
            }

            /* TABLE */
            .pegawai-table {
              width: 100%;
              border-collapse: collapse;
              border-radius: 12px;
              overflow: hidden;
            }

            .pegawai-table th {
              background: #D1B06C;
              color: white;
              padding: 12px;
            }

            .pegawai-table td {
              padding: 10px;
              text-align: center;
              border-bottom: 1px solid #eee;
            }

            .pegawai-table tbody tr:hover {
              background: #faf6ea;
            }

            /* TOTAL */
            .total {
              background: #D1B06C;
              color: white;
              font-weight: bold;
            }
          </style>

          <script>
            function toggleTable() {
              document
                .getElementById("tableContent")
                .classList.toggle("active");
            }
          </script>
        </div>
      </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
        once: true
      });

      // Script untuk floating menu
      document.addEventListener('DOMContentLoaded', function() {
        const floatingItems = document.querySelectorAll('.floating-item');
        const pageSections = document.querySelectorAll('.page-section');

        floatingItems.forEach(item => {
          item.addEventListener('click', function() {
            // Hapus class active dari semua item dan section
            floatingItems.forEach(i => i.classList.remove('active'));
            pageSections.forEach(s => s.classList.remove('active'));

            // Tambahkan class active ke item yang diklik
            this.classList.add('active');

            // Tampilkan section yang sesuai
            const target = this.getAttribute('data-target');
            const targetSection = document.getElementById(target);
            if (targetSection) {
              targetSection.classList.add('active');

              // Jika chartPage, inisialisasi chart
              if (target === 'chartPage') {
                initCharts();
              }
            }
          });
        });

        // Script untuk tombol Lihat di filter
        const lihatBtn = document.getElementById('lihatBtn');
        if (lihatBtn) {
          lihatBtn.addEventListener('click', function() {
            const tahunAjaran = document.getElementById('tahunAjaran').value;
            const sppg = document.getElementById('sppg').value;
            const filter = document.getElementById('filter').value;
            const kecamatan = document.getElementById('kecamatan').value;

            const hasilDiv = document.getElementById('hasilFilter');
            hasilDiv.style.display = 'block';
            hasilDiv.innerHTML = `
            <h4>Hasil Filter</h4>
            <div class="row mb-3">
              <div class="col-md-3"><strong>Tahun Ajaran:</strong> ${tahunAjaran}</div>
              <div class="col-md-3"><strong>SPPG:</strong> ${sppg}</div>
              <div class="col-md-3"><strong>Filter:</strong> ${filter}</div>
              <div class="col-md-3"><strong>Kecamatan:</strong> ${kecamatan}</div>
            </div>
            <h5>Data Sekolah</h5>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nama Sekolah</th>
                    <th>Jenjang</th>
                    <th>Status MBG</th>
                    <th>Jumlah Siswa</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>SD Negeri 1 Bogor</td>
                    <td>SD</td>
                    <td>Sudah Menerima</td>
                    <td>450</td>
                  </tr>
                  <tr>
                    <td>SMP Negeri 2 Bogor</td>
                    <td>SMP</td>
                    <td>Sudah Menerima</td>
                    <td>320</td>
                  </tr>
                  <tr>
                    <td>SMA Negeri 3 Bogor</td>
                    <td>SMA</td>
                    <td>Belum Menerima</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>TK Aisyiyah Bogor</td>
                    <td>TK</td>
                    <td>Sudah Menerima</td>
                    <td>120</td>
                  </tr>
                </tbody>
              </table>
            </div>
          `;
          });
        }
      });

      function initCharts() {
        // Distribution Chart
        const ctx1 = document.getElementById('distributionChart').getContext('2d');
        new Chart(ctx1, {
          type: 'pie',
          data: {
            labels: ['SMA & Sederajat', 'SMP & Sederajat', 'SD & Sederajat', 'TK/PAUD & Sederajat'],
            datasets: [{
              data: [650000, 915000, 765000, 170000],
              backgroundColor: ['#D1B06C', '#B8964F', '#A67C52', '#8B5A2B']
            }]
          }
        });

        // Trend Chart
        const ctx2 = document.getElementById('trendChart').getContext('2d');
        new Chart(ctx2, {
          type: 'line',
          data: {
            labels: ['2023', '2024', '2025', '2026'],
            datasets: [{
              label: 'Jumlah Penerima',
              data: [1800000, 2100000, 2400000, 2500000],
              borderColor: '#D1B06C',
              fill: false
            }]
          }
        });
      }
    </script>
</body>

</html>