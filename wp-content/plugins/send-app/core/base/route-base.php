<?php
namespace Send_App\Core\Base;

use Send_App\Core\Logger;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

abstract class Route_Base {
	protected bool $override = false;
	protected $auth = true;
	protected string $path = '';

	protected $namespace = 'e-send/v1';

	const NONCE_NAME = 'wp_rest';

	/**
	 * @var array The valid HTTP methods. The list represents the general REST methods. Do not modify.
	 */
	private $valid_http_methods = [
		'GET',
		'PATCH',
		'POST',
		'PUT',
		'DELETE',
	];

	abstract public function get_name(): string;

	/**
	 * rest_api_init
	 *
	 * Registers REST endpoints.
	 * Loops through the REST methods for this route, creates an endpoint configuration for
	 * each of them and registers all the endpoints with the WordPress system.
	 */
	public function rest_api_init(): void {
		$methods = $this->get_methods();
		if ( empty( $methods ) ) {
			return;
		}

		$callbacks = [];
		foreach ( $methods as $method ) {
			if ( ! in_array( $method, $this->valid_http_methods, true ) ) {
				continue;
			}
			$callbacks[] = $this->build_endpoint_method_config( $method );
		}

		$arguments = $this->get_arguments();

		if ( ! $callbacks && empty( $arguments ) ) {
			return;
		}

		$arguments = array_merge( $arguments, $callbacks );
		register_rest_route( $this->namespace, '/' . $this->get_endpoint() . '/', $arguments, $this->override );
	}

	/**
	 * get_methods
	 * Rest Endpoint methods
	 *
	 * Returns an array of the supported REST methods for this route
	 * @return array<string> REST methods being configured for this route.
	 */
	abstract public function get_methods(): array;

	/**
	 * @param \WP_REST_Request $request
	 *
	 * @return bool
	 */
	public function permission_callback( \WP_REST_Request $request ): bool {
		$nonce = $request->get_header( 'X-WP-Nonce' ) ?? '';

		return true === $this->verify_nonce( $nonce, static::NONCE_NAME );
	}

	/**
	 * get_callback
	 *
	 * Returns a reference to the callback function to handle the REST method specified by the /method/ parameter.
	 * @param string $method The REST method name
	 *
	 * @return callable A reference to a member function with the same name as the REST method being passed as a parameter,
	 * or a reference to the default function /callback/.
	 */
	public function get_callback_method( string $method ): callable {
		$method_name = strtolower( $method );
		$callback = $this->method_exists_in_current_class( $method_name ) ? $method_name : 'callback';
		return [ $this, $callback ];
	}

	/**
	 * get_permission_callback_method
	 *
	 * Returns a reference to the permission callback for the method if exists or the default one if it doesn't.
	 * @param string $method The REST method name
	 *
	 * @return callable If a method called (rest-method)_permission_callback exists, returns a reference to it, otherwise
	 * returns a reference to the default member method /permission_callback/.
	 */
	public function get_permission_callback_method( string $method ): callable {
		$method_name = strtolower( $method );
		$permission_callback_method = $method_name . '_permission_callback';
		$permission_callback = $this->method_exists_in_current_class( $permission_callback_method ) ? $permission_callback_method : 'permission_callback';
		return [ $this, $permission_callback ];
	}

	/**
	 * maybe_add_args_to_config
	 *
	 * Checks if the class has a method call (rest-method)_args.
	 * If it does, the function calls it and adds its response to the config object passed to the function, under the /args/ key.
	 * @param string $method The REST method name being configured
	 * @param array $config The configuration object for the method
	 *
	 * @return array The configuration object for the method, possibly after being amended
	 */
	public function maybe_add_args_to_config( string $method, array $config ): array {
		$method_name = strtolower( $method );
		$method_args = $method_name . '_args';
		if ( $this->method_exists_in_current_class( $method_args ) ) {
			$config['args'] = $this->{$method_args}();
		}
		return $config;
	}

	public function maybe_add_response_to_swagger( string $method ): void {
		$method_name = strtolower( $method );
		$method_response_callback = $method_name . '_response_callback';
		if ( $this->method_exists_in_current_class( $method_response_callback ) ) {
			$response_filter = $method_name . '_' . str_replace(
				'/',
				'_',
				$this->namespace . '/' . $this->get_endpoint()
			);
			add_filter( 'swagger_api_responses_' . $response_filter, [ $this, $method_response_callback ] );
		}
	}

