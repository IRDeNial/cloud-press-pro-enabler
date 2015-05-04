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

/*  Copyright 2015  Mike O  (email : mike.orozco94@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
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