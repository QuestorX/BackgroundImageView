<?php
 
class BackgroundImageViewPlugin extends MantisPlugin
{
   function register() 
   {
      $this->name          = 'Background Image View';
      $this->description   = 'A special view to handle background images.';
      $this->page          = 'config';

      $this->version       = '1.0';
      $this->requires      = array
      (
         'MantisCore'   => '1.2.0',
         'MantisCore'   => '1.3.0'
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
	
	function config() 
   {
		return   array
               (
                  'ShowInFooter'          => ON,
                  'ShowBackgroundImage'   => ON,
                  'ThresholdLevel'        => ADMINISTRATOR
               );
	}
   
   // --- hooks ---------------------------------------------------------------
	
   function footer ()
   {
      $t_project_id  = helper_get_current_project ();
      $t_user_id     = auth_get_current_user_id ();
      
      $t_user_has_upload_level = user_get_access_level ($t_user_id, $t_project_id) >= plugin_config_get ('ThresholdLevel', PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT);

      if (  plugin_config_get( 'ShowInFooter' ) == 1
         && $t_user_has_upload_level
         )
      {
         return '<address>' . $this->name . ' '  . $this->version . ' by <a href="mailto://' . $this->contact . '">' . $this->author . '</a></address>';
      }
      return "";
   }

	function background ()
   {
      $sReturn = "";

      $t_project_id = helper_get_current_project ();
      $t_user_id = auth_get_current_user_id ();
      $t_user_has_upload_level = user_get_access_level ($t_user_id, $t_project_id) >= plugin_config_get ('ThresholdLevel', PLUGINS_BACKGROUNDIMAGEVIEW_THRESHOLD_LEVEL_DEFAULT);

      if (  plugin_config_get( 'ShowBackgroundImage' ) == 1
         && $t_user_has_upload_level
         )
      {
         $sReturn .= '<style type="text/css">';
         $sReturn .= 'body {';
         $sReturn .= 'background-image: url('.plugin_file( 'background.jpg' ).');';
         $sReturn .= 'background-repeat:repeat-y;';
         $sReturn .= 'background-size:cover;';
         $sReturn .= 'background-attachment:fixed;';
         $sReturn .= '}';
         $sReturn .= '</style>';
      }			
      return $sReturn;
   }
}