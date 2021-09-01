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
if( !class_exists('HBBPlugin')){

class HBBPlugin
{
    // creates the plugin name var
    public $plugin;

    function __construct(){
        //store name of the plugin
        $this->plugin = plugin_basename(__FILE__);

         add_action('init', array($this, 'custom_post_type') );    
    }
    //register the enqueue scripts 
     function register() {
         add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        
         // add leftside dropdown menu
         add_action( 'admin_menu', array( $this, 'add_admin_pages') );
        //settings link  drop down
         add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ));
     }   

    public function add_admin_pages(){
        add_menu_page( 'HBB Plugin', 'HBB', 'manage_options', 'hbb_plugin', array( $this, 'admin_index'), 'dashicons-store', 110 );

    }
    public function admin_index (){
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }
    
    public function settings_link( $links ){
        $settings_link = '<a href="admin.php?page=hbb_plugin">Settings</a> ';
        array_push( $links, $settings_link );
        return $links;

    }
    //actvates the plugin
    function activate(){
        $this->custom_post_type();
        //flushes rewrite rules in the DB
        flush_rewrite_rules();
}
    //deactivate the plugin
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

    
    $HBBPlugin = new HBBPlugin('installed here now!');
    $HBBPlugin->register();

    

    //activate
    require_once plugin_dir_path(__FILE__) . 'inc/HBB-plugin-activate.php';
    register_activation_hook(__FILE__, array( 'HBBPluginActivate', 'activate'));


    //deactivate
    require_once plugin_dir_path(__FILE__) . 'inc/HBB-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array( 'HBBPluginDectivate', 'deactivate'));

    // uninstall
    }