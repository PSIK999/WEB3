// Initialize the map and set its view to Sahel Alma, Lebanon with a zoom level
var map = L.map('map').setView([34.00368390762059, 35.651447946677294], 13);

// Load and display tile layers on the map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Fetch marker data from PHP backend
fetch('data.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(marker => {
            L.marker([marker.lat, marker.lng])
                .bindPopup(marker.name)
                .addTo(map);
        });
    })
    .catch(error => console.error('Error fetching marker data:', error));
