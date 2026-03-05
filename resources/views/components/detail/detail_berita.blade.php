@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5" style="max-width:1200px; background:#ffffff; border-radius:22px; box-shadow:0 4px 32px rgba(17,38,77,0.13); margin-bottom:48px;">
    <div style="background:transparent; border-radius:18px; box-shadow:none; padding:40px 40px;">
        {{-- tombol kembali --}}
        <a href="{{ url('/hero') }}"
            class="d-inline-block mb-3"
            style="background:#fff; color:#CDAA66; padding:10px 20px; border-radius:14px; text-decoration:none; box-shadow:0 2px 12px rgba(17,38,77,0.15); font-weight:600; border:1px solid #CAD3E5;">
             Kembali ke Berita
        </a>

        <h1 style="font-weight:700; line-height:1.3;">
            {{ $berita->judul }}
        </h1>

        {{-- tanggal --}}
        <p class="text-muted mb-4">
            <i class="bi bi-calendar"></i>
            Diterbitkan pada {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
        </p>

        {{-- gambar berita --}}
        <img src="{{ asset('storage/' . $berita->gambar) }}"
            class="img-fluid rounded mb-4"
            style="width:100%; object-fit:cover; max-height:420px;">

        {{-- isi berita --}}
        <div style="line-height:1.9; font-size:1.05rem;">
            {!! $berita->deskripsi !!}
        </div>
    </div>
</div>
@endsection