@props(['tentang'])
<section id="tentang" class="about-section">
    <div class="container">

        <!-- HEADER -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="text-mbg">
                {{ $tentang?->judul ?? 'MBG Kota Bogor' }}
            </h2>
        </div>

        <!-- CONTENT -->
        <div class="about-wrapper" data-aos="fade-up">

            <!-- ILUSTRASI (STATIS / TETAP) -->
            <div class="about-illustration-side">
                <div class="about-dino-container">
                    <div class="about-deco-circle-bg"></div>
                    <div class="about-deco-dots"></div>
                    <div class="about-deco-yellow-blob"></div>
                    <div class="about-dino-image">
                        <img src="{{ asset('images/animasi.gif') }}" alt="Rubo">
                    </div>
                </div>
            </div>

            <!-- TEKS KANAN -->
            <div class="about-content-side">

                <h3 class="about-title">
                    {{ $tentang?->judul ?? 'Makan Bergizi Gratis (MBG)' }}
                </h3>

                <p class="about-description">
                    {{ $tentang?->deskripsi_1 ?? 'Program Makan Bergizi Gratis (MBG) adalah inisiatif pemerintah untuk memastikan setiap warga Kota Bogor mendapatkan asupan gizi yang cukup dan berkualitas setiap harinya.' }}
                </p>

                @if($tentang?->deskripsi_2)
                <p class="about-description">
                    {{ $tentang->deskripsi_2 }}
                </p>
                @endif

                <ul class="about-list">
                    @php
                    $listItems = [];

                    if($tentang && $tentang->list) {
                    if(is_array($tentang->list)) {
                    $listItems = $tentang->list;
                    } else {
                    $decoded = json_decode($tentang->list, true);
                    if(is_array($decoded)) {
                    $listItems = $decoded;
                    } else {
                    $listItems = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $tentang->list)));
                    }
                    }
                    }
                    @endphp

                    @if(!empty($listItems))
                    @foreach($listItems as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                    @else
                    <li>Mendukung pemenuhan gizi seluruh lapisan masyarakat</li>
                    <li>Distribusi makanan bergizi kepada anak usia sekolah</li>
                    <li>Penguatan program gizi ibu hamil dan menyusui</li>
                    <li>Kemitraan bersama SPPG dan mitra lokal Kota Bogor</li>
                    @endif
                </ul>

            </div>

        </div>
    </div>
</section>