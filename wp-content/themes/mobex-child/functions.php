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





// product's categories side bar
function get_hierarchical_product_categories() {
    $categories = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'parent'     => 0,
        )
    );

    $category_tree = array();
    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        foreach ( $categories as $category ) {
            $category_tree[] = get_category_data( $category );
        }
    }
    return $category_tree;
}

/**
 * Recursive function to get category data, including subcategories.
 */
function get_category_data( $category ) {
    $category_data = array(
        'id'       => $category->term_id,
        'name'     => $category->name,
        'slug'     => $category->slug,
        'url'      => get_term_link( $category ),
        'children' => array(),
    );

    $subcategories = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'parent'     => $category->term_id,
        )
    );

    if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ) {
        foreach ( $subcategories as $subcategory ) {
            $category_data['children'][] = get_category_data( $subcategory );
        }
    }

    return $category_data;
}

function display_categories_frontend($categories, $level = 0) {
    foreach ($categories as $category) {
        $has_children = false;
        if (!empty($category['children'])) {
            $has_children = true;
        }
        echo '<li class="product-category-item level-' . $level . ' ' . ($has_children ? 'has-children' : '') . '" data-category-id="' . $category['id'] . '" data-category-name="' . $category['name'] . '" data-category-slug="' . $category['slug'] . '" data-category-url="' . $category['url'] . '">';
        echo '<a href="#" class="category-link">';
        echo esc_html($category['name']);
        echo '</a>';
        if (!empty($category['children'])) {
            echo '<ul class="product-categories-list sub-level" data-parent-id="' . $category['id'] . '" style="display:none;">';
            display_categories_frontend($category['children'], $level + 1);
            echo '</ul>';
        }
        echo '</li>';
    }
}

function product_categories_shortcode() {
    $categories = get_hierarchical_product_categories();
    ob_start();
    ?>
    <div class="product-categories-wrapper">
        <ul class="product-categories-list main-level">
            <?php display_categories_frontend($categories, 0); ?>
        </ul>
    </div>
    <div class="category-screen" style="display: none;"></div>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'custom_product_categories', 'product_categories_shortcode' );

