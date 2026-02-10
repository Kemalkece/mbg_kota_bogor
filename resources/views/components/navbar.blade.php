@php
$navData = [
    ['label' => 'Beranda', 'url' => '#beranda', 'section' => 'beranda'],
    ['label' => 'Sasaran', 'url' => '#sasaran', 'section' => 'sasaran'],
    ['label' => 'Data', 'url' => '#data', 'section' => 'data'],
    ['label' => 'Regulasi', 'url' => '#regulasi', 'section' => 'regulasi'],
    ['label' => 'Peta MBG', 'url' => '#peta-mbg', 'section' => 'peta-mbg'],
    ['label' => 'FAQ', 'url' => '#faq', 'section' => 'faq']
];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
    <div class="container-xl">

        <a class="navbar-brand" href="#beranda">
            <img src="/images/logo.png">
            <div class="navbar-brand-text">
                <span class="brand-label">Program Nasional</span>
                <span class="brand-name">Makan Bergizi Gratis</span>
            </div>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach($navData as $nav)
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ $nav['url'] }}"
                       data-section="{{ $nav['section'] }}">
                       {{ $nav['label'] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</nav>
