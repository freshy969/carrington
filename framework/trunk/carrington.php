<?php

// This file is part of the Carrington Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

//	ini_set('display_errors', '1');
//	ini_set('error_reporting', E_ALL);

include_once(CFCT_PATH.'functions/compatibility.php');
include_once(CFCT_PATH.'functions/admin.php');
include_once(CFCT_PATH.'functions/templates.php');
include_once(CFCT_PATH.'functions/utility.php');
include_once(CFCT_PATH.'functions/ajax-load.php');
include_once(CFCT_PATH.'functions/sidebars.php');
include_once(CFCT_PATH.'functions/sandbox.php');

cfct_load_plugins();

function cfct_init() {
	cfct_admin_request_handler();
	if (cfct_get_option('cfct_ajax_load') == 'yes') {
		cfct_ajax_load();
	}
}
add_action('init', 'cfct_init');

wp_enqueue_script('jquery');
wp_enqueue_script('carrington', get_bloginfo('template_directory').'/js/carrington.js', 'jquery', '1.0');

function cfct_head() {
	cfct_get_option('cfct_ajax_load') == 'no' ? $ajax_load = 'false' : $ajax_load = 'true';
	echo '
<script type="text/javascript">
var CFCT_URL = "'.get_bloginfo('url').'";
var CFCT_AJAX_LOAD = '.$ajax_load.';
</script>
	';
}
add_action('wp_head', 'cfct_head');

function cfct_wp_footer() {
	echo get_option('cfct_wp_footer');
}
add_action('wp_footer', 'cfct_wp_footer');

if (!defined('CFCT_DEBUG')) {
	define('CFCT_DEBUG', false);
}

?>