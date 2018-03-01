<?php require_once( '../couch/cms.php' ); ?>
<cms:if k_user_access_level ge "4">
<cms:template title='Geojson' hidden='1'/>
<cms:php>
$file1 = 'lv.geojson';
$file2 = 'en.geojson';
$file3 = 'a.geojson';
$file4 = 'en.gpx';
$file5 = 'en.kml';
$currentlv = <<<EOT
{"type": "FeatureCollection","features": [<cms:content_type 'application/json'/><cms:set count='0' /><cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >{"type": "Feature","properties": {"name": "<cms:show k_page_title />","tips": "<cms:show tips />","st": "<cms:show statuss />","km": "<cms:show garums />","txt": "<cms:show mazais_lv />","dat": "<cms:show datums />","img": "<cms:show my_image_thumb />","img2": "<cms:reverse_related_pages 'photo_product' limit='1' orderby='weight' masterpage='gallery.php' ><cms:show gg_image /></cms:reverse_related_pages>","url": "/lv/obj/<cms:show k_page_name />.html"},"geometry": {"type": "Point","coordinates": [<cms:show lon />,<cms:show lat />]}}<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:pages>]}
EOT;
$currenten = <<<EOT
{"type": "FeatureCollection","features": [<cms:content_type 'application/json'/><cms:set count='0' /><cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >{"type": "Feature","properties": {"name": "<cms:show k_page_title />","tips": "<cms:show tips />","st": "<cms:show statuss />","km": "<cms:show garums />","txt": "<cms:show mazais_en />","dat": "<cms:show datums />","img": "<cms:show my_image_thumb />","img2": "<cms:show featured_image/>","url": "/en/<cms:show k_page_name />"},"geometry": {"type": "Point","coordinates": [<cms:show lon />,<cms:show lat />]}}<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:pages>]}
EOT;
$currenta = <<<EOT
{
"type": "FeatureCollection",
"features": 
	[<cms:content_type 'application/json'/><cms:set count='0' /><cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >
	{
	"type": "Feature","properties": {
		"name": "<cms:show k_page_title />",
		"id": "<cms:admin_link />",
		"tips": "<cms:show tips />",
		"st": "<cms:show statuss />",
		"km": "<cms:show garums />",
		"txt": "<cms:show mazais_lv />",
		"dat": "<cms:show datums />",
		"img": "<cms:show my_image_thumb />",
		"img2": "<cms:show featured_image/>",
		"url": "<cms:show k_page_link />"},
	"geometry": {"type": "Point","coordinates": [<cms:show lon />,<cms:show lat />]}}
<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:pages>]}
EOT;
$currentgpx = <<<EOT
<?xml version="1.0"?>
<gpx version="1.1" creator="GPS Visualizer http://www.gpsvisualizer.com/" xmlns="http://www.topografix.com/GPX/1/1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd">
<cms:content_type 'application/json'/><cms:set count='0' /><cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >
<wpt lat="<cms:show lat />" lon="<cms:show lon />">
  <name><cms:show k_page_title /></name>
  <desc><cms:show mazais_en /></desc>
</wpt>
<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:pages>
</gpx>
EOT;
$currentkml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
<cms:content_type 'application/json'/><cms:set count='0' /><cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >
  <Placemark>
    <name><cms:show k_page_title /></name>
    <description><cms:show mazais_en /></description>
    <Point>
      <coordinates><cms:show lon />,<cms:show lat />,0</coordinates>
    </Point>
  </Placemark>
<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:pages>
</kml>
EOT;
file_put_contents($file1, $currentlv);
file_put_contents($file2, $currenten);
file_put_contents($file3, $currenta);
file_put_contents($file4, $currentgpx);
file_put_contents($file5, $currentkml);
</cms:php>
ok
<cms:else/>
not ok
</cms:if>
<?php COUCH::invoke(); ?>