<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Harris Hotel</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-7.040831879791879, 112.06437504109533], 7);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // URL gambar untuk popup
        const imgURL = 'https://example.com/path/to/your/image.jpg';

        // Konten popup dengan gambar
        const popupContent = `
            <div>
                <h3>HARRIS Hotel & Conventions Gubeng Surabaya</h3>
                <p>Jl. Bangka 8-18, East Java, Indonesia 60281</p>
                <img src="${imgURL}" alt="HARRIS Hotel & Conventions Gubeng Surabaya" style="width:100%;height:auto;">
            </div>
        `;

        // Tambahkan marker dengan popup berisi gambar
        L.marker([-7.272412714661363, 112.7494536530062])
            .bindPopup(popupContent)
            .addTo(map);

        // Fungsi untuk menemukan lokasi pengguna
        function onLocationFound(e) {
            const radius = e.accuracy;
            const userMarker = L.marker(e.latlng)
                .addTo(map)
                .bindPopup(`You are within ${radius} meters from this point`).openPopup();

            L.circle(e.latlng, radius).addTo(map);

            // Zoom map ke lokasi pengguna
            map.setView(e.latlng, 13);
        }

        // Fungsi untuk menangani error lokasi
        function onLocationError(e) {
            alert(e.message);
        }

        // Minta lokasi pengguna
        map.locate({
            setView: true,
            maxZoom: 16
        });

        // Event listener untuk lokasi ditemukan dan error
        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);
    </script>
</body>

</html>
