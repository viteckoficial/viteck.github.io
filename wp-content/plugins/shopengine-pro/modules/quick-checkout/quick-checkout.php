<?php

namespace ShopEngine_Pro\Modules\Quick_Checkout;

use ShopEngine\Core\Register\Module_List;
use ShopEngine_Pro\Traits\Singleton;

/**
 * Class Quick_Checkout
 *
 * Main Module Class
 *
 * @since 1.0.0
 */
class Quick_Checkout {

	use Singleton;

	public function init() {

		if(!empty($_REQUEST['shopengine_quickview'])) {
			// In quickview modal we will not show anything
			return;
		}

		if(isset($_GET['shopengine_quick_checkout']) && $_GET['shopengine_quick_checkout'] == 'modal-content') {
			if('yes' === get_option( 'woocommerce_cart_redirect_after_add' )){
				add_filter('woocommerce_add_to_cart_redirect', [$this, 'woocommerce_add_to_cart_redirect'], 99, 2);
			}

			add_filter( 'woocommerce_add_to_cart_validation', [$this, 'remove_cart_item_before_add_to_cart'], 20, 3 );
			add_filter( 'wc_add_to_cart_message_html', [$this, 'remove_added_to_cart_message'] );
		}

		add_filter('shopengine/page_templates', [$this, 'add_quick_checkout_template'], 1);
		add_action('woocommerce_before_add_to_cart_button', [$this, 'print_button'], 1, 3);
		add_action( 'wp_footer', [$this, 'qc_modal_wrapper'] );

		add_action('wp_enqueue_scripts', function () {
			// Modal Stylesheet
			wp_enqueue_style( 'shopengine-modal-styles' );

			// Modal Script
			wp_enqueue_script( 'shopengine-quick-checkout', \ShopEngine_Pro::module_url() . 'quick-checkout/assets/js/script.js', ['jquery', 'shopengine-modal-script'] );
		});

		// Modal Wrapper
	}

	public function woocommerce_add_to_cart_redirect($url, $adding_to_cart) {
		$url = \ShopEngine\Utils\Helper::add_to_url(
			get_permalink(wc_get_page_id('checkout')),
			['shopengine_quick_checkout' => 'modal-content']
		);

		return $url;
	}

	public function add_quick_checkout_template($list) {

		return array_merge($list, [
			'quick_checkout'       => [
				'title'   => esc_html__('Quick Checkout', 'shopengine-pro'),
				'class'   => '\ShopEngine_Pro\Modules\Quick_Checkout\Quick_Checkout',
				'opt_key' => 'quick_checkout',
				'css'     => 'quick-checkout',
			],
		]);
    }

	public function qc_modal_wrapper() {
		?>
		<div class="shopengine-quick-checkout-modal se-modal-wrapper"></div>
		<?php
	}


	public function print_button($add_to_cart_html = null, $product = null, $args = null) {

		$settings = Module_List::instance()->get_settings('quick-checkout');

		if( !empty($settings['button_label']['value']) ) {
			$label = esc_html($settings['button_label']['value']);
		} else {
			$label = esc_html__('Buy Now', 'shopengine-pro');
		}

		$html = '<input type="hidden" name="shopengine_quick_checkout" value="modal-content" />';
		$html .= '<button data-source-url="'.wc_get_checkout_url().'" class="shopengine-quick-checkout-button" type="submit">'.$label.'</button>';

		if($add_to_cart_html != null){
			return $html . $add_to_cart_html;
		}

		echo $html;
	}

	function remove_added_to_cart_message() {
		return '';
	}

	public function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
		if( ! WC()->cart->is_empty()){
			WC()->cart->empty_cart();
		}

		return $passed;
	}
}
