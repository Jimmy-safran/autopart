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

/**
 * Shortcode to display product features from a custom field.
 */


function mobex_custom_product_features_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'heading' => 'Features', // Optional heading for the section
    ), $atts, 'mobex_custom_product_features' );

    global $product;

    $output = ''; // Initialize the $output variable

    if ( ! is_product() || ! $product ) {
        return '';
    }

    // Get the product ID
    $product_id = $product->get_id();

    // Get the value of the custom field (replace 'enovathemes_addons_features' with your actual field name if it's different)
    $features_data = get_post_meta( $product_id, 'enovathemes_addons_features', true );

   
    $output .= '<ul>';

    // Check if the features data is an array (e.g., from a repeater field)
    if ( is_array( $features_data ) && ! empty( $features_data ) ) {
        foreach ( $features_data as $feature ) {
            // Adjust this based on how your repeater field is structured
            if ( is_array( $feature ) && isset( $feature['feature_item'] ) ) { // Example for a repeater with a 'feature_item' sub-field
                $output .= '<li class="feature-item"><span class="feature-icon">&#10004;</span>' . esc_html( $feature['feature_item'] ) . '</li>';
            } elseif ( is_string( $feature ) ) { // Example if each item is directly a string in the array
                $output .= '<li class="feature-item"><span class="feature-icon">&#10004;</span>' . esc_html( $feature ) . '</li>';
            }
        }
    } elseif ( is_string( $features_data ) && ! empty( $features_data ) ) {
        // If the features are stored as a single string (e.g., comma-separated or line-separated)
        $features_array = array_map( 'trim', preg_split( '/[\r\n,]+/', $features_data ) );
        if ( ! empty( $features_array ) ) {
            foreach ( $features_array as $feature ) {
                $output .= '<li class="feature-item"><span class="feature-icon">&#10004;</span>' . esc_html( $feature ) . '</li>';
            }
        }
    } elseif ( ! empty( $features_data ) ) {
        // If the custom field stores a simple text value (display as a single paragraph)
        $output .= '<li class="feature-item"><span class="feature-icon">&#10004;</span>' . wp_kses_post( $features_data ) . '</li>';
    } else {
        $output .= '<li class="feature-item">No features listed for this product.</li>';
    }

    $output .= '</ul>';


    return $output;
}
add_shortcode( 'mobex_custom_features', 'mobex_custom_product_features_shortcode' );


function mobex_custom_features_scripts() {
    static $loaded = false;
    if ( $loaded ) {
        return;
    }
    $loaded = true;
    ?>
    <style>
        
    </style>
    <script type="text/javascript">
        function toggleFeatures(listId, buttonId) {
            const featuresList = document.getElementById(listId);
            const expandButton = document.getElementById(buttonId);
            featuresList.classList.toggle('hidden');
            expandButton.textContent = featuresList.classList.contains('hidden') ? '+' : '-';
        }
        // Initially hide all feature lists
        document.addEventListener('DOMContentLoaded', function() {
            const allFeatureLists = document.querySelectorAll('.feature-list');
            const allExpandButtons = document.querySelectorAll('.expand-collapse-button');
            allFeatureLists.forEach(list => list.classList.add('hidden'));
            allExpandButtons.forEach(button => button.textContent = '+');
        });
    </script>
    <?php
}


