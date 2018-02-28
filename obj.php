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
  <cms:editable name='datums'	label='Datums' type='datetime' default_time='@current' order= '5'/>
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
	<!-- SINGLE OBJECT -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/dodies.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
 

  <div class="container">

     <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>

        <div class="collapse navbar-collapse" id="containerNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>

          </ul>
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Valoda</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              <cms:each k_supported_langs as='lang' key='lc'>
			    <a class="dropdown-item" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
			  </cms:each>	
              </div>
            </li>

	
</ul>

		</ul>
        </div>
      </nav>
<br/>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1><cms:show k_page_title /></h1>
        <p><cms:get "mazais_<cms:show k_lang />" /></p>
        <p><cms:get "apraksts_<cms:show k_lang />" /></p>
        
      </div>
      <div class="img-fluid" ><cms:get "foto"/></div>
	    <div style="width: 100%"><img class="img-fluid" src="<cms:get "featured_image" />"/></div>

 <!-- <cms:dump all/> -->

 <cms:if k_is_page >

<br />
<hr />
<div class="galerija">
<cms:reverse_related_pages 'photo_product' masterpage='gallery.php' >
    <!-- All variables of 'gallery.php' are available here -->
    <a href="<cms:show gg_image />"><img src="<cms:show gg_thumbmedium />" /></a>
</cms:reverse_related_pages>
</div>

</cms:if>

 </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>

<cms:else />
	<!-- OUTPUT ALL --> 
	<em>Here is all</em>
	<br/>
	   		<cms:pages custom_field='statuss!=slikts' orderby='page_name' order='asc' masterpage='obj.php' >
				<a href="<cms:show k_page_link />"><cms:show k_page_title/></a> >> <cms:show featured_image /><br/>
			</cms:pages>
</cms:if>
<?php COUCH::invoke(); ?>