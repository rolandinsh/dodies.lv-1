<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Apraksts' clonable='1' commentable='1'>
	<cms:config_list_view order='asc' searchable='1' limit='50'>
		<cms:field 'k_selector_checkbox' />
		<cms:field 'k_page_title' />
		<cms:field 'datums' sortable='1' header='Datums' format='d-M-Y'/>
		<cms:field 'statuss' sortable='1' header='Pārbaudīts'/>
		<cms:field 'garums' header='Garums' sortable='1'/>
		<cms:field 'tips' header='Tips' sortable='1' />
		<cms:field 'k_actions' />
	</cms:config_list_view>

  <cms:editable name="tips" label="Tips" desc="Izvēle" opt_values='taka | pikniks | tornis | parks' type='dropdown' order='1'/>
  <cms:editable name="statuss" label="Statuss" desc="Mainīt statusu" opt_values='parbaudits | neparbaudits | slikts' opt_selected = 'neparbaudits' type='dropdown' order='2'/>
  <cms:editable
        type='reverse_relation'
        name='product_photos'
        masterpage='gallery.php'
        field='photo_product'
        anchor_text='View images'
        label='Gallery'
        order='3'
  />

  <cms:editable name='datums' label='Datums' type='datetime' default_time='@current' order='4'/>
  <cms:editable name='garums' type='text' order='5'/>
  <cms:editable type='group' name='coords' label='Coordinates' order='6'>
	      <cms:editable group='coords' name='lat' width='130' type='text' />
        <cms:editable group='coords' name='lon' width='130' type='text'/>
  </cms:editable>


  <cms:editable type='group' name='mazie' label='Teksts' order='7'>
			<cms:editable name='mazais_lv' type='richtext' toolbar='custom' custom_toolbar='bold, italic, styles, format' css='/css/style.css | /css/bootstrap.css' custom_styles="my_styles=/css/ckedit_custom.js"  group='mazie' label='Latviski' />
      <cms:editable name='mazais_en' type='richtext' toolbar='custom' custom_toolbar='bold, italic, styles, format' css='/css/style.css | /css/bootstrap.css' custom_styles="my_styles=/css/ckedit_custom.js" group='mazie' label='Angliski' />
      <cms:editable name='mazais_ru' type='richtext' toolbar='custom' custom_toolbar='bold, italic, styles, format' css='/css/style.css| /css/bootstrap.css' custom_styles="my_styles=/css/ckedit_custom.js" group='mazie' label='Krieviski'/>
  </cms:editable>

</cms:template>



<!DOCTYPE html>
<html lang="<cms:show k_lang />">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="N.R.">
		<title>Dodies.lv: <cms:show k_page_title /></title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700&amp;subset=latin-ext" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.1/css/theme.bootstrap_4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.1/css/theme.bootstrap.min.css" rel="stylesheet" />




</head>
<cms:if k_is_page >

<body>
    <header>
        <nav class="navbar site-header fixed-top navbar-light navbar-expand-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                <img src="/icons/green-logo.png" width="30" height="30" style="border-radius: 3px" class="d-inline-block align-top" alt="#" />  &nbsp;dodies.lv
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
<!-- LV -->
<cms:if k_lang == "lv">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Apraksts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<cms:show k_lang />/">Karte</a>
                </li>
                <li class="nav-item">
									<a class="nav-link" href="/<cms:show k_lang />/par/">Par lapu</a>
                </li>
								<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle dropdown-toggle-right" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                    <cms:each k_supported_langs as='lang' key='lc'>
                    <a class="dropdown-item" style="text-transform: uppercase" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
                  </cms:each>
                  </div>
                </li>
</cms:if>
<!-- end LV -->
<!-- EN -->
<cms:if k_lang == "en">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<cms:show k_lang />/">Map</a>
                </li>
                <li class="nav-item">
									<a class="nav-link" href="/<cms:show k_lang />/par/">About us</a>
                </li>
								<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle dropdown-toggle-right" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                    <cms:each k_supported_langs as='lang' key='lc'>
                    <a class="dropdown-item" style="text-transform: uppercase" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
                  </cms:each>
                  </div>
                </li>
