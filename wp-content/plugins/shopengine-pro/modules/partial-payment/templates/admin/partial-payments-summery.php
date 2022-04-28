<?php
/**
 * Order details Summary
 *
 * This template displays a summary of partial payments
 *
 * @package Webtomizer\WCDP\Templates
 * @version 2.5.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<table style="width:100%; text-align:left;">

    <thead>
    <tr>

        <th><?php esc_html_e( 'Title', 'shopengine-pro' ); ?> </th>
        <th><?php esc_html_e( 'Payment ID', 'shopengine-pro' ); ?> </th>
        <th><?php esc_html_e( 'Status', 'shopengine-pro' ); ?> </th>
        <th><?php esc_html_e( 'Amount', 'shopengine-pro' ); ?> </th>
        <th><?php esc_html_e( 'Action', 'shopengine-pro' ); ?> </th>

    </tr>

    </thead>

    <tbody>

	<?php
	$sl = 1;
	foreach ( $orders as $order ){
	?>
    <tr>
        <td><?php foreach ( $order->get_fees() as $fee ) {
				echo esc_html($fee['name']);
			} ?></td>
        <td><a href="<?php echo esc_url($order->get_edit_order_url())  ?>"><?php echo $order->get_id()   ?></a></td>
        <td><?php echo $order->get_status() ?></td>
        <td><?php echo wc_price( $order->get_total(), ['currency' => $order->get_currency()] )  ?></td>
        <td> </td>

		<?php } ?>
    </tr>
    </tbody>

    <tfoot>


    </tfoot>
</table>
