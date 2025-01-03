<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 100vh;}
    </style>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
    <body>
        <div style="text-align:center">
            <h1>Peta Gempa Bumi</h1>
            <p>Sumber : BMKG</p>
        </div>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 5,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let files={!!file_get_contents('https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json')!!}
           
            let gempas=files.Infogempa.gempa;
            gempas.forEach(gempa => {
                let kordinat=gempa.Coordinates.split(",");
                let lat=kordinat[0];
                let log=kordinat[1];

                let marker=L.marker([lat,log]).addTo(map);

                marker.bindPopup(`
                    Tanggal:${gempa.Tanggal}<br>
                    Jam:${gempa.Jam}<br>
                    Kekuatan:${gempa.Magnitude}<br>
                    Wilayah:${gempa.Wilayah}<br>
                    Potensi:${gempa.Potensi}<br>
                `);
            });

        </script>
    </body>
</html>