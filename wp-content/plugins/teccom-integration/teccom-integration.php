<?php
/**
 * Plugin Name: TecCom WooCommerce Integration (Golda)
 * Description: Integrates WooCommerce with TecCom availability API using JMS Serializer and TecCom SDK.
 * Version: 1.0.0
 * Author: David John
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

$config = require __DIR__ . '/config.php';

require_once __DIR__ . '/teccom-classes/AvaRequestBuilder.php';
require_once __DIR__ . '/teccom-classes/FunctionCallBuilder.php';
require_once __DIR__ . '/teccom-classes/ResponseParser.php';
require_once __DIR__ . '/teccom-classes/SoapClientWrapper.php';
require_once __DIR__ . '/teccom-classes/OrderRequestBuilder.php';



// Register plugin settings
add_action('admin_menu', function() {
    add_options_page('TecCom Settings', 'TecCom Settings', 'manage_options', 'teccom-settings', 'teccom_render_settings');
});
add_action('admin_init', function() {
    register_setting('teccom_settings_group', 'teccom_settings');
});

function teccom_render_settings() {
    $settings = get_option('teccom_settings', []);
    ?>
    <div class="wrap">
        <h1>TecCom Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('teccom_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="teccom_settings[user]">User</label></th>
                    <td><input name="teccom_settings[user]" type="text" id="teccom_settings[user]" value="<?php echo esc_attr($settings['user'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="teccom_settings[password]">Password</label></th>
                    <td><input name="teccom_settings[password]" type="password" id="teccom_settings[password]" value="<?php echo esc_attr($settings['password'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="teccom_settings[seller]">Seller Number</label></th>
                    <td><input name="teccom_settings[seller]" type="text" id="teccom_settings[seller]" value="<?php echo esc_attr($settings['seller'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="teccom_settings[buyer]">Buyer Number</label></th>
                    <td><input name="teccom_settings[buyer]" type="text" id="teccom_settings[buyer]" value="<?php echo esc_attr($settings['buyer'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="teccom_settings[endpoint]">API Endpoint</label></th>
                    <td><input name="teccom_settings[endpoint]" type="text" id="teccom_settings[endpoint]" value="<?php echo esc_attr($settings['endpoint'] ?? 'https://iam.teccom.de/tecdirect/tomdirect.asmx'); ?>" class="regular-text"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * 1) Send order data to TecCom when an order is placed.
 *
 *    1a) Hook into the WooCommerce 'thankyou' action to send order data.
 *    1b) Use the TecCom SDK to send the order data.
 *    1c) Save the response in the order meta.
 */

 function mtos_send_order_to_thirdparty( $order_id ) {
    global $config, $serializer;

    if ( ! $order_id ) {
        return;
    }

    // 1a) Load the WooCommerce order object
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return;
    }

    
    $lines = [];
    foreach ( $order->get_items() as $item ) {
        $product = $item->get_product();
        if ( ! $product ) {
            continue;
        }

        $lines[] = [
            'uom'            => 'PCE', // default to pieces
            'quantity'       => $item->get_quantity(),
            'product_number' => $product->get_sku(),
            'successor'      => false,
            'substitution'   => false,
            'exchange_part'  => false,
        ];
    }

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

    $config['parties']['buyer_number'] = $settings['buyer'];
    $config['parties']['seller_number'] = $settings['seller'];
    $config['soap']['endpoint'] = $settings['endpoint'];
    $config['auth']['user'] = $settings['user'];
    $config['auth']['password'] = $settings['password'];

    
    // Final payload
    $order_input = [
        'order_type'               => 'Standard', //Blanket, CallOff, Change, Consignment, consumption, Proposal, Rush, Standard
        'document_number'          => $order->get_order_number(),
        'seller_number'            => $config['parties']['seller_number'],
        'buyer_number'             => $config['parties']['buyer_number'],

        
        'shipping_address_name1'   => $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name(),
        'shipping_address_street1' => $order->get_shipping_address_1(),
        'shipping_address_city'    => $order->get_shipping_city(),
        'shipping_address_postal_code' => $order->get_shipping_postcode(),
        'shipping_address_country_code' => $order->get_shipping_country(),

        'currency'                => $order->get_currency(),
        'dispatch_mode'            => 'Road', //Air, Air-Express, courier, Courier-Express, Mail, OverNight, ParcePost, PickUp, PrivateParcelService, Rail, Road, Road-Express, Sea, Sea-Express, TillEighteen, TillNine, TillTwelve, undefined
        'backlog'                  => false,
        'complete_delivery'        => false,
        'complete_shipment'        => false,

        // Line items
        'lines'                    => $lines,
    ];
    


    // $order_input = [
    //     // Top‐level Order attributes
    //     'order_type'       => 'Standard',
    //     'document_number'  => $order->get_order_number(), //corresponds to the order id
    //     'seller_number'   => $config['parties']['seller_number'],
    //     'buyer_number'    => $config['parties']['buyer_number'],
    //     'shipping_address_name1' => 'John Doe',
    //     'shipping_address_street1' => '123 Main St',
    //     'shipping_address_city' => 'Berlin',
    //     'shipping_address_postal_code' => '10115',
    //     'shipping_address_country_code' => 'DE', // ISO 3166-1 alpha-2 code for Germany
    //     'currency'         => 'EUR',
    
    //     'dispatch_mode'    => 'Road',
    //     'backlog'          => false,
    //     'complete_delivery'=> false,
    //     'complete_shipment'=> false,
    
    //     // Lines array (only one line in your example)
    //     'lines' => [
    //         [
    //             'uom'             => 'PCE',
    //             'quantity'        => 10,
    //             'product_number'  => '0810', //corresponds to the product SKU
    //             'successor'       => false,
    //             'substitution'    => false,
    //             'exchange_part'   => false,
    //         ],
    //     ],
    // ];
    
    
    // Prepare some default placeholders for response/status
    $response    = '';
    $status_code = '';



    //
    // Step 1: Build the inner Order payload and serialize it
    //
    try {
        // (Assume $order_input is constructed somewhere above; omitted here for brevity.)
        $orderReq    = OrderRequestBuilder::build( $order_input );
        $orderReqXml = $serializer->serialize( $orderReq, 'xml' );
    } catch ( \Exception $e ) {
        $response    = 'Error building/serializing OrderRequest: ' . $e->getMessage();
        $status_code = 500;
        // Save and bail out
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    }

    //
    // Step 2: Wrap that XML in a FunctionCallRequest
    //
    try {
        $order_functionID    = 'Order_SubmitOrder';  // as before
        $order_parameterType = 'Order';

        $orderRequest           = FunctionCallBuilder::build(
            $orderReqXml,
            $config['auth'],
            $order_functionID,
            $order_parameterType
        );
        // Serialize and htmlspecialchars‐encode for SOAP
        $rawFunctionCallXml     = $serializer->serialize( $orderRequest, 'xml' );
        $orderRequestXml        = htmlspecialchars( $rawFunctionCallXml, ENT_NOQUOTES );
    } catch ( \Exception $e ) {
        $response    = 'Error building/serializing FunctionCallRequest: ' . $e->getMessage();
        $status_code = 500;
        // Save and bail out
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    }

    //
    // Step 3: Send via SoapClientWrapper
    //
    try {
        $order_response = SoapClientWrapper::send( $orderRequestXml, $config['soap'] );
    } catch ( \SoapFault $e ) {
        $response    = 'SOAP Fault during send(): ' . $e->getMessage();
        $status_code = $e->getCode() ?: 500;
        // Save and bail out
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    } catch ( \Exception $e ) {
        $response    = 'Unexpected error during send(): ' . $e->getMessage();
        $status_code = 500;
        // Save and bail out
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    }

    //
    // Step 4: Parse out the “inner” XML from the SOAP envelope
    //
    $order_innerXml = ResponseParser::parse( $order_response, $serializer );
    if ( is_string( $order_innerXml ) && strpos( $order_innerXml, 'Error' ) === 0 ) {
        // parse() returns a string beginning with “Error:” on failure
        $response    = $order_innerXml; // e.g. "No ProcessRequestResult found."
        $status_code = 500;
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    }
    // At this point, $order_innerXml is an array of lines (successful parse)

    //
    // Step 5: Extract the actual OrderResponse out of that “inner” XML
    //
    $orderRspXml = ResponseParser::extractOrderResponse( $order_innerXml );
    if ( is_string( $orderRspXml ) && strpos( $orderRspXml, 'Error' ) === 0 ) {
        // extractOrderResponse() returns a string beginning with “Error:” on failure
        $response    = $orderRspXml; // e.g. "Error: <ParameterValue> element not found."
        $status_code = 500;
        $order->update_meta_data( '_mtos_thirdparty_response', $response );
        $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
        $order->save();
        return;
    }
    // If we get here, $orderRspXml is the array of order‐lines (success)

    //
    // Everything worked: record “success” and a 200
    //
    $head = $orderRspXml['head'];

    $response    = $head['document_number'];
    $status_code = 200;
    $order->update_meta_data( '_mtos_thirdparty_response', $response );
    $order->update_meta_data( '_mtos_thirdparty_status_code', $status_code );
    $order->save();
}

