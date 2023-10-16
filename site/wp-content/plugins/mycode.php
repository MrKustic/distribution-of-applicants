/*
Plugin Name: My redirect plugin
Description: Redirect
Version: 0.01
Author: MrKust
*/


add_filter('login_redirect', '_myplugin_lgn_redirect');

function _myplugin_lgn_redirect() {
   return '/?page_id=32';
}