const map = L.map("map").setView([-7.040831879791879, 112.06437504109533], 7);

const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// Custom icons with different colors
const redIcon = L.divIcon({ className: "custom-marker-red" });
const blueIcon = L.divIcon({ className: "custom-marker-blue" });
const greenIcon = L.divIcon({ className: "custom-marker-green" });
const orangeIcon = L.divIcon({ className: "custom-marker-orange" });
const purpleIcon = L.divIcon({ className: "custom-marker-purple" });

// Array data cabang hotel
const hotels = [
    {
        name: "HARRIS Hotel & Conventions Gubeng Surabaya",
        lat: -7.272412714661363,
        lng: 112.7494536530062,
        address: "Jl. Bangka 8-18, East Java, Indonesia 60281",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/surabaya/harris-hotel-conventions-gubeng-surabaya/room-types/harris-room/HGBG-Booking-HARRIS-Room1.jpg",
        icon: redIcon,
    },
    {
        name: "HARRIS Hotel & Conventions Ciumbuleuit Bandung",
        lat: -6.880493755536777,
        lng: 107.60416896649618,
        address: "Jl. Ciumbuleuit No.50-58, Bandung",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bandung/harris-hotel-conventions-ciumbuleuit-bandung/room-types/harris-unique/harris-ciumbuleuit-gallery-harris-unique1.jpg",
        icon: blueIcon,
    },
    {
        name: "HARRIS Hotel & Convention Cibinong City Mall Bogor",
        lat: -6.484049169007039,
        lng: 106.84047256649248,
        address: "Jalan Tegar Beriman No.1, Cibinong, Bogor",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/bogor/harris-hotel-convention-cibinong-city-mall-bogor/apartmenttypes/typeofroom/harris-balcony/HCCB-room-balcony-gallery-02.jpg",
        icon: greenIcon,
    },
    {
        name: "HARRIS Suites FX Sudirman Jakarta",
        lat: -6.224667847731929,
        lng: 106.80402440881933,
        address:
            "Jl. Jend Sudirman, Pintu Satu Senayan, Jakarta, Indonesia 10270",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/jakarta/harris-suites-fx-sudirman-jakarta/room-types/harris-corner/HFXS-booking-harriscorner1.jpg",
        icon: orangeIcon,
    },
    {
        name: "HARRIS Hotel & Conventions Solo",
        lat: -7.562314669024655,
        lng: 110.7989639511613,
        address: "Jalan Tegar Beriman No.1, Cibinong, Bogor",
        imgURL: "https://www.discoverasr.com/content/dam/tal/media/images/properties/indonesia/solo/harris-hotel-conventions-solo/room-types/harris-suite/HSOL-booking-harrissuite2.jpg",
        icon: purpleIcon,
    },
];

// Function to add hotel markers
function addHotelMarker(hotel) {
    const popupContent = `
        <div>
            <h6>${hotel.name}</h6>
            <p>${hotel.address}</p>
            <img src="${hotel.imgURL}" alt="${hotel.name}" style="width:100%;height:auto;">
        </div>
    `;

    L.marker([hotel.lat, hotel.lng], { icon: hotel.icon })
        .bindPopup(popupContent)
        .addTo(map);
}

// Iterate through the array to add all hotel markers
hotels.forEach(addHotelMarker);

// Function to find user's location
function onLocationFound(e) {
    const radius = e.accuracy;
    const userMarker = L.marker(e.latlng)
        .addTo(map)
        .bindPopup(`You are within ${radius} meters from this point`)
        .openPopup();

    L.circle(e.latlng, radius).addTo(map);

    // Zoom map to user's location
    map.setView(e.latlng, 13);
}

// Function to handle location error
function onLocationError(e) {
    alert(e.message);
}

// Request user's location
map.locate({ setView: true, maxZoom: 16 });

// Event listeners for location found and error
map.on("locationfound", onLocationFound);
map.on("locationerror", onLocationError);
