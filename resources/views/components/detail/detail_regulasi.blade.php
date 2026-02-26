<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makan Bergizi Gratis-Kota Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pages/gabung.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: #2d3436;
        }


        /* file */
        .header-section {
            background: linear-gradient(135deg, #071E49 0%, #1a365d 100%);
            color: white;
            padding: 60px 0 60px;
            margin-bottom: 30px;
            border-radius: 0 0 50px 50px;
        }

        .file-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid #eee;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .file-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-color: #D1B06C;
        }

        .file-icon {
            width: 50px;
            height: 50px;
            background: #ffeaa7;
            color: #d35400;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 20px;
        }

        .file-icon.pdf {
            background: #ffebee;
            color: #e74c3c;
        }

        .file-icon.doc {
            background: #e3f2fd;
            color: #3498db;
        }

        .file-icon.xlsx {
            background: #e8f5e9;
            color: #2ecc71;
        }

        .file-info {
            flex-grow: 1;
        }

        .file-title {
            font-weight: 700;
            color: #071E49;
            margin-bottom: 4px;
            font-size: 1.05rem;
        }

        .file-meta {
            font-size: 0.85rem;
            color: #636e72;
            display: flex;
            gap: 15px;
        }

        .btn-download-file {
            background: #f1f2f6;
            color: #2d3436;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-card:hover .btn-download-file {
            background: #D1B06C;
            color: white;
        }

        .category-badge {
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
            background: #dfe6e9;
            color: #2d3436;
            font-weight: 600;
        }

        .category-badge.utama {
            background: #d1b06c33;
            color: #947600;
        }

        .category-badge.teknis {
            background: #74b9ff33;
            color: #0984e3;
        }

        .search-box {
            background: white;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
        }

        .search-box i {
            color: #b2bec3;
            font-size: 1.2rem;
        }

        .sidebar-col {
            min-height: 100vh;
        }

        .sidebar-card {
            position: sticky;
            top: 100px;
            min-height: calc(100vh - 60px);
        }


        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }

        .list-group-item.active {
            background-color: #CDAA66;
            color: #fff !important;
        }

        .sidebar-card .bi {
            color: #133056;
        }

        .list-group-item.active .bi {
            color: white;
        }

        .judul-regulasi {
            color: #CDAA66;
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

    <div style="height: 70px;"></div> <!-- Spacer -->

    <div class="header-section text-center">
        <div class="container" data-aos="fade-down">
            <h1 class="fw-bold mb-3 judul-regulasi">Pusat Regulasi & Dokumen</h1>
            <p class="mb-5 text-white-50">Akses langsung ke seluruh dokumen legal, petunjuk teknis, dan standar
                operasional prosedur.</p>

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" id="searchInput" placeholder="Cari dokumen (misal: Perpres, Juknis, SOP)...">
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 p-3 sidebar-card">
                    <h6 class="fw-bold mb-3 text-uppercase text-secondary" style="font-size: 0.8rem;">
                        Kategori Dokumen
                    </h6>

                    <div class="list-group list-group-flush">
                        <a href="#"
                            data-category="all"
                            class="list-group-item list-group-item-action active fw-bold border-0 rounded py-2 mb-1 category-filter">
                            <i class="bi bi-grid-fill me-2"></i> Semua Dokumen
                        </a>

                        @foreach($kategoris as $kategori)
                        <a href="#"
                            data-category="{{ $kategori->id }}"
                            class="list-group-item list-group-item-action border-0 rounded py-2 mb-1 category-filter">
                            <i class="bi bi-file-earmark-text-fill me-2"></i> {{ $kategori->nama_kategori }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- File List -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0 text-secondary">Daftar Dokumen</h5>
                    <small class="text-muted" id="resultsCount">{{ count($regulasis) }} Dokumen ditemukan</small>
                </div>

                <div id="fileContainer">
                    @forelse($regulasis as $regulasi)
                    <!-- File Item -->
                    <div class="file-card searchable-item" data-aos="fade-up" data-category-id="{{ $regulasi->kategori_id }}">
                        <div class="d-flex align-items-center flex-grow-1">
                            <div class="file-icon pdf">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </div>
                            <div class="file-info">
                                <div class="file-title">{{ $regulasi->judul }}</div>
                                <div class="file-meta">
                                    <span class="category-badge utama">{{ $regulasi->kategori->nama_kategori ?? 'Dokumen' }}</span>
                                    <span><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($regulasi->tahun)->format('d M Y') }}</span>
                                    <span><i class="bi bi-info-circle"></i> {{ $regulasi->status }}</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $regulasi->file_pdf) }}"
                            class="btn-download-file"
                            title="Unduh"
                            download
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                    @empty
                    <div class="text-center py-5">
                        <p class="text-muted">Belum ada dokumen yang diunggah.</p>
                    </div>
                    @endforelse
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="text-center py-5 d-none">
                    <div class="mb-3">
                        <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold text-secondary">Dokumen tidak ditemukan</h5>
                    <p class="text-muted">Coba kata kunci lain atau periksa kembali ejaan Anda.</p>
                </div>

            </div>


        </div>
    </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            const searchInput = document.getElementById('searchInput');
            const fileContainer = document.getElementById('fileContainer');
            const fileCards = document.querySelectorAll('.searchable-item');
            const noResults = document.getElementById('noResults');
            const resultsCount = document.getElementById('resultsCount');

            let activeCategory = 'all';

            function filterFiles() {
                const query = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                fileCards.forEach(card => {
                    const title = card.querySelector('.file-title').textContent.toLowerCase();
                    const meta = card.querySelector('.file-meta').textContent.toLowerCase();
                    const categoryId = card.getAttribute('data-category-id');

                    const matchesSearch = title.includes(query) || meta.includes(query);
                    const matchesCategory = activeCategory === 'all' || categoryId === activeCategory;

                    if (matchesSearch && matchesCategory) {
                        card.classList.remove('d-none');
                        visibleCount++;
                    } else {
                        card.classList.add('d-none');
                    }
                });

                if (resultsCount) {
                    resultsCount.textContent = `${visibleCount} Dokumen ditemukan`;
                }

                if (visibleCount === 0 && fileCards.length > 0) {
                    noResults.classList.remove('d-none');
                    fileContainer.classList.add('d-none');
                } else {
                    noResults.classList.add('d-none');
                    fileContainer.classList.remove('d-none');
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterFiles);
            }

            const menuItems = document.querySelectorAll(".category-filter");
            menuItems.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();
                    menuItems.forEach(el => el.classList.remove("active", "fw-bold"));
                    this.classList.add("active", "fw-bold");

                    activeCategory = this.getAttribute('data-category');
                    filterFiles();
                });
            });

            // Updated: only show alert if url missing; otherwise let browser handle download/open.
            document.querySelectorAll('.btn-download-file').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const url = this.dataset.url || this.getAttribute('href');
                    if (!url || url === '#') {
                        e.preventDefault();
                        alert('File tidak tersedia.');
                        return;
                    }
                    if (this.hasAttribute('download') || this.getAttribute('target') === '_blank') {
                        return;
                    }
                    e.preventDefault();
                    window.open(url, '_blank', 'noopener');
                });
            });
        });
    </script>
</body>

</html>