function display_product_all_attributes_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'id' => get_the_ID(), // Default to the current product ID in the loop
    ), $atts, 'product_all_attributes' );

    $product_id = intval( $atts['id'] );
    $output     = '';

    if ( ! $product_id ) {
        return ''; // Exit if no product ID is provided
    }

    $product = wc_get_product( $product_id );

    if ( $product ) {
        $attributes = $product->get_attributes();

        if ( ! empty( $attributes ) ) {
            $output .= '<ul class="product-attributes">';
            foreach ( $attributes as $attribute ) {
                $name = wc_attribute_label( $attribute->get_name() );
                $values = array();

                if ( $attribute->is_taxonomy() ) {
                    $terms = wp_get_post_terms( $product_id, $attribute->get_name(), array( 'fields' => 'names' ) );
                    if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
                        $values = $terms;
                    }
                } else {
                    $values = array_map( 'trim', explode( WC_DELIMITER, $product->get_attribute( $attribute->get_name() ) ) );
                }

                if ( ! empty( $values ) ) {
                    $output .= '<li class="product-attribute">';
                    $output .= '<strong class="attribute-name">' . esc_html( $name ) . ':</strong> ';
                    $output .= '<span class="attribute-value">' . esc_html( implode( ', ', $values ) ) . '</span>';
                    $output .= '</li>';
                }
            }
            $output .= '</ul>';
        } else {
            $output .= '<p>No attributes found for this product.</p>';
        }
    } else {
        $output .= '<p>Product not found.</p>';
    }

    return $output;
}
add_shortcode( 'product_all_attributes', 'display_product_all_attributes_shortcode' );

/**
 * Shortcode to display product references (OEM, Equivalent, Mount On).
 *
 * @param array $atts Shortcode attributes.
 * @return string HTML output for the product references.
 */
function mobex_enqueue_shortcode_scripts() {
    global $product;
    // if ( is_product() ) {
        wp_enqueue_script( 'mobex-shortcode-scripts', get_stylesheet_directory_uri() . '/mobex-shortcode-scripts.js', array(), '1.0', true );
        wp_enqueue_style( 'mobex-shortcode-styles', get_stylesheet_directory_uri() . '/mobex-shortcode-styles.css', array(), '1.0' );
        // wp_localize_script( 'mobex-shortcode-scripts', 'mobexData', array(
        //     'productId' => $product ? $product->get_id() : '',
        // ));
    // }
}
add_action( 'wp_enqueue_scripts', 'mobex_enqueue_shortcode_scripts' );

function mobex_total_reviews_shortcode() {
    // $total_reviews = mobex_get_total_product_reviews();
    $args = array(
        'type'   => 'review',
        'status' => 'approve',
        'count'  => true, // Return only the count
    );

    $total_reviews = get_comments( $args );

    // return absint( $total_reviews );


    if ( $total_reviews > 0 ) {
        return '<a href="#">'.esc_html( $total_reviews ) . '</a>';
    } else {
        return '0';
    }
}
add_shortcode( 'total_product_reviews', 'mobex_total_reviews_shortcode' );


/**
 * Shortcode to display the brand image of a product based on a product attribute.
 *
 * Usage: [product_attribute_brand_image id="PRODUCT_ID" attribute="_brand" size="thumbnail"]
 *
 * @param array $atts Shortcode attributes.
 * @return string HTML for the brand image, or an empty string if not found.
 */
function display_product_attribute_brand_image_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'id'        => get_the_ID(), // Default to the current product ID in the loop
        'attribute' => '_brand',   // The slug of the attribute holding the brand name
        'size'      => 'thumbnail', // Image size (thumbnail, medium, large, full, or custom)
        'class'     => '',         // Optional CSS class for the image
        'alt'       => '',         // Optional alt text for the image
    ), $atts, 'product_attribute_brand_image' );

    $product_id    = intval( $atts['id'] );
    $attribute_slug = sanitize_key( $atts['attribute'] );
    $image_size    = sanitize_key( $atts['size'] );
    $class         = sanitize_html_class( $atts['class'] );
    $alt           = sanitize_text_field( $atts['alt'] );
    $output        = '';

    if ( ! $product_id || empty( $attribute_slug ) ) {
        return '';
    }

    $product = wc_get_product( $product_id );

    if ( $product ) {
        $brand_name = $product->get_attribute( $attribute_slug );

        if ( ! empty( $brand_name ) ) {
            // Search for an attachment in the media library with the brand name in its title or alt text
            $args = array(
                'post_type'   => 'attachment',
                'post_status' => 'inherit',
                's'             => $brand_name, // Search by title
                'meta_query'  => array(
                    'relation' => 'OR',
                    array(
                        'key'     => '_wp_attachment_image_alt',
                        'value'   => $brand_name,
                        'compare' => 'LIKE',
                    ),
                ),
                'posts_per_page' => 1,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $image_id = get_the_ID();
                    $image_data = wp_get_attachment_image_src( $image_id, $image_size );

                    if ( $image_data ) {
                        $output = '<img src="' . esc_url( $image_data[0] ) . '" alt="' . esc_attr( ! empty( $alt ) ? $alt : $brand_name ) . '"';
                        if ( ! empty( $class ) ) {
                            $output .= ' class="' . $class . '"';
                        }
                        $output .= ' />';
                    }
                    break; // Only need the first match
                }
                wp_reset_postdata();
            }
        }
    }

    return $output;
}
add_shortcode( 'product_attribute_brand_image', 'display_product_attribute_brand_image_shortcode' );

