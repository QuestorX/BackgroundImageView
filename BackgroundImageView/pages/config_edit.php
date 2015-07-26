<?php
form_security_validate ('plugin_BackgroundImageView_config_edit');

auth_reauthenticate ();
access_ensure_global_level (config_get ('manage_plugin_threshold'));

$ShowInFooter = gpc_get_int ('ShowInFooter', ON);
if (plugin_config_get ('ShowInFooter') != $ShowInFooter)
	plugin_config_set ('ShowInFooter', $ShowInFooter);

$ShowBackgroundImage = gpc_get_int ('ShowBackgroundImage', ON);
if (plugin_config_get ('ShowBackgroundImage') != $ShowBackgroundImage)
	plugin_config_set ('ShowBackgroundImage', $ShowBackgroundImage);

$t_project_id = helper_get_current_project ();
$t_background_image_access_level = gpc_get_int ('background_image_access_level');
if (plugin_config_get ('ThresholdLevel') != $t_background_image_access_level)
	plugin_config_set ('ThresholdLevel', $t_background_image_access_level, NO_USER, $t_project_id);

form_security_purge ('plugin_BackgroundImageView_config_edit');

print_successful_redirect (plugin_page ('config', true));
