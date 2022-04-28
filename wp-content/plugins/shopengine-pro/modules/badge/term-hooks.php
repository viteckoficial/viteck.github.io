<?php

namespace ShopEngine_Pro\Modules\Badge;

use ShopEngine_Pro\Util\Helper;

class Term_Hooks {

	public function init() {

		/**
		 * Get all the attributes already have
		 */
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		$types                = Badge::instance()->get_available_types();

		if(empty($attribute_taxonomies)) {
			return;
		}


		foreach($attribute_taxonomies as $tax) {

			if(isset($types[$tax->attribute_type])) {

				add_action('pa_' . $tax->attribute_name . '_add_form_fields', [$this, 'add_attr_field']);
				add_action('pa_' . $tax->attribute_name . '_edit_form_fields', [$this, 'edit_attr_field'], 10, 2);
			}
		}

		add_action('shopengine/badge/attribute_field_chain', [$this, 'attribute_fields'], 10, 4);

		add_action('created_term', [$this, 'persist_term_meta'], 10, 2);
		add_action('edit_term', [$this, 'persist_term_meta'], 10, 2);
	}

	public function add_attr_field($taxonomy) {

		$attr = Helper::get_woo_tax_attribute($taxonomy);

		do_action('shopengine/badge/attribute_field_chain', $taxonomy, $attr->attribute_type, 'add');
	}

	public function edit_attr_field($term, $taxonomy) {

		$attr = Helper::get_woo_tax_attribute($taxonomy);

		do_action('shopengine/badge/attribute_field_chain', $taxonomy, $attr->attribute_type, 'edit', $term);
	}

	public function attribute_fields($taxo, $type, $form, $term = '') {

		$types = Badge::instance()->get_available_types();

		/**
		 * Rejecting all types from other plugin/module
		 *
		 */
		if(!isset($types[$type])) {

			return;
		}

		$bdg_lbl_text      = esc_html__('Badge Text', 'shopengine-pro');
		$bdg_lbl_bg_color  = esc_html__('Badge Color', 'shopengine-pro');
		$bdg_lbl_txt_color = esc_html__('Badge Text Color', 'shopengine-pro');
		$bdg_lbl_type      = esc_html__('Badge Type', 'shopengine-pro');
		$bdg_lbl_shape     = esc_html__('Badge Shape', 'shopengine-pro');

		$type_opt = [
			'bdg_type_css' => 'CSS Type',
			'bdg_type_img' => 'Image Type',
		];

		if($form === 'edit') {

			$metas = get_term_meta($term->term_id);

			$this->bdg_form_field_select($bdg_lbl_type, 'badge_type', $type, $type_opt, true, $metas);

			$this->bdg_form_field_text($bdg_lbl_text, 'badge_text', $type, '',true, $metas);

			$this->bdg_form_field_text($bdg_lbl_bg_color, 'badge_bg_color', $type, 'color',true, $metas);

			$this->bdg_form_field_text($bdg_lbl_txt_color, 'badge_txt_color', $type, 'color',true, $metas);

			$this->bdg_form_field_image($bdg_lbl_txt_color, 'badge_type_img', $type, true, $metas);


		} else {

			$this->bdg_form_field_select($bdg_lbl_type, 'badge_type', $type, $type_opt);

			$this->bdg_form_field_text($bdg_lbl_text, 'badge_text', $type);

			$this->bdg_form_field_text($bdg_lbl_bg_color, 'badge_bg_color', $type, 'color', false, [], '#ffffff');

			$this->bdg_form_field_text($bdg_lbl_txt_color, 'badge_txt_color', $type, 'color');

			$this->bdg_form_field_image($bdg_lbl_txt_color, 'badge_type_img', $type);
		}

	}

	protected function badge_option_fld_text($id, $nm, $vl = '', $type = 'text') { ?>

        <input type="<?php echo esc_attr($type) ?>"
               id="term-<?php echo esc_attr($id) ?>"
               name="<?php echo esc_attr($nm) ?>"
               value="<?php echo esc_attr($vl) ?>"/>
		<?php
	}

