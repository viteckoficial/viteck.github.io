<?php

namespace ShopEngine_Pro\Modules\Currency_Switcher\Providers;

use ShopEngine_Pro\Modules\Currency_Switcher\Currency_Providers;

class Currency_Freaks extends Currency_Providers {

	public function get_name() {
		return 'currency_freaks';
	}

	public function get_currencies($settings) {
		$request = wp_remote_get('https://api.currencyfreaks.com/latest?apikey='.$settings['currency-switcher']['settings']['currency_freaks_api_credential']['value'].'&format=json');
		$curr = json_decode($request['body']);
		if (isset($curr->success) && $curr->success === false) {
			return [
				'success' => false,
				'message' => $curr->error->message
			];
		}
		$c = (array)$curr->rates;
		return $c;
	}
}