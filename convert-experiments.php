<?php
/*
Plugin Name: Convert Experiments by Yoast
Version: 2.0.0
Plugin URI: http://convert.com/
Description: Convert Experiments provides A/B and Multivariate Testing for Experts. To get started: 1) Click the "Activate" link to the left of this description, 2) <a href="https://www.convertexperiments.com/login?action=register">Sign up for a free trial</a>, and 3) Go to your <a href="options-general.php?page=yoast-convert-experiments">Convert Experiments configuration</a> page, and enter your project number.
Author: Yoast
Author URI: http://www.yoast.com/
Text Domain: convert-experiments
Domain Path: /languages/

License: GPL v3

Convert Experiments by Yoast
Copyright (C) 2008-2014, Joost de Valk - joost@yoast.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/*  Copyright 2012  John Bekas Jr.  (email : john@convert.com)

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

/**
 * Class Yoast_Convert_Experiments
 *
 * @todo
 * - Add plugin textdomain to all strings and create pot file
 * - Create upgrade script that loads the old option, saves it as new option, deletes old option
 */
class Yoast_Convert_Experiments {

	const PLUGIN_FILE           = __FILE__;
	const PLUGIN_VERSION_NAME   = '1.0.0';
	const PLUGIN_VERSION_CODE   = '1';
	const OPTION_PROJECT_NUMBER = 'convert_experiments_project_number';

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->includes();
		$this->setup();
	}

	/**
	 * Include files
	 */
	private function includes() {
		if ( is_admin() ) {
			require_once dirname( __FILE__ ) . '/classes/admin/class-admin.php';
			require_once dirname( __FILE__ ) . '/classes/admin/class-admin-page.php';
		} else {
			require_once dirname( __FILE__ ) . '/classes/frontend/class-convert-script.php';
		}
	}

	/**
	 * Setup plugin
	 */
	private function setup() {
		if ( is_admin() ) {
			new YCE_Admin();
		} else {
			new YCE_Convert_Script();
		}
	}

	/**
	 * Get the project number
	 *
	 * @return string
	 */
	public static function get_project_number() {
		return apply_filters( 'convert_experiments_project_number', trim( get_option( self::OPTION_PROJECT_NUMBER, '' ) ) );
	}

}

// Create object - plugin init
add_action( 'plugins_loaded', create_function( '', 'new Yoast_Convert_Experiments();' ) );