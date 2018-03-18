<?php
/**
 * Plugin Name: 	WooCommerce Custom Product Type
 * Plugin URI:		http://jeroensormani.com
 * Description:		A simple demo plugin on how to add a custom product type.
 */
/**
 * Register the custom product type after init
 */
function register_simple_rental_product_type() {
	/**
	 * This should be in its own separate file.
	 */
	class WC_Product_Simple_Rental extends WC_Product {
		public function __construct( $product ) {
			$this->product_type = 'simple_rental';
			parent::__construct( $product );
		}
	}
}
add_action( 'plugins_loaded', 'register_simple_rental_product_type' );
/**
 * Add to product type drop down.
 */
function add_simple_rental_product( $types ){
	// Key should be exactly the same as in the class
	$types[ 'simple_rental' ] = __( 'Бронируемый' );
	return $types;
}
add_filter( 'product_type_selector', 'add_simple_rental_product' );
/**
 * Show pricing fields for simple_rental product.
 */
function simple_rental_custom_js() {
	if ( 'product' != get_post_type() ) :
		return;
	endif;
	?><script type='text/javascript'>
		jQuery( document ).ready( function() {
			jQuery( '.options_group.pricing' ).addClass( 'show_if_simple_rental' ).show();
		});
	</script><?php
}
add_action( 'admin_footer', 'simple_rental_custom_js' );

if (!function_exists( 'woocommerce_simple_rental_add_to_cart' ) ) {

/**
* Output the simple product add to cart area.
*
* @subpackage	Product
*/

function woocommerce_simple_rental_add_to_cart() {

//wc_get_template( 'single-product/add-to-cart/simple_rental.php' );
wp_redirect('http://ghoo');
}
}

