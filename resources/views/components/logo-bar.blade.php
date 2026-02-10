<section class="logo-bar py-10 relative overflow-hidden flex flex-col items-center"
         style="background:#071E49;">

   <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kanan" class="batik-img batik-right absolute -right-10 top-1/2 -translate-y-1/2 h-32 opacity-10">
   <img src="{{ asset('images/rubo_mencari.png') }}" alt="Batik kiri" class="batik-img batik-left absolute -left-10 top-1/2 -translate-y-1/2 h-32 opacity-10 scale-x-[-1]">


    <div class="logo-title text-center text-gray-500 text-sm font-bold uppercase tracking-widest mb-8">
        Berkolaborasi dan Bersinergi Bersama
    </div>

   <div class="logo-container flex flex-wrap justify-center items-center gap-10">
    @foreach([1,2,3,4] as $i)
    <div class="logo-item grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition duration-300">
        <img src="{{ asset('images/logo'.$i.'.png') }}" alt="Logo {{ $i }}" class="h-10 w-auto">
    </div>
    @endforeach
</div>
</section>
