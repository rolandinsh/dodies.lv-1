<?php require_once( 'couch/cms.php' ); ?>
<cms:content_type 'text/xml' /><cms:concat '<' '?xml version="1.0" encoding="' k_site_charset '"?' '>' />
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xhtml="http://www.w3.org/1999/xhtml"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<cms:pages masterpage='obj.php'>
	<url>
  		<loc>https://dodies.lv/lv/obj/<cms:show k_page_name />.html</loc>
  		<xhtml:link rel="alternate" hreflang="en" href="https://dodies.lv/en/obj/<cms:show k_page_name />.html" />
  		<xhtml:link rel="alternate" hreflang="lv" href="https://dodies.lv/lv/obj/<cms:show k_page_name />.html" />
      <xhtml:link rel="alternate" hreflang="ru" href="https://dodies.lv/ru/obj/<cms:show k_page_name />.html" />
	</url>
	</cms:pages>
	<url>
  		<loc>https://dodies.lv/obj/lv/</loc>
  		<xhtml:link rel="alternate" hreflang="en" href="https://dodies.lv/en/obj/" />
  		<xhtml:link rel="alternate" hreflang="lv" href="https://dodies.lv/lv/obj/" />
      <xhtml:link rel="alternate" hreflang="ru" href="https://dodies.lv/ru/obj/" />
	</url>
		<url>
  		<loc>https://dodies.lv/par/lv/</loc>
  		<xhtml:link rel="alternate" hreflang="en" href="https://dodies.lv/en/par/" />
  		<xhtml:link rel="alternate" hreflang="lv" href="https://dodies.lv/lv/par/" />
      <xhtml:link rel="alternate" hreflang="ru" href="https://dodies.lv/ru/par/" />
	</url>
</urlset>
<?php COUCH::invoke(1); ?>
