<!-- DataTables & Leaflet -->
<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js">
</script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<!-- SweetAlert Notifikasi -->
<script>
    @if(session()->has('gagal') || $errors->any())
        let errorMessages = '<ul class="list-unstyled text-center">';
        @if(session()->has('gagal'))
            errorMessages += '<li>{{ session('gagal') }}</li>';
        @endif
        @foreach($errors->all() as $error)
            errorMessages += '<li>{{ $error }}</li>';
        @endforeach
        errorMessages += '</ul>';
        Swal.fire({
            toast: true,
            position: 'top-right',
            icon: 'error',
            title: 'Data gagal ditambahkan!',
            html: errorMessages,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            width: 'auto',
            customClass: {
                popup: 'd-flex flex-column justify-content-center align-items-center'
            }
        });
    @elseif(session()->has('berhasil'))
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                title: '{{ session('berhasil') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                width: 'auto',
                customClass: {
                    popup: 'd-flex flex-column justify-content-center align-items-center'
                }
            });
        });
    @endif
</script>

<!-- Leaflet untuk Create/Edit -->
@if (request()->routeIs('jalan.create') || request()->routeIs('jalan.edit'))
<script>
    const initialLat = {{ $latitude }};
    const initialLng = {{ $longitude }};
    const requestIsCreate = @json(request()->routeIs('jalan.create'));
    document.addEventListener('DOMContentLoaded', () => {
        const lokasiInput = document.getElementById('lokasi');
        const namaJalanInput = document.getElementById('nama_jalan');
        const panjangInput = document.getElementById('panjang');
        let coordinates = [];
        let markers = [];
        try {
            coordinates = JSON.parse(lokasiInput.value);
            if (!Array.isArray(coordinates)) coordinates = [];
        } catch {
            coordinates = [];
        }
        const map = L.map('map').setView(coordinates[0] || [initialLat, initialLng], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        let polyline = null;
        function renderPolyline() {
            if (polyline) {
                polyline.setLatLngs(coordinates);
            } else {
                polyline = L.polyline(coordinates, { color: 'blue' }).addTo(map);
            }
        }
        function refreshLokasiInput() {
            lokasiInput.value = JSON.stringify(coordinates);
        }
        function calculateDistance() {
            let total = 0;
            for (let i = 1; i < coordinates.length; i++) {
                const latlng1 = L.latLng(coordinates[i - 1]);
                const latlng2 = L.latLng(coordinates[i]);
                total += latlng1.distanceTo(latlng2);
            }
            return (total / 1000).toFixed(2); // KM
        }
        async function updateNamaJalan(lat, lon) {
            try {
                const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`;
                const response = await fetch(url);
                const data = await response.json();
                const road = data?.address?.road || '';
                if (road && !namaJalanInput.value) {
                    namaJalanInput.value = road;
                }
            } catch (err) {
                console.warn("Gagal mengambil nama jalan:", err);
            }
        }
        // Render titik lama (jika edit)
        if (coordinates.length > 0) {
            coordinates.forEach((coord, index) => {
                const marker = L.marker(coord).addTo(map)
                    .bindPopup(`Titik ke-${index + 1}`);
                markers.push(marker);
            });
            renderPolyline();
            refreshLokasiInput();
            panjangInput.value = calculateDistance();
        }
        if (navigator.geolocation && requestIsCreate) {
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    const { latitude, longitude } = pos.coords;
                    map.setView([latitude, longitude], 15);
                },
                (err) => {
                    console.warn("Gagal mendapatkan lokasi:", err.message);
                }
            );
        }
        map.on('click', (e) => {
            const latlng = [e.latlng.lat, e.latlng.lng];
            coordinates.push(latlng);
            const marker = L.marker(latlng).addTo(map);
            markers.push(marker);
            renderPolyline();
            refreshLokasiInput();
            panjangInput.value = calculateDistance();
            if (coordinates.length === 1) {
                updateNamaJalan(latlng[0], latlng[1]);
            }
        });
        // Tombol: Hapus titik terakhir
        const hapusTitikTerakhirBtn = document.getElementById('hapus-titik');
        if (hapusTitikTerakhirBtn) {
            hapusTitikTerakhirBtn.addEventListener('click', () => {
                if (coordinates.length === 0) {
                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: 'info',
                        title: 'Tidak ada titik yang dihapus!',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        width: 'auto',
                        customClass: {
                            popup: 'd-flex flex-column justify-content-center align-items-center'
                        }
                    });
                    return;
                }
                const lastMarker = markers.pop();
                if (lastMarker) {
                    map.removeLayer(lastMarker);
                }
                coordinates.pop();
                renderPolyline();
                refreshLokasiInput();
                panjangInput.value = calculateDistance();
            });
        }
    });
</script>
@endif

@if (request()->routeIs('index'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mapContainer = document.getElementById('map');
        const dataKoordinat = JSON.parse(mapContainer.dataset.koordinat || '[]');

        const map = L.map('map').setView([-1.0, 119.8], 10); // default Palu area

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const allBounds = [];

        dataKoordinat.forEach(koordinat => {
            if (Array.isArray(koordinat) && koordinat.length > 0) {
                const polyline = L.polyline(koordinat, { color: 'blue' }).addTo(map);
                allBounds.push(...koordinat);
            }
        });

        if (allBounds.length > 0) {
            map.fitBounds(allBounds);
        }
    });
</script>
@endif

{{-- @if (request()->routeIs('rencana.edit'))
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mapContainer = document.getElementById('map');

        if (!mapContainer || mapContainer.dataset.initialized) return;

        let koordinat = [];
        try {
            koordinat = JSON.parse(mapContainer.dataset.koordinat);
        } catch (e) {
            console.warn("Gagal parse koordinat:", e);
        }

        const map = L.map('map').setView(koordinat[0] || [0, 0], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        if (koordinat.length > 0) {
            koordinat.forEach(point => L.marker(point).addTo(map));
            const polyline = L.polyline(koordinat, { color: 'blue' }).addTo(map);
            map.fitBounds(polyline.getBounds());
        }

        mapContainer.dataset.initialized = true;
    });
</script>
@endif --}}

@if (request()->routeIs('rencana.edit'))
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const mapContainer = document.getElementById('map');
    if (!mapContainer || mapContainer.dataset.initialized) return;
    // --- Ambil data dari atribut ---
    let koordinat = [];
    try { koordinat = JSON.parse(mapContainer.dataset.koordinat || '[]'); } catch {}
    const presentase = parseFloat(mapContainer.dataset.presentase || '0');
    if (koordinat.length < 2) return;        // butuh minimal dua titik
    // --- Jika polygon tertutup, ubah jadi polyline ---
    const [fLat, fLng] = koordinat[0];
    const [lLat, lLng] = koordinat[koordinat.length - 1];
    if (fLat === lLat && fLng === lLng) koordinat.pop();
    // --- Inisialisasi peta ---
    const map = L.map('map').setView(koordinat[0], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        { attribution: '&copy; OpenStreetMap contributors' }).addTo(map);
    // --- Fungsi potong polyline berdasarkan % panjang ---
    function potongPolyline(arr, persen) {
        const total = arr.slice(1).reduce((acc, cur, i) =>
            acc + L.latLng(arr[i]).distanceTo(L.latLng(cur)), 0);
        const target = total * persen / 100;
        let jalan = 0, hasil = [arr[0]];

        for (let i = 1; i < arr.length; i++) {
            const p1 = L.latLng(arr[i - 1]), p2 = L.latLng(arr[i]);
            const seg = p1.distanceTo(p2);

            if (jalan + seg <= target) {
                hasil.push(arr[i]);
                jalan += seg;
            } else { // titik potong di tengah segmen
                const sisa = target - jalan, t = sisa / seg;
                hasil.push([
                    p1.lat + (p2.lat - p1.lat) * t,
                    p1.lng + (p2.lng - p1.lng) * t
                ]);
                break;
            }
        }
        return hasil.length < 2 ? [] : hasil;
    }
    // --- Garis penuh (biru) ---
    const polyFull = L.polyline(koordinat, { color:'blue', weight:5, }).addTo(map);
    // --- Garis progress (hijau) ---
    if (presentase > 0) {
        const potong = potongPolyline(koordinat, presentase);
        if (potong.length) L.polyline(potong, { color:'green', weight:5 }).addTo(map);
    }
    map.fitBounds(polyFull.getBounds());
    mapContainer.dataset.initialized = true;
});
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll('.modal');
    modals.forEach((modal, index) => {
        const mapId = `map-${index + 1}`;
        modal.addEventListener('shown.bs.modal', () => {
            const mapContainer = document.getElementById(mapId);
            if (!mapContainer || mapContainer.dataset.initialized) return;

            let koordinat = [];
            try { koordinat = JSON.parse(mapContainer.dataset.koordinat || '[]'); } catch {}
            const presentase = parseFloat(mapContainer.dataset.presentase || '0');

            if (koordinat.length < 2) return;

            const [fLat, fLng] = koordinat[0];
            const [lLat, lLng] = koordinat[koordinat.length - 1];
            if (fLat === lLat && fLng === lLng) koordinat.pop();

            const map = L.map(mapId).setView(koordinat[0], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            function potongPolyline(arr, persen) {
                const total = arr.slice(1).reduce((acc, cur, i) =>
                    acc + L.latLng(arr[i]).distanceTo(L.latLng(cur)), 0);
                const target = total * persen / 100;
                let jalan = 0, hasil = [arr[0]];

                for (let i = 1; i < arr.length; i++) {
                    const p1 = L.latLng(arr[i - 1]), p2 = L.latLng(arr[i]);
                    const seg = p1.distanceTo(p2);

                    if (jalan + seg <= target) {
                        hasil.push(arr[i]);
                        jalan += seg;
                    } else {
                        const sisa = target - jalan, t = sisa / seg;
                        hasil.push([
                            p1.lat + (p2.lat - p1.lat) * t,
                            p1.lng + (p2.lng - p1.lng) * t
                        ]);
                        break;
                    }
                }
                return hasil.length < 2 ? [] : hasil;
            }

            // Polyline penuh (biru)
            const polylineUtuh = L.polyline(koordinat, {
                color: 'blue',
                weight: 5,
                opacity: 0.7
            }).addTo(map);

            // Polyline presentase (hijau)
            if (presentase > 0) {
                const potong = potongPolyline(koordinat, presentase);
                if (potong.length >= 2) {
                    L.polyline(potong, {
                        color: 'green',
                        weight: 6,
                        opacity: 1
                    }).addTo(map);
                }
            }

            map.fitBounds(polylineUtuh.getBounds());
            mapContainer.dataset.initialized = true;
        });
    });
});
</script>