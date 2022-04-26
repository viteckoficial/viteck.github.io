<?php
namespace Elementor;

// Elementor Classes
use \Elementor\Core\Schemes\Color as Scheme_Color;
use \Elementor\Core\Schemes\Typography as Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WL_Product_Empty_Cart_Message_ELement extends Widget_Base {

    public function get_name() {
        return 'wl-empty-cart-message';
    }

    public function get_title() {
        return __( 'WL: Empty Cart Message', 'woolentor-pro' );
    }

    public function get_icon() {
        return 'eicon-woocommerce';
    }

    public function get_categories() {
        return array( 'woolentor-addons-pro' );
    }

    public function get_style_depends(){
        return [
            'woolentor-widgets-pro',
        ];
    }

    public function get_keywords(){
        return ['cart empty message','message','cart empty'];
    }

    protected function register_controls() {

        // Product Content
        $this->start_controls_section(
            'empty_cart_content',
            [
                'label' => esc_html__( 'Content', 'woolentor-pro' ),
            ]
        );
            
            $this->add_control(
                'cart_custom_message',
                [
                    'label' => __( 'Custom Message', 'woolentor-pro' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your custom message', 'woolentor-pro' ),
                    'label_block'=>true,
                ]
            );

        $this->end_controls_section();
        
        // Style
        $this->start_controls_section(
            'cart_custom_message_style',
            array(
                'label' => __( 'Style', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            
            $this->add_control(
                'cart_custom_message_color',
                [
                    'label' => __( 'Text Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-info' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cart_custom_message_border_color',
                [
                    'label' => __( 'Border Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-info' => 'border-top-color: {{VALUE}};',
                        '{{WRAPPER}} .woocommerce-info::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'cart_custom_message_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render() {
        add_filter( 'wc_empty_cart_message', [ $this, 'custom_empty_cart_text' ], 1 );
        /*
         * @hooked wc_empty_cart_message - 10
         */
        do_action( 'woocommerce_cart_is_empty' );
    }

    public function custom_empty_cart_text( $text ){
        $settings  = $this->get_settings_for_display();
        if( !empty( $settings['cart_custom_message'] ) ){
            return $settings['cart_custom_message'];
        }else{
            return $text;
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WL_Product_Empty_Cart_Message_ELement() );