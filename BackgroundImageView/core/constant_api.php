<?php

define ('BACKGROUNDIMAGEVIEW_CORE_FOLDER', 'core');
define ('BACKGROUNDIMAGEVIEW_PAGES_FOLDER', 'pages');

// URL to RelationshipColumnView plugin
define ('BACKGROUNDIMAGEVIEW_PLUGIN_URL', config_get_global ('path') . 'plugins/' . plugin_get_current () . '/');

// Path to RelationshipColumnView plugin folder
define ('BACKGROUNDIMAGEVIEW_PLUGIN_URI', config_get_global ('plugin_path') . plugin_get_current () . DIRECTORY_SEPARATOR);

// Path to RelationshipColumnView core folder
define ('BACKGROUNDIMAGEVIEW_CORE_URI', BACKGROUNDIMAGEVIEW_PLUGIN_URI . 'core' . DIRECTORY_SEPARATOR);
define ('BACKGROUNDIMAGEVIEW_PAGES_URI', BACKGROUNDIMAGEVIEW_PLUGIN_URI . BACKGROUNDIMAGEVIEW_PAGES_FOLDER . DIRECTORY_SEPARATOR);

// Default treshold level
define ('PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT', ADMINISTRATOR);

?>