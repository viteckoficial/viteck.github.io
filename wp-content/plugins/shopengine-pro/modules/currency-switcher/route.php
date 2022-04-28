<?php

namespace ShopEngine_Pro\Modules\Currency_Switcher;

use ShopEngine\Base\Api;
use ShopEngine\Core\Register\Module_List;
use ShopEngine_Pro\Modules\Currency_Switcher\Base\Currency_Rates_Update;
use WC_Payment_Gateways;
use ShopEngine_Pro\Modules\Currency_Switcher\Base\Currency_Provider_Register;

class Route extends Api {

	public function config() {
		$this->prefix = 'shopengine_currency';
		$this->param  = "";
	}

	public function post_update_rate() {
		return Currency_Rates_Update::instance()->init();
	}

	public function get_currency_providers() {
		$p = [];
		foreach (Currency_Provider_Register::provider_list() as $key => $value) {
				$p[$key] = ucwords(str_replace('_', ' ', $key));
		}
		return [
			'status' => 'success',
			'result' => $p,
			'message' => esc_html__('currency providers fetched', 'shopengine-pro')
		];
	}
	
	public function get_setting_currencies() {
	
		$settings = Module_List::instance()->get_settings('currency-switcher');

		$_currency = [];
		foreach ($settings['currencies']['value'] as $currency) {
				$_currency[$currency['code']]= $currency['name'];
		}

		return [
			'status' => 'success',
			'result' => $_currency,
			'message' => esc_html__('currencies fetched', 'shopengine-pro')
		];
	}

	public function get_available_payment_gateways() {

		$available_payment_gateways = [];
		$wcpg = WC_Payment_Gateways::instance();
		foreach($wcpg->get_available_payment_gateways() as $key => $value) {
			$available_payment_gateways[$key] = $value->title;
		}
		return [
			'status' => 'success',
			'result' => $available_payment_gateways,
			'message' => esc_html__('available payment gateway fetched', 'shopengine-pro')
		];
	}
}