<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>KML Layers</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      	width:100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    
    <script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
 
  });

  var ctaLayer = new google.maps.KmlLayer({
    url: 'https://sites.google.com/site/kmlrepositorio/my-forms/estado-kml/kml-default-with-description.kml',
    map: map
  });


}
	
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo&signed_in=true&callback=initMap">
    </script>
  </body>
</html>