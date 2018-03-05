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
	
	<cms:editable type='group' name='coords' label='Coordinates' order='2'>
		<cms:editable name='coordinates' type='row' order='2'>
			<cms:editable group='coords' name='lat' width='130' type='text' class='col-xs-2'/>
			<cms:editable group='coords' name='lon' width='130' type='text' class='col-xs-2'/>
		 </cms:editable>
	 </cms:editable>	

	<cms:editable type='group' name='mazie' label='Mazais apraksts' order='3'>
		<cms:editable name='mazie' type='row' order='3'>
			<cms:editable name='mazais_lv' type='textarea'  group='mazie' label='Mazais latviski' class='col-xs-2'/>
			<cms:editable name='mazais_en' type='textarea'  group='mazie' label='Mazais angliski' class='col-xs-2'/>
		</cms:editable>
	</cms:editable>
	
  <cms:editable name='garums' type='text' order='4'/>
  <cms:editable name='datums'	label='Datums' type='datetime' default_time='@current' order= '5' />
  <cms:editable type='group' name='garais' label='Garais apraksts' order='6'/>
  <cms:editable name='apraksts_lv' group='garais' label='Garais latviski' type='richtext'/>
  <cms:editable name='apraksts_en' group='garais' label='Garais angliski' type='richtext'/>

  <cms:editable type='image' name='featured_image' label='Mazais foto'/>
  <cms:editable 
      type='reverse_relation' 
      name='product_photos' 
      masterpage='gallery.php' 
      field='photo_product' 
      anchor_text='View images' 
      label='Gallery' 
  />
</cms:template>

<cms:if k_is_page >
<!DOCTYPE html>
<html lang="<cms:show k_lang />">
<head>
  <title>Dodies.lv</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/css/dodies.css">
  <link href="/css/featherlight.min.css" type="text/css" rel="stylesheet" />
  <link href="/css/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dodies.lv</a>
    <div class="collapse navbar-collapse" id="containerNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Karte <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Par lapu</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Valoda</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <cms:each k_supported_langs as='lang' key='lc'>
            <a class="dropdown-item" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
          </cms:each>	
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div  style="padding-top: 40px" class="container">
    <div class="row">
      <div class="col-md-8">
            
      <div class="jumbotron">
        <h1><cms:show k_page_title /></h1>
        <cms:get "mazais_<cms:show k_lang />" />
      </div>
      <cms:get "apraksts_<cms:show k_lang />" />
      </div>
      <div class="col-md-2">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Info</h5>
            <p class="card-text">
              <ul>
                <li>Tips: <cms:show tips/></li>
                <cms:if statuss="parbaudits">
                  <li>Garums: <cms:show garums/></li>
                  <li>Apmeklējām: <cms:date datums format='d M, Y' /></li>
                  <cms:else />
                  <li>Dodies.lv nav apciemojis</li>
                </cms:if>
              </ul>
            </p>
            <a href="#" class="btn btn-primary">Karte</a>		  
          </div>
        </div>
      </div>
    </div>
    <br/>
    <cms:if statuss="parbaudits">
    <div class="row">
    <div class="col-md-8">
    <section data-featherlight-gallery data-featherlight-filter="a">
    <h2>Bildes</h2>
    <br/>
      <div class="galerija">
        <cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
            <a class="thumbnail gallery" href="<cms:show gg_image />"><img src="<cms:show gg_thumbmedium />" alt="<cms:show k_page_title />" /></a>
        </cms:reverse_related_pages>
      </div>
    </section>
    </div>
    </div>
    </cms:if>

  </div>


  <script src="//code.jquery.com/jquery-latest.js"></script>
  <script src="/js/featherlight.min.js"></script>
  <script src="/js/featherlight.gallery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

  <cms:if "<cms:gpc 'json' />">
    <cms:capture into='json_page' >

    ... code to show your json stuff

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