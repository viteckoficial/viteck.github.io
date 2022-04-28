<?php

namespace ShopEngine_Pro\Modules\Flash_Sale\Base;

use ShopEngine_Pro\Modules\Flash_Sale\Flash_Sale_Countdown;
use ShopEngine_Pro\Traits\Singleton;

class Flash_Sale_Backend {

	use Singleton;

	public function init($flash_sale_events, $override_woocommerce_sale) {
		if (!empty($_GET['post']) && $override_woocommerce_sale === 'yes') {
			$sale = Flash_Sale_Countdown::is_product_flash_sale($flash_sale_events, $_GET['post']);
			add_action('woocommerce_product_options_general_product_data', function() use($sale) {
				if(!is_null($sale)) {
					echo '<p>'.esc_html__('This sale price will not affect your customer. The selling price of this product is being handled from the shopengine plugin. ', 'shopengine-pro').'<a href="'.get_admin_url().'edit.php?post_type=shopengine-template#shopengine-modules'.'">'.esc_html__('Click here', 'shopengine-pro').'</a>'.esc_html__(' for edit sale price.', 'shopengine-pro').'</p>';
				}
			});
		}
	}
}