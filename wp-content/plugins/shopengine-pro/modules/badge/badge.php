<?php

namespace ShopEngine_Pro\Modules\Badge;

use ShopEngine\Compatibility\Conflicts\Theme_Hooks;
use ShopEngine_Pro\Traits\Singleton;
use ShopEngine_Pro\Util\Helper;

class Badge {

	const PA_BADGE = 'shopengine_badge';

	private $attribute_types = [];

	use Singleton;

	public function init() {

		/**
		 * In attribute page
		 *
		 * - add option to create new attribute of type shopengine-badge
		 * - add option to edit attribute of type shopengine-badge
		 */
		$this->set_attribute_types(self::PA_BADGE, esc_html__('Shopengine Badge', 'shopengine-pro'));

		add_filter('product_attributes_type_selector', [$this, 'push_attribute_types']);


		if(is_admin()) {

			add_action('admin_init', [$this, 'init_hooks']);
		}


		add_filter('woocommerce_format_sale_price', [$this, 'format_price_badge'], 9999, 3);

		add_action('wp_enqueue_scripts', [$this, 'enqueue']);

		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue']);

		add_action('shopengine/templates/elementor/content/before', [$this, 'theme_conflicts_in_widget']);

		/**
		 * Showing badges on single page and archive page
		 *
		 */
		add_action('woocommerce_product_thumbnails', [$this, 'show_single_sale_flash'], 1000);
		add_action('woocommerce_before_shop_loop_item_title', [$this, 'show_single_sale_flash']);
		//add_action('woocommerce_before_shop_loop_item_title', [$this, 'show_shop_sale_flash']);

		if(is_admin()) {
			(new Product_Tab())->init();
		}
	}


	public function init_hooks() {

		(new Term_Hooks())->init();
	}

	public function get_available_types() {

		return $this->attribute_types;
	}

	private function set_attribute_types($key, $title) {

		$this->attribute_types[$key] = $title;

		return $this;
	}

	public function push_attribute_types($types) {

		$types = array_merge($types, $this->attribute_types);

		return $types;
	}


	public function enqueue() {

		wp_enqueue_style('se-mod-badge-frn', \ShopEngine_Pro::module_url() . 'badge/assets/css/badge.css', [], \ShopEngine_Pro::version());
	}

	public function admin_enqueue() {

		wp_enqueue_style('se-mod-badge-adm', \ShopEngine_Pro::module_url() . 'badge/assets/css/adm-styles.css', [], \ShopEngine_Pro::version());

		wp_enqueue_script('se-mod-badge-adm', \ShopEngine_Pro::module_url() . 'badge/assets/js/adm-script.js', ['jquery'], \ShopEngine_Pro::version());


		wp_localize_script(
			'se-mod-badge-adm',
			'badgeConfObj',
			[
				'i18n'  => [
					'title' => esc_html__('Choose an image', 'shopengine-pro'),
					'b_txt' => esc_html__('Use image', 'shopengine-pro'),
				],
				'dummy' => Helper::get_dummy(),
				'multi' => false,
			]
		);

	}

	public function format_price_badge($price, $regular_price, $sale_price) {

		$currency_symbol = get_woocommerce_currency_symbol();
    	$regular_price   = str_replace([',', $currency_symbol], ['', ''], wp_strip_all_tags($regular_price));
    	$sale_price      = str_replace([',', $currency_symbol], ['', ''], wp_strip_all_tags($sale_price));

		if($regular_price > 0) {
			$pct = ($regular_price - $sale_price) * 100 / $regular_price;
		} else {
			$pct = 0;
		}


		$pct = \Automattic\WooCommerce\Utilities\NumberUtil::round($pct);

		$price = '<del>' . (is_numeric($regular_price) ? wc_price($regular_price) : $regular_price) . '</del> ' .
			'<ins>' . (is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) . '</ins>' . (is_admin() ? '<br>': '') .
			'<span class="shopengine-badge shopengine-discount-badge">' . $pct . '% ' . esc_html__('OFF', 'shopengine-pro') . '</span>';

		return $price;
	}


	public function theme_conflicts_in_widget($template_type) {

		if(in_array($template_type, ['shop', 'archive'])) {

			Theme_Hooks::instance()->theme_conflicts__shop_and_archive_for_badge_module();
		}
	}


	public function show_single_sale_flash() {

		global $product;

		$val = $this->get_all_badge_meta($product->get_id());

		echo '<div class="shopengine-badge-grp">';

		foreach($val as $item) {

			$term   = get_term($item);
			$t_meta = get_term_meta($term->term_id);

			$style = '';

			if(!empty($t_meta['shopengine_badge_badge_type'][0]) && $t_meta['shopengine_badge_badge_type'][0] === 'bdg_type_css') {

				if(!empty($t_meta['shopengine_badge_badge_bg_color'][0])) {
					$style .= 'background-color:' . $t_meta['shopengine_badge_badge_bg_color'][0] . ';';
				}

				if(!empty($t_meta['shopengine_badge_badge_txt_color'][0])) {
					$style .= 'color:' . $t_meta['shopengine_badge_badge_txt_color'][0] . ';';
				}

				echo '<span class="shopengine-badge css-badge onsale" style="' . esc_attr($style) . '">' . esc_html($t_meta['shopengine_badge_badge_text'][0]) . '</span>';

			} else {

				if(!empty($t_meta['shopengine_badge_badge_type_img'][0])) {

					$image = wp_get_attachment_image_src($t_meta['shopengine_badge_badge_type_img'][0]);
					$image = $image ? $image[0] : Helper::get_dummy();

					echo '<span class="shopengine-badge img-badge onsale"><img src="' . esc_url($image) . '" alt="" style="max-width: 100px" /> </span>';
				}
			}
		}

		echo '</div>';
	}

	public function show_shop_sale_flash() {

		global $post, $product;

		$val = $this->get_all_badge_meta($product->get_id());

	}

	private function get_all_badge_meta($product_id) {

		$val = get_post_meta($product_id, 'shopengine_badge_product_badges', true);
		$val = empty($val) ? [] : explode(',', $val);

		return $val;
	}
}