	/**
	 * build_endpoint_method_config
	 *
	 * Builds a configuration array for the endpoint based on the presence of the callback, permission, additional parameters,
	 * and response to Swagger member functions.
	 * @param string $method The REST method for the endpoint
	 *
	 * @return array The endpoint configuration for the method specified by the parameter
	 */
	private function build_endpoint_method_config( string $method ): array {
		$config = [
			'methods' => $method,
			'callback' => $this->get_callback_method( $method ),
			'permission_callback' => $this->get_permission_callback_method( $method ),
		];
		$config = $this->maybe_add_args_to_config( $method, $config );
		return $config;
	}

	/**
	 * method_exists_in_current_class
	 *
	 * Uses reflection to check if this class has the /method/ method.
	 * @param string $method The name of the method being checked.
	 *
	 * @return bool TRUE if the class has the /method/ method, FALSE otherwise.
	 */
	private function method_exists_in_current_class( string $method ): bool {
		$class_name = get_class( $this );
		try {
			$reflection = new \ReflectionClass( $class_name );
		} catch ( \ReflectionException $e ) {
			return false;
		}
		if ( ! $reflection->hasMethod( $method ) ) {
			return false;
		}
		$method_ref = $reflection->getMethod( $method );

		return ( $method_ref && $class_name === $method_ref->class );
	}

	public function respond_success_json( $data = [] ): \WP_REST_Response {
		return new \WP_REST_Response( [
			'success' => true,
			'data' => $data,
		] );
	}

	/**
	 * @param array | \WP_Error $data
	 *
	 * @return \WP_Error
	 */
	public function respond_error_json( $data ): \WP_Error {
		if ( is_wp_error( $data ) ) {
			return $data;
		}

		if ( ! isset( $data['message'] ) || ! isset( $data['code'] ) ) {
			_doing_it_wrong(
				__FUNCTION__,
				esc_html__( 'Both `message` and `code` keys must be provided', 'send-app' ),
				'1.0.0'
			); // @codeCoverageIgnore
		}

		return new \WP_Error(
			$data['code'] ?? 'internal_server_error',
			$data['message'] ?? esc_html__( 'Internal server error', 'send-app' ),
		);
	}

	public function callback( \WP_REST_Request $request ): \WP_REST_Response {
		return rest_ensure_response( [ 'OK' ] );
	}

	public function respond_wrong_method( $message = null, int $code = 404 ): \WP_Error {
		if ( null === $message ) {
			$message = __( 'No route was found matching the URL and request method', 'send-app' );
		}

		return new \WP_Error( 'rest_no_route', $message, [ 'status' => $code ] );
	}

	public function respond_with_code( ?array $data = null, int $code = 200 ): \WP_REST_Response {
		return new \WP_REST_Response( $data, $code );
	}

	/**
	 * get_arguments
	 * Rest Endpoint extra arguments
	 * @return array Additional arguments for the route configuration
	 */
	public function get_arguments(): array {
		return [];
	}

	/**
	 * get_self_url
	 *
	 * @param string $endpoint
	 *
	 * @return string
	 */
	public function get_self_url( string $endpoint = '' ): string {
		return rest_url( $this->namespace . '/' . $endpoint );
	}

	public function verify_nonce( $nonce = '', $name = '' ) {
		$sanitized_nonce = sanitize_text_field( wp_unslash( $nonce ) );
		if ( ! wp_verify_nonce( $sanitized_nonce, $name ) ) {
			return new \WP_Error(
				'bad_request',
				'invalid nonce',
				[ 'status' => 400 ]
			);
		}

		return true;
	}

	public function verify_nonce_and_capability( $nonce = '', $name = '', $capability = 'manage_options' ) {
		$verified = $this->verify_nonce( $nonce, $name );

		if ( is_wp_error( $verified ) ) {
			return $verified;
		}

		if ( ! current_user_can( $capability ) ) {
			return $this->respond_error_json( [
				'message' => esc_html__( 'You do not have sufficient permissions to access this data.', 'send-app' ),
				'code' => 'bad_request',
			] );
		}

		return true;
	}

	public function verify_capability( $capability = 'manage_options' ) {
		if ( ! \current_user_can( $capability ) ) {
			return new \WP_Error(
				'unauthorized',
				esc_html__( 'You do not have sufficient permissions to access this data.', 'send-app' ),
				[ 'status' => 401 ]
			);
		}

		return true;
	}

	public function get_endpoint(): string {
		return $this->get_path();
	}

	public function get_path(): string {
		return $this->path;
	}

	/**
	 * Route_Base constructor.
	 */
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'rest_api_init' ] );
	}
}
