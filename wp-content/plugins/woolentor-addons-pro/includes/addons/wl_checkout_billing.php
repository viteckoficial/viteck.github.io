<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WL_Checkout_Billing_Form_Element extends Widget_Base {

    public function get_name() {
        return 'wl-checkout-billing-form';
    }
    
    public function get_title() {
        return __( 'WL: Checkout Billing Form', 'woolentor-pro' );
    }

    public function get_icon() {
        return ' eicon-form-horizontal';
    }

    public function get_help_url() {
        return 'https://woolentor.com/documentation/?dr=99';
    }

    public function get_categories() {
        return array( 'woolentor-addons-pro' );
    }

    public function get_style_depends(){
        return [
            'woolentor-widgets-pro',
        ];
    }

    public function get_script_depends(){
        return [
            'woolentor-checkout',
        ];
    }

    public function get_keywords(){
        return ['checkout form','billing form','billing field','checkout'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_billing_content',
            [
                'label' => esc_html__( 'Billing Form', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
            
            $this->add_control(
                'form_title',
                [
                    'label' => esc_html__( 'Title', 'woolentor-pro' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Billing details', 'woolentor-pro' ),
                    'placeholder' => esc_html__( 'Type your title here', 'woolentor-pro' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'form_createfield_label_title',
                [
                    'label' => esc_html__( 'Create an account label', 'woolentor-pro' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Create an account?', 'woolentor-pro' ),
                    'placeholder' => esc_html__( 'Type your title here', 'woolentor-pro' ),
                    'label_block' => true,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_billing_fields',
            [
                'label' => esc_html__( 'Manage Field', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'important_note',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<div style="line-height:18px;">To keep things tidy and user-friendly, field settings have now been moved to <strong>WooLentor > Settings > Modules > Checkout Fields Manager.<strong> '.sprintf( __( '<a href="%s" target="_blank">Field Settings</a>', 'woolentor-pro' ), admin_url( 'admin.php?page=woolentor' ) ).'</div>',
                    'content_classes' => 'wlnotice-imp elementor-panel-alert elementor-panel-alert-info',
                ]
            );

        $this->end_controls_section();

        // Heading
        $this->start_controls_section(
            'form_heading_style',
            array(
                'label' => __( 'Heading', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'form_heading_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-billing-fields > h3,{{WRAPPER}} .woocommerce-billing-fields .woolentor-field-heading *',
                )
            );

            $this->add_control(
                'form_heading_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields > h3' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .woolentor-field-heading *' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .woolentor-field-heading' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_heading_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .woocommerce-billing-fields .woolentor-field-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_heading_align',
                [
                    'label'        => __( 'Alignment', 'woolentor-pro' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'woolentor-pro' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default'   => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields > h3' => 'text-align: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .woolentor-field-heading' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Form label
        $this->start_controls_section(
            'form_label_style',
            array(
                'label' => __( 'Label', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'form_label_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-billing-fields .form-row label',
                )
            );

            $this->add_control(
                'form_label_color',
                [
                    'label' => __( 'Label Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields .form-row label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'form_label_required_color',
                [
                    'label' => __( 'Required Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields .form-row label abbr' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_label_padding',
                [
                    'label' => esc_html__( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields .form-row label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'form_label_align',
                [
                    'label'        => __( 'Alignment', 'woolentor-pro' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'woolentor-pro' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'woolentor-pro' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default'      => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields .form-row label' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Input box
        $this->start_controls_section(
            'form_input_box_style',
            array(
                'label' => esc_html__( 'Input Box', 'woolentor-pros' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            $this->add_control(
                'form_input_box_text_color',
                [
                    'label' => __( 'Text Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields input.input-text' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .input-text' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields textarea' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields select' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .select2-container .select2-selection' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .select2-container--default .select2-selection--single .select2-selection__rendered' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-billing-fields .woocommerce-input-wrapper strong' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'form_input_box_typography',
                    'label'     => esc_html__( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-billing-fields input.input-text, {{WRAPPER}} .form-row select, {{WRAPPER}} .form-row .select2-container .select2-selection,  {{WRAPPER}} .form-row .select2-container .select2-selection .select2-selection__rendered, {{WRAPPER}} .woocommerce-billing-fields .input-text',
                )
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'form_input_box_border',
                    'label' => __( 'Border', 'woolentor-pro' ),
                    'selector' => '{{WRAPPER}} .woocommerce-billing-fields input.input-text, {{WRAPPER}} .form-row select, {{WRAPPER}} .form-row .select2-container .select2-selection, {{WRAPPER}} .woocommerce-billing-fields .input-text',
                ]
            );

            $this->add_responsive_control(
                'form_input_box_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .form-row select, {{WRAPPER}} .form-row .select2-container .select2-selection' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .woocommerce-billing-fields .input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'form_input_box_padding',
                [
                    'label' => esc_html__( 'Padding', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .form-row select, {{WRAPPER}} .form-row .select2-container .select2-selection' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; box-sizing: content-box;',
                        '{{WRAPPER}} .form-row .select2-container .select2-selection .select2-selection__arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} 0; box-sizing: content-box;',
                        '{{WRAPPER}} .woocommerce-billing-fields .input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} 0; box-sizing: content-box;',
                    ],
                    'separator' => 'before',
                ]
            );
            
            $this->add_responsive_control(
                'form_input_box_margin',
                [
                    'label' => esc_html__( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-billing-fields input.input-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .woocommerce-billing-fields .input-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        
        if ( Plugin::instance()->editor->is_edit_mode() ) {
            $checkout = wc()->checkout();
            if( sizeof( $checkout->checkout_fields ) > 0 ){

                ?>
                    <form>
                        <div class="woocommerce-billing-fields">

                            <?php
                                if( !empty( $settings['form_title'] ) ){
                                    echo '<h3>'.esc_html__( $settings['form_title'], 'woolentor-pro' ).'</h3>';
                                }
                            ?>

                            <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

                            <div class="woocommerce-billing-fields__field-wrapper">
                                <?php
                                    $fields = $checkout->get_checkout_fields( 'billing' );
                                    foreach ( $fields as $key => $field ) {
                                        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                                    }
                                ?>
                            </div>

                            <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
                        </div>
                    </form>

                <?php

            }
        }else{
            if( is_checkout() ){
                $checkout = wc()->checkout();
                if( sizeof( $checkout->checkout_fields ) > 0 ){
                    
                    ?>
                        <div class="woocommerce-billing-fields">

                            <?php
                                if( !empty( $settings['form_title'] ) ){
                                    echo '<h3>'.esc_html__( $settings['form_title'], 'woolentor-pro' ).'</h3>';
                                }
                            ?>

                            <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

                            <div class="woocommerce-billing-fields__field-wrapper">
                                <?php
                                    $fields = $checkout->get_checkout_fields( 'billing' );
                                    foreach ( $fields as $key => $field ) {
                                        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                                    }
                                ?>
                            </div>

                            <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
                        </div>

                        <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
                            <div class="woocommerce-account-fields">
                                <?php if ( ! $checkout->is_registration_required() ) : ?>

                                    <p class="form-row form-row-wide create-account">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( $settings['form_createfield_label_title'], 'woolentor-pro' ); ?></span>
                                        </label>
                                    </p>

                                <?php endif; ?>

                                <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

                                <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

                                    <div class="create-account">
                                        <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                                            <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                                        <?php endforeach; ?>
                                        <div class="clear"></div>
                                    </div>

                                <?php endif; ?>

                                <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
                            </div>
                        <?php endif; ?>

                    <?php
                }
            }
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WL_Checkout_Billing_Form_Element() );