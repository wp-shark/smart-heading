<?php
/**
 * Plugin Name:       Smart Heading
 * Plugin URI:        smart-heading
 * Description:       Smart Heading is unique
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.0.1
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
