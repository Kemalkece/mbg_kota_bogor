@php
$navData = [
['label' => 'Beranda', 'type' => 'anchor', 'target' => 'beranda'],
['label' => 'Sasaran', 'type' => 'anchor', 'target' => 'sasaran'],
['label' => 'Tentang', 'type' => 'anchor', 'target' => 'tentang'],
['label' => 'Menu', 'type' => 'anchor', 'target' => 'menu-harian'],
['label' => 'Data', 'type' => 'route', 'route' => 'detail_data'],
['label' => 'Regulasi', 'type' => 'route', 'route' => 'detail_regulasi'],
['label' => 'Peta MBG', 'type' => 'anchor', 'target' => 'peta-mbg'],
['label' => 'FAQ', 'type' => 'route', 'route' => 'detail_faq'],
];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
    <div class="container-xl">

        {{-- logo --}}
        <a class="navbar-brand" href="{{ url('/') }}" onclick="window.location.href=this.href;">
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

                    @php
                    // compute href based on type
                    $link = '#';
                    if ($nav['type'] === 'route' && isset($nav['route']) && Route::has($nav['route'])) {
                    $link = route($nav['route']);
                    } elseif ($nav['type'] === 'anchor' && isset($nav['target'])) {
                    // always navigate to homepage anchor (ensure slash before #)
                    $link = url('/') . '/#' . $nav['target'];
                    }
                    @endphp
                    <a class="nav-link" href="{{ $link }}" onclick="window.location.href=this.href;">
                        {{ $nav['label'] }}
                    </a>

                </li>
                @endforeach
            </ul>
        </div>

    </div>
</nav>