<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Gallery' clonable='1' dynamic_folders='1' gallery='1'>
    <cms:config_list_view orderby='weight' searchable='1' > 
    <cms:field 'k_selector_checkbox' />
    <cms:field 'k_actions' />
    <cms:field 'k_up_down' />
    </cms:config_list_view>
  <cms:editable
      name="gg_image"
      label="Image"
      desc="Upload your main image here"
      width="2000"
      show_preview='1'
      preview_height='700'
      type="image"
      quality='90'
   />
   <cms:editable
      name="gg_thumb"
      assoc_field="gg_image"
      label="Image Thumbnail"
      desc="Thumbnail of image above"
      width='115'
      height='115'
      enforce_max='1'
      type="thumbnail"
   />

      <cms:editable
      name="gg_thumbmedium"
      assoc_field="gg_image"
      label="Image medium Thumbnail"
      desc="Thumbnail of image above"
      width='300'
      height='300'
      crop='1'
      type="thumbnail"
      quality='90'
   />

<cms:editable 
    type='relation'
    name='photo_product' 
    masterpage='obj.php' 
    has='one' 
    no_gui='1' 
    label='-'
/>
</cms:template>
<?php COUCH::invoke(); ?>