<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'mobex-default-font' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

function mobex_child_display_product_references() {
    $manufacturer_references = get_post_meta( get_the_ID(), 'manufacturer_references', true );
    $equivalent_references = get_post_meta( get_the_ID(), 'equivalent_references', true );
    $mount_on = get_post_meta( get_the_ID(), 'mount_on', true );
    

    echo '<div class="product-references-info">';
    
    if ( ! empty( $manufacturer_references ) ) {
        $m_ref = explode("&&", $manufacturer_references);
        echo '<div class="product-manufacturer-references">';
        echo '<h2>Manufacturer References:</h2>';
        foreach ( $m_ref as $ref ) {
            $ref = explode("@@", $ref);
            $child_ref = explode("|", $ref[1]);
            echo '<p>' . esc_html( $ref[0] );
            
            foreach ( $child_ref as $key => $child ) {
                echo ' <span style="color:red">' . '<a  href="#">'. esc_html( trim( $child ) ) .'</a>'. '</span>';
                if ( $key < count( $child_ref ) - 1 ) {
                    echo ' |';
                }
            }
            echo '</p>';
            
        }
        
        echo '</div>';
    }

    if ( ! empty( $equivalent_references ) ) {
        $e_ref = explode("&&", $equivalent_references);
        echo '<div class="product-equivalent-references">';
        echo '<h2>Equivalent References:</h2>';
        
        foreach ( $e_ref as $ref ) {
            $ref = explode("@@", $ref);
            $child_ref = explode("|", $ref[1]);
            echo '<p>' . esc_html( $ref[0] );
            
            foreach ( $child_ref as $key => $child ) {
                echo ' <span style="color:red">' . '<a  href="#">'. esc_html( trim( $child ) ) .'</a>'. '</span>';
                if ( $key < count( $child_ref ) - 1 ) {
                    echo ' |';
                }
            }
            echo '</p>';
            
        }

        echo '</div>';
    }

    if ( ! empty( $mount_on ) ) {
        $mount_ref = explode("&&", $mount_on);
        echo '<div class="product-mount-on">';
        echo '<h2>Mount On:</h2>';
      
        foreach ( $mount_ref as $ref ) {
            $ref = explode("@@", $ref);
            $child_ref = explode("|", $ref[1]);
            echo '<p>' . esc_html( $ref[0] );
            
            foreach ( $child_ref as $key => $child ) {
                echo ' <span style="color:red">' . '<a  href="#">'. esc_html( trim( $child ) ) .'</a>'. '</span>';
                if ( $key < count( $child_ref ) - 1 ) {
                    echo ' |';
                }
            }
            echo '</p>';
            
        }
        echo '</div>';
    }
    echo '</div>';
}
add_action( 'woocommerce_after_single_product_summary', 'mobex_child_display_product_references', 9 );