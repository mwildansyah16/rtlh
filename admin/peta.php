<!DOCTYPE html>
<html>
   <head>
      <title>Menampilkan Marker Pada Map</title>
      <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
      <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
   </head>
 
   <body>
      <h2>MalasNgoding.com - Menampilkan Marker Pada Map</h2>
      <div id = "map" style = "width: 1500px; height: 650px"></div>
      <script>         
         var mapOptions = {
            center: [-6.7787715, 110.8571647],
            zoom: 10
         }
 
         var map = new L.map('map', mapOptions);            
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');               
         map.addLayer(layer);
 
         var marker = L.marker([-6.232228, 106.847793]).bindPopup('Hotel Kencana Pemalang').addTo(map);
 
      </script>
   </body>   
</html>
