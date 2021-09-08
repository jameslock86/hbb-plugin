<?php

/** @package HBB Plugin
 */
/*
Plugin Name: HBB Plugin 
Plugin URI: https://www.poppidigital.com
Description: Building a new plugin that will make a template for users.
Version: 1.0.0
Author: James Lockwood
Author URI: https://www.poppidigital.com
License: GPLv2 or later
Text Domain: HBB Plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright (C) 2021  James Lockwood
*/


defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * 
 * The code that runs on activation and deactivation
 */
function activate_hhb_plugin(){
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_hbb_plugin' );

function deactivate_hhb_plugin(){
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_hbb_plugin' );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}

