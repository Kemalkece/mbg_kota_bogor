@extends('layouts.app')

@section('content')
<!-- Navbar -->

<!-- Hero Section -->
<x-hero :beritas="$beritas" />

<!-- Sasaran Section -->
<x-sasaran :sasarans="$sasarans" />

<!-- About Section -->
<x-about />

<!-- Data Section -->
<x-data :dataPenyalurans="$dataPenyalurans" />

<!-- Cek Gizi Section -->
<x-cek-gizi />

<!-- Regulasi Section -->
<x-regulasi :regulasis="$regulasis" />

<!-- Map Section -->
<x-map />

<!-- FAQ Section -->
<x-faq :faqs="$faqs" />

<!-- Logo Bar -->
<x-logo-bar :collabs="$collabs" />


<!-- Floating Action Buttons (FAB) for Accessibility/Tools -->

@endsection