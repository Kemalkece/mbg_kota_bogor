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
<x-data />

<!-- Cek Gizi Section -->
<x-cek-gizi />

<!-- Regulasi Section -->
<x-regulasi />

<!-- Map Section -->
<x-map />

<!-- FAQ Section -->
<x-faq />

<!-- Logo Bar -->
<x-logo-bar />


<!-- Floating Action Buttons (FAB) for Accessibility/Tools -->

@endsection