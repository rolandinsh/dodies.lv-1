<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

require_once( K_COUCH_DIR.'addons/multi-lang/multi-lang.php' );
require_once( K_COUCH_DIR.'addons/data-bound-form/data-bound-form.php' );
require_once( K_COUCH_DIR.'addons/csv/csv.php' );
require_once( K_COUCH_DIR.'addons/bootstrap-grid/bootstrap-grid.php' );

//require_once( K_COUCH_DIR.'addons/cart/cart.php' );
//require_once( K_COUCH_DIR.'addons/inline/inline.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
//require_once( K_COUCH_DIR.'addons/routes/routes.php' );
//require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );

$FUNCS->register_tag( 'trim', array('CustomTags', 'trim_all') );
class CustomTags{
   
    function trim_all( $str, $node ){

        $res = $str[0]['rhs'];
        return trim( preg_replace( "/\s+/" , ' ' , $res ) , " \t\n\r\0\x0B" );
    }
   
} 
?>
