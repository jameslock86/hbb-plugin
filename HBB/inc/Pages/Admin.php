<?php 
/**
 * @package  HBBPlugin
 */
namespace Inc\Pages;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();


		$this->setPages();
		$this->setSubpages();

		$this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages)->register();
	}
	public function setPages(){
		$this->pages = array(
			array(
				'page_title' => 'HBB Plugin', 
				'menu_title' => 'HBB', 
				'capability' => 'manage_options', 
				'menu_slug' => 'hbb_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard'), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}
	public function setSubpages(){
		$this->subpages =  array(
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_cpt',
				'callback' => array( $this->callbacks,'customPostTypes' ),
				
			),
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_taxonomies',
				'callback' => array( $this->callbacks,'customTaxonomies' ),
				
			),
			array(
                'parent_slug' => 'hbb_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'hbb_widgets',
				'callback' =>  array( $this->callbacks,'customWidgets' ),
				
			)
		);
	}
}