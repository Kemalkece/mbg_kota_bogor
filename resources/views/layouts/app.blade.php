<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Makan Bergizi Gratis</title>
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    
    <!-- Vite Resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Preloader -->
    <div id="loader" class="fixed inset-0 bg-white z-[9999] flex justify-center items-center transition-opacity duration-500">
        <div class="relative w-20 h-20">
            <div class="absolute inset-0 border-4 border-gray-200 rounded-full"></div>
            <div class="absolute inset-0 border-4 border-[#D1B06C] rounded-full border-t-transparent animate-spin"></div>
            <img src="/images/logo.png" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8 h-8 animate-pulse" alt="Loading...">
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Floating Action Buttons -->
    <div class="fab-container fixed top-1/2 right-6 -translate-y-1/2 z-50 flex flex-col-reverse items-center gap-4 group" id="radialFab">
        <button class="fab-main w-16 h-16 bg-[#CDAA66] text-white rounded-full flex items-center justify-center text-2xl shadow-lg hover:shadow-xl transition-transform duration-300 z-10" onclick="toggleFab()" aria-label="Menu Aksesibilitas">
            <i class="bi bi-universal-access"></i>
        </button>
        
        <div class="fab-items absolute bottom-full mb-4 flex flex-col gap-3 transition-all duration-300 opacity-0 transform translate-y-10 scale-0 group-hover:opacity-100 group-hover:translate-y-0 group-hover:scale-100 origin-bottom pointer-events-none group-hover:pointer-events-auto">
            <button class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" id="btnGrayscale" onclick="toggleGrayscale()" title="Mode Grayscale">
                <i class="bi bi-eye-slash"></i>
            </button>
            <button class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" id="btnContrast" onclick="toggleHighContrast()" title="Kontras Tinggi">
                <i class="bi bi-brightness-high"></i>
            </button>
            <button class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" id="btnFontUp" onclick="increaseFontSize()" title="Besarkan Teks">
                <i class="bi bi-zoom-in"></i>
            </button>
            <button class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" id="btnReadText" onclick="toggleReadMode()" title="Baca Teks">
                <i class="bi bi-volume-up"></i>
            </button>
             <a href="#data" class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" title="Data Sekolah">
                <i class="bi bi-building"></i>
            </a>
            <a href="https://wa.me/6285175220149" class="fab-item w-12 h-12 bg-[#CDAA66] text-white rounded-xl flex items-center justify-center shadow-md hover:scale-110 transition" target="_blank" rel="noopener noreferrer" title="Lapor MBG">
                <i class="bi bi-megaphone"></i>
            </a>
        </div>
    </div>

    <!-- Back to Top -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-[#071E49] text-white rounded-full shadow-lg flex items-center justify-center text-xl cursor-pointer opacity-0 invisible transition-all duration-300 hover:scale-110 hover:-translate-y-1 [&.show]:opacity-100 [&.show]:visible z-40">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/pages/mbg.js') }}"></script>
</body>
</html>
