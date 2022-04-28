<?php

namespace ShopEngine_Pro\Modules\Badge;

class Product_Tab {

	public function init() {

		add_filter('woocommerce_product_data_tabs', [$this, 'new_tab']);
		add_action('woocommerce_product_data_panels', [$this, 'tab_panel'], 100);
		add_action('woocommerce_process_product_meta', [$this, 'save_tab_product_meta']);

	}

	public function new_tab($tabs) {

		$tabs['shopengine_badge_tab'] = [
			'label'    => 'Shopengine Badge',
			'target'   => 'shopengine_badge_tab_data',
			'priority' => 10,
		];

		return $tabs;
	}

	public function tab_panel() {

		global $post, $product;
		$pid     = $post->ID;
		$product = new \WC_Product($pid);
		?>

        <div id="shopengine_badge_tab_data" class="panel woocommerce_options_panel">
            <div class="options_group">
				<?php

				$attribute_taxonomies = wc_get_attribute_taxonomies();
				$all_terms            = [];

				foreach($attribute_taxonomies as $attribute_taxonomy) {

					if($attribute_taxonomy->attribute_type === 'shopengine_badge') {
						$terms = get_terms(
							[
								'taxonomy'   => 'pa_' . $attribute_taxonomy->attribute_name,
								'hide_empty' => false,
							]
						);

						foreach($terms as $term) {

							$all_terms[$term->term_id] = $term;
						}
					}
				}

				$val = get_post_meta($pid, 'shopengine_badge_product_badges', true);
				$val = empty($val) ? [] : explode(',', $val);

				?>

                <p class="form-field">
                    <label for="shopengine_badge_product_badge"><?php echo esc_html__('Add Product Badge', 'shopengine-pro') ?></label>
                    <select multiple="multiple"
                            data-placeholder="<?php esc_attr_e('Select badges', 'shopengine-pro'); ?>"
                            class="multiselect attribute_values wc-enhanced-select"
                            id="shopengine_badge_product_badge"
                            name="badge_attr_values[se_badge_attr][]"
							style="width: 50%;"> <?php

						foreach($all_terms as $term) { ?>

                            <option value="<?php echo esc_attr($term->term_id) ?>" <?php echo in_array($term->term_id, $val) ? 'selected' : '' ?>>
	                            <?php echo esc_html($term->name) ?>
                            </option>

							<?php
						} ?>
                    </select>

                </p>
            </div>
        </div>


		<?php
	}

	public function save_tab_product_meta($post_id) {

		if(empty($_POST['badge_attr_values'])) {

			return;
		}

		$bdg = empty($_POST['badge_attr_values']['se_badge_attr']) ? '' : esc_attr(implode(',', $_POST['badge_attr_values']['se_badge_attr']));

		update_post_meta($post_id, 'shopengine_badge_product_badges', $bdg);
	}
}