function my_category_scripts() {
        wp_enqueue_script( 'my-categories-script', get_stylesheet_directory_uri() . '/js/product-categories-sidebar.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_category_scripts' );





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
                $output .= '<p><a href="#">' . esc_html( implode( ', ', $references ) ) . '</a></p>';
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
            background-color: #ffffff;
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
                $output .= '<p><a href="#">' . esc_html( implode( ', ', $references ) ) . '</a></p>';
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
                $output .= '<p><a href="#">' . esc_html( implode( ', ', $references ) ) . '</a></p>';
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




/**
 * Shortcode to display a category ACF field with styled output.
 *
 * @param array $atts Shortcode attributes.
 * - field_name (string, required): The name of the ACF field.
 * @return string The output HTML, styled to resemble the image.
 */


 function styled_category_acf_field_shortcode() {

    $output = "";

    $main_summary = get_category_acf_field( "main_summary" );

    if ( $main_summary ) {
        $sentences = preg_split('/([.?!]["\']?\s|$)/', wp_strip_all_tags( $main_summary ), -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $title = isset($sentences[0]) ? trim($sentences[0]) : '';
        $content_raw = '';
        for ($i = 1; $i < count($sentences); $i++) {
            $content_raw .= trim($sentences[$i]);
        }
        $content = ltrim($content_raw, '? ');

        $output .= '<div class="styled-acf-field">';
        if ($title) {
            $output .= '<h6>' . wp_kses_post( $title . (substr(rtrim($title), -1) === '?' ? '' : '?') ) . '</h6>';
        }
        if ($content) {
            $paragraphs = explode( "\n", $content );
            foreach ( $paragraphs as $p ) {
                $p = trim($p);
                if (!empty($p)) {
                    $output .= '<p>' . wp_kses_post( $p ) . '</p>';
                }
            }
        }

        $faq1_content = get_category_acf_field( "faq1" );
        if ( $faq1_content ) {
            $sentences_faq1 = preg_split('/([.?!]["\']?\s|$)/', wp_strip_all_tags( $faq1_content ), -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $title_faq1 = isset($sentences_faq1[0]) ? trim($sentences_faq1[0]) : 'FAQ';
            $content_faq1_raw = '';
            for ($i = 1; $i < count($sentences_faq1); $i++) {
                $content_faq1_raw .= trim($sentences_faq1[$i]);
            }
            $content_faq1 = ltrim($content_faq1_raw, '? ');
            $output .= '<div class="faq-accordion">';
            $output .= '<h6 class="faq-question">' . wp_kses_post( $title_faq1 . (substr(rtrim($title_faq1), -1) === '?' ? '' : '?') ) . '</h6>';
            $paragraphs_faq1 = explode( "\n", $content_faq1 );
            $output .= '<div class="faq-answer">';
            foreach ( $paragraphs_faq1 as $p ) {
                $p = trim($p);
                if (!empty($p)) {
                    $output .= '<p>' . wp_kses_post( $p ) . '</p>';
                }
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        $faq2_content = get_category_acf_field( "faq2" );
        if ( $faq2_content ) {
            $sentences_faq2 = preg_split('/([.?!]["\']?\s|$)/', wp_strip_all_tags( $faq2_content ), -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $title_faq2 = isset($sentences_faq2[0]) ? trim($sentences_faq2[0]) : 'FAQ';
            $content_faq2_raw = '';
            for ($i = 1; $i < count($sentences_faq2); $i++) {
                $content_faq2_raw .= trim($sentences_faq2[$i]);
            }
            $content_faq2 = ltrim($content_faq2_raw, '? ');
            $output .= '<div class="faq-accordion">';
            $output .= '<h6 class="faq-question">' . wp_kses_post( $title_faq2 . (substr(rtrim($title_faq2), -1) === '?' ? '' : '?') ) . '</h6>';
            $paragraphs_faq2 = explode( "\n", $content_faq2 );
            $output .= '<div class="faq-answer">';
            foreach ( $paragraphs_faq2 as $p ) {
                $p = trim($p);
                if (!empty($p)) {
                    $output .= '<p>' . wp_kses_post( $p ) . '</p>';
                }
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        $faq3_content = get_category_acf_field( "faq3" );
        if ( $faq3_content ) {
            $sentences_faq3 = preg_split('/([.?!]["\']?\s|$)/', wp_strip_all_tags( $faq3_content ), -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $title_faq3 = isset($sentences_faq3[0]) ? trim($sentences_faq3[0]) : 'FAQ';
            $content_faq3_raw = '';
            for ($i = 1; $i < count($sentences_faq3); $i++) {
                $content_faq3_raw .= trim($sentences_faq3[$i]);
            }
            $content_faq3 = ltrim($content_faq3_raw, '? ');
            $output .= '<div class="faq-accordion">';
            $output .= '<h6 class="faq-question">' . wp_kses_post( $title_faq3 . (substr(rtrim($title_faq3), -1) === '?' ? '' : '?') ) . '</h6>';
            $paragraphs_faq3 = explode( "\n", $content_faq3 );
            $output .= '<div class="faq-answer">';
            foreach ( $paragraphs_faq3 as $p ) {
                $p = trim($p);
                if (!empty($p)) {
                    $output .= '<p>' . wp_kses_post( $p ) . '</p>';
                }
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '</div>';
    }

    return $output;
}
add_shortcode( 'styled_category_info', 'styled_category_acf_field_shortcode' );

function enqueue_category_accordion_styles() {
    wp_enqueue_style( 'category-accordion-style', get_stylesheet_directory_uri() . '/css/category-accordion.css', array(), '1.0.0', 'all' );
    // Adjust the path '/css/category-accordion.css' to the actual location of your CSS file.
    // You can also adjust the version number '1.0.0' as needed.
}
add_action( 'wp_enqueue_scripts', 'enqueue_category_accordion_styles' );

function enqueue_category_accordion_scripts() {
    wp_enqueue_script( 'category-accordion-script', get_stylesheet_directory_uri() . '/js/category-accordion.js', array(), '1.0.0', true );
    // Adjust the path '/js/category-accordion.js' to the actual location of your JS file.
    // The `true` argument ensures the script is loaded in the footer, which is generally recommended for performance.
}
add_action( 'wp_enqueue_scripts', 'enqueue_category_accordion_scripts' );





function styled_link_acf_field_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'field_name' => '',
        'field_name_2' => '',
    ), $atts );

    $field_name = sanitize_text_field( $atts['field_name'] );
    $field_value = get_category_acf_field( $field_name ); // Use the function from the previous answer

    $output = '';

    if ( $field_value ) {
        $output .= '<div style="
            background-color: #f7f7f7;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            background-image: url(' . get_bloginfo('template_directory') . '/../../uploads/Tuto_Fallback.jpg);
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            min-height: 200px;
            position: relative;
            padding-bottom: 10px; /* Reduced padding-bottom */
            box-sizing: border-box;
            box-shadow:1px 2px 9px -3px rgba(0,0,0,0.3) !important;
        ">';

        $output .= '<a href="' . $field_value . '" style="
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            text-indent: -9999px;
            overflow: hidden;
            z-index: 1;
        ">ASSEMBLY TUTORIAL</a>';

        $output .= '<div style="
            text-align: center;
            color: #fff;
            z-index: 2;
            padding-top: 0px; /* Removed padding-top */
            position: relative;
        ">';
        $output .= '<p style="
            font-size: 16px;
            line-height: 1.5;
            color: #fff; /* Set text color to white */
            margin-bottom: 5px; /* Add a little margin between text and link */
        ">Changing an alternator on a Peugeot 206 1.4 HDi</p>';
        $output .= '<a href="'. $field_value .'" style="
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            display: inline-block; /* changed to inline-block */
            
        ">ASSEMBLY TUTORIAL</a>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
    return '';
}
add_shortcode( 'styled_link_category_acf', 'styled_link_acf_field_shortcode' );



function get_category_acf_field( $field_name ) {
    // Get the current category ID.
    $current_category = get_queried_object();

    if ( $current_category && isset( $current_category->term_id ) ) {
        $category_id = $current_category->term_id;

        // Get the ACF field value for the category.
        $field_value = get_field( $field_name, 'product_cat_' . $category_id );
        if ($field_value) {
            return $field_value;
        }
    }
    return ''; // Return empty string if no value
}
add_shortcode( 'styled_category_acf', 'styled_category_acf_field_shortcode' );

// Show the total count of products in the current category
function category_product_count_shortcode() {
    global $wp_query;
    $total_products = $wp_query->found_posts;
    if ($total_products > 0) {
        return '<h6 class="category-product-count">Total products in this category: ' . esc_html($total_products) . '</h6>';
    }
    return '';
}
add_shortcode('category_product_count', 'category_product_count_shortcode');








function category_search_form_shortcode() {
    // Generate a unique ID for the input field to avoid conflicts.
    $input_id = 'category-search-input-' . uniqid();

    $output = '<div class="category-search-wrapper" style="position: relative;">'; // Added position relative
    $output .= '<label for="' . esc_attr( $input_id ) . '" class="screen-reader-text">' . esc_html_e( 'Search Products', 'your-theme-textdomain' ) . '</label>';
    $output .= '<input type="search" id="' . esc_attr( $input_id ) . '" class="search-field" placeholder="' . esc_attr_e( 'Search Products...', 'your-theme-textdomain' ) . '" value="' . get_search_query() . '" name="s" style="width: 100%; padding-right: 40px; box-sizing: border-box;" />';
    $output .= '<input type="hidden" name="post_type" value="product" />';
    $output .= '<button type="submit" class="search-submit" style="position: absolute; top: 0; right: 0; height: 100%; background-color: #0078d7; color: white; border: none; padding: 0 10px; cursor: pointer; display: flex; align-items: center; border-radius: 0 5px 5px 0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    </button>';

    // Add a dropdown element.
    $output .= '<select id="category-dropdown" name="product_cat" style="position: absolute; top: 100%; left: 0; width: 100%; z-index: 10; display: none; /* Initially hidden */ background-color: white; border: 1px solid #ccc; border-top: none; border-radius: 0 0 5px 5px; max-height: 200px; overflow-y: auto;"></select>';

    $output .= '</div>'; // Close the wrapper
    return $output;
}
add_shortcode( 'category_search', 'category_search_form_shortcode' );

/**
 * Modifies the main query to filter products by search term within the current category.
 *
 * This function is hooked to the 'pre_get_posts' action, which allows us to modify
 * the query before WordPress executes it.
 *
 * @param WP_Query $query The WP_Query object.
 */
function category_search_filter_products( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_archive() && is_product_category() ) {
        // Check if it's the main query on a product category archive page.

        if ( isset( $_GET['s'] ) && ! empty( $_GET['s'] ) ) {
            // Check if a search term is present.
            $search_term = sanitize_text_field( $_GET['s'] );
            $current_category = get_queried_object();

            if ( ! empty( $current_category ) ) {
                if ( isset( $_GET['product_cat'] ) && ! empty( $_GET['product_cat'] ) ) {
                    $selected_category = sanitize_text_field( $_GET['product_cat'] );
                    $query->set( 'tax_query', array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $selected_category,
                            'include_children' => true,
                        ),
                    ));
                } else {
                    $query->set('s', $search_term);
                    $query->set( 'tax_query', array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $current_category->term_id,
                            'include_children' => true,
                        ),
                    ));
                }
            } else {
                // Log an error if the category object is empty
                error_log( 'Error: Current category object is empty in category_search_filter_products().' );
            }
        }
    }
}
add_action( 'pre_get_posts', 'category_search_filter_products' );



/**
 * Function to get category image URL
 */
function get_category_image_url($category_id) {
    $thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
    return $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : false;
}


// Add AJAX endpoint to handle category search.
add_action( 'wp_ajax_get_category_suggestions', 'get_category_suggestions' );
add_action( 'wp_ajax_nopriv_get_category_suggestions', 'get_category_suggestions' ); // For non-logged-in users.

/**
 * Returns category suggestions based on the search term.
 */
function get_category_suggestions() {
    $search_term = isset( $_POST['term'] ) ? sanitize_text_field( $_POST['term'] ) : '';

    if ( ! empty( $search_term ) ) {
        $categories = get_terms( array(
            'taxonomy' => 'product_cat',
            'name__like' => $search_term,
            'hide_empty' => false,
        ) );

        $results = array();
        foreach ( $categories as $category ) {
            $results[] = array(
                'id' => $category->term_id,
                'name' => $category->name,
                'slug' => $category->slug,
            );
        }
        error_log("get_category_suggestions results: " . print_r($results, true)); //DEBUG
        wp_send_json_success( $results );
    } else {
        wp_send_json_error( array( 'message' => 'No search term provided.' ) );
    }
}


// Enqueue JavaScript to handle the autocomplete functionality.
function enqueue_category_search_script() {
    $theme_dir = get_stylesheet_directory_uri();
    wp_enqueue_script(
        'category-search-autocomplete',
        $theme_dir . '/category-search.js',
        array( 'jquery' ),
        '1.0',
        true
    );
    wp_localize_script(
        'category-search-autocomplete',
        'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_category_search_script' );


function check_jquery_registered() {
    if (!wp_script_is('jquery', 'registered')) {
        error_log('jQuery is not registered!');
    }
}
add_action('wp_enqueue_scripts', 'check_jquery_registered', 0); // Check very early




















