<?php
/**
 * Plugin Name:       Smart Heading - Heading blocks for Gutenberg, Advanced Heading
 * Description:       Seamlessly merge titles and description to craft bold, impactful statements directly within your Gutenberg experience
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.3
 * Author:            Iqbal Hossain
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smart-heading
 * Domain Path:       /languages
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Final class for the Smart_Heading plugin.
 *
 * @since 1.0.0
 */
final class Smart_Heading {
	
	/**
	 * The single instance of the class.
	 *
	 * @var Smart_Heading
	 * @since 1.0.0
	 */
	protected static $instance = null;

	/**
	 * Main Smart_Heading Instance.
	 *
	 * Ensures only one instance of Smart_Heading is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @return Smart_Heading - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Smart_Heading Constructor.
	 */
	public function __construct() {
		/**
		 * Define Smart_Heading Helper Constants.
		 */
		$this->define_constants();

		/**
		 * Register activation hook.
		 */
		register_activation_hook( __FILE__, array( $this, 'activated_plugin' ) );

		/**
		 * Register the block.
		 */
		add_action( 'init', array( $this, 'register_block' ) );

		/**
		 * Load the plugin text-domain.
		 */
		add_action( 'init', array( $this, 'load_textdomain' ) );

		/**
		 * Fires during the initialization of the Smart_Heading plugin.
		 */
		do_action( 'smart_heading/init' );
	}

	/**
	 * Define Smart_Heading Constants.
	 */
	private function define_constants() {
		$this->define( 'SMART_HEADING_VERSION', '1.0.3' );
		$this->define( 'SMART_HEADING_FILE', __FILE__ );
		$this->define( 'SMART_HEADING_PATH', plugin_dir_path( __FILE__ ) );
		$this->define( 'SMART_HEADING_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'SMART_HEADING_LANGUAGES_DIR', SMART_HEADING_PATH . 'languages/' );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string $name  Constant name.
	 * @param mixed  $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Run on plugin activation.
	 *
	 * @since 1.0.0
	 */
	public function activated_plugin() {
		// Update version in the options table.
		update_option( 'smart_heading_version', SMART_HEADING_VERSION );

		// Add installed time if not already set.
		if ( ! get_option( 'smart_heading_installed_time' ) ) {
			add_option( 'smart_heading_installed_time', time() );
		}
	}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 *
	 * @since 1.0.0
	 */
	public function register_block() {
		register_block_type( SMART_HEADING_PATH . 'build' );
	}

	/**
	 * Loads the plugin text domain.
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'smart-heading', false, SMART_HEADING_LANGUAGES_DIR );
	}
}

// Initialize the plugin.
Smart_Heading::instance();
