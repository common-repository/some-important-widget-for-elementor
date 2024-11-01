<?php
/**
 * Plugin Name: External Addons For Elementor
 * Description: External Addons For Elementor Custom Elementor extension which includes. External Addons. External
 * Plugin URI:  https://extraaddons.com/some-important-widget-for-elementor 
 * Version:     1.0.0
 * Author:      Extra Addons
 * Author URI:  https://extraaddons.com/
 * Text Domain: ele-somewidget
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Ele_Some_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Ele_Some_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Ele_Some_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'localization_setup' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function localization_setup() {

		load_plugin_textdomain( 'ele-somewidget',  false, plugin_dir_path(__FILE__) . '/languages');

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}
		
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'some_widget_styles' ] );

		add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'some_widget_scripts' ] );


		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        // Category Init
		add_action( 'elementor/init', [ $this, 'elementor_sm_im_category' ] );

	}

		public function init_controls() {

		/*
		* Todo: this block needs to be commented out when the custom control is ready
		*
		*
		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );
		*/

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ele-somewidget' ),
			'<strong>' . esc_html__( 'Elementor Some Important Extension', 'ele-somewidget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ele-somewidget' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ele-somewidget' ),
			'<strong>' . esc_html__( 'Elementor Some Important Extension', 'ele-somewidget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ele-somewidget' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ele-somewidget' ),
			'<strong>' . esc_html__( 'Elementor Some Important Extension', 'ele-somewidget' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'ele-somewidget' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		require_once( __DIR__ . '/widgets/some-important-widget-button.php' );
		require_once( __DIR__ . '/widgets/some-important-widget-icon-text.php' );
		require_once( __DIR__ . '/widgets/some-important-widget-hover-team-effact.php' );
		require_once( __DIR__ . '/widgets/some-important-widget-image-hover-effact.php' );


		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ele_Some_Widget_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ele_Some_Widget_Icon_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \StylistTeam_Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Image_Hover_Widget() );
	

	}



	// Custom CSS
	public function some_widget_styles() {
		wp_enqueue_style( 'someimportantwidget_bootstrap_min', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ) );
		wp_enqueue_style( 'someimportantwidget_bootstrap_icons', plugins_url( '/assets/css/bootstrap-icons.css', __FILE__ ) );
		wp_enqueue_style( 'someimportantwidget_fontawesome', plugins_url( '/assets/css/fontawesome.css', __FILE__ ) );		
		wp_enqueue_style( 'someimportantwidget_font_montserrat', plugins_url( '/assets/googlefonts/font-montserrat.css', __FILE__ ) );
		wp_enqueue_style( 'someimportantwidget_font_mulish', plugins_url( '/assets/googlefonts/font-mulish.css', __FILE__ ) );
		wp_enqueue_style( 'someimportantwidget_font_poppins', plugins_url( '/assets/googlefonts/font-poppins.css', __FILE__ ) );

		wp_register_style( 'elementor-sm-im-style', plugins_url( 'style.css', __FILE__ ) );
		wp_enqueue_style('elementor-sm-im-style');	

		//styleistteam css
		wp_enqueue_style( 'stylist-team-main-style', plugins_url( '/assets/hover-team-assets/css/main-style.css', __FILE__ ));
		wp_enqueue_style( 'stylist-team-mocassin-r-style', plugins_url( '/assets/hover-team-assets/css/mocassin-r.min.css', __FILE__ ));
		wp_enqueue_style( 'stylist-team-reset-style', plugins_url( '/assets/hover-team-assets/css/reset-code.css', __FILE__ ));

		wp_enqueue_style( 'image-hover-effet-style', plugins_url( '/assets/image-hover-effet-assets/css/image-hover-effet-style.css', __FILE__ ));
	

		
		
	}	

	/**
	 *  Plugin Enqueue style
	 *
	 */
	public function some_widget_scripts() {
		//styleistteam js
		wp_enqueue_script( 'team-mocassin-min-js', plugins_url( '/assets/hover-team-assets/js/mocassin.min.js', __FILE__ ));
	}

    // Custom Category
    public function elementor_sm_im_category () {

	   \Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'ele-some-important-cat',
	   	[
	   		'title' => __( 'External Addons', 'ele-somewidget' ),
	   		'icon' => 'fa fa-plug', //default icon
	   	],
	   	 // position
	   );

	}


}

Ele_Some_Extension::instance();
