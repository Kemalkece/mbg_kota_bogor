@props(['dataPenyalurans'])

<section id="data" style="padding:60px 0; position:relative; z-index:5;">
    <div class="container">

        <div class="data-header" style="text-align:center; margin-bottom:40px;">
            <h2 style="font-weight:900; color:#071E49;">
                Data Penyaluran Program MBG di Kota Bogor
            </h2>
            <p style="color:#6B7280;">
                Cakupan penerima manfaat per kategori
            </p>
        </div>

        <div class="data-wrapper">

            @if ($dataPenyalurans->isEmpty())

                <div style="text-align:center; padding:40px 0;">
                    <h4 style="font-weight:800; color:#071E49;">
                        Belum Ada Data Penyaluran
                    </h4>
                    <p style="color:#9CA3AF;">
                        Data distribusi akan diperbarui secara berkala.
                    </p>
                </div>
            @else
                <div class="slider-container" style="position:relative;">

                    <!-- LEFT BUTTON -->
                    <style>
                        .slider-btn {
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                            border: none;
                            background: white;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            cursor: pointer;
                            z-index: 20;
                            font-size: 24px;
                            transition: all 0.3s ease;
                        }

                        .slider-btn:hover {
                            background: #D1B06C;
                            /* warna hover */
                            color: white;
                            /* warna icon */
                            transform: translateY(-50%) scale(1.1);
                            /* sedikit membesar */
                            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
                        }

                        .slider-btn-left {
                            left: -25px;
                        }

                        .slider-btn-right {
                            right: -15px;
                        }
                    </style>

                    <!-- LEFT BUTTON -->
                    <button onclick="scrollSlider(-1)" class="slider-btn slider-btn-left">
                        ‹
                    </button>

                    <!-- RIGHT BUTTON -->
                    <button onclick="scrollSlider(1)" class="slider-btn slider-btn-right">
                        ›
                    </button>

                    <!-- SLIDER -->
                    <div id="slider"
                        style="
                    display:flex;
                    gap:24px;
                    overflow-x:auto;
                    scroll-behavior:smooth;
                    padding:10px 5px;
                ">

                        @foreach ($dataPenyalurans as $index => $data)
                            <div
                                style="
                        min-width:280px;
                        max-width:400px;
                        min-height:100px;
                        max-height:200px;
                        border-radius:20px;
                        padding:20px;
                        display:flex;
                        align-items:flex-start;
                        justify-content:space-between;
                        gap:20px;
                        background: {{ $index % 2 == 0 ? '#F3E5AB' : '#071E49' }};
                        color: {{ $index % 2 == 0 ? '#071E49' : 'white' }};
                        box-shadow:0 8px 20px rgba(0,0,0,0.08);
                        flex-shrink:0;
                    ">

                                <!-- TEXT -->
                                <div style="flex:1;">
                                    <h3
                                        style="
                                font-size:18px;
                                font-weight:800;
                                margin-bottom:8px;
                            ">
                                        {{ $data->judul }}
                                    </h3>

                                    <p
                                        style="
                                font-size:14px;
                                line-height:1.6;
                            ">
                                        {{ $data->deskripsi }}
                                    </p>
                                </div>

                                <!-- IMAGE -->
                                <div style="flex-shrink:0;">
                                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                                        style="
                                    width:95px;
                                    height:130px;
                                    object-fit:cover;
                                    border-radius:14px;
                                ">
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

                <div style="text-align:center; margin-top:40px;">
                    <button onclick="window.location.href='/detail-data'"
                        style="
                    padding:12px 28px;
                    border:none;
                    border-radius:30px;
                    background:#C7A14A;
                    color:white;
                    font-weight:700;
                    cursor:pointer;
                    box-shadow:0 6px 16px rgba(199,161,74,0.4);
                ">
                        Lihat Detail
                    </button>
                </div>

            @endif

        </div>
    </div>
</section>

<script>
    function scrollSlider(direction) {
        const slider = document.getElementById('slider');
        slider.scrollBy({
            left: direction * 520,
            behavior: 'smooth'
        });
    }
</script>
