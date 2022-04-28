<?php

namespace ShopEngine_Pro\Modules\Flash_Sale\Base;

use ShopEngine_Pro\Modules\Flash_Sale\Flash_Sale_Countdown;
use ShopEngine_Pro\Traits\Singleton;

class Flash_Sale_Frontend {

	use Singleton;

	private $events;
	private $price;
	private $regular_price;
	private $is_sale;
	private $flash_sale_events;
	private $override_woocommerce_sale;

	public function init($flash_sale_events, $override_woocommerce_sale) {

		$this->flash_sale_events = $flash_sale_events;
		$this->override_woocommerce_sale = $override_woocommerce_sale;
		add_filter('woocommerce_product_get_regular_price', [$this, 'product_regular_price']);
		add_filter('woocommerce_product_get_price', [$this, 'product_price'], 10, 2);
		add_filter('woocommerce_product_get_sale_price', [$this, 'product_sale_price']);
	}

	public function product_regular_price($price) {
		$this->regular_price = (int)$price;
		return $price;
	}

	public function product_price($price, $product) {
		if ($product->is_on_sale() === false || $this->override_woocommerce_sale === 'yes') {
			$product_id = $product->get_id();
			$sale = Flash_Sale_Countdown::is_product_flash_sale($this->flash_sale_events, $product_id);
			if(!is_null($sale)) {
				if(isset($sale['discount_amount'])) {
					if($sale['discount_type'] === 'fixed') {
						$price = $this->regular_price - $sale['discount_amount'];
					}else {
						$price = $this->regular_price - ($sale['discount_amount'] / 100)* $this->regular_price;
					}
				}
			}
		}
		$this->price = $price;
		return $price;

	}

	public function product_sale_price($price) {
		return $this->price;
	}

}