add_action( 'woocommerce_thankyou', 'mtos_send_order_to_thirdparty', 10, 1 );



/**
 * 2) Add a new column to the WooCommerce Orders table in Admin to show the third-party response.
 *
 *    2a) Register a new column: “3rd-Party Status”
 */

add_filter( 'manage_shop_order_posts_columns', 'mtos_add_thirdparty_column', 20 );
add_action( 'manage_shop_order_posts_custom_column', 'mtos_show_thirdparty_column', 20, 2 );
function mtos_add_thirdparty_column( $columns ) {
    
    // $new_columns = [];
    // foreach ( $columns as $key => $label ) {
    //     $new_columns[ $key ] = $label;

    //     // If you want the new column right after “order_total”, use:
    //     // if ( 'order_total' === $key ) {
    //     //     $new_columns['thirdparty_status'] = __( '3rd-Party Status', 'my-thirdparty-sync' );
    //     // }
    // }
    
    $columns['thirdparty_status'] = __( 'TecCom Status', 'my-thirdparty-sync' );

    return $columns;
}
// add_filter( 'manage_edit-shop_order_columns', 'mtos_add_thirdparty_column', 20 );



 function mtos_show_thirdparty_column( $column, $order) {
    if ( 'thirdparty_status' !== $column ) {
        return;
    }

    
    $response = $order->get_meta( '_mtos_thirdparty_response' );
    $code     = $order->get_meta( '_mtos_thirdparty_status_code' );


    if ( '' === $response && '' === $code ) {
        echo '<span style="color:#999;">Pending</span>';
        return;
    }

    // If we have a response string, show it in green
    if ( ! empty( $response ) ) {
        echo '<span style="color:green;">' . esc_html( $response ) . '</span>';
        return;
    }

    // Otherwise, if only have a status code:
    if ( ! empty( $code ) ) {
        echo '<span style="color:green;">Sent (Code: ' . esc_html( $code ) . ')</span>';
    }

}



add_filter( 'manage_woocommerce_page_wc-orders_columns', 'mtos_add_thirdparty_column', 20 );

add_action( 'manage_woocommerce_page_wc-orders_custom_column', 'mtos_show_thirdparty_column', 10, 2 );