<?php

defined('ABSPATH') || exit;

$module_list               = \ShopEngine\Core\Register\Module_List::instance();
if($module_list->get_list()['currency-switcher']['status'] === 'active'):
	$module_settings = $module_list->get_settings('currency-switcher');
	$session_currency_code = \ShopEngine_Pro\Modules\Currency_Switcher\Base\Currency_Switcher_Frontend::instance()->find_currency($module_settings)['code'];
	?>
    <div class="shopengine-currency-switcher">
        <i class="shopengine-currency-switcher--icon eicon-angle-right"></i>
        <select onchange="shopengine_currency_switcher(this.value)" class="shopengine-currency-switcher--select">
            <option value=""><?php echo esc_attr($settings['shopengine_default_text']); ?></option>
			<?php foreach($module_settings['currencies']['value'] as $currency) :
				$symbol = '';
				if($module_settings['symbol_show_dropdown']['value'] === 'yes') {
					$symbol = $currency['symbol'] . ' ';
				}
				?>
                <option <?php if($currency['code'] === $session_currency_code) : echo 'selected';
				endif; ?>
                        value="<?php echo esc_attr($currency['code']) ?>"><?php echo \Shopengine\Utils\Helper::kses($symbol) . esc_html($currency['name'], 'shopengine') ?></option>
			<?php endforeach; ?>
        </select>
    </div>
<?php
elseif(\Elementor\Plugin::$instance->editor->is_edit_mode() || is_preview()):
	echo esc_html__('Please active shopengine currency switcher module', 'shopengine-pro');
endif; ?>
