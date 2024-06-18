// Inisialisasi peta
const map = L.map("map").setView([-7.040831879791879, 112.06437504109533], 7);

// Tambahkan layer peta satelit
const satelliteTiles = L.tileLayer(
    "https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
    {
        maxZoom: 25,
        attribution:
            '&copy; <a href="https://www.google.com/maps">Google Maps</a>',
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
    }
);

// Layer peta jalan (default)
const streetTiles = L.tileLayer(
    "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
        maxZoom: 25,
        attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }
).addTo(map);

// Tambahkan kontrol untuk mode tampilan peta
const baseLayers = {
    "Peta Jalan": streetTiles,
    "Peta Satelit": satelliteTiles,
};

// Tambahkan kontrol layer
L.control.layers(baseLayers).addTo(map);

// Custom icons
const orangeIcon = L.divIcon({ className: "custom-marker-orange" });
const userIcon = L.divIcon({ className: "waypoint-icon" });

// Data cabang hotel
const hotels = [
    {
        id: 5,
        name: "HARRIS Hotel & Conventions Gubeng Surabaya",
        lat: -7.272412714661363,
        lng: 112.7494536530062,
        address: "Jl. Bangka 8-18, East Java, Indonesia 60281",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/surabaya/harris-hotel-conventions-gubeng-surabaya/room-types/harris-room/HGBG-Booking-HARRIS-Room1.jpg",
        icon: orangeIcon,
    },
    {
        id: 1,
        name: "HARRIS Hotel & Conventions Ciumbuleuit Bandung",
        lat: -6.880493755536777,
        lng: 107.60416896649618,
        address: "Jl. Ciumbuleuit No.50-58, Bandung",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bandung/harris-hotel-conventions-ciumbuleuit-bandung/room-types/harris-unique/harris-ciumbuleuit-gallery-harris-unique1.jpg",
        icon: orangeIcon,
    },
    {
        id: 2,
        name: "HARRIS Hotel & Convention Cibinong City Mall Bogor",
        lat: -6.484049169007039,
        lng: 106.84047256649248,
        address: "Jalan Tegar Beriman No.1, Cibinong, Bogor",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bogor/harris-hotel-convention-cibinong-city-mall-bogor/apartmenttypes/typeofroom/harris-balcony/HCCB-room-balcony-gallery-02.jpg",
        icon: orangeIcon,
    },
    {
        id: 3,
        name: "HARRIS Suites FX Sudirman Jakarta",
        lat: -6.224667847731929,
        lng: 106.80402440881933,
        address:
            "Jl. Jend Sudirman, Pintu Satu Senayan, Jakarta, Indonesia 10270",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/jakarta/harris-suites-fx-sudirman-jakarta/room-types/harris-corner/HFXS-booking-harriscorner1.jpg",
        icon: orangeIcon,
    },
    {
        id: 4,
        name: "HARRIS Hotel & Conventions Solo",
        lat: -7.562314669024655,
        lng: 110.7989639511613,
        address: "Jl. Slamet Riyadi No.464, Solo",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/solo/harris-hotel-conventions-solo/room-types/harris-suite/HSOL-booking-harrissuite2.jpg",
        icon: orangeIcon,
    },
];

let userLatLng = null;
let routingControl = null;

// Fungsi untuk menambahkan marker hotel
function addHotelMarker(hotel) {
    const popupContent = `
    <div>
        <h6>${hotel.name}</h6>
        <p>${hotel.address}</p>
        <img src="${hotel.imgURL}" alt="${hotel.name}" style="width:100%;height:auto;">
        <div class="row mt-2">
            <div class="col">
                <button class="route-btn" data-lat="${hotel.lat}" data-lng="${hotel.lng}">Rute</button>
            </div>
            <div class="col">
                <a href="/room?branch=${hotel.id}" class="btn-primary">Lihat Kamar</a>
            </div>
        </div>
    </div>
    `;

    const marker = L.marker([hotel.lat, hotel.lng], { icon: hotel.icon })
        .bindPopup(popupContent)
        .addTo(map);

    marker.on("popupopen", () => {
        // Reattach the event listener to ensure it works when popup is reopened
        setRouteButtonListener();
    });
}

// Tambahkan semua marker hotel
hotels.forEach(addHotelMarker);

