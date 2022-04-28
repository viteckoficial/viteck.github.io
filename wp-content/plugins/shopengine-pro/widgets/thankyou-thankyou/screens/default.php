<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 *
 * wp-content/plugins/woocommerce/templates/checkout/thankyou.php
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if(!$order_id) {
	return;
}
?>

<div class="shopengine-thankyou-thankyou">

	<?php if($order->has_status('failed')) : ?>

        <h3>
			<?php echo esc_html__('ORDER', 'shopengine-pro') ?> #<?php echo esc_html($order->get_order_number()); ?>
        </h3>
        <p>
			<?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'shopengine-pro'); ?>
        </p>

	<?php else : ?>

        <h3>
			<?php echo esc_html__('ORDER', 'shopengine-pro') ?> #<?php echo esc_html($order->get_order_number()); ?>
        </h3>
        <p>
			<?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'shopengine-pro'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped?>
        </p>

	<?php endif; ?>

</div>