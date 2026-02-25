<section id="tentang" class="about-section">
    <div class="container">

        <!-- HEADER -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="text-mbg">
                {{ $about->judul ?? 'MBG Kota Bogor' }}
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
                    {{ $about->judul ?? 'Makan Bergizi Gratis (MBG)' }}
                </h3>

                <p class="about-description">
                    {{ $about->deskripsi_1 ?? 'Deskripsi belum diisi.' }}
                </p>

                <p class="about-description">
                    {{ $about->deskripsi_2 ?? '' }}
                </p>

                <ul class="about-list">
                    @php
                        $listItems = [];

                        if($about && $about->list) {
                            if(is_array($about->list)) {
                                $listItems = $about->list;
                            } else {
                                $decoded = json_decode($about->list, true);
                                if(is_array($decoded)) {
                                    $listItems = $decoded;
                                } else {
                                    // Jika string biasa, pisah per baris (enter)
                                    $listItems = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $about->list)));
                                }
                            }
                        }
                    @endphp

                    @if(!empty($listItems))
                        @foreach($listItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    @else
                        <li>Data belum tersedia</li>
                    @endif
                </ul>

            </div>

        </div>
    </div>
</section>