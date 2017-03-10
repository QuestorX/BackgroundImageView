<?php

form_security_validate ('plugin_BackgroundImageView_config_edit');

auth_reauthenticate ();
access_ensure_global_level (config_get ('manage_plugin_threshold'));

//$t_project_id = helper_get_current_project ();

$ShowInFooter = gpc_get_int ('ShowInFooter', ON);
if (plugin_config_get ('ShowInFooter') != $ShowInFooter)
{
	plugin_config_set ('ShowInFooter', $ShowInFooter);
}

$ShowBackgroundImage = gpc_get_int ('ShowBackgroundImage', ON);
if (plugin_config_get ('ShowBackgroundImage') != $ShowBackgroundImage)
{
	plugin_config_set ('ShowBackgroundImage', $ShowBackgroundImage);
}

$BackgroundImageAccessLevel = gpc_get_int ('BackgroundImageAccessLevel');
if (plugin_config_get ('BackgroundImageAccessLevel') != $BackgroundImageAccessLevel)
{
	plugin_config_set ('BackgroundImageAccessLevel', $BackgroundImageAccessLevel);
}

form_security_purge ('plugin_BackgroundImageView_config_edit');

print_successful_redirect (plugin_page ('config', true));