</cms:if>
<!-- end EN -->
<!-- RU -->
<cms:if k_lang == "ru">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Описание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/<cms:show k_lang />/">Карта</a>
                </li>
                <li class="nav-item">
									<a class="nav-link" href="/<cms:show k_lang />/par/">О нас</a>
                </li>
								<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle dropdown-toggle-right" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                    <cms:each k_supported_langs as='lang' key='lc'>
                    <a class="dropdown-item" style="text-transform: uppercase" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
                  </cms:each>
                  </div>
                </li>
</cms:if>
<!-- end RU -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 mainCol">
							<cms:reverse_related_pages 'photo_product' limit='1' orderby='weight' masterpage='gallery.php' >
								<img class="img-fluid title-img" src="<cms:show gg_image />" alt="<cms:show k_page_title />" />
							</cms:reverse_related_pages>
                <h1><cms:show k_page_title /></h1>

								<p>
									<cms:get "mazais_<cms:show k_lang />" />
								</p>

								<br/>
								<hr/>

            <div class="row">
            <cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
                    <div class="col-lg-4 col-xs-6">
                        <a data-toggle="lightbox" data-gallery="gallery" class="d-block mb-4 h-100" href="<cms:show gg_image />"><img class="img-fluid" src="<cms:show gg_thumbmedium />" alt="<cms:show k_page_title />" /></a>
                    </div>
            </cms:reverse_related_pages>
            </div>



            </div>
            <div class="col-lg-3">
                <div class="flex-column side-nav sticky-top mainCol info">
									<img class="img-fluid" src="https://maps.googleapis.com/maps/api/staticmap?size=490x490&zoom=8&style=feature:landscape%7Celement:geometry%7Cvisibility:on
