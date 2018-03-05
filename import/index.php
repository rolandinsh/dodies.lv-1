<?php require_once( 'couch/cms.php' ); ?>
    <cms:template title='Apraksts' ></cms:template>

    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    
    <cms:if mystart >
        <cms:csv_reader 
            file="all.csv" 
            paginate='1'
            limit='1500'
            prefix='_'
            use_cache='0'
        >
            <cms:if k_paginated_top >
            
                <cms:if k_paginate_link_next >
                    <script language="JavaScript" type="text/javascript">
                        var myVar;
                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 1000 );
                    </script>
                    <button onclick="clearTimeout(myVar);">Stop</button>
                <cms:else />
                    Done!    
                </cms:if>
                
                <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
                
                
                <table border='0'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <cms:csv_headers>
                                <th><cms:show value /></th>
                            </cms:csv_headers>    
                        </tr>
                    </thead>
                    <tbody>
            </cms:if>
            
            <tr>
                <td><cms:show k_current_record /></td>
                <cms:csv_columns>
                    <td><cms:show value /></td>
                </cms:csv_columns>    
                
                <!-- database operation here -->
<!-- "k_page_title","k_page_name","tips","statuss","lat","lon","mazais_lv","mazais_en","garums","datums","foto","apraksts_lv","apraksts_en","featured_image","my_image_thumb"
--> 
                    <cms:db_persist
                        _auto_title       = '0'
                        _invalidate_cache = '0'
                        _masterpage       = 'obj.php'
                        _mode             = 'create'

                        k_page_title      = _k_page_title
                        k_page_name		= _k_page_name
                        tips = _tips
                        statuss = _statuss
                        lat          = _lat
                        lon         = _lon
                        mazais_lv = _mazais_lv
                        mazais_en = _mazais_en
						gatums	= _garums
						datums	= _datums
						foto	= _foto
                        apraksts_en = _apraksts_en
                        apraksts_lv = _apraksts_lv
                        featured_image = _featured_image
                        my_image_thumb = _my_image_thumb
                    >
                        <cms:if k_error>
                            <strong style="color:red;">ERROR:</strong> <cms:show k_error/>
                        </cms:if>
                    </cms:db_persist>

                <!-- end database operation -->
                
            </tr>
                
            <cms:if k_paginated_bottom >    
                        <tr>
                            <td></td>
                            <td colspan='<cms:show k_csv_header_count />'>
                                <cms:paginator simple='1' />
                            </td>
                        </tr>
                    </tbody>
                </table>   
            </cms:if>
            
        </cms:csv_reader>    
    <cms:else/>
        <button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
    </cms:if>

<?php COUCH::invoke(K_IGNORE_CONTEXT); ?>