	protected function badge_option_fld_img($id, $nm, $vl = '') {

		$image = $vl ? wp_get_attachment_image_src($vl) : '';
		$image = $image ? $image[0] : Helper::get_dummy();

		?>

        <div class="shopengine_term_img_grp">
            <div class="se_term_thumbnail" style="float:left;margin-right:10px;">
                <img alt="" src="<?php echo esc_url($image) ?>" width="70px" height="70px" />
            </div>

            <div style="line-height:60px;">
                <input type="hidden"
                       class="shopengine_term_img"
                       name="<?php echo esc_attr($nm) ?>"
                       id="term-<?php echo esc_attr($id) ?>"
                       value="<?php echo esc_attr($vl) ?>"/>

                <button type="button" class="se_img_upload_btn button">
			        <?php esc_html_e('Upload image', 'shopengine-pro'); ?>
                </button>

                <button type="button" class="se_remove_img_btn button <?php echo esc_attr( $vl ) ? '' : 'hidden' ?>">
			        <?php esc_html_e('Remove image', 'shopengine-pro'); ?>
                </button>
            </div>
        </div>

		<?php
	}

	protected function badge_option_fld_select($id, $nm, $options, $vl = '') { ?>

		<select id="term-<?php echo esc_attr($id) ?>" name="<?php echo esc_attr($nm) ?>"> <?php

			foreach($options as $key => $val) {

				$slt = $key == $vl ? ' selected ' : ''; ?>

				<option value="<?php echo esc_attr($key) ?>" <?php echo esc_attr($slt) ?>><?php echo esc_html($val) ?></option> <?php
			} ?>

		</select>

		<?php
	}

	protected function bdg_form_field_text($label, $name, $taxo, $type= 'text', $is_edit = false, $metas = [], $def = '') {

		$id = 'se_bdg_' . $name;
		$nm = $taxo . '[' . $name . ']';
		$typ = empty($type) ? 'text' : $type;

		if($is_edit !== true) { ?>

			<div class="form-field">
				<label for="term-<?php echo esc_attr($id) ?>"> <?php echo esc_html($label) ?></label>
				<?php $this->badge_option_fld_text($id, $nm, $def, $typ); ?>
			</div> <?php

			return;
		}

		$vl = isset($metas[$taxo . '_' . $name][0]) ? $metas[$taxo . '_' . $name][0] : ''; ?>

		<tr class="form-field">
			<th><?php echo esc_html($label) ?></th>
			<td><?php $this->badge_option_fld_text($id, $nm, $vl, $typ); ?> </td>
		</tr>

		<?php
	}

	protected function bdg_form_field_select($label, $name, $type, $type_opt, $is_edit = false, $metas = []) {

		$id = 'se_bdg_' . $name;
		$nm = $type . '[' . $name . ']';

		if($is_edit !== true) { ?>

            <div class="form-field">
                <label for="term-<?php echo esc_attr($id) ?>"> <?php echo esc_html($label) ?></label>
				<?php $this->badge_option_fld_select($id, $nm, $type_opt, 'bdg_type_css'); ?>
            </div> <?php

			return;
		}

		$vl = isset($metas[$type . '_' . $name][0]) ? $metas[$type . '_' . $name][0] : ''; ?>

        <tr class="form-field">
            <th><?php echo esc_html($label) ?></th>
            <td><?php $this->badge_option_fld_select($id, $nm, $type_opt, $vl); ?> </td>
        </tr>

		<?php
	}

	protected function bdg_form_field_image($label, $name, $txo_type, $is_edit = false, $metas = []) {

		$id = 'se_bdg_' . $name;
		$nm = $txo_type . '[' . $name . ']';

		if($is_edit !== true) { ?>

            <div class="form-field" style="display: none">
                <label for="term-<?php echo esc_attr($id) ?>"> <?php echo esc_html($label) ?></label>
				<?php $this->badge_option_fld_img($id, $nm); ?>
            </div> <br>

			<?php

			return;
		}

		$vl = isset($metas[$txo_type . '_' . $name][0]) ? $metas[$txo_type . '_' . $name][0] : ''; ?>

        <tr class="form-field">
            <th><?php echo esc_html($label) ?></th>
            <td><?php $this->badge_option_fld_img($id, $nm, $vl); ?> </td>
        </tr>

		<?php
	}


	public function persist_term_meta($term_id, $tt_id) {

		$types = Badge::instance()->get_available_types();

		foreach($types as $type => $label) {

			if(isset($_POST[$type])) {

				foreach($_POST[$type] as $key => $val) {

					$mk = $type . '_' . $key;

					if(strpos($val, '#') === 0) {

						update_term_meta($term_id, $mk, sanitize_hex_color($val));

					} else {
						update_term_meta($term_id, $mk, sanitize_text_field($val));
					}
				}
			}
		}
	}
}
