@props(['dataPenyalurans'])
<section id="data">
    <div class="container">
        <div class="data-header">
            <h2>Data Penyaluran Program MBG di Kota Bogor</h2>
            <p>Cakupan penerima manfaat per kategori</p>
        </div>

        <div class="data-wrapper">
            <div class="slider-container">
                <!-- LEFT/RIGHT BUTTONS -->
                <button aria-label="Geser Kiri" onclick="scrollSlider(-1)" class="slider-btn prev">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button aria-label="Geser Kanan" onclick="scrollSlider(1)" class="slider-btn next">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <!-- Slider -->
                <div id="slider">
                    @foreach ($dataPenyalurans as $index => $data)
                    <div class="slider-item {{ $index % 2 == 0 ? 'gold' : 'dark' }}">
                        <div class="slider-content">
                            <h3>{{ $data->title }}</h3>
                            <p>{{ $data->deskripsi }}</p>
                        </div>
                        <div class="slider-image">
                            <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="data-btn-wrapper">
                <button onclick="window.location.href='/data-detail'" class="detail-btn">
                    Lihat Detail
                </button>
            </div>
        </div>
    </div>
</section>