/**
 * Shortcode to display a message if the post's expire date has a value.
 *
 * @param array $atts Shortcode attributes.
 * @return string Message if the expire date has a value, empty string otherwise.
 */    
function display_post_condition_has_value( $atts ) {
    
    
    $current_post_id = get_the_ID();
    $conditions = get_post_meta( $current_post_id, 'condition', true );

       

    if ( $current_post_id && $conditions ) {
        return "<a href='#'><span style=\"text-decoration: underline;\">See condition</span></a>";
    } else {
        return '';
    }
}
add_shortcode( 'if_condition_has_value', 'display_post_condition_has_value' );




/**
 * Shortcode to display car brands with load more functionality.
 *
 * Usage: [car_brands_list]
 */

/**
 * Shortcode to display car brands with load more functionality.
 *
 * Usage: [car_brands_list]
 */

function car_brands_list_shortcode() {
    // Fetch all terms from the 'vehicles' taxonomy
    $vehicles = get_terms(array(
        'taxonomy'   => 'vehicles', // Replace with the correct taxonomy slug
        'hide_empty' => false,      // Include terms with no associated posts
    ));

    // Start output buffering
    ob_start();

    if (!empty($vehicles) && !is_wp_error($vehicles)) {
        $makes = array(); // To store unique makes and their permalinks

        foreach ($vehicles as $vehicle) {
            // Parse the name to extract the "make"
            $name_parts = explode(',', $vehicle->name); // Split by comma
            $make = trim($name_parts[0]); // Get the first part and trim whitespace

            if (!empty($make) && !array_key_exists($make, $makes)) {
                // Construct the custom permalink
                $makes[$make] = home_url('/shop/?make=' . urlencode($make)); // Encode the make for the URL
            }
        }

        // Display the makes with load more functionality
        if (!empty($makes)) {
            $makes_array = array_keys($makes); // Get the list of makes
            $makes_to_show_initially = 16; // Number of makes to show initially

            echo '<div class="car-brands-section">';
            echo '<div class="car-brands-row row-1">';
            for ($i = 0; $i < min(8, count($makes_array)); $i++) {
                $make = $makes_array[$i];
                $permalink = $makes[$make];
                echo '<a href="' . esc_url($permalink) . '">' . esc_html($make) . '</a>';
            }
            echo '</div>';

            echo '<div class="car-brands-row row-2" style="' . (count($makes_array) <= 8 ? 'display: none;' : '') . '">';
            for ($i = 8; $i < min(16, count($makes_array)); $i++) {
                $make = $makes_array[$i];
                $permalink = $makes[$make];
                echo '<a href="' . esc_url($permalink) . '">' . esc_html($make) . '</a>';
            }
            echo '</div>';

            echo '<div class="all-brands-container" style="display: none;">';
            echo '</div>';

            echo '<div class="load-more-container" style="' . (count($makes_array) <= $makes_to_show_initially ? 'display: none;' : '') . '">';
            echo '<a href="#" id="load-more-brands">Load More</a>';
            echo '</div>';
            echo '</div>';

            // Add JavaScript for load more functionality
            ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const loadMoreLink = document.getElementById('load-more-brands');
                    const allBrandsContainer = document.querySelector('.all-brands-container');
                    const allBrands = <?php echo json_encode($makes_array); ?>;
                    const brandsToShowInitially = <?php echo intval($makes_to_show_initially); ?>;
                    let isExpanded = false;

                    if (loadMoreLink) {
                        loadMoreLink.addEventListener('click', function(e) {
                            e.preventDefault();
                            isExpanded = !isExpanded;
                            allBrandsContainer.innerHTML = ''; // Clear previous content

                            if (isExpanded) {
                                let html = '';
                                for (let i = brandsToShowInitially; i < allBrands.length; i++) {
                                    if (i % 8 === 0) {
                                        html += '<div class="car-brands-row">';
                                    }
                                    html += `<a href="<?php echo home_url('/shop/?make='); ?>${encodeURIComponent(allBrands[i])}">${allBrands[i]}</a>`;
                                    if ((i + 1) % 8 === 0 || i === allBrands.length - 1) {
                                        html += '</div>';
                                    }
                                }
                                allBrandsContainer.innerHTML = html;
                                allBrandsContainer.style.display = 'block';
                                loadMoreLink.textContent = 'Load Less';
                            } else {
                                allBrandsContainer.style.display = 'none';
                                loadMoreLink.textContent = 'Load More';
                            }
                        });
                    }
                });
            </script>
            <?php
        } else {
            echo '<p>No vehicle makes found.</p>';
        }
    } else {
        echo '<p>No vehicles found.</p>';
    }

    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('car_brands_list', 'car_brands_list_shortcode');


