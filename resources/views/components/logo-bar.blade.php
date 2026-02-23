@props(['collabs'])
<section class="logo-bar py-12 relative overflow-hidden flex flex-col items-center"
    style="background:#071E49;">

    <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kanan" class="batik-img batik-right absolute -right-10 top-1/2 -translate-y-1/2 h-40 opacity-10 pointer-events-none">
    <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kiri" class="batik-img batik-left absolute -left-10 top-1/2 -translate-y-1/2 h-40 opacity-10 scale-x-[-1] pointer-events-none">

    <div class="container mx-auto px-6 relative z-10 w-full">
        <div class="logo-title text-center text-gray-500 text-xs md:text-sm font-bold uppercase tracking-widest mb-10">
            Berkolaborasi dan Bersinergi Bersama
        </div>

        <div class="logo-container flex flex-wrap justify-center items-center gap-8 md:gap-16 w-full">
            @foreach($collabs as $collab)
            <div class="logo-item grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-300">
                <img src="{{ asset('storage/' . $collab->image) }}" alt="Logo Kolaborasi" class="h-10 md:h-14 w-auto object-contain">
            </div>
            @endforeach
        </div>
    </div>
</section>