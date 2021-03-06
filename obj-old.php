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
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Documentation Template">
    <meta name="author" content="N.R.">
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/favicon.png">
    <!-- Site Title -->
    <title>Dodies.lv: <cms:show k_page_title /></title>
    <!-- Bootstrap 4 core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="/assets/css/doc-style.css" rel="stylesheet">
    <link href="/assets/css/prism.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500&subset=latin-ext" rel="stylesheet">


</head>
<body class="doc" data-spy="scroll" data-target="#nav-scroll">

    <!-- navigation menu -->
    <nav class="navbar doc-nav navbar-expand-lg navbar-inverse bg-primary">
        <div class="container no-padding">
            <a class="navbar-brand" href="/"><img src="/icons/green-logo.png" class="d-inline-block align-center" style="width: 30px; height: 30px; border-radius: 3px" alt="dodies.lv"/>&nbsp; dodies.lv</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="navbar-nav ml-auto">
<!-- LV -->
									<cms:if k_lang == "lv">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Apraksts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Karte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/<cms:show k_lang />/par/">Par lapu</a>
                    </li>
										</cms:if>
<!-- RU -->
									 <cms:if k_lang == "ru">
											<li class="nav-item">
													<a class="nav-link active" href="#">Описание</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="/">Карта</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="/<cms:show k_lang />/par/">О нас</a>
											</li>
											</cms:if>
<!-- EN -->

										<cms:if k_lang == "en">
											 <li class="nav-item">
													 <a class="nav-link active" href="#">Description</a>
											 </li>
											 <li class="nav-item">
													 <a class="nav-link" href="/">Map</a>
											 </li>
											 <li class="nav-item">
													 <a class="nav-link" href="/<cms:show k_lang />/par/">About us</a>
											 </li>
										</cms:if>


                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                          <cms:each k_supported_langs as='lang' key='lc'>
                          <a class="dropdown-item" style="text-transform: uppercase" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
                        </cms:each>
                        </div>
                      </li>
                    </ul>
                </ul>
            </div><!-- / collapse -->
        </div><!-- container full-width -->
    </nav>
    <!-- / navigation menu -->

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 content">
                <section id="introduction">
                    <cms:reverse_related_pages 'photo_product' limit='1' orderby='weight' masterpage='gallery.php' >
                      <img src="<cms:show gg_image />" alt="<cms:show k_page_title />" />
                    </cms:reverse_related_pages>
                    <div class="item-description space-top">
                        <h2 class="section-title mt-3"><cms:show k_page_title /></h2>
                        <p class="lead mt-3">
                          <cms:get "mazais_<cms:show k_lang />" />
                        </p>
                        <p class="mt-3">
                          <cms:get "apraksts_<cms:show k_lang />" />
                        </p>
                    </div><!-- / item-description -->
                </section><!-- / introduction -->

		<section id="features">
                    <h2 class="section-title"> <cms:if k_lang == "lv">Galerija</cms:if><cms:if k_lang == "en">Photo gallery</cms:if></h2>
                    <div class="spacer">&nbsp;</div>
                    <div class="row">
	                <cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
                        <div class="col-md-4">
                            <div class="promo-box text-center inner-space">
                                <p class="box-description">
                                  <a class="gallery" href="<cms:show gg_image />"><img src="<cms:show gg_thumbmedium />" alt="<cms:show k_page_title />" /></a>
                                </p>
                            </div><!-- / icon-block -->
                        </div><!-- / column -->
                    </cms:reverse_related_pages>
                    </div>
                </section><!-- / features -->

            </div><!-- / column -->

            <div class="col-md-12 col-lg-3">
                <nav id="nav-scroll" class="nav flex-column side-nav sticky-top">
                <img style="margin-top: 10px; border: 2px solid white;" src="https://maps.googleapis.com/maps/api/staticmap?size=200x200&maptype=roadmap&markers=size:small%7C<cms:show lat/>,<cms:show lon/>&scale=2&zoom=7&key=AIzaSyDDdg9ThR9tWWceLn91AganDBeZTk5BvrA" alt="karte"/>

			<!-- menu translations -->
			<cms:if k_lang == "lv">
                <h6 class="mt-3">Informācija: </h6>
                    <ul>
                        <li class="nav-item">Tips: <cms:show tips/></li>
                    <cms:if statuss="parbaudits">
                        <cms:if tips="taka">
                            <li class="nav-item mt-1">Garums: <cms:show garums />km</li>
                        </cms:if>
                        <li class="nav-item mt-1">Apmeklējām: <cms:date datums format='d M, Y' /></li>
                    <cms:else />
                         <li class="nav-item mt-1">Dodies.lv <b>nav apciemojis</b></li>
                    </cms:if>
												<li class="nav-item  mt-1">GPS: <cms:show coords/></li>
                    </ul>
                <button type="button" class="btn btn-info btn-sm">Skatīt kartē</button>
            <cms:else /><cms:if k_lang == "en">
                <h6 class="mt-3">Information: </h6>
                    <ul>
                        <li class="nav-item">Type: <cms:if tips == "taka">Trail</cms:if></li>
                    <cms:if statuss="parbaudits">
                        <li class="nav-item mt-1">Length: <cms:show garums/>km</li>
                        <li class="nav-item mt-1">We checked: <cms:date datums format='d M, Y' /></li>
                    <cms:else />
                         <li class="nav-item mt-1">Dodies.lv <b>hasn't been</b></li>
                    </cms:if>
												<li class="nav-item mt-1">GPS: <cms:show coords/></li>
                    </ul>
                <a role="button" class="btn btn-info btn-sm" href="/#14/<cms:show lat/>/<cms:show lon/>">View on map</a>
            </cms:if></cms:if>
            <!-- / menu translations -->

                </nav>
            </div><!-- / column -->
        </div><!-- / row -->
    </div><!-- / container -->

    <footer>
        <div class="container">
            <p>&copy; Dodies.lv <span class="pull-right"><a href="mailto:dodies@dodies.lv">Raksti mums</a></span></p>
        </div><!-- / container -->
    </footer>

<!-- Core JavaScript -->
<script src="/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!-- / Core JavaScript -->

<!-- Smooth Scrolling -->
<script src="/assets/js/jquery.easing.min.js"></script>
<script src="/assets/js/smooth-scroll.js"></script>
<!-- / Smooth Scrolling -->

<!-- Prism -->
<script src="/assets/js/prism.js"></script>
<!-- / Prism -->

<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
<script src="//code.jquery.com/jquery-latest.js"></script>
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