/**
 * Shortcode to display manufacturer references.
 *
 * Usage: [manufacturer_references]
 */

 
function manufacturer_references_shortcode( $atts ) {
    
    global $product;

    if ( ! is_product() || ! $product ) {
        return '';
    }

    $manufacturer_data_string = get_post_meta( $product->get_id(), 'manufacturer_references', true );

    $output = '<div class="manufacturer-references-wrapper">';
    

    if ( $manufacturer_data_string ) {
        $manufacturers_data = array();
        $pairs = explode( '&&', $manufacturer_data_string );

        foreach ( $pairs as $pair ) {
            $parts = explode( ' ', trim( $pair ), 2 );
            if ( isset( $parts[0] ) && isset( $parts[1] ) ) {
                $manufacturer = trim( $parts[0] );
                $references = array_map( 'trim', explode( ',', $parts[1] ) );

                if ( ! isset( $manufacturers_data[ $manufacturer ] ) ) {
                    $manufacturers_data[ $manufacturer ] = array();
                }
                $manufacturers_data[ $manufacturer ] = array_unique( array_merge( $manufacturers_data[ $manufacturer ], $references ) );
                sort( $manufacturers_data[ $manufacturer ] );
            }
        }

        if ( ! empty( $manufacturers_data ) ) {
            foreach ( $manufacturers_data as $manufacturer => $references ) {
                $output .= '<div class="manufacturer-item">';
                $output .= '<h3>' . esc_html( strtoupper( $manufacturer ) ) . '</h3>';
                $output .= '<p>' . esc_html( implode( ', ', $references ) ) . '</p>';
                $output .= '</div>';
            }
        } else {
            $output .= '<p>No manufacturer references found.</p>';
        }
    } else {
        $output .= '<p>No manufacturer data provided.</p>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode( 'manufacturer_references', 'manufacturer_references_shortcode' );

// Enqueue necessary styles (you can keep this part)
function manufacturer_references_styles() {
    ?>
    <style type="text/css">
        .manufacturer-references-wrapper {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 5px;
            
        }

        .manufacturer-references-wrapper h2 {
            color: #333;
            font-size: 1.5em;
            margin-top: 0;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .manufacturer-item {
            margin-bottom: 15px;
        }

        .manufacturer-item h3 {
            color: #222;
            font-size: 1.1em;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .manufacturer-item p {
            color: #555;
            font-size: 0.9em;
            line-height: 1.5;
            margin-bottom: 0;
        }
    </style>
    <?php
}
add_action( 'wp_enqueue_scripts', 'manufacturer_references_styles' );

function equivalent_references_shortcode( $atts ) {
    
    global $product;

    if ( ! is_product() || ! $product ) {
        return '';
    }

    $manufacturer_data_string = get_post_meta( $product->get_id(), 'equivalent_references', true );

    $output = '<div class="manufacturer-references-wrapper">';
    

    if ( $manufacturer_data_string ) {
        $manufacturers_data = array();
        $pairs = explode( '&&', $manufacturer_data_string );

        foreach ( $pairs as $pair ) {
            $parts = explode( ' ', trim( $pair ), 2 );
            if ( isset( $parts[0] ) && isset( $parts[1] ) ) {
                $manufacturer = trim( $parts[0] );
                $references = array_map( 'trim', explode( ',', $parts[1] ) );

                if ( ! isset( $manufacturers_data[ $manufacturer ] ) ) {
                    $manufacturers_data[ $manufacturer ] = array();
                }
                $manufacturers_data[ $manufacturer ] = array_unique( array_merge( $manufacturers_data[ $manufacturer ], $references ) );
                sort( $manufacturers_data[ $manufacturer ] );
            }
        }

        if ( ! empty( $manufacturers_data ) ) {
            foreach ( $manufacturers_data as $manufacturer => $references ) {
                $output .= '<div class="manufacturer-item">';
                $output .= '<h3>' . esc_html( strtoupper( $manufacturer ) ) . '</h3>';
                $output .= '<p>' . esc_html( implode( ', ', $references ) ) . '</p>';
                $output .= '</div>';
            }
        } else {
            $output .= '<p>No manufacturer references found.</p>';
        }
    } else {
        $output .= '<p>No manufacturer data provided.</p>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode( 'equivalent_references', 'equivalent_references_shortcode' );

function mount_on_shortcode( $atts ) {
    
    global $product;

    if ( ! is_product() || ! $product ) {
        return '';
    }

    $manufacturer_data_string = get_post_meta( $product->get_id(), 'mount_on', true );

    $output = '<div class="manufacturer-references-wrapper">';
    

    if ( $manufacturer_data_string ) {
        $manufacturers_data = array();
        $pairs = explode( '&&', $manufacturer_data_string );

        foreach ( $pairs as $pair ) {
            $parts = explode( ' ', trim( $pair ), 2 );
            if ( isset( $parts[0] ) && isset( $parts[1] ) ) {
                $manufacturer = trim( $parts[0] );
                $references = array_map( 'trim', explode( ',', $parts[1] ) );

                if ( ! isset( $manufacturers_data[ $manufacturer ] ) ) {
                    $manufacturers_data[ $manufacturer ] = array();
                }
                $manufacturers_data[ $manufacturer ] = array_unique( array_merge( $manufacturers_data[ $manufacturer ], $references ) );
                sort( $manufacturers_data[ $manufacturer ] );
            }
        }

        if ( ! empty( $manufacturers_data ) ) {
            foreach ( $manufacturers_data as $manufacturer => $references ) {
                $output .= '<div class="manufacturer-item">';
                $output .= '<h3>' . esc_html( strtoupper( $manufacturer ) ) . '</h3>';
                $output .= '<p>' . esc_html( implode( ', ', $references ) ) . '</p>';
                $output .= '</div>';
            }
        } else {
            $output .= '<p>No manufacturer references found.</p>';
        }
    } else {
        $output .= '<p>No manufacturer data provided.</p>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode( 'mount_on', 'mount_on_shortcode' );




// Remove the footer banner from the single product page
add_action( 'wp_loaded', function() {
    remove_action( 'woocommerce_after_single_product', 'mobex_enovathemes_woocommerce_after_single_product' );
} );

