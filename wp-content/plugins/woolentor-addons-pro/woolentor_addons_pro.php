<?php
/**
 * Plugin Name: WooLentor Pro
 * Description: The WooCommerce elements library for Elementor page builder plugin for WordPress.
 * Plugin URI: 	https://woolentor.com/
 * Version: 	1.9.0
 * Author: 		HasThemes
 * Author URI: 	https://hasthemes.com/plugins/woolentor-pro-woocommerce-page-builder/
 * License:  	GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: woolentor-pro
 * Domain Path: /languages
 * WC tested up to: 6.3.1
 * Elementor tested up to: 3.5.6
 * Elementor Pro tested up to: 3.6.3
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
update_option( 'WooLentorPro_lic_Key', 'activated' );
update_option( 'WooLentorPro_lic_email', 'noreply@gmail.com' );
define( 'WOOLENTOR_VERSION_PRO', '1.9.0' );
define( 'WOOLENTOR_ADDONS_PL_ROOT_PRO', __FILE__ );
define( 'WOOLENTOR_ADDONS_PL_URL_PRO', plugins_url( '/', WOOLENTOR_ADDONS_PL_ROOT_PRO ) );
define( 'WOOLENTOR_ADDONS_PL_PATH_PRO', plugin_dir_path( WOOLENTOR_ADDONS_PL_ROOT_PRO ) );
define( 'WOOLENTOR_ADDONS_DIR_URL_PRO', plugin_dir_url( WOOLENTOR_ADDONS_PL_ROOT_PRO ) );
define( 'WOOLENTOR_TEMPLATE_PRO', trailingslashit( WOOLENTOR_ADDONS_PL_PATH_PRO . 'includes/templates' ) );
define( 'WOOLENTOR_ITEM_NAME_PRO', 'WooLentor Pro' );

// Required File
require_once ( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/base.php' );
\WooLentorPro\woolentor_pro();