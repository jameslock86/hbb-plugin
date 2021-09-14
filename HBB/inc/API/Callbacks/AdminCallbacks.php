<?php
/**
 * 
 * @package HBBPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard(){
        return require_once( "$this->plugin_path/templates/admin.php"); 
    }

    public function customPostTypes(){
        return require_once( "$this->plugin_path/templates/customPostTypes.php"); 
    }
    public function customTaxonomies(){
        return require_once( "$this->plugin_path/templates/customTaxonomies.php"); 
    }
    public function customWidgets(){
        return require_once( "$this->plugin_path/templates/customWidgets.php"); 
    }
}