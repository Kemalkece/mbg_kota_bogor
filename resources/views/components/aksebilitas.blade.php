    <div class="fab-container" id="radialFab">
        <button class="fab-main" onclick="toggleFab()">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="fab-items">
            <button class="fab-item item-1" data-bs-toggle="modal" data-bs-target="#cekGiziModal">
                <i class="bi bi-heart-pulse"></i>
                <span class="fab-label-radial">Cek Gizi</span>
            </button>
            <button class="fab-item item-2">
                <i class="bi bi-person-wheelchair"></i>
                <span class="fab-label-radial">Disabilitas</span>
            </button>
<button class="fab-item item-3"
        onclick="window.location.href='/data-detail'">
    <i class="bi bi-building"></i>
    <span class="fab-label-radial">Data Sekolah</span>
</button>

            <a href="https://wa.me/6285175220149" class="fab-item item-4" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-megaphone"></i>
                <span class="fab-label-radial">Lapor MBG</span>
            </a>
        </div>
    </div>

        <!-- Modal Layanan Disabilitas -->
<script src="https://cdn.jsdelivr.net/npm/sienna-accessibility@latest/dist/sienna-accessibility.umd.js" defer></script>
<style>
.asw-widget { display: none; }
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.fab-item.item-2').addEventListener('click', function(e) {
        e.preventDefault();
        let widgetBtn = document.querySelector('.asw-menu-btn');
        if (widgetBtn) {
            widgetBtn.click();
        }
    });
});
</script>
