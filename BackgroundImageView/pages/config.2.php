<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" >

<form action="<?php echo plugin_page ('config_edit')?>" method="post">
<?php echo form_security_field ('plugin_BackgroundImageView_config_edit') ?>

<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo plugin_lang_get( 'config_title' ) . ': ' . plugin_lang_get( 'config_caption' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive">

<table class="table table-bordered table-condensed table-striped">

<tr>
   <td class="category width-40">
      <?php echo plugin_lang_get ('show_plugin_info_footer'); ?>
	</td>
	<td class="center" width="20%">
      <label><input type="radio" class="ace" name="ShowInFooter" value="1" <?php echo (ON == plugin_config_get ('ShowInFooter')) ? 'checked="checked" ' : ''?>/>
      <span class="lbl"> <?php echo plugin_lang_get( 'config_yes' ) ?> </span></label>
	</td>
	<td class="center" width="20%">
      <label><input type="radio" class="ace" name="ShowInFooter" value="0" <?php echo (OFF == plugin_config_get ('ShowInFooter')) ? 'checked="checked" ' : ''?>/>
      <span class="lbl"> <?php echo plugin_lang_get( 'config_no' ) ?> </span></label>
   </td>
</tr>

<!-- spacer -->
<tr>
  <td class="spacer" colspan="2">&nbsp;</td>
</tr>

<tr>
   <td class="category width-40">
      <?php echo plugin_lang_get ('show_background'); ?>
	</td>
	<td class="center" width="20%">
      <label><input type="radio" class="ace" name="ShowBackgroundImage" value="1" <?php echo (ON == plugin_config_get ('ShowBackgroundImage')) ? 'checked="checked" ' : ''?>/>
      <span class="lbl"> <?php echo plugin_lang_get( 'config_yes' ) ?> </span></label>
	</td>
	<td class="center" width="20%">
      <label><input type="radio" class="ace" name="ShowBackgroundImage" value="0" <?php echo (OFF == plugin_config_get ('ShowBackgroundImage')) ? 'checked="checked" ' : ''?>/>
      <span class="lbl"> <?php echo plugin_lang_get( 'config_no' ) ?> </span></label>
   </td>
</tr>

<!-- access level -->
<tr>
   <td class="category width-40" width="30%">
    <?php echo plugin_lang_get ('background_image_access_level'); ?>
   </td>
   <td width="200px">
      <select name="BackgroundImageAccessLevel">
         <?php print_enum_string_option_list ('access_levels', plugin_config_get ('BackgroundImageAccessLevel', PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT)); ?>
      </select>
   </td>
</tr>

</table>

</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
</div>
</div>
</div>

</form>

</div>
</div>
