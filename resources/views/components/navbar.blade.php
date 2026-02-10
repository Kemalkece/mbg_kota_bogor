@php
$navData = [
    [
        'label' => 'Beranda',
        'url' => '#beranda'
    ],
    [
        'label' => 'Sasaran',
        'url' => '#sasaran'
    ],
    [
        'label' => 'Tentang',
        'url' => '#tentang'
    ],
    [
        'label' => 'Statistik',
        'url' => '/statistik'
    ],
    [
        'label' => 'Regulasi',
        'url' => '#regulasi'
    ],
    [
        'label' => 'Peta MBG',
        'url' => '#peta-mbg'
    ],
    [
        'label' => 'FAQ',
        'url' => '#faq'
    ]
];
@endphp

<nav id="mainNav" class="fixed top-0 left-0 right-0 w-full z-50 py-[25px] transition-all duration-300 bg-gradient-to-b from-black/70 to-transparent backdrop-blur-none border-b-0 [&.scrolled]:py-3 [&.scrolled]:bg-white/98 [&.scrolled]:backdrop-blur-md [&.scrolled]:shadow-sm [&.scrolled]:border-b [&.scrolled]:border-white/30">
    <div class="container mx-auto px-4 xl:px-8">
        <div class="flex items-center justify-between">
            <a class="navbar-brand font-bold text-xl text-white flex items-center gap-2 transition-all duration-300 group [&.scrolled_&]:text-[#071E49]" href="#beranda">
                <img src="/images/logo.png" alt="BGN Logo" class="w-10 h-10 object-contain drop-shadow-md transition-all duration-300 group-[.scrolled]:drop-shadow-none">
                <div class="navbar-brand-text flex flex-col leading-[1.1]">
                    <span class="brand-label text-[0.65rem] font-semibold text-white/90 tracking-wider uppercase transition-all duration-300 group-[.scrolled]:text-[#071E49]/80">Program Nasional</span>
                    <span class="brand-name text-base font-extrabold bg-gradient-to-br from-[#D1B06C] to-[#E8D4A2] text-transparent bg-clip-text transition-all duration-300 group-[.scrolled]:from-[#D1B06C] group-[.scrolled]:to-[#B8964F]">Makan Bergizi Gratis</span>
                </div>
            </a>

            <button class="navbar-toggler lg:hidden border border-white/50 p-2 rounded-lg transition-all duration-300 hover:bg-white/10 focus:outline-none [&.scrolled_&]:border-[#071E49]/20" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon block w-6 h-6 bg-[url('data:image/svg+xml;charset=utf8,%3Csvg%20viewBox=%220%200%2030%2030%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath%20stroke=%22rgba%28255,%20255,%20255,%201%29%22%20stroke-width=%222%22%20stroke-linecap=%22round%22%20stroke-miterlimit=%2210%22%20d=%22M4%207h22M4%2015h22M4%2023h22%22/%3E%3C/svg%3E')] transition-all duration-300 [&.scrolled_&]:invert"></span>
            </button>

            <div class="collapse navbar-collapse hidden lg:flex lg:items-center bg-[#071E49]/95 lg:bg-transparent backdrop-blur-md lg:backdrop-blur-none p-5 lg:p-0 mt-4 lg:mt-0 rounded-2xl lg:rounded-none shadow-lg lg:shadow-none [&.scrolled_&]:bg-white [&.scrolled_&]:text-[#071E49]" id="navbarNav">
                <ul class="navbar-nav ms-auto flex flex-col lg:flex-row gap-2 lg:gap-6 ml-auto list-none pl-0 mb-0">
                    @foreach($navData as $data)
                    <li class="nav-item">
                        <a class="nav-link text-white/90 font-medium px-2 py-1 relative transition-all duration-300 drop-shadow-sm hover:text-white [&.active]:text-white lg:[&.scrolled_&]:text-[#071E49] lg:[&.scrolled_&]:drop-shadow-none group"
                            href="{{ $data['url'] }}"
                            data-section="{{ $data['label'] }}">
                            <span class="absolute bottom-[-5px] left-1/2 -translate-x-1/2 w-0 h-[3px] bg-[#D1B06C] transition-all duration-300 group-hover:w-[80%] group-[.active]:w-[80%]"></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>