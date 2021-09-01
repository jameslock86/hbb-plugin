<?php

/** @package HBB Plugin
 */
/*
Plugin Name: HBB Plugin James
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

if (! defined('ABSPATH') ) {
    die;
}


class HBBPlugin

{

    function __construct(){
        add_action('init', array($this, 'custom_post_type') );
        
    }
    
     function register() {
         add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
     }   
    

function activate(){
    //actvates the class
    $this->custom_post_type();
    //flushes rewrite rules in the DB
    flush_rewrite_rules();
}
function deactivate(){
    //flushes rewrite rules in the DB
    flush_rewrite_rules();
    
}


function custom_post_type(){
    register_post_type( 'book',['public' => true, 'label' => 'Books']);

}
 function enqueue(){
     //enqueue all of our scripts
     wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css', __file__));
     wp_enqueue_script('mypluginscript', plugins_url('/assests/myscript.js', __file__));
 }
}

if( class_exists('HBBPlugin')){
$HBBPlugin = new HBBPlugin('installed here now!');
$HBBPlugin->register();

}

//activate
register_activation_hook(__FILE__, array( $HBBPlugin, 'activate'));


//deactivate
register_deactivation_hook(__FILE__, array( $HBBPlugin, 'deactivate'));

// uninstall
