@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5" style="max-width:900px;">

    {{-- tombol kembali --}}
<a href="{{ url('/hero') }}"
   class="d-inline-block mb-3"
   style="background:#CFAD69; color:white; padding:8px 14px; border-radius:8px; text-decoration:none;">
   ← Kembali ke Berita
</a>


    {{-- judul berita --}}
    <h1 style="font-weight:700; line-height:1.3;">
        {{ $berita->title }}
    </h1>

    {{-- tanggal --}}
   <p class="text-muted mb-4">
    <i class="bi bi-calendar"></i>
    Diterbitkan pada {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
</p>


    {{-- gambar berita --}}
    <img src="{{ asset('storage/' . $berita->image) }}"
         class="img-fluid rounded mb-4"
         style="width:100%; object-fit:cover;">

    {{-- isi berita --}}
    <div style="line-height:1.9; font-size:1.05rem;">
        {{ $berita->deskripsi }}
    </div>

</div>
@endsection
