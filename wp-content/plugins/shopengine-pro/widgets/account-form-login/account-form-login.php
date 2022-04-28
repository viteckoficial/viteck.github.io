<?php

namespace Elementor;

use ShopEngine\Widgets\Products;

defined('ABSPATH') || exit;

class ShopEngine_Account_Form_Login extends \ShopEngine\Base\Widget
{

	public function config() {
		return new ShopEngine_Account_Form_Login_Config();
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'shopengine_input_label_section',
			[
				'label' => esc_html__('Label', 'shopengine-pro'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'shopengine_input_label_color',
			[
				'label'     => esc_html__('Color', 'shopengine-pro'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#3A3A3A',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'shopengine_input_required_indicator_color',
			[
				'label'     => esc_html__('Required Indicator Color:', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#3A3A3A',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form .required' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'shopengine_input_label_font_size',
			[
				'label'      => esc_html__('Font size (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form :is(.required, label)' => 'font-size: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_input_label_margin',
			[
				'label'      => esc_html__('Margin (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		/*
			------------------------
			Form Input Controls
			------------------------
		*/ 

		$this->start_controls_section(
			'shopengine_input_section',
			[
				'label' => esc_html__('Input', 'shopengine-pro'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'shopengine_typography_seconday',
			[
				'label'      => esc_html__('Font size (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form .form-row :is(input, textarea, .select2-selection)' => 'font-size: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_responsive_control(
			'shopengine_input_padding',
			[
				'label'      => esc_html__('Padding (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .woocommerce-form textarea'                                     => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .woocommerce-form .select2-selection'                           => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'separator'  => 'before'
			]
		);

		$this->start_controls_tabs('shopengine_input_tabs_style');

		$this->start_controls_tab(
			'shopengine_input_tabnormal',
			[
				'label' => esc_html__('Normal', 'shopengine-pro'),
			]
		);

		$this->add_control(
			'shopengine_input_color',
			[
				'label'     => esc_html__('Input Color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox)'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-form textarea'                                      => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-form .woocommerce-input-wrapper .select2-selection' => 'color: {{VALUE}};'
				],
				'default'   => '#000000',
			]
		);

		$this->add_control(
			'shopengine_input_background',
			[
				'label'     => esc_html__('Background color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox),
					{{WRAPPER}} .woocommerce-form textarea,
					{{WRAPPER}} .woocommerce-form .select2-selection
					' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'shopengine_input_border',
				'label'    => esc_html__('Border', 'shopengine-pro'),
				'selector' => '{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox), {{WRAPPER}} .woocommerce-form textarea, {{WRAPPER}} .woocommerce-form .select2-selection'
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'shopengine_input_tabfocus',
			[
				'label' => esc_html__('Focus', 'shopengine-pro'),
			]
		);

		$this->add_control(
			'shopengine_input_color_focus',
			[
				'label'     => esc_html__('Input Color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox):focus'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-form textarea:focus'                                      => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-form .woocommerce-input-wrapper .select2-selection:focus' => 'color: {{VALUE}};'
				],
				'default'   => '#000000',
			]
		);

		$this->add_control(
			'shopengine_input_background_focus',
			[
				'label'     => esc_html__('Background color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox):focus, {{WRAPPER}} .woocommerce-form textarea:focus, {{WRAPPER}} .woocommerce-form .select2-selection:focus' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'shopengine_input_border_focus',
				'label'    => esc_html__('Border', 'shopengine-pro'),
				'selector' => '{{WRAPPER}} .woocommerce-form input:not(.woocommerce-form__input-checkbox):focus, {{WRAPPER}} .woocommerce-form textarea:focus, {{WRAPPER}} .woocommerce-form .select2-selection:focus'
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/*
			--------------------------
			Form Button controls
			--------------------------
		*/ 

		$this->start_controls_section(
			'shopengine_button_section',
			[
				'label' => esc_html__('Button', 'shopengine-pro'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_button_color',
			[
				'label'     => esc_html__('Color', 'shopengine-pro'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'shopengine_button_bg',
			[
				'label'     => esc_html__('Background Color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'alpha'     => false,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'background: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'shopengine_button_bg_hover',
			[
				'label'     => esc_html__('Background Color Hover', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'alpha'     => false,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-form button.button:hover' => 'background: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'shopengine_button_font_size',
			[
				'label'      => esc_html__('Font size (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'font-size: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_control(
			'shopengine_button_padding',
			[
				'label'      => esc_html__('Padding (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default'	=> [
					'top'	=> '15',
					'right'	=> '30',
					'bottom' => '15',
					'left' => '30',
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);


		$this->add_control(
			'shopengine_button_margin',
			[
				'label'      => esc_html__('Margin (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
				],
			]
		);
		
		$this->add_control(
			'shopengine_button_border_radius',
			[
				'label'      => esc_html__('Border Radius (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'size_units' => ['px'],
				'default'	=> [
					'top'		=> '3',
					'right'	=> '3',
					'bottom' => '3',
					'left' => '3',
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors'  => [
					'{{WRAPPER}} .woocommerce-form button.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);


		$this->end_controls_section();

		/*-----------------------------
		Loast Password controls
		-------------------------------*/ 

		$this->start_controls_section(
			'shopengine_input_lost_password_section',
			[
				'label' => esc_html__('Lost password', 'shopengine-pro'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'shopengine_input_lost_password_color',
			[
				'label'     => esc_html__('Color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#3A3A3A',
				'selectors' => [
					'{{WRAPPER}} .lost_password a' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'shopengine_input_lost_password_color_Hover',
			[
				'label'     => esc_html__('Hover Color', 'shopengine-pro'),
				'type'      => Controls_Manager::COLOR,
				'alpha'		=> false,
				'default'   => '#FF0303',
				'selectors' => [
					'{{WRAPPER}} .lost_password a:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);


		$this->add_control(
			'shopengine_input_lost_password_font_size',
			[
				'label'      => esc_html__('Font size (px)', 'shopengine-pro'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .lost_password a' => 'font-size: {{SIZE}}{{UNIT}}'
				],
			]
		);


		$this->end_controls_section();


		/**
		 * Typography Section
		 */
		$this->start_controls_section(
			'shopengine_typography_section',
			[
				'label' => esc_html__('Global Font', 'shopengine-pro'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopengine_product_categories_font_family',
			[
				'label'       => esc_html__('Font Family', 'shopengine-pro'),
				'description' => esc_html__('This font family is set for this specific widget.', 'shopengine-pro'),
				'type'        => Controls_Manager::FONT,
				'default'     => '',
				'selectors'   => [
					'{{WRAPPER}} .woocommerce-form :is(label, input, button, p, *)' => 'font-family: {{VALUE}}',
				],
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

		$settings = $this->get_settings_for_display();

		$tpl = Products::instance()->get_widget_template($this->get_name(),'default', \ShopEngine_Pro::widget_dir());

		include $tpl;
	}
}
