<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>GeoXML3 Example Map</title>
<link rel="stylesheet" type="text/css" href="{{url('assets/geoxmlexample/css/index.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('assets/geoxmlexample/css/map.css')}}"/>
</head>
<body>
<div id="pagewidth" >
	<div id="wrapper" class="clearfix">
		<div id="maincol">
			<div id="map"></div>
			<div id="controls">
				<form>
					<fieldset>
						<legend>Map Controls</legend>
						<input type="checkbox" id="placemarktoggle" checked="checked" /><label for="placemarktoggle">Placemarks</label><br />
						<input type="checkbox" id="polygontoggle" /><label for="polygontoggle">Polygons</label><br />
						<input type="button" id="recenter" value="Recenter Map" />
					</fieldset>
				</form>
			</div>
		</div>

		<div id="leftcol">
			<img src="{{url('assets/geoxmlexample/images/lightningwhelk.jpg')}}" width="150" height="122" />
			<ul id="placemarkList">
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script 
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe-hj6EWPs13b0QodvIL3WvL0BqqPkBSo">
    </script>
<script type="text/javascript" src="{{url('assets/geoxmlexample/js/ProjectedOverlay.js')}}"></script>
<script type="text/javascript" src="{{url('assets/geoxmlexample/js/geoxml3.js')}}"></script>
<script type="text/javascript" src="{{url('assets/geoxmlexample/js/map.js')}}"></script>
</body>
</html>
