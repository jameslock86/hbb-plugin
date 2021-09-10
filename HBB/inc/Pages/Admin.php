<?php 
/**
 * @package  HBBPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $pages = array();
	public $subpages = array();

	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'HBB Plugin', 
				'menu_title' => 'HBB', 
				'capability' => 'manage_options', 
				'menu_slug' => 'hbb_plugin', 
				'callback' => function() { echo '<h1>HBB Plugin</h1>'; }, 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
		$this->subpages =  array(
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_cpt',
				'callback' => function() { echo '<h1>Custom Post Types Manger</h1>'; }, 
				
			),
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_taxonomies',
				'callback' => function() { echo '<h1>Taxonomies Manger</h1>'; }, 
				
			),
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_widgets',
				'callback' => function() { echo '<h1>Widgets Manger</h1>'; }, 
				
			)
		);
	}

	public function register() 
	{
		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages)->register();
	}
}