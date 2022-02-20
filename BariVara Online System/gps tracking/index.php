<?php


require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();



//locate the IP
$geoplugin->locate();
$geoplugin->city;
$geoplugin->countryName;
$geoplugin->latitude;

$geoplugin->longitude;

echo $geoplugin->ip;

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZLfaqsY1iNfCI_yfsGo8OKTZGLpUUfEU&callback=initMap&libraries=&v=weekly"
      defer></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        width: 60%;
        margin-left: auto;
        margin-right: auto;

      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    
    
  </head>
  <body>
  	<h2>Gps Location</h2>
  	<hr>
    <div id="map"></div>
    <script>
      function initMap() {
  const myLatLng = { lat: 25.1358/*<?php echo $geoplugin->latitude; ?>*/, lng:82.5730 /*<?php echo $geoplugin->longitude;  ?>*/ };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: myLatLng,
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
}
    </script>
  </body>
</html>