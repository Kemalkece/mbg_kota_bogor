@props(['kolaborasi'])
<section class="logo-bar py-12 relative overflow-hidden flex flex-col items-center"
    style="background:#071E49;">

    <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kanan" class="batik-img batik-right absolute -right-10 top-1/2 -translate-y-1/2 h-40 opacity-10 pointer-events-none">
    <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kiri" class="batik-img batik-left absolute -left-10 top-1/2 -translate-y-1/2 h-40 opacity-10 scale-x-[-1] pointer-events-none">

    <div class="container mx-auto px-6 relative z-10 w-full">
        <div class="logo-title text-center text-gray-500 text-xs md:text-sm font-bold uppercase tracking-widest mb-10">
            Berkolaborasi dan Bersinergi Bersama
        </div>

        <div class="logo-container flex flex-wrap justify-center items-center gap-8 md:gap-16 w-full">
            @if($kolaborasi->isEmpty())
            <div style="width:100%;text-align:center;padding:20px 0;">
                <div style="display:flex;align-items:center;justify-content:center;gap:16px;flex-wrap:wrap;">
                    {{-- Ghost logo placeholders --}}
                    @foreach(range(1,5) as $i)
                    <div style="width:90px;height:40px;border-radius:10px;background:rgba(255,255,255,0.05);border:1px dashed rgba(255,255,255,0.1);"></div>
                    @endforeach
                </div>
                <p style="color:rgba(255,255,255,0.25);font-size:12px;margin-top:20px;letter-spacing:0.1em;text-transform:uppercase;font-weight:600;">
                    Partner logo akan ditampilkan di sini
                </p>
            </div>
            @else
            @foreach($kolaborasi as $item)
            <div class="logo-item grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-300 cursor-pointer logo-tooltip-wrapper">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_instansi }}" class="h-10 md:h-14 w-auto object-contain">
                <span class="logo-tooltip-text">{{ $item->nama_instansi }}</span>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>