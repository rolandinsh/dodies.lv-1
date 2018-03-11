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
            <a class="navbar-brand" href="/"><img src="/icons/green-logo.png" class="d-inline-block align-center" style="width: 30px; height: 30px; border-radius: 3px" alt="dodies.lv"/></a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/<cms:show k_lang />/">Karte</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active" href="#">Par lapu</span>
                    </li>
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                          <cms:each k_supported_langs as='lang' key='lc'>
                          <a style="text-transform: uppercase" class="dropdown-item" href="<cms:get "k_link_<cms:show lc/>" />"><cms:show lc/></a>
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
            <div class="col-md-16 col-lg-12 content">
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
<?php COUCH::invoke(); ?>