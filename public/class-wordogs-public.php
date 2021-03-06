<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://webophonic.com
 * @since      0.1.0
 *
 * @package    Wordogs
 * @subpackage Wordogs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wordogs
 * @subpackage Wordogs/public
 * @author     webophonic <contact@webophonic.com>
 */
class Wordogs_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $WORDOGS    The ID of this plugin.
	 */
	private $WORDOGS;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $WORDOGS       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $WORDOGS, $version ) {

		$this->WORDOGS = $WORDOGS;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordogs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordogs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->WORDOGS, plugin_dir_url( __FILE__ ) . 'css/wordogs-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordogs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordogs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->WORDOGS, plugin_dir_url( __FILE__ ) . 'js/wordogs-public.js', array( 'jquery' ), $this->version, false );

	}

}
