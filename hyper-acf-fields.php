<?php

/*
Plugin Name: Hyper Acf Fields
Plugin URI: PLUGIN_URL
Description: Hyper Acf Fields
Version: 1.0.0
Author: Atelier Hyper Inc.
Author URI: NULL
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists('hyper_acf_plugin') ) :

class hyper_acf_plugin {
    var $settings;

    function __construct() {
        $this->settings = array(
            'version'	=> '1.0.0',
            'url'		=> plugin_dir_url( __FILE__ ),
            'path'		=> plugin_dir_path( __FILE__ )
        );

        register_activation_hook(__FILE__, [$this, 'on_plugin_activate']);

        add_action('acf/init', 	[$this, 'acf_init']);
    	add_action('acf/include_field_types', [$this, 'acf_include_field_types']);
    }

    function on_plugin_activate() {
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/wordpress/%postname%/');
        $wp_rewrite->flush_rules();
    }

    function acf_init() {
        //include_once('options/origin-acf-options.php');
        //include_once('options/origin-acf-taxonomy.php');
    }

    function acf_include_field_types( $version = false ) {
        include_once('fields/hyper-acf-field-page.php');
        // include_once('fields/origin-acf-field-unique.php');
        // include_once('fields/origin-acf-field-slug.php');
        // include_once('fields/origin-acf-field-tab-name.php');
        // include_once('fields/origin-acf-field-role-selector.php');
    }
}

new hyper_acf_plugin();
endif;
