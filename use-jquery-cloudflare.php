<?php
 /*
Plugin Name: Use jQuery Cloudflare
Plugin URI: http://additifstabac.free.fr/index.php/use-jquery-cloudflare/
Donate link: additifstabac@free.fr
Description: Charge les bibliothèques open source jQuery et jQuery-migrate depuis le CDN de Cloudflare
Author: luciole135
Author URI: http://additifstabac.free.fr
Version: 1.0
*/
function modify_jquery() {global $wp_scripts;
	if (!is_admin()) {
		$jquery_ver = $wp_scripts->registered['jquery']->ver;
		$jquery_migrate_ver = $wp_scripts->registered['jquery-migrate']->ver;
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-migrate');
		wp_enqueue_script('jquery', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/'.$jquery_ver.'/jquery.min.js"', false, $jquery_ver,true);
		wp_enqueue_script('jquery-migrate', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/'.$jquery_migrate_ver.'/jquery-migrate.min.js', false, $jquery_migrate_ver,true);
		}
}
add_action('wp_enqueue_scripts', 'modify_jquery');
?>