&markers=icon:https://dodies.lv/icons/marker-m.png%7C<cms:show lat/>,<cms:show lon/>&scale=2&zoom=7&key=AIzaSyDDdg9ThR9tWWceLn91AganDBeZTk5BvrA" alt="karte"/>

									<cms:if k_lang == "lv">

                    <h2 class="info-title">Info</h2>
                    <b>Tips:</b> <cms:show tips/><br />
									<cms:if statuss="parbaudits">
										<cms:if tips="taka">
	                    <b>Garums:</b> <cms:show garums />km<br />
										</cms:if>
										<b>Apmeklējām:</b> <cms:date datums format='d M, Y' /><br />
									<cms:else />
									<b>Dodies.lv nav apmeklējis</b><br />
									</cms:if>
                    <b>GPS:</b> <cms:show coords/><br />
										<a role="button" class="btn btn-outline-primary myBtn mt-3 w-100" href="/lv/#14/<cms:show lat/>/<cms:show lon/>">Skatīt kartē</a>
									</cms:if>

									<cms:if k_lang == "en">
										<h2 class="info-title">Info</h2>
                    <b>Type:</b> <cms:if tips == "taka">Trail</cms:if><cms:if tips == "tornis">Birdwatching tower</cms:if><cms:if tips == "pikniks">Campground</cms:if><br />
									<cms:if statuss="parbaudits">
									<cms:if tips="taka">
                    <b>Length:</b> <cms:show garums />km<br />
									</cms:if>
                    <b>We visited:</b> <cms:date datums format='d M, Y' /><br />
									<cms:else />
										<b>Dodies.lv hasn't visited</b><br />
									</cms:if>
                    <b>GPS:</b> <cms:show coords/><br />
										<a role="button" class="btn btn-outline-primary myBtn mt-3 w-100" href="/en/#14/<cms:show lat/>/<cms:show lon/>">View on map</a>
									</cms:if>

									<cms:if k_lang == "ru">

										<h2 class="info-title">Info</h2>
										<b>Тип:</b> <cms:if tips == "taka">Тропа</cms:if><cms:if tips == "pikniks">Место для пикника</cms:if><br />
									<cms:if statuss="parbaudits">
									<cms:if tips="taka">
										<b>Длина:</b> <cms:show garums />km<br />
									</cms:if>
										<b>Мы посетили:</b> <cms:date datums format='d M, Y' /><br />
										<cms:else />
										<b>Мы не посещали это место.</b><br />
										</cms:if>

										<b>GPS:</b> <cms:show coords/><br />
									<a role="button" class="btn btn-outline-primary myBtn mt-3 w-100" href="/ru/#14/<cms:show lat/>/<cms:show lon/>">Посмотреть на карте</a>
									</cms:if>

                </div>

            </div>
        </div>

				<div class="row">
					<div class="col-lg-9 mainCol">

							<div id="disqus_thread"></div>
								<script>
									var disqus_config = function () {
									this.page.title = "<cms:show k_page_title />";
									this.page.url = "<cms:show k_page_link />";  // Replace PAGE_URL with your page's canonical URL variable
									this.page.identifier = "<cms:show k_page_name />";
									};

									(function() { // DON'T EDIT BELOW THIS LINE
									var d = document, s = d.createElement('script');
									s.src = 'https://dodieslv.disqus.com/embed.js';
									s.setAttribute('data-timestamp', +new Date());
									(d.head || d.body).appendChild(s);
									})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

				</div>
			</div>
    </div>

	<footer class="footer">
        <div class="container text-center">
            <p class="float-sm-none float-md-left">© dodies.lv</p>
            <p class="float-sm-none float-md-right"><a href="mailto:dodies@dodies.lv">Raksti mums</a></p>
        </div><!-- / container -->
    </footer>

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


			<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" type="text/javascript" charset="utf-8"></script>



			<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			                event.preventDefault();
			                $(this).ekkoLightbox();
			            });
	    </script>

    </body>
    </html>

      <cms:if "<cms:gpc 'json' />">
        <cms:capture into='json_page' >
        <cms:content_type 'application/json'/>
    {
        "image":"<cms:reverse_related_pages 'photo_product' limit='1' orderby='weight' masterpage='gallery.php'><cms:show gg_image /></cms:reverse_related_pages>",
        "title":"<cms:show k_page_title />",
        "desc-short":"<cms:get "mazais_<cms:show k_lang />" />",
        "images": [
            <cms:set count='0' /><cms:reverse_related_pages 'photo_product' orderby='weight' masterpage='gallery.php'>"<cms:show gg_image />"<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:reverse_related_pages>
            ]
    }
        </cms:capture>
        <cms:abort msg=json_page />
      </cms:if>

    <cms:else />

    	<!-- OUTPUT ALL -->
    	<br/>

				<table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr><td>Nosaukums</td><td>Bildes</td><td>Datums</td></tr></thead>
						<cms:pages custom_field='statuss!=slikts' orderby='page_name' order='asc' masterpage='obj.php' >
						<tr>
									<td><a href="<cms:show k_page_link />"><cms:show k_page_title/></a> [<a href="<cms:admin_link />">Edit</a>]</td>

									<td>
	                  <cms:reverse_related_pages 'photo_product' limit='1' orderby='weight' masterpage='gallery.php' >
									    <cms:if gg_image>+</cms:if>
								    </cms:reverse_related_pages>
                  </td>
                  <td><cms:show datums/></td>
            </tr>
					</cms:pages>
          </table>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="/css/tablesorter.css" rel="stylesheet">
				<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
		    <script>
					$(document).ready(function()
						{
							$("table").tablesorter({
                theme : "bootstrap",
                dateFormat : "YYYY-MM-DD HH:MM:SS"
			         });
						}
					);
				</script>
    </body>
    </html>

    </cms:if>
    <?php COUCH::invoke(); ?>
