<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    // Accepted languages (code => display_name) 
    // get codes from https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html
    $cfg['langs'] = array(
                    'lv'=>'Latvian',
                    'en'=>'English',
                    'ru'=>'Russian',
                );

    // Templates to exclude
    $cfg['exclude'] = array(Importer);

    // Set to 1 to use prettyURLs e.g. http://www.yoursite.com/en/products/
    $cfg['prettyurls'] = 1;
