<?php
/*
Plugin Name: Remove  Open Sans font from WP core
Plugin URI: http://suoling.net/remove-open-sans-font-from-wp-core/
Description: Remove Google Fonts From WP default Themes,Remove  Open Sans font from old WP core.
Version: 1.2.2
Author: suifengtec
Author URI: https://coolwp.com
License: GPL v2 or later
*/

if ( ! defined( 'ABSPATH' ) ){
    exit;   
}

if(!class_exists('RemoveOpenSansFromWPCore')):

final class RemoveOpenSansFromWPCore{

    private static $instance;
    
    public function __wakeup() {}
    public function __clone() {}

    public static function instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof RemoveOpenSansFromWPCore ) ) {
            self::$instance = new self();
            self::$instance->hooks();
        }

        return self::$instance;

    }

    public function hooks(){

        /*
        for old WordPress version.
         */
        add_action( 'init', array( __CLASS__, 'remove_open_sans_from_wp_core') );

        /*
        for WordPress default themes.
         */
        /*
        thanks Milan Dinić.
         */
        add_filter( 'gettext_with_context', array( __CLASS__,'remove_google_fonts'), 888, 4 );


    }


    public static function remove_google_fonts( $translations, $text, $context, $domain ){

        if (

            ( 'Open Sans font: on or off' == $context && 'on' == $text)
                /*for twentyfourteen*/
             ||( 'Lato font: on or off' == $context && 'on' == $text)
                /*for twentyfifteen*/
             ||( 'Noto Sans font: on or off' == $context && 'on' == $text)
             ||( 'Noto Serif font: on or off' == $context && 'on' == $text)
             ||( 'Inconsolata font: on or off' == $context && 'on' == $text)
                /*
                for twentysixteen
                 */
             ||( 'Merriweather font: on or off' == $context && 'on' == $text)
             ||( 'Montserrat font: on or off' == $context && 'on' == $text)
             ||( 'Inconsolata font: on or off' == $context && 'on' == $text)
                /*
                for twentyseventeen
                 */
             ||( 'Libre Franklin font: on or off' == $context && 'on' == $text) 
            ) {

            $translations = 'off';

        }

        return $translations;


    }

    /*
    for WP 4.6-
     */
    public static function remove_open_sans_from_wp_core() {

        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
        wp_enqueue_style('open-sans','');

    }

}

RemoveOpenSansFromWPCore::instance();

endif;
