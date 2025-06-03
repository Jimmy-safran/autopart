<?php
/**
 * Elementor Widget: TecCom Availability
 */

if (! defined('ABSPATH')) {
    exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use JMS\Serializer\SerializerBuilder;
use TeccomIntegration\TeccomConnector;

class Teccom_Elementor_Availability_Widget extends Widget_Base {

    public function get_name() {
        return 'teccom_availability';
    }

    public function get_title() {
        return __('TecCom Availability', 'teccom');
    }

    public function get_icon() {
        return 'eicon-products';
    }

    public function get_categories() {
        return ['woocommerce-elements'];
    }

    public function get_keywords() {
        return ['teccom', 'availability', 'stock'];
    }

    protected function _register_controls() {
        // No controls needed—uses global product & settings
    }

    public function render() {
        if (! is_product() ) {
            echo '<p>TecCom data only on single product pages.</p>';
            return;
        }

        global $product;
        if (! $product || ! $product->get_sku() ) {
            echo '<p><strong>TecCom:</strong> No SKU found.</p>';
            return;
        }

        // 1) Include main plugin autoload & bootstrap
        $main_plugin_dir = WP_PLUGIN_DIR . '/teccom-elementor-widget';
        $autoload = $main_plugin_dir . '/vendor/autoload.php';
        if ( ! file_exists( $autoload ) ) {
            echo '<p><strong>TecCom Error:</strong> Run <code>composer install</code>.</p>';
            return;
        }
        require_once $autoload;

        $bootstrap = $main_plugin_dir . '/bootstrap.php';
        if ( file_exists( $bootstrap ) ) {
            require_once $bootstrap;
        }

        // 2) Initialize JMS Serializer (same metadata dirs as main plugin)
        $jmsSerializer = SerializerBuilder::create()
            ->addMetadataDir($main_plugin_dir . '/metadata/TecCom/Order/FunctionCallRequest', 'TecCom\Order\FunctionCallRequest')
            ->addMetadataDir($main_plugin_dir . '/metadata/TecCom/Order/FunctionCallResponse', 'TecCom\Order\FunctionCallResponse')
            ->addMetadataDir($main_plugin_dir . '/metadata/TecCom/Order/TXML5',                'TecCom\Order\TXML5')
            ->addMetadataDir($main_plugin_dir . '/metadata/TecCom/Order/TXML4/DespatchAdvice',  'TecCom\Order\TXML4\DespatchAdvice')
            ->addMetadataDir($main_plugin_dir . '/metadata/TecCom/Order/TXML4/Invoice',          'TecCom\Order\TXML4\Invoice')
            ->build();

        // 3) Load your connector class
        require_once $main_plugin_dir . '/includes/TeccomConnector.php';

        // 4) Read the same settings
        $settings = get_option('teccom_settings', []);
        if ( empty($settings['endpoint'])
          || empty($settings['user'])
          || empty($settings['password'])
          || empty($settings['seller'])
          || empty($settings['buyer'])
        ) {
            echo '<p><strong>TecCom:</strong> Incomplete plugin settings.</p>';
            return;
        }

        // 5) Instantiate and call
        try {
            $connector = new TeccomConnector(
                $settings['endpoint'],
                $jmsSerializer,
                $settings['user'],
                $settings['password'],
                $settings['seller'],
                $settings['buyer']
            );

            $lines = $connector->checkAvailability(
                "$product->get_sku()",
                1,              // quantity
                'PCE',          // UoM
                'Road-Express', // dispatchMode
                'Exact',        // avaReqType
                true,           // includePriceInfo
                true            // allowProductChange
            );

            if ( empty($lines) ) {
                echo '<p><strong>TecCom:</strong> No availability data.</p>';
            } else {
                $line = reset($lines);
                printf(
                    '<p class="teccom-availability"><strong>TecCom Available:</strong> %s pcs</p>',
                    esc_html($line['confirmed_qty'] ?? '0')
                );
            }
        } catch (\Throwable $e) {
            printf(
                '<p><strong>TecCom Error:</strong> %s</p>',
                esc_html($e->getMessage())
            );
        }
    }
}
