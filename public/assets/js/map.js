// Inisialisasi peta
const map = L.map("map").setView([-7.040831879791879, 112.06437504109533], 7);

const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// Custom icons
const redIcon = L.divIcon({ className: "custom-marker-red" });
const blueIcon = L.divIcon({ className: "custom-marker-blue" });
const greenIcon = L.divIcon({ className: "custom-marker-green" });
const orangeIcon = L.divIcon({ className: "custom-marker-orange" });
const purpleIcon = L.divIcon({ className: "custom-marker-purple" });

// Data cabang hotel
const hotels = [
    {
        id: 5,
        name: "HARRIS Hotel & Conventions Gubeng Surabaya",
        lat: -7.272412714661363,
        lng: 112.7494536530062,
        address: "Jl. Bangka 8-18, East Java, Indonesia 60281",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/surabaya/harris-hotel-conventions-gubeng-surabaya/room-types/harris-room/HGBG-Booking-HARRIS-Room1.jpg",
        icon: redIcon,
    },
    {
        id: 1,
        name: "HARRIS Hotel & Conventions Ciumbuleuit Bandung",
        lat: -6.880493755536777,
        lng: 107.60416896649618,
        address: "Jl. Ciumbuleuit No.50-58, Bandung",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bandung/harris-hotel-conventions-ciumbuleuit-bandung/room-types/harris-unique/harris-ciumbuleuit-gallery-harris-unique1.jpg",
        icon: blueIcon,
    },
    {
        id: 2,
        name: "HARRIS Hotel & Convention Cibinong City Mall Bogor",
        lat: -6.484049169007039,
        lng: 106.84047256649248,
        address: "Jalan Tegar Beriman No.1, Cibinong, Bogor",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bogor/harris-hotel-convention-cibinong-city-mall-bogor/apartmenttypes/typeofroom/harris-balcony/HCCB-room-balcony-gallery-02.jpg",
        icon: greenIcon,
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
        icon: purpleIcon,
    },
];

let userLatLng = null;
let routingControl = null;

// Fungsi untuk menambahkan marker hotel
function addHotelMarker(hotel, index) {
    const popupContent = `
    <div>
        <h6>${hotel.name}</h6>
        <p>${hotel.address}</p>
        <img src="${hotel.imgURL}" alt="${hotel.name}" style="width:100%;height:auto;">
        <div class="row mt-2">
            <div class="col">
                <button onclick="showRoute([userLatLng, {lat: ${hotel.lat}, lng: ${hotel.lng}}])" class="route-btn">Rute</button>
            </div>
            <div class="col">
                <a href="/room?branch=${hotel.id}" class="btn-primary">Lihat Kamar</a>
            </div>
        </div>
    </div>
    `;

    L.marker([hotel.lat, hotel.lng], { icon: hotel.icon })
        .bindPopup(popupContent)
        .addTo(map);
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

        // Buat rute baru
        routingControl = L.Routing.control({
            waypoints: destinations.map((dest) => L.latLng(dest.lat, dest.lng)),
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: L.divIcon({ className: "waypoint-icon" }),
                    zIndexOffset: 1000 + i * 1000,
                }).addTo(map);
            },
            lineOptions: {
                styles: [{ color: "#00AA00", opacity: 0.8, weight: 6 }],
            },
        }).addTo(map);

        // Tambahkan tombol untuk setiap destinasi
        destinations.forEach((dest, index) => {
            const routeButton = document.createElement("button");
            routeButton.innerText = `Route ${index + 1}`;
            routeButton.onclick = function () {
                routingControl.spliceWaypoints(
                    index,
                    1,
                    L.latLng(dest.lat, dest.lng)
                );
            };
            map.addControl(routeButton);
        });
    } else {
        alert("Lokasi pengguna belum ditemukan.");
    }
}

// Fungsi untuk menemukan lokasi pengguna
function onLocationFound(e) {
    userLatLng = e.latlng;
    const radius = e.accuracy;

    L.marker(userLatLng)
        .addTo(map)
        .bindPopup(`You are here`)
        .openPopup();

    // Hapus baris berikut untuk menghilangkan radius
    // L.circle(userLatLng, radius).addTo(map);
}

// Fungsi untuk menangani error lokasi
function onLocationError(e) {
    alert(e.message);
}

// Minta lokasi pengguna
map.locate({ setView: true, maxZoom: 16 });

// Event listeners untuk lokasi ditemukan dan error
map.on("locationfound", onLocationFound);
map.on("locationerror", onLocationError);
