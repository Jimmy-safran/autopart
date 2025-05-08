<?php
/**
 * It is Main File to load all Notice, Upgrade Menu and all
 *
 * @link       https://posimyth.com/
 * @since      6.5.6
 *
 * @package    Theplus
 * @subpackage ThePlus/Notices
 * */

/**
 * Exit if accessed directly.
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tp_Wdkit_Preset' ) ) {

	/**
	 * This class used for Wdesign-kit releted
	 *
	 * @since 6.5.6
	 */
	class Tp_Wdkit_Preset {

		/**
		 * Instance
		 *
		 * @since 6.5.6
		 * @static
		 * @var instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * @since 6.5.6
		 * @var w_d_s_i_g_n_k_i_t_slug
		 */
		public $w_d_s_i_g_n_k_i_t_slug = 'wdesignkit/wdesignkit.php';

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 6.5.6
		 * @static
		 * @return instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * Perform some compatibility checks to make sure basic requirements are meet.
		 *
		 * @since 6.5.6
		 */
		public function __construct() {

			if ( class_exists( '\Elementor\Plugin' ) ) {
				add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'tpae_elementor_editor_script' ) );
				add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'tpae_elementor_editor_style' ) );
			}

			add_action( 'wp_ajax_check_plugin_status', array( $this, 'tpae_check_plugin_status' ) );
			add_action( 'wp_ajax_tpae_install_wdkit', array( $this, 'tpae_install_wdkit' ) );

			add_action( 'elementor/editor/footer', array( $this, 'tpae_preview_html_popup' ) );
		}

		/**
		 * Loded Wdesignkit Template Js
		 *
		 * @since 6.5.6
		 */
		public function tpae_elementor_editor_script() {

			wp_enqueue_script( 'tpae-wdkit-preview-popup', L_THEPLUS_URL . 'assets/js/wdesignkit/tp-preset-btn.js', array( 'jquery', 'wp-i18n' ), L_THEPLUS_VERSION, true );

			wp_localize_script(
				'tpae-wdkit-preview-popup',
				'tp_wdkit_preview_popup',
				array(
					'nonce'    => wp_create_nonce( 'tp_wdkit_preview_popup' ),
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'tpae_pro' => defined( 'THEPLUS_VERSION' ) ? 1 : 0,
					'tpag_pro' => defined( 'TPGBP_VERSION' ) ? 1 : 0,
				)
			);
		}

		/**
		 * Loded Wdesignkit Template CSS
		 *
		 * @since 6.5.6
		 */
		public function tpae_elementor_editor_style() {
			wp_enqueue_style( 'tp-wdkit-elementor-popup-preset', L_THEPLUS_URL . 'assets/css/wdesignkit/tp-wdkit-install-popup.css', array(), L_THEPLUS_VERSION );
		}

		/**
		 * Install Wdesign kit
		 *
		 * @since 6.5.6
		 */
		public function tpae_install_wdkit() {

			check_ajax_referer( 'tp_wdkit_preview_popup', 'security' );

			$installed_plugins = get_plugins();

			include_once ABSPATH . 'wp-admin/includes/file.php';
			include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			include_once ABSPATH . 'wp-admin/includes/class-automatic-upgrader-skin.php';
			include_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';

			$result   = array();
			$response = wp_remote_post(
				'http://api.wordpress.org/plugins/info/1.0/',
				array(
					'body' => array(
						'action'  => 'plugin_information',
						'request' => serialize(
							(object) array(
								'slug'   => 'wdesignkit',
								'fields' => array(
									'version' => false,
								),
							)
						),
					),
				)
			);

			$plugin_info = unserialize( wp_remote_retrieve_body( $response ) );

			if ( ! $plugin_info ) {
				wp_send_json_error( array( 'content' => __( 'Failed to retrieve plugin information.', 'tpebl' ) ) );
			}

			$skin     = new \Automatic_Upgrader_Skin();
			$upgrader = new \Plugin_Upgrader( $skin );

			$plugin_basename = $this->w_d_s_i_g_n_k_i_t_slug;

			if ( ! isset( $installed_plugins[ $plugin_basename ] ) && empty( $installed_plugins[ $plugin_basename ] ) ) {

				$installed         = $upgrader->install( $plugin_info->download_link );
				$activation_result = activate_plugin( $plugin_basename );

				$success = null === $activation_result;
				$result  = $this->tpae_response( 'Success Install WDesignKit', 'Success Install WDesignKit', $success, '' );

			} elseif ( isset( $installed_plugins[ $plugin_basename ] ) ) {

				$activation_result = activate_plugin( $plugin_basename );

				$success = null === $activation_result;
				$result  = $this->tpae_response( 'Success Install WDesignKit', 'Success Install WDesignKit', $success, '' );

			}

			wp_send_json( $result );
		}

		/**
		 * Check plugin status
		 *
		 * @since 6.5.6
		 * @return array
		 */
		public function tpae_check_plugin_status() {

			$installed_plugins = get_plugins();

			$plugin_page_url = add_query_arg( array( 'page' => 'wdesign-kit' ), admin_url( 'admin.php' ) );

			$installed = false;
			if ( is_plugin_active( $this->w_d_s_i_g_n_k_i_t_slug ) && isset( $installed_plugins[ $this->w_d_s_i_g_n_k_i_t_slug ] ) ) {
				$installed = true;
			}

			$return = array(
				'installed'       => $installed,
				'plugin_page_url' => $plugin_page_url,
			);

			wp_send_json( $return );
		}

		/**
		 * It is WDesignKit Popup Design for Download and install
		 *
		 * @since 6.5.6
		 */
		public function tpae_preview_html_popup() {
			?>
			<div id="tpae-wdkit-wrap" class="tp-main-container-preset" style="display: none">
				<div class="tp-middel-sections">
				<div class="tp-text-top">
					<?php echo esc_html__( 'Import Pre-Designed Widgets Styles for', 'tpebl' ) . '<br />' . esc_html__( 'The Plus Addons for Elementor', 'tpebl' ); ?>
				</div>

					<!-- <div class="tp-text-bottom">
						<?php echo esc_html__( 'Uniquely designed Elementor Templates for every website type made with Elementor & The Plus Addons for Elementor Widgets.', 'tpebl' ); ?>
					</div> -->
					<div class="wkit-cb-data">
						<div class="wkit-tp-preset-checkbox">
							<span class="wkit-preset-checkbox-content">
								<svg width="15" height="15" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 0C2.24311 0 0 2.24311 0 5C0 7.75689 2.24311 10 5 10C7.75689 10 10 7.75689 10 5C10 2.24311 7.75689 0 5 0ZM7.79449 3.68421L4.599 6.85464C4.41103 7.04261 4.11028 7.05514 3.90977 6.86717L2.21804 5.32581C2.01754 5.13784 2.00501 4.82456 2.18045 4.62406C2.36842 4.42356 2.6817 4.41103 2.88221 4.599L4.22306 5.82707L7.0802 2.96992C7.2807 2.76942 7.59398 2.76942 7.79449 2.96992C7.99499 3.17043 7.99499 3.48371 7.79449 3.68421Z" fill="white" /></svg>
								<p class="wkit-preset-label">
								<?php echo esc_html__( 'Start Quickly Without Designing from Scratch', 'tpebl' ); ?>
							</p>
						</span>
						<span class="wkit-preset-checkbox-content">
								<svg width="15" height="15" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 0C2.24311 0 0 2.24311 0 5C0 7.75689 2.24311 10 5 10C7.75689 10 10 7.75689 10 5C10 2.24311 7.75689 0 5 0ZM7.79449 3.68421L4.599 6.85464C4.41103 7.04261 4.11028 7.05514 3.90977 6.86717L2.21804 5.32581C2.01754 5.13784 2.00501 4.82456 2.18045 4.62406C2.36842 4.42356 2.6817 4.41103 2.88221 4.599L4.22306 5.82707L7.0802 2.96992C7.2807 2.76942 7.59398 2.76942 7.79449 2.96992C7.99499 3.17043 7.99499 3.48371 7.79449 3.68421Z" fill="white" /></svg>
								<p class="wkit-preset-label">
									<?php echo esc_html__( 'Fully Customizable for Any Style', 'tpebl' ); ?>
								</p>
							</span>
						</div>
						<div class="wkit-tp-preset-checkbox">
							<span class="wkit-preset-checkbox-content">
								<svg width="15" height="15" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 0C2.24311 0 0 2.24311 0 5C0 7.75689 2.24311 10 5 10C7.75689 10 10 7.75689 10 5C10 2.24311 7.75689 0 5 0ZM7.79449 3.68421L4.599 6.85464C4.41103 7.04261 4.11028 7.05514 3.90977 6.86717L2.21804 5.32581C2.01754 5.13784 2.00501 4.82456 2.18045 4.62406C2.36842 4.42356 2.6817 4.41103 2.88221 4.599L4.22306 5.82707L7.0802 2.96992C7.2807 2.76942 7.59398 2.76942 7.79449 2.96992C7.99499 3.17043 7.99499 3.48371 7.79449 3.68421Z" fill="white" /></svg>
									<p class="wkit-preset-label">
									<?php echo esc_html__( 'Time-Saving and Efficient Workflow', 'tpebl' ); ?>
								</p>
							</span>
							<span class="wkit-preset-checkbox-content">
								<svg width="15" height="15" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 0C2.24311 0 0 2.24311 0 5C0 7.75689 2.24311 10 5 10C7.75689 10 10 7.75689 10 5C10 2.24311 7.75689 0 5 0ZM7.79449 3.68421L4.599 6.85464C4.41103 7.04261 4.11028 7.05514 3.90977 6.86717L2.21804 5.32581C2.01754 5.13784 2.00501 4.82456 2.18045 4.62406C2.36842 4.42356 2.6817 4.41103 2.88221 4.599L4.22306 5.82707L7.0802 2.96992C7.2807 2.76942 7.59398 2.76942 7.79449 2.96992C7.99499 3.17043 7.99499 3.48371 7.79449 3.68421Z" fill="white" /> </svg>
								<p class="wkit-preset-label">
									<?php echo esc_html__( 'Explore Versatile Layout Options', 'tpebl' ); ?>
								</p>
							</span>
						</div>
					</div>
					<div class="wkit-tp-preset-enable">
						<div class="tp-pink-btn tp-wdesign-install">
							<span class="theplus-enable-text"><?php echo esc_html__( 'Enable Presets', 'tpebl' ); ?></span>
							<div class="tp-wkit-publish-loader">
								<div class="tp-wb-loader-circle"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="tpae-image-sections"></div>
			</div>
			<?php
		}

		/**
		 * Response
		 *
		 * @param string  $message pass message.
		 * @param string  $description pass message.
		 * @param boolean $success pass message.
		 * @param string  $data pass message.
		 *
		 * @since 6.5.6
		 */
		public function tpae_response( $message = '', $description = '', $success = false, $data = '' ) {
			return array(
				'message'     => $message,
				'description' => $description,
				'success'     => $success,
				'data'        => $data,
			);
		}
	}

	Tp_Wdkit_Preset::instance();
}