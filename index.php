<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Karte'>
</cms:template>

<!DOCTYPE html>
<html>
<head>
	<title>Latvijas dabas taku karte</title>
	<meta charset="utf-8" />
	<meta name="apple-itunes-app" content="app-id=1080800199">
	<meta name="description" content="Latvijas dabas takas un citas vietas, kurp doties brīvdienās ar ģimeni">
	<meta name="keywords" content="daba, takas, pikniks, teltis, doties, laipa, purva laipas"
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name=”twitter:site” content=”@dodieslv”>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/dodies.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
	<script src="https://unpkg.com/leaflet.markercluster@1.0.6/dist/leaflet.markercluster.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<div id="map"></div>

<script type="text/javascript">

	var map = L.map('map').setView([56.9, 24.5], 9);
	var hash = new L.Hash(map);
	var osm = L.tileLayer("//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {attribution: '<a href="//openstreetmap.org">OpenStreetMap</a> Contributors'}).addTo(map);
	var JanaSetaWMS = L.tileLayer.wms("//wms.kartes.lv/DODI/wgs/15/",{format: 'image/png', attribution: '<a href="//kartes.lv">&copy; Karšu izdevniecība Jāņa sēta</a>'});
	var mapbox = L.tileLayer("https://api.mapbox.com/styles/v1/normis/cilzp6g1h00grbjlwwsh52vig/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoibm9ybWlzIiwiYSI6IjJiWGtJbjQifQ.oGV_GShhLMDkUbdY6R9REg");
	var baseMaps = {"Openstreetmap": osm, "Mapbox": mapbox, "Jāņa sētas karte": JanaSetaWMS};
	L.control.layers(baseMaps).addTo(map);
	var jsnLayer = new L.GeoJSON.AJAX('/json/<cms:show k_lang/>.geojson',{
		onEachFeature: onEachFeature,
				pointToLayer: function (feature, latlng) {
					return L.marker(latlng, {icon: L.divIcon({
							className: feature.properties.st,
							html: '<img src="/icons/m-' + feature.properties.tips + '.svg"/>',
							iconSize: [20, 20],
							iconAnchor: [12, 12],
							popupAnchor: [0, -20],
							labelAnchor: [20, 0]
						})})
				} 
		}).addTo(map);

var markers = [];
var icons = [];

function onEachFeature(feature, layer) {
	markers.push(layer);
	var popupContent = '<div><b>' + feature.properties.name + '</b><br/>' +
		'<p>' + feature.properties.txt + '</p>' +
		'<img class="foto" src="' + feature.properties.img2 + '"/>' + 
		'<div class="btn-group" role="group" aria-label="pogas">' +
		'<button type="button" class="btn btn-default" onclick="location.href=\'#14/'+ feature.geometry.coordinates[1] +'/' + feature.geometry.coordinates[0] +'\'">' +
		'<span class="glyphicon glyphicon-zoom-in"></span></button>' + 
		'<button type="button" onclick="myFunc(\'code\',\'' + feature.geometry.coordinates[1] + '\',\'' + feature.geometry.coordinates[0] + '\');" class="btn btn-default">' +
			'<span class="glyphicon glyphicon-map-marker"></span></button>' + 
		'<button type="button" class="btn btn-default" onClick="location.href=\''+ feature.properties.url + '\'"><cms:if k_lang == "lv">Apraksts<cms:else/>Open</cms:if></button>' +
		'</div>' +
		'</div>';
		layer.bindPopup(popupContent, {
			maxWidth: 380
		});
}

var textbox = '';
function myFunc(code, a, b) {
	txt = '' + a + ', ' + b + '';
	textbox = prompt("GPS koordinātes", txt);
}
</script>
</body>
</html>
<?php COUCH::invoke(); ?>