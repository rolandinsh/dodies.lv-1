<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Gallery' clonable='1' dynamic_folders='1' gallery='1'>
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
      width='215'
      height='215'
      crop='1'
      type="thumbnail"
      quality='95'
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