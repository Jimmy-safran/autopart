<?php
/**
 * Plugin Name: TecCom Elementor Availability Widget
 * Description: Elementor widget that shows TecCom availability, with its own settings page.
 * Version: 1.0.0
 * Author: David John
 */

if (! defined('ABSPATH')) {
    exit;
}

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Include bootstrap if you have one
if (file_exists(__DIR__ . '/bootstrap.php')) {
    require_once __DIR__ . '/bootstrap.php';
}

// === 1) Register Settings Page ===
add_action('admin_menu', function() {
    add_options_page(
        'TecCom Settings',
        'TecCom Settings',
        'manage_options',
        'teccom-widget-settings',
        'teccom_widget_render_settings'
    );
});
add_action('admin_init', function() {
    register_setting('teccom_widget_settings_group', 'teccom_widget_settings');
});

function teccom_widget_render_settings() {
    $s = get_option('teccom_widget_settings', []);
    ?>
    <div class="wrap">
      <h1>TecCom Settings</h1>
      <form method="post" action="options.php">
        <?php settings_fields('teccom_widget_settings_group'); ?>
        <table class="form-table">
          <tr>
            <th><label for="teccom_widget_settings[user]">User</label></th>
            <td><input name="teccom_widget_settings[user]" type="text" id="teccom_widget_settings[user]" value="<?php echo esc_attr($s['user'] ?? ''); ?>" class="regular-text"></td>
          </tr>
          <tr>
            <th><label for="teccom_widget_settings[password]">Password</label></th>
            <td><input name="teccom_widget_settings[password]" type="password" id="teccom_widget_settings[password]" value="<?php echo esc_attr($s['password'] ?? ''); ?>" class="regular-text"></td>
          </tr>
          <tr>
            <th><label for="teccom_widget_settings[seller]">Seller Number</label></th>
            <td><input name="teccom_widget_settings[seller]" type="text" id="teccom_widget_settings[seller]" value="<?php echo esc_attr($s['seller'] ?? ''); ?>" class="regular-text"></td>
          </tr>
          <tr>
            <th><label for="teccom_widget_settings[buyer]">Buyer Number</label></th>
            <td><input name="teccom_widget_settings[buyer]" type="text" id="teccom_widget_settings[buyer]" value="<?php echo esc_attr($s['buyer'] ?? ''); ?>" class="regular-text"></td>
          </tr>
          <tr>
            <th><label for="teccom_widget_settings[endpoint]">API Endpoint</label></th>
            <td><input name="teccom_widget_settings[endpoint]" type="text" id="teccom_widget_settings[endpoint]" value="<?php echo esc_attr($s['endpoint'] ?? 'https://iam.teccom.de/tecdirect/tomdirect.asmx'); ?>" class="regular-text"></td>
          </tr>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
    <?php
}

// === 2) Register the Elementor Widget ===
add_action('elementor/widgets/register', function($widgets_manager) {
    // Ensure our settings and connector are loaded
    require_once __DIR__ . '/widget-class.php';

    // Register the widget
    $widgets_manager->register_widget_type( new \Teccom_Elementor_Availability_Widget() );
}, 10, 1);
