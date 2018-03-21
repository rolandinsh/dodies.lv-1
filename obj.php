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

  <cms:editable type='group' name='mazie' label='Mazais apraksts' order='7'>
			<cms:editable name='mazais_lv' type='textarea'  group='mazie' label='Mazais latviski' />
      <cms:editable name='mazais_en' type='textarea'  group='mazie' label='Mazais angliski' />
      <cms:editable name='mazais_ru' type='textarea'  group='mazie' label='Mazais krieviski'/>
  </cms:editable>

  <cms:editable type='group' name='garais' label='Garais apraksts' order='8' >
    <cms:editable name='apraksts_lv' group='garais' label='Garais latviski' type='richtext'/>
    <cms:editable name='apraksts_en' group='garais' label='Garais angliski' type='richtext'/>
    <cms:editable name='apraksts_ru' group='garais' label='Garais krieviski' type='richtext'/>
  </cms:editable>


</cms:template>

<cms:if k_is_page >

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
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700&amp;subset=latin-ext" rel="stylesheet">
</head>

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
                            <a class="nav-link" href="/">Karte</a>
                        </li>
                        <li class="nav-item">
													<a class="nav-link" href="/<cms:show k_lang />/par/">Par lapu</a>
                        </li>
												<li class="nav-item dropdown">
	                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
	                        <div class="dropdown-menu" aria-labelledby="dropdown04">
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
                            <a class="nav-link" href="/">Map</a>
                        </li>
                        <li class="nav-item">
													<a class="nav-link" href="/<cms:show k_lang />/par/">About us</a>
                        </li>
												<li class="nav-item dropdown">
	                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
	                        <div class="dropdown-menu" aria-labelledby="dropdown04">
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
                            <a class="nav-link" href="/">Карта</a>
                        </li>
                        <li class="nav-item">
													<a class="nav-link" href="/<cms:show k_lang />/par/">О нас</a>
                        </li>
												<li class="nav-item dropdown">
	                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
	                        <div class="dropdown-menu" aria-labelledby="dropdown04">
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

								<p class="lead mt-3">
									<cms:get "mazais_<cms:show k_lang />" />
								</p>

								<p class="mt-3">
									<cms:get "apraksts_<cms:show k_lang />" />
								</p>

                <h1 class="gallery-title">Galerija</h1>
                <div class="row">
								<cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
                    <div class="col-lg-4 col-xs-6">
											<a class="gallery d-block mb-4 h-100" href="<cms:show gg_image />"><img class="img-fluid" src="<cms:show gg_thumbmedium />" alt="<cms:show k_page_title />" /></a>
                    </div>
								</cms:reverse_related_pages>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="flex-column side-nav sticky-top mainCol info">
									<img class="img-fluid" style="margin-top: 10px; border: 2px solid white;" src="https://maps.googleapis.com/maps/api/staticmap?size=200x200&maptype=roadmap&markers=size:small%7C<cms:show lat/>,<cms:show lon/>&scale=2&zoom=7&key=AIzaSyDDdg9ThR9tWWceLn91AganDBeZTk5BvrA" alt="karte"/>

									<cms:if k_lang == "lv">

                    <h2 class="info-title">Info</h2>
                    <b>Tips:</b> <cms:show tips/><br />
									<cms:if statuss="parbaudits">
										<cms:if tips="taka">
	                    <b>Garums:</b> <cms:show garums />km<br />
										</cms:if>
										<b>Apmeklējām:</b> <cms:date datums format='d M, Y' /><br />
									<cms:else />
									<b>Dodies.lv hasn't visited</b><br />
									</cms:if>
                    <b>GPS:</b> <cms:show coords/><br />

									</cms:if>

									<cms:if k_lang == "en">
										<h2 class="info-title">Info</h2>
                    <b>Type:</b> <cms:show tips/><br />
									<cms:if statuss="parbaudits">
									<cms:if tips="taka">
                    <b>Length:</b> <cms:show garums />km<br />
									</cms:if>
                    <b>We visited:</b> <cms:date datums format='d M, Y' /><br />
									<cms:else />
										<b>Dodies.lv hasn't visited</b><br />
									</cms:if>
                    <b>GPS:</b> <cms:show coords/><br />

									</cms:if>

									<cms:if k_lang == "ru">

										<h2 class="info-title">Info</h2>
										<b>Тип:</b> <cms:show tips/><br />
									<cms:if statuss="parbaudits">
									<cms:if tips="taka">
										<b>Длина:</b> <cms:show garums />km<br />
									</cms:if>
										<b>Мы посетили:</b> <cms:date datums format='d M, Y' /><br />
										<cms:else />
										<b>Dodies.lv hasn't visited</b><br />
										</cms:if>

										<b>GPS:</b> <cms:show coords/><br />

									</cms:if>

									<a role="button" class="btn btn-outline-primary myBtn mt-3 w-100" href="/#14/<cms:show lat/>/<cms:show lon/>">View on map</a>

                </div>

            </div>
        </div>
    </div>


<footer class="py-3">

        <div class="container text-center">
            <p class="float-sm-none float-md-left">© dodies.lv</p>
            <p class="float-sm-none float-md-right"><a href="mailto:dodies@dodies.lv">Raksti mums</a></p>
        </div><!-- / container -->

    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />

		<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>




        <script>
        $('a.gallery').featherlightGallery({
                previousIcon: '«',
                nextIcon: '»',
                galleryFadeIn: 0,          /* fadeIn speed when slide is loaded */
    		    galleryFadeOut: 0          /* fadeOut speed before slide is loaded */
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
        "desc-long":"<cms:trim "<cms:get "apraksts_<cms:show k_lang />" />" />",
        "images": [
            <cms:set count='0' /><cms:reverse_related_pages 'photo_product' orderby='weight' masterpage='gallery.php'>"<cms:show gg_image />"<cms:incr count /><cms:if count!=k_total_records>, </cms:if></cms:reverse_related_pages>
            ]
    }
        </cms:capture>
        <cms:abort msg=json_page />
      </cms:if>

    <cms:else />
    	<!-- OUTPUT ALL -->
    	<em>Here is all</em>
    	<br/>
    	   		<cms:pages custom_field='statuss!=slikts' orderby='page_name' order='asc' masterpage='obj.php' >
    				<a href="<cms:show k_page_link />"><cms:show k_page_title/></a> >> <cms:show featured_image /><br/>
    			</cms:pages>
    </cms:if>
    <?php COUCH::invoke(); ?>
