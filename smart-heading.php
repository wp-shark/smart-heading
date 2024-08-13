<?php
/**
 * Plugin Name:       Smart Heading
 * Plugin URI:        smart-heading
 * Description:       Seamlessly merge titles and description to craft bold, impactful statements directly within your Gutenberg experience
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            @iqbal1hossain
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smart-heading
 * Domain Path:       smart-heading
 *
 * @package SmartHeading
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Defining plugin constants.
 *
 * @since 1.0.0
 */
define('SMART_HEADING_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SMART_HEADING_PLUGIN_DIR', plugin_dir_path(__FILE__));


/**
 * Defining plugin version
 *
 * @since 1.0.0
 */
class Smart_Heading_Version {
	const PLUGIN_VERSION = '1.0.0';

	public static function get_plugin_version() {
		return self::PLUGIN_VERSION;
	}
}

/**
 * Loads the plugin text domain for the Gutenkit Blocks Addon.
 *
 * This function is responsible for loading the translation files for the plugin.
 * It sets the text domain to 'smart-heading' and specifies the directory
 * where the translation files are located.
 *
 * @param string $domain   The text domain for the plugin.
 * @param bool   $network  Whether the plugin is network activated.
 * @param string $directory The directory where the translation files are located.
 * @return bool True on success, false on failure.
 * @since 1.0.0
 */
load_plugin_textdomain( 'smart-heading', false, SMART_HEADING_PLUGIN_DIR . 'languages/' );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function smart_heading_smart_heading_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'smart_heading_smart_heading_block_init' );
