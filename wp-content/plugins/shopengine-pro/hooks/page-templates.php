<?php

namespace ShopEngine_Pro\Hooks;

defined('ABSPATH') || exit;


class Page_Templates {

	public function __construct() {
		add_filter('shopengine/page_templates', [$this, 'get_list'], 1);
	}

	public function get_list($list): array {

		return array_merge($list, [
			'order'            => [
				'title'   => esc_html__('Order / Thank you', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Thank_You',
				'opt_key' => 'order',
				'css'     => 'order',
				'url'	  => get_permalink( wc_get_page_id( 'checkout' ) )
			],
			'my_account_login' => [
				'title'   => esc_html__('My Account Login / Register', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Login',
				'opt_key' => 'my_account_login',
				'css'     => 'account-login-register',
			],
			'my_account'       => [
				'title'   => esc_html__('Account Dashboard', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account',
				'opt_key' => 'my_account',
				'css'     => 'account',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			],
			'account_orders'       => [
				'title'   => esc_html__('My Account Orders', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Orders',
				'opt_key' => 'account_orders',
				'css'     => 'account-orders',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			],
			'account_downloads'    => [
				'title'   => esc_html__('My Account Downloads', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Downloads',
				'opt_key' => 'account_downloads',
				'css'     => 'account-downloads',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			],
			'account_orders_view'  => [
				'title'   => esc_html__('My Account Order Details', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Orders_View',
				'opt_key' => 'account_orders_view',
				'css'     => 'account-orders-view',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			],
			'account_edit_account' => [
				'title'   => esc_html__('My Account Details', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Details',
				'opt_key' => 'account_edit_account',
				'css'     => 'account-details',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			],
			'account_edit_address' => [
				'title'   => esc_html__('My Account Address', 'shopengine-pro'),
				'package' => 'free',
				'class'   => 'ShopEngine_Pro\Templates\Hooks\Account_Address',
				'opt_key' => 'account_edit_address',
				'css'     => 'account-address',
				'url'	  => get_permalink( wc_get_page_id( 'myaccount' ) )
			]
		]);
	}
}
