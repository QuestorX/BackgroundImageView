<?php
 
class BackgroundImageViewPlugin extends MantisPlugin
{
   function register() 
   {
      $this->name          = 'Background Image View';
      $this->description   = 'A special view to handle background images.';
      $this->page          = 'config';

      $this->version       = '1.0.2';
      $this->requires      = array
      (
         'MantisCore'   => '1.2.0, <= 1.3.1'
      );

      $this->author      = 'Rainer Dierck';
      $this->contact     = 'rainer.dierck@friends-at-net.de';
      $this->url         = '';
   }
 
   function hooks( )
   {
      $hooks = array
      (  'EVENT_LAYOUT_PAGE_FOOTER' => 'footer',
         'EVENT_LAYOUT_RESOURCES'   => 'background',
      );
      return $hooks;
   }

   function init ()
   {  // Get path to core folder
      $t_core_path   =  config_get_global ('plugin_path')
                     .  plugin_get_current ()
                     .  DIRECTORY_SEPARATOR
                     .  'core'
                     .  DIRECTORY_SEPARATOR;
      
      // Include constants
      require_once ($t_core_path . 'constant_api.php');
   }
   
   function config() 
   {
      return   array
               (
                  'ShowInFooter'                => ON,
                  'ShowBackgroundImage'         => ON,
                  'BackgroundImageAccessLevel'  => ADMINISTRATOR
               );
   }
   
   // --- hooks ---------------------------------------------------------------

   function footer ()
   {
      $t_project_id  = helper_get_current_project ();
      $t_user_id     = auth_get_current_user_id ();
      
      $t_user_has_level = user_get_access_level ($t_user_id, $t_project_id) >= plugin_config_get ('BackgroundImageAccessLevel', PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT);

      if (  plugin_config_get( 'ShowInFooter' ) == 1
         && $t_user_has_level
         )
      {
         return '<address>' . $this->name . ' '  . $this->version . ' Copyright &copy; 2015 by <a href="mailto://' . $this->contact . '">' . $this->author . '</a></address>';
      }
      return null;
   }

   function background ()
   {
      $t_project_id  = helper_get_current_project ();
      $t_user_id     = auth_get_current_user_id ();
      
      $t_user_has_level = user_get_access_level ($t_user_id, $t_project_id) >= plugin_config_get ('BackgroundImageAccessLevel', PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT);

      if (  plugin_config_get ( 'ShowBackgroundImage' ) == 1
         && $t_user_has_level
         )
      {
         echo '<link rel="stylesheet" href="' . BACKGROUNDIMAGEVIEW_PLUGIN_URL . 'css/BackgroundImageView.css">' . "\n";
      }
      return null;
   }
}
