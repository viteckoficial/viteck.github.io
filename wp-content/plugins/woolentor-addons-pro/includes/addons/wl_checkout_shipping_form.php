<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WL_Checkout_Shipping_Form_Element extends Widget_Base {

    public function get_name() {
        return 'wl-checkout-shipping-form';
    }
    
    public function get_title() {
        return __( 'WL: Checkout Shipping Form', 'woolentor-pro' );
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
        return ['checkout form','shipping form','shipping field','checkout'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_shipping_content',
            [
                'label' => esc_html__( 'Shipping Form', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
            
            $this->add_control(
                'form_title',
                [
                    'label' => esc_html__( 'Title', 'woolentor-pro' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Ship to a different address?', 'woolentor-pro' ),
                    'placeholder' => esc_html__( 'Type your title here', 'woolentor-pro' ),
                    'label_block' => true,
                ]
            );

        $this->end_controls_section();

        // Manage Field
        $this->start_controls_section(
            'section_shipping_fields',
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
                    'selector'  => '{{WRAPPER}} .woocommerce-shipping-fields #ship-to-different-address,{{WRAPPER}} .woocommerce-shipping-fields .woolentor-field-heading *',
                )
            );

            $this->add_control(
                'form_heading_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-shipping-fields #ship-to-different-address' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-shipping-fields .woolentor-field-heading *' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-shipping-fields .woolentor-field-heading' => 'border-color: {{VALUE}}',
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
                        '{{WRAPPER}} .woocommerce-shipping-fields #ship-to-different-address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .woocommerce-shipping-fields .woolentor-field-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .woocommerce-shipping-fields #ship-to-different-address' => 'text-align: {{VALUE}}',
                        '{{WRAPPER}} {{WRAPPER}} .woocommerce-shipping-fields .woolentor-field-heading' => 'text-align: {{VALUE}}',
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
                    'selector'  => '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .form-row label',
                )
            );

            $this->add_control(
                'form_label_color',
                [
                    'label' => __( 'Label Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .form-row label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'form_label_required_color',
                [
                    'label' => __( 'Required Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .form-row label abbr' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_label_padding',
                [
                    'label' => esc_html__( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .form-row label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .form-row label' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Input box
        $this->start_controls_section(
            'form_input_box_style',
            array(
                'label' => esc_html__( 'Input Box', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            $this->add_control(
                'form_input_box_text_color',
                [
                    'label' => __( 'Text Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input.input-text' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .shipping_address .woocommerce-input-wrapper strong' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'form_input_box_typography',
                    'label'     => esc_html__( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input.input-text , {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text',
                )
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'form_input_box_border',
                    'label' => __( 'Border', 'woolentor-pro' ),
                    'selector' => '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input.input-text , {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text',
                ]
            );

            $this->add_responsive_control(
                'form_input_box_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input.input-text, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper input, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper select, {{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .select2-container .select2-selection' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .shipping_address .woocommerce-shipping-fields__field-wrapper .input-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( Plugin::instance()->editor->is_edit_mode() ) {

            $checkout = wc()->checkout();
            if( sizeof( $checkout->checkout_fields ) > 0 ){ ?>
                <form>
                    <div class="woolentor woocommerce-shipping-fields">

                        <h3 id="ship-to-different-address">
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( $settings['form_title'] , 'woolentor-pro' ); ?></span>
                            </label>
                        </h3>
                    
                        <div class="shipping_address">
                            <?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
                            <div class="woocommerce-shipping-fields__field-wrapper">
                                <?php
                                    $fields = $checkout->get_checkout_fields( 'shipping' );
                                    foreach ( $fields as $key => $field ) {
                                        if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
                                            $field['country'] = $checkout->get_value( $field['country_field'] );
                                        }
                                        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                                    }
                                ?>
                            </div>
                            <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>
                        </div>
                    
                    </div>
                </form>
            <?php
        }

        }else{
            if( is_checkout() ){
                $checkout = wc()->checkout();
                if( sizeof( $checkout->checkout_fields ) > 0 ){ ?>
                    <div class="woolentor woocommerce-shipping-fields">
                        <?php if ( true === WC()->cart->needs_shipping_address() ) : ?>
                    
                            <h3 id="ship-to-different-address">
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                    <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( $settings['form_title'] , 'woolentor-pro' ); ?></span>
                                </label>
                            </h3>
                    
                            <div class="shipping_address">
                                <?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
                                <div class="woocommerce-shipping-fields__field-wrapper">
                                    <?php
                                        $fields = $checkout->get_checkout_fields( 'shipping' );
                                        foreach ( $fields as $key => $field ) {
                                            if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
                                                $field['country'] = $checkout->get_value( $field['country_field'] );
                                            }
                                            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                                        }
                                    ?>
                                </div>
                                <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>
                            </div>
                    
                        <?php endif; ?>
                    </div>
                <?php
                }
            }
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WL_Checkout_Shipping_Form_Element() );