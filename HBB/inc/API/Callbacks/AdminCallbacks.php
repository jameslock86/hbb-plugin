<?php
/**
 * 
 * @package HBBPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCpt()
	{
		return require_once( "$this->plugin_path/templates/customPostTypes.php" );
	}

	public function adminTaxonomy()
	{
		return require_once( "$this->plugin_path/templates/customTaxonomies.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/customWidgets.php" );
	}

	public function hbbOptionsGroup( $input )
	{
		return $input;
	}

	public function hbbAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function hbbTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function hbbFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}