document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('map').setView([34.00368390762059, 35.651447946677294], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Fetch markers from the server
    fetch('markers.php')
        .then(response => response.json())
        .then(markers => {
            markers.forEach(marker => {
                L.marker([marker.lat, marker.lng]).addTo(map).bindPopup(marker.name);
            });
        })
        .catch(error => console.error('Error fetching markers:', error));

    // Define the destination coordinates (SahelTronix)
    var destination = [34.00368390762059, 35.651447946677294];

    // Function to handle the geolocation success
    function onLocationFound(e) {
        var userLocation = [e.latitude, e.longitude];

        // Add a marker for the user's location
        L.marker(userLocation).addTo(map).bindPopup("You are here").openPopup();

        // Draw the route from the user's location to the destination
        L.Routing.control({
            waypoints: [
                L.latLng(userLocation[0], userLocation[1]),
                L.latLng(destination[0], destination[1])
            ],
            createMarker: function() { return null; } // Prevent default markers from showing up
        }).addTo(map);

        // Fit the map to the route bounds
        map.fitBounds(L.latLngBounds(userLocation, destination));
    }

    // Function to handle the geolocation error
    function onLocationError(e) {
        alert(e.message);
    }

    // Get the user's current location
    map.locate({setView: true, maxZoom: 16});
    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);
});
