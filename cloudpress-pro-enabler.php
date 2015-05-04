<?php

/*
Plugin Name: Cloud-Press Pro Site Enabler
Plugin URI: https://bitbucket.org/notmike101/cloud-press-pro-enabler/
Description: Enables the Pro features on your cloud-press website.
Version: 1.0
Author: Mike O
Author URI: https://bitbucket.org/notmike101
License: GPL2
*/

class CP_PRO_ENABLER {
	public function __construct() {
		register_activation_hook(__FILE__, array($this,'plugin_activated'));
		register_deactivation_hook(__FILE__, array($this, 'plugin_deactivated'));
	}

	public function plugin_activated() {
		if(file_exists(get_home_path().'/.trial')) {
			unlink(get_home_path().'/.trial');
		}
	}

	public function plugin_deactivated() {
		if(!file_exists(get_home_path().'/.trial')) {
			file_put_contents(get_home_path().'/.trial','');	
		}
	}
}

$CP_PRO_ENABLER = new CP_PRO_ENABLER();

?>