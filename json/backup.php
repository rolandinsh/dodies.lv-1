<?php require_once( '../couch/cms.php' ); ?>
<cms:if k_user_access_level ge "4">
<cms:template title='Backup' hidden='1'/>
<cms:php>
$file = 'backup.csv';
$backup = <<<EOT
"k_page_title","k_page_name","tips","statuss","lat","lon","mazais_lv","mazais_en","garums","datums","foto","apraksts_lv","apraksts_en","featured_image","my_image_thumb"
<cms:content_type 'text/plain'/>
<cms:set count='0' />
<cms:pages custom_field='statuss!=slikts' masterpage='obj.php' >
"<cms:show k_page_title />","<cms:show k_page_name />","<cms:show tips />","<cms:show statuss />","<cms:show lat />","<cms:show lon />","<cms:show mazais_lv />","<cms:show mazais_en />","<cms:show garums />","<cms:show datums />","<cms:show foto />","<cms:show apraksts_lv />","<cms:show apraksts_en />","<cms:show featured_image />","<cms:show my_image_thumb />"
</cms:pages>
EOT;

file_put_contents($file, $backup);

</cms:php>
    ok
<cms:else/>
    not ok

</cms:if>
<?php COUCH::invoke(1); ?>

