<?php

namespace Elementor;

use ShopEngine\Widgets\Products;

defined('ABSPATH') || exit;

class ShopEngine_Checkout_Form_Shipping extends \ShopEngine\Base\Widget
{

	public function config() {
		return new ShopEngine_Checkout_Form_Shipping_Config();
	}

	protected function register_controls() {

		/**
		 * Checkbox label title
		 */
		$this->start_controls_section(
			'shopengine_title_section',
			[
				'label' => esc_html__('Checkbox Title', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_title_color',
			[
				'label'     => esc_html__('Color', 'shopengine'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#3A3A3A',
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping #ship-to-different-address > label > span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_title_font_size',
			[
				'label'      => esc_html__('Font Size (px)', 'shopengine'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 64,
					],
				],
				'default'    => [
					'size' => 18,
				],
				'selectors'  => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping #ship-to-different-address > label > span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_title_margin',
			[
				'label'      => esc_html__('Margin', 'shopengine'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default'    => [
					'unit'     => 'px',
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 25,
					'left'     => 0,
					'isLinked' => true,
				],
				'selectors'  => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping #ship-to-different-address > label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

			/*================================ 
		Checkout Form Visibility Start

		- shopengine_hide_shipping_first_name_field
		- shopengine_hide_shipping_last_name_field
		- shopengine_hide_shipping_company_field
		- shopengine_hide_shipping_country_field
		- shopengine_hide_shipping_address_1_field
		- shopengine_hide_shipping_address_2_field
		- shopengine_hide_shipping_city_field
		- shopengine_hide_shipping_state_field
		- shopengine_hide_shipping_postcode_field
		
		==================================*/ 

		$this->start_controls_section(
			'shopengine_checkout_form_visibility',
			[
				'label' => esc_html__('Field Visibility', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_first_name_field',
			[
				'label'        => esc_html__('Hide First Name', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_first_name_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_last_name_field',
			[
				'label'        => esc_html__('Hide Last Name', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_last_name_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_company_field',
			[
				'label'        => esc_html__('Hide Company Name', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_company_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_country_field',
			[
				'label'        => esc_html__('Hide Country/Region Name', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_country_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_address_1_field',
			[
				'label'        => esc_html__('Hide Street Address 1', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_address_1_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_address_2_field',
			[
				'label'        => esc_html__('Hide Street Address 2', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_address_2_field' => 'display: none;',
				],
			]
		);

		$this->add_control(
			'shopengine_hide_shipping_city_field',
			[
				'label'        => esc_html__('Hide town/city', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_city_field' => 'display: none;',
				],
			]
		);
		
		
		$this->add_control(
			'shopengine_hide_shipping_state_field',
			[
				'label'        => esc_html__('Hide state', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_state_field' => 'display: none;',
				],
				]
			);
			
		$this->add_control(
			'shopengine_hide_shipping_postcode_field',
			[
				'label'        => esc_html__('Hide ZIP/Postcode', 'shopengine'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'shopengine'),
				'label_off'    => esc_html__('No', 'shopengine'),
				'return_value' => 'yes',
				'selectors'    => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields #shipping_postcode_field' => 'display: none;',
				],
			]
		);
		

		$this->end_controls_section();
		/*================================ 
		Checkout Form Visibility end
		==================================*/ 

		$this->start_controls_section(
			'shopengine_form_container_section',
			[
				'label' => esc_html__('Form Container', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_container_alignment',
			[
				'label'     => esc_html__('Alignment', 'shopengine'),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'description' => esc_html__('Left', 'shopengine'),
						'icon'        => 'eicon-text-align-left',
					],
					'right'  => [
						'description' => esc_html__('Right', 'shopengine'),
						'icon'        => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields .woocommerce-shipping-fields__field-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'shopengine_form_container_background',
			[
				'label'     => esc_html__('Form Container Background', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'alpha'     => false,
				'default'   => '#f7f8fb',
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields .woocommerce-shipping-fields__field-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_form_container_padding',
			[
				'label'      => esc_html__('Padding', 'shopengine'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default'    => [
					'top'    => 25,
					'right'  => 30,
					'bottom' => 25,
					'left'   => 30,
				],
				'selectors'  => [
					'{{WRAPPER}}  .shopengine-checkout-form-shipping .woocommerce-shipping-fields .woocommerce-shipping-fields__field-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'shopengine_input_label_section',
			[
				'label' => esc_html__('Label', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_input_label_color',
			[
				'label'     => esc_html__('Color', 'shopengine'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#3A3A3A',
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'shopengine_input_required_indicator_color',
			[
				'label'     => esc_html__('Required Indicator Color:', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#3A3A3A',
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row label abbr' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_label_font_sizx',
			[
				'label'      => esc_html__('Font Size (px)', 'shopengine'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'size' => 20,
				],
				'selectors'  => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row label' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
				
			]
		);

		$this->add_responsive_control(
			'shopengine_input_label_margin',
			[
				'label'      => esc_html__('Margin', 'shopengine'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default'    => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 8,
					'left'   => 0,
				],
				'selectors'  => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'shopengine_input_section',
			[
				'label' => esc_html__('Input', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('shopengine_input_tabs_style');

		$this->start_controls_tab(
			'shopengine_input_tabnormal',
			[
				'label' => esc_html__('Normal', 'shopengine'),
			]
		);
		

		$this->add_control(
			'shopengine_input_color',
			[
				'label'     => esc_html__('Input Color', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, input::placeholder, textarea::placeholder, .woocommerce-input-wrapper .select2-selection, select)' => 'color: {{VALUE}};',
				],
				'default'   => '#555',
			]
		);

		$this->add_control(
			'shopengine_input_background',
			[
				'label'     => esc_html__('Background', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .woocommerce-input-wrapper .select2-selection, select)'  => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'           => 'shopengine_input_border',
				'label'          => esc_html__('Border', 'shopengine'),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width'  => [
						'label'   => esc_html__('Border Width', 'shopengine'),
						'default' => [
							'top'      => 1,
							'right'    => 1,
							'bottom'   => 1,
							'left'     => 1,
							'isLinked' => true,
						],
						'responsive' => false,
					],
					'color'  => [
						'label'   => esc_html__('Border Color', 'shopengine'),
						'default' => '#dee3ea',
						'alpha'	  => false,
						'selectors' => [
							'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .select2-selection, select)' => 'border-color: {{VALUE}} !important;'
						],
					],
				],
				'selector'  => '{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .select2-selection, select)',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'shopengine_input_tabfocus',
			[
				'label' => esc_html__('Focus', 'shopengine'),
			]
		);

		$this->add_control(
			'shopengine_input_color_focus',
			[
				'label'     => esc_html__('Input Color', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, input::placeholder, textarea::placeholder, .woocommerce-input-wrapper .select2-selection, select):focus' => 'color: {{VALUE}};',
				],
				'default'   => '#555',
			]
		);

		$this->add_control(
			'shopengine_input_background_focus',
			[
				'label'     => esc_html__('Background', 'shopengine'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, input::placeholder, textarea::placeholder, .woocommerce-input-wrapper .select2-selection, select):focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'shopengine_input_border_focus',
				'label'    => esc_html__('Border', 'shopengine'),
				'selector'  => '{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .select2-selection, select):focus',
				'fields_options' => [
					'width'  => [
						'label'   => esc_html__('Border Width', 'shopengine'),
						'responsive' => false,
					],
					'color'  => [
						'label'   => esc_html__('Border Color', 'shopengine'),
						'alpha'	  => false,
						'selectors' => [
							'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .select2-selection, select):focus' => 'border-color: {{VALUE}} !important;'
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'shopengine_input_font_sizx',
			[
				'label'      => esc_html__('Font Size (px)', 'shopengine'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, input::placeholder, textarea, textarea::placeholder, .select2-selection, select)' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
				
			]
		);

		$this->add_control(
			'shopengine_input_padding',
			[
				'label'      => esc_html__('Padding', 'shopengine'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default'    => [
					'top'    => 10,
					'right'  => 16,
					'bottom' => 10,
					'left'   => 16,
				],
				'separator'  => 'before',
				'selectors' => [
					'{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper :is(input, textarea, .woocommerce-input-wrapper .select2-selection, select)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		/**
		 	-------------------------------
			 Global Font 
			-------------------------------	
		 */
		$this->start_controls_section(
			'shopengine_typography_section',
			[
				'label' => esc_html__('Global Font', 'shopengine'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'shopengine_typography_primary',
				'label'    => esc_html__('Primary Typography', 'shopengine'),
				'selector' => '{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields > h3 label,
				{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row label',
				'exclude'  => ['letter_spacing', 'font_size', 'text_decoration', 'font_style', 'line_height'],
				'fields_options' => [
					'typography'  => [
						'default' => 'custom',
					],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'label'      => esc_html__('Font Size (px)', 'shopengine'),
						'default'    => [
							'size' => '16',
							'unit' => 'px',
						],
						'responsive' => false,
						'size_units' => ['px'],
					],
				],
			]
		);

		$this->add_control(
			'shopengine_typography_primary_desc',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__('Primary Typography : Form Title & Form Label', 'shopengine'),
				'content_classes' => 'elementor-control-field-description',
				'separator'       => 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'shopengine_typography_seconday',
				'label'    => esc_html__('Secondary Typography', 'shopengine'),
				'selector' => '{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row input,
				{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row textarea,
				{{WRAPPER}} .shopengine-checkout-form-shipping .woocommerce-shipping-fields__field-wrapper .form-row .select2-selection',
				'exclude'  => ['font_style','font_size', 'line_height', 'letter_spacing', 'text_decoration'],
				'fields_options' => [
					'typography'  => [
						'default' => 'custom',
					],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'label'      => esc_html__('Font Size (px)', 'shopengine'),
						'default'    => [
							'size' => '16',
							'unit' => 'px',
						],
						'responsive' => false,
						'size_units' => ['px'],
					],
				],
			]
		);

		$this->add_control(
			'shopengine_typography_secondary_desc',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__('Secondary Typography : Form Input', 'shopengine'),
				'content_classes' => 'elementor-control-field-description',
				
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function screen() {

		$tpl = Products::instance()->get_widget_template($this->get_name());

		include $tpl;
	}
}
