    @extends('layouts.app')

@section('content')
<!-- Navbar -->
<!-- TEST BUTTON FOR CAROUSEL -->

<!-- Hero Section -->
<x-hero :beritas="$beritas" />

<!-- Sasaran Section -->
<x-sasaran :sasarans="$sasarans" />

<!-- Tentang Section -->
<x-tentang :tentang="$tentang" />

<!-- Menu Harian Section -->
<x-menu :menus="$menus" />

<!-- Data Section -->
<x-data :dataPenyalurans="$dataPenyalurans" />

<!-- Cek Gizi Section -->
<x-cek-gizi />

<!-- Regulasi Section -->
<x-regulasi :regulasis="$regulasis" />

<!-- Peta Section -->
<x-peta />

<!-- FAQ Section -->
<x-faq :faqs="$faqs" />

<!-- Logo Bar -->
<x-logo_bar :kolaborasi="$kolaborasi" />


<!-- Floating Action Buttons (FAB) for Accessibility/Tools -->

@endsection