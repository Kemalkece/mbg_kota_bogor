<!-- Map Section -->
<section id="peta-mbg" class="map-section">
    <div class="map-card-container">
        <div class="map-info-card">
            <div class="map-info-content">
                <h3 class="map-info-title">Portal Geospatial</h3>
                <p class="map-info-description">Temukan data spasial terkait Program Pemenuhan Gizi, mulai dari
                    persebaran lokasi hingga informasi capaian di setiap wilayah. Halaman ini mengarahkan Anda ke
                    portal resmi gina.bgn.go.id yang menyajikan informasi geospasial terkini untuk mendukung
                    pemerataan gizi nasional.</p>
                <button class="btn-view-map" data-bs-toggle="modal" data-bs-target="#mapsModalCustom">
                    Buka Peta
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet CSS via allowed CDN jsDelivr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<style>
    .modal-content-modern {
        border-radius: 24px;
        border: none;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .modal-header-modern {
        background: linear-gradient(135deg, #071E49 0%, #1c3a70 100%);
        color: white;
        border: none;
        padding: 20px 30px;
        border-bottom: 3px solid #D1B06C;
    }

    .map-container-modal {
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        z-index: 1;
    }

    .search-wrapper {
        position: relative;
        margin-top: -10px;
        z-index: 1000;
    }

    .map-search-input {
        width: 100%;
        padding: 15px 25px;
        border: 2px solid #f0f0f0;
        border-radius: 16px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: white;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }

    .map-search-input:focus {
        border-color: #D1B06C;
        box-shadow: 0 10px 15px -3px rgba(209, 176, 108, 0.15);
        outline: none;
    }

    .suggestion-box {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        max-height: 300px;
        overflow-y: auto;
        display: none;
        border: 1px solid rgba(0,0,0,0.05);
        z-index: 1001;
    }

    .suggestion-item {
        padding: 12px 20px;
        cursor: pointer;
        transition: all 0.2s ease;
        border-bottom: 1px solid #f5f5f5;
        display: flex;
        flex-direction: column;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-item:hover {
        background: rgba(209, 176, 108, 0.08);
    }

    .suggestion-item .sppg-name {
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .suggestion-item .sppg-address {
        font-size: 12px;
        color: #666;
        margin-top: 2px;
    }

    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        padding: 5px;
    }

    .popup-content h4 {
        margin: 0 0 8px;
        color: #071E49;
        font-size: 16px;
        font-weight: 700;
        border-bottom: 2px solid #D1B06C;
        padding-bottom: 4px;
    }

    .popup-content p {
        margin: 0;
        font-size: 13px;
        color: #555;
        line-height: 1.4;
    }

    .loading-overlay {
        position: absolute;
        inset: 0;
        background: rgba(255,255,255,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        border-radius: 15px;
    }
</style>

<!-- Maps Modal -->
<div class="modal fade modal-maps-custom" id="mapsModalCustom" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content modal-content-modern">
            <div class="modal-header modal-header-modern">
                <div class="header-title-wrapper">
                    <h5 class="modal-title fw-bold">Peta Interaktif Sebaran SPPG</h5>
                    <p class="mb-0 opacity-75 small">Klik lokasi atau gunakan kolom pencarian untuk navigasi</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 position-relative">
                <div class="search-wrapper mb-4">
                    <input type="text" id="mapSearchInput" class="map-search-input" placeholder="Ketik nama SPPG, wilayah, atau alamat..." autocomplete="off">
                    <div id="suggestionBox" class="suggestion-box"></div>
                </div>

                <div id="leafletMap" class="map-container-modal" style="width: 100%; height: 500px; border-radius: 16px; position: relative; z-index: 1;">
                    <div class="loading-overlay" id="mapLoading" style="z-index: 1000;">
                        <div class="spinner-border" style="color: #D1B06C;" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS via allowed CDN jsDelivr -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let map;
        let markers = [];
        let allData = [];
        const suggestionBox = document.getElementById('suggestionBox');
        const searchInput = document.getElementById('mapSearchInput');
        const loadingOverlay = document.getElementById('mapLoading');

        // Initialize Map
        function initMap() {
            if (map) return;

            map = L.map('leafletMap').setView([-6.5971, 106.8060], 13); // Center of Bogor

            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            fetchMapData();
        }

        async function fetchMapData() {
            try {
                loadingOverlay.style.display = 'flex';
                const response = await fetch('/api/map-data');
                const result = await response.json();

                if (result.status && result.data) {
                    allData = result.data;
                    renderMarkers(allData);
                }
            } catch (error) {
                console.error('Error fetching map data:', error);
            } finally {
                loadingOverlay.style.display = 'none';
            }
        }

        function renderMarkers(data) {
            data.forEach(item => {
                if (item.koordinat_dapur) {
                    const coords = item.koordinat_dapur.split(',').map(c => parseFloat(c.trim()));
                    if (coords.length === 2 && !isNaN(coords[0])) {
                        const marker = L.marker([coords[0], coords[1]])
                            .addTo(map)
                            .bindPopup(`
                                <div class="popup-content">
                                    <h4>${item.sppg_nama}</h4>
                                    <p><strong>Ketua:</strong> ${item.nama_ka_sppg || '-'}</p>
                                    <p><strong>Alamat:</strong> ${item.alamat_dapur}</p>
                                    <p><strong>Dapur:</strong> ${item.nama_dapur || '-'}</p>
                                </div>
                            `);
                        markers.push({
                            marker,
                            name: item.sppg_nama.toLowerCase(),
                            address: (item.alamat_dapur || '').toLowerCase(),
                            data: item
                        });
                    }
                }
            });
        }

        // Search Suggestion Logic
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            suggestionBox.innerHTML = '';

            if (query.length < 2) {
                suggestionBox.style.display = 'none';
                return;
            }

            const filtered = allData.filter(item =>
                (item.sppg_nama || '').toLowerCase().includes(query) ||
                (item.alamat_dapur || '').toLowerCase().includes(query)
            ).slice(0, 10); // Limit to 10 suggestions

            if (filtered.length > 0) {
                filtered.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'suggestion-item';
                    div.innerHTML = `
                        <span class="sppg-name">${item.sppg_nama}</span>
                        <span class="sppg-address">${item.alamat_dapur}</span>
                    `;
                    div.onclick = () => selectLocation(item);
                    suggestionBox.appendChild(div);
                });
                suggestionBox.style.display = 'block';
            } else {
                suggestionBox.style.display = 'none';
            }
        });

        function selectLocation(item) {
            if (!item.koordinat_dapur) return;
            const coords = item.koordinat_dapur.split(',').map(c => parseFloat(c.trim()));
            map.flyTo([coords[0], coords[1]], 16, {
                animate: true,
                duration: 1.5
            });

            // Find marker and open popup
            const targetMarker = markers.find(m => m.data.sppg_id === item.sppg_id);
            if (targetMarker) {
                targetMarker.marker.openPopup();
            }

            suggestionBox.style.display = 'none';
            searchInput.value = item.sppg_nama;
        }

        // Close suggestion box when clicking outside
        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.style.display = 'none';
            }
        });

        // Initialize map when modal is shown
        const modalEl = document.getElementById('mapsModalCustom');
        modalEl.addEventListener('shown.bs.modal', function() {
            initMap();
            // Trigger resize to fix leaflet grey area
            setTimeout(() => {
                if (map) map.invalidateSize();
            }, 100);
        });
    });
</script><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/components/peta.blade.php ENDPATH**/ ?>