<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Par' clonable='0' commentable='1'>
<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/>  <cms:editable type='group' name='Par' label='Par mums apraksts'>
    <cms:editable name='main_lv' group='Par' label='Par latviski' type='richtext'/>
    <cms:editable name='main_en' group='Par' label='Par angliski' type='richtext'/>
    <cms:editable name='main_ru' group='Par' label='Par krieviski' type='richtext'/>
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
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body class="doc" data-spy="scroll" data-target="#nav-scroll">
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

              <li class="nav-item">
                  <a class="nav-link" href="/<cms:show k_lang />/">Karte</a>
              </li>
              <li class="nav-item active">
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

              <li class="nav-item">
                  <a class="nav-link" href="/<cms:show k_lang />/">Map</a>
              </li>
              <li class="nav-item active">
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

              <li class="nav-item">
                  <a class="nav-link" href="/<cms:show k_lang />/">Карта</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/<cms:show k_lang />/par/">О нас</a>
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

    <div class="container mt-6">
        <div class="row">
          <div class="col-lg-9 mainCol">

                <section id="introduction">

                    <div class="item-description space-top">
                        <p class="mt-3">
                            <cms:get "main_<cms:show k_lang />" />
                        </p>

                    </div><!-- / item-description -->
                </section><!-- / introduction -->

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

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


</body>
</html>
<?php COUCH::invoke(); ?>
