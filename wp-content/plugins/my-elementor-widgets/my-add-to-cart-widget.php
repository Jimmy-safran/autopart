<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Main plugin class
class My_Add_To_Cart_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'my_add_to_cart';
    }

    public function get_title() {
        return __( 'Add to Cart', 'my-elementor-widgets' );
    }

    public function get_icon() {
        return 'eicon-cart';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_script_depends() {
        return [ 'my-add-to-cart-widget' ];
    }

    public function get_style_depends() {
        return [ 'my-add-to-cart-widget' ];
    }

    protected function render() {
        ?>
        <form class="my-add-to-cart-form">
            <button type="button" class="quantity-minus">-</button>
            <input type="number" class="quantity-input" name="quantity" value="1" min="1">
            <button type="button" class="quantity-plus">+</button>
            <button type="submit" class="add-to-cart-button"><?php esc_html_e( 'Add to Cart', 'my-elementor-widgets' ); ?></button>
        </form>
        <?php
    }
}

// Register widget
function register_my_add_to_cart_widget( $widgets_manager ) {
    require_once( __FILE__ );
    $widgets_manager->register( new \My_Add_To_Cart_Widget() );
}
add_action( 'elementor/widgets/register', 'register_my_add_to_cart_widget' );

// Enqueue scripts and styles
function my_add_to_cart_widget_scripts() {
    wp_enqueue_script( 'my-add-to-cart-widget', plugins_url( 'assets/js/my-add-to-cart-widget.js', __FILE__ ), [ 'jquery' ], '1.0.0', true );
    wp_enqueue_style( 'my-add-to-cart-widget', plugins_url( 'assets/css/my-add-to-cart-widget.css', __FILE__ ), [], '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'my_add_to_cart_widget_scripts' );