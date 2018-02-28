<?php require_once ('../couch/cms.php'); ?>
<cms:template title='Import' ></cms:template>

<cms:set mystart="<cms:gpc 'import' method='get' />" />

<cms:if mystart >
    <cms:pages masterpage='obj.php' paginate='1' limit='2'>

        <cms:if k_paginated_top >
            <cms:if k_paginate_link_next >
                <script language="JavaScript" type="text/javascript">
                    var myVar;
                    myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 1000 );
                </script>
                <button onclick="clearTimeout(myVar);">Stop</button>
            <cms:else />
                <h1>Done!</h1>
            </cms:if>
           
            <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
         </cms:if>    
        
        <h3><cms:show k_page_title /></h3>

        
        <!-- MAIN PROCESSING START -->

        <!-- 1. save existing main-image name in a variable -->
        <cms:set featured_image = gg_image />
        
        
        <!-- 2. set main-image to blank -->
        <cms:db_persist
            _masterpage=k_template_name
            _mode='edit'
            _page_id=k_page_id
           
            featured_image=''
        > 

            <cms:if k_error>
                <strong style="color:red;">ERROR:</strong> <cms:show k_error/>
            </cms:if>
        </cms:db_persist> 
        
        
        <!-- 3. set main-image back to original data.. this will recreate the new thumbnail associated with it -->
        <cms:db_persist
            _masterpage=k_template_name
            _mode='edit'
            _page_id=k_page_id
           
            gg_image=featured_image
        > 

            <cms:if k_error>
                <strong style="color:red;">ERROR:</strong> <cms:show k_error/>
            </cms:if>
        </cms:db_persist> 

       <!-- MAIN PROCESSING END -->
        
        
        <cms:if k_paginated_bottom >  
            <cms:paginator />
        </cms:if>
    </cms:pages>
<cms:else/>
    <button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
</cms:if>

<?php COUCH::invoke(); ?> 