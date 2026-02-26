@extends('layouts.app')

@section('content')
<!-- Navbar -->

<!-- Hero Section -->
<x-hero :beritas="$beritas" />

<!-- Sasaran Section -->
<x-sasaran :sasarans="$sasarans" />

<!-- Tentang Section -->
<x-tentang :tentang="$tentang" />

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