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
        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
      </a>

    </div>
  </nav>

  <div class="container">
    <div class="content-card" data-aos="fade-up">
      <h1 class="page-title"> Detail Statistik Distribusi</h1>
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
    <h3 class="fw-bold text-center mb-4" style="color: #071E49;">Analisis & Wawasan</h3>
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

    <!-- DATA PENYALURAN PROGRAM MBG KOTA BOGOR -->
    <style>
      .stat-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
      }

      .stat-box {
        color: white;
        padding: 18px;
        border-radius: 12px;
        text-align: center;
        width: 170px;
        height: 130px;
        cursor: pointer;
        transition: .3s;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .stat-box:hover {
        transform: translateY(-4px);
      }

      /* WARNA */
      .box1,
      .box2,
      .box3,
      .box4,
      .box5 {
        background: #D1B06C;
      }

      .modal .stat-box {
        width: 100%;
        height: 110px;
      }

      .stat-box h5 {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
        color: #071E49;
      }

      .teks-box {
        color: #ffffff;
        padding: 8px;
        border-radius: 8px;
      }
    </style>


    <div class="mt-5 p-4 bg-light rounded-4 text-center">
      <h5 class="fw-bold mb-4">
        DATA PENYALURAN PROGRAM MBG KOTA BOGOR
      </h5>

      <div class="stat-container">

        <div class="stat-box box1" data-bs-toggle="modal" data-bs-target="#modalPenyaluran">
          <div class="teks-box">
            <h5>Data Penyaluran</h5>
          </div>
        </div>

        <div class="stat-box box2" data-bs-toggle="modal" data-bs-target="#modalSekolah">
          <div class="teks-box">
            <h5>Satuan Pendidikan</h5>
          </div>
        </div>

        <div class="stat-box box3" data-bs-toggle="modal" data-bs-target="#modalKelompok">
          <div class="teks-box">
            <h5>Kelompok B3</h5>
          </div>
        </div>

        <div class="stat-box box4" data-bs-toggle="modal" data-bs-target="#modalRekap">
          <div class="teks-box">
            <h5>Rekap Kecamatan</h5>
          </div>
        </div>

        <div class="stat-box box5" data-bs-toggle="modal" data-bs-target="#modalSebaran">
          <div class="teks-box">
            <h5>Data Sebaran</h5>
          </div>
        </div>

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



    <div class="modal fade" id="modalKelompok" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
          <div class="modal-header">
            <h5>Kelompok B3</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">Isi data kelompok B3 di sini</div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalRekap" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
          <div class="modal-header">
            <h5>Rekap Kecamatan</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">Isi rekap kecamatan di sini</div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalSebaran" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
          <div class="modal-header">
            <h5>Data Sebaran</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">Isi data sebaran di sini</div>
        </div>
      </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Chart Simulation (Placeholder) -->
    <div class="mt-5 p-4 bg-light rounded-4 text-center">
      <h5 class="fw-bold mb-3">
        Tren Pertumbuhan Penerima Manfaat
      </h5>

      <div style="height: 300px; display: flex; align-items: end; justify-content: center; gap: 20px;">
        <div style="width: 40px; height: 40%; background: #bdc3c7; border-radius: 5px;"></div>
        <div style="width: 40px; height: 55%; background: #bdc3c7; border-radius: 5px;"></div>
        <div style="width: 40px; height: 75%; background: #D1B06C; border-radius: 5px;" title="Tahun Ini"></div>
        <div style="width: 40px; height: 90%; background: #bdc3c7; border-radius: 5px; opacity: 0.5;"></div>
      </div>

      <p class="text-muted mt-3 small">
        Grafik simulasi tren peningkatan jumlah penerima manfaat dari tahun ke tahun.
      </p>
    </div>

    <div class="download-wrapper">
      <a href="#" class="btn-download">
        Unduh Laporan Lengkap (PDF)
      </a>
    </div>
  </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>

</html>