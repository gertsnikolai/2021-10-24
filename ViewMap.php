
<html><body>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Lon = $_POST[Lon];
  $Lat      = $_POST[Lat];
}
else {
  $Lon = $_GET[Lon];
  $Lat      = $_GET[Lat];
};

if ($Lon==Null) {
  $Lon = 39.574266;
};

if ($Lat==Null) {
  $Lat = 52.603198;
};

?>


  <div id="mapdiv"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat( <?php print($Lon); ?> , <?php print($Lat); ?>)
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );

    var lonLat1 = new OpenLayers.LonLat(39.507948, 52.612805)
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
          
    var zoom=16;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
    markers.addMarker(new OpenLayers.Marker(lonLat1));
    
    map.setCenter (lonLat, zoom);
  </script>
</body></html>