// Fungsi untuk menampilkan rute
function showRoute(destinations) {
    if (userLatLng) {
        // Hapus rute yang ada jika ada
        if (routingControl) {
            map.removeControl(routingControl);
        }

        // Hapus kontrol Google Maps jika sudah ada
        removeGoogleMapsControl();

        // Buat rute baru
        routingControl = L.Routing.control({
            waypoints: destinations.map((dest) => L.latLng(dest.lat, dest.lng)),
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                // Tetap gunakan ikon khusus untuk cabang hotel
                if (i === destinations.length - 1) {
                    return L.marker(waypoint.latLng, {
                        draggable: true,
                        icon: orangeIcon,
                        zIndexOffset: 1000 + i * 1000,
                    }).addTo(map);
                } else {
                    return L.marker(waypoint.latLng, {
                        draggable: true,
                        icon: userIcon,
                        zIndexOffset: 1000 + i * 1000,
                    }).addTo(map);
                }
            },
            lineOptions: {
                styles: [{ color: "#00AA00", opacity: 0.8, weight: 6 }],
            },
            position: "topleft", // Set position to topleft
        }).addTo(map);

        // Tambahkan tombol untuk Google Maps
        const googleMapsUrl = `https://www.google.com/maps/dir/?api=1&origin=${userLatLng.lat},${userLatLng.lng}&destination=${destinations[1].lat},${destinations[1].lng}`;
        const googleMapsButton = L.control({ position: "topleft" });
        googleMapsButton.onAdd = function (map) {
            const div = L.DomUtil.create("div", "google-maps-button");
            div.innerHTML = `<a href="${googleMapsUrl}" target="_blank" class="btn-primary">Buka di Google Maps</a>`;
            return div;
        };
        googleMapsButton.addTo(map);
    } else {
        alert("Lokasi pengguna belum ditemukan.");
    }
}

// Fungsi untuk menemukan lokasi pengguna
function onLocationFound(e) {
    userLatLng = e.latlng;

    // Cari hotel HARRIS terdekat
    let nearestHotel = null;
    let minDistance = Infinity;

    hotels.forEach((hotel) => {
        const distance = map.distance(
            userLatLng,
            L.latLng(hotel.lat, hotel.lng)
        );
        if (distance < minDistance) {
            minDistance = distance;
            nearestHotel = hotel;
        }
    });

    if (nearestHotel) {
        L.marker(userLatLng, { icon: userIcon })
            .addTo(map)
            .bindPopup(`Hotel HARRIS terdekat: ${nearestHotel.name}`)
            .openPopup();

        // Zoom ke hotel terdekat
        map.setView([nearestHotel.lat, nearestHotel.lng], 13);

        // Tampilkan rute ke hotel terdekat
        showRoute([
            { lat: userLatLng.lat, lng: userLatLng.lng },
            { lat: nearestHotel.lat, lng: nearestHotel.lng },
        ]);

        // Tambahkan marker hotel terdekat yang dapat diklik untuk melihat kamar
        const popupContent = `
        <div>
            <h6>${nearestHotel.name}</h6>
            <p>${nearestHotel.address}</p>
            <img src="${nearestHotel.imgURL}" alt="${nearestHotel.name}" style="width:100%;height:auto;">
            <div class="row mt-2">
                <div class="col">
                    <button class="route-btn" data-lat="${nearestHotel.lat}" data-lng="${nearestHotel.lng}">Rute</button>
                </div>
                <div class="col">
                    <a href="/room?branch=${nearestHotel.id}" class="btn-primary">Lihat Kamar</a>
                </div>
            </div>
        </div>
        `;

        const nearestHotelMarker = L.marker(
            [nearestHotel.lat, nearestHotel.lng],
            { icon: nearestHotel.icon }
        )
            .bindPopup(popupContent)
            .addTo(map);

        nearestHotelMarker.on("popupopen", () => {
            setRouteButtonListener();
        });

        nearestHotelMarker.openPopup();
    } else {
        alert("Tidak ada hotel HARRIS terdekat ditemukan.");
    }
}

// Fungsi untuk menghapus kontrol Google Maps jika sudah ada
function removeGoogleMapsControl() {
    document.querySelectorAll(".google-maps-button").forEach((button) => {
        button.remove();
    });
}

// Fungsi untuk mengatur event listener pada tombol "Rute"
function setRouteButtonListener() {
    document.querySelectorAll(".route-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const lat = parseFloat(this.getAttribute("data-lat"));
            const lng = parseFloat(this.getAttribute("data-lng"));
            if (userLatLng) {
                showRoute([
                    { lat: userLatLng.lat, lng: userLatLng.lng },
                    { lat, lng },
                ]);
            } else {
                alert("Lokasi pengguna belum ditemukan.");
            }
        });
    });
}

// Fungsi untuk menangani error lokasi
function onLocationError(e) {
    alert(e.message);
}

// Minta lokasi pengguna
map.locate({ setView: true, maxZoom: 25 });

// Event listeners untuk lokasi ditemukan dan error
map.on("locationfound", onLocationFound);
map.on("locationerror", onLocationError);

const legend = L.control({ position: "topright" });

legend.onAdd = function (map) {
    const div = L.DomUtil.create("div", "info legend");
    div.innerHTML = `
        <h4>Hotel Harris Locations</h4>
        <p><strong>Legenda</strong></p>
        <i style="background: #00e1ff"></i> Lokasi Anda<br>
        <i style="background: #FF8C00"></i> Lokasi Cabang Hotel<br>
        <i style="background: #00AA00"></i> Rute<br>
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Belok Kiri<br>
        <i class="fa fa-arrow-right" aria-hidden="true"></i> Belok Kanan<br>
        <i class="fa fa-arrow-up" aria-hidden="true"></i> Lurus<br>
        <i class="fa fa-undo" aria-hidden="true"></i> Putar Balik<br>
        <i class="fa fa-traffic-light" aria-hidden="true"></i> Rambu Lalu Lintas
    `;
    return div;
};

legend.addTo(map);
