<?php

namespace Inc\Pages;
/**
 * 
 * 
 */
class Admin
{
    
    public function register(){
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

    }
    public function add_admin_pages() {
        add_menu_page( 'HBB Plugin', 'HBBPlugin', 'manage_options', 'hbb_plugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
    }

    public function admin_index() {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
        
}