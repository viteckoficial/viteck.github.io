<?php

  $parent_order =  wc_get_order($order->get_parent_id());
  $payment_url = $order->get_checkout_payment_url();
  ?>

<p> Dear <?php echo $parent_order->get_billing_first_name() ?>,<br>
For order number <b><?php echo $order->get_parent_id() ?></b> at our store, you have completed the first installation of the payment.
Please pay for the second installment. To pay the due, please visit this link.
<h3><a href='<?php echo $payment_url ?>'> Pay now</a> </h3>

<h4> <?php esc_html_e("Order Summery", 'shopengine-pro') ?></h4>
<table class='table'>
    <thead>
    <tr>
        <th><?php esc_html_e("Product Name", 'shopengine-pro') ?></th>
        <th><?php esc_html_e("Quantity", 'shopengine-pro') ?></th>
        <th><?php esc_html_e("Total", 'shopengine-pro') ?></th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($parent_order->get_items() as $item){
        $sub_total = wc_price($item->get_subtotal()) ;
      echo "<tr>";
      echo "<td>{$item->get_name()}</td>";
      echo "<td>{$item->get_quantity()}</td>";
      echo "<td>{$sub_total}</td>";
      echo "</tr>";
    }
 
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan='2'><?php esc_html_e("Total", 'shopengine-pro') ?></td>
        <td><?php echo wc_price( $parent_order->get_subtotal() ) ?></td>
    </tr>
    <tr>
        <td colspan='2'><?php esc_html_e("Paid", 'shopengine-pro') ?></td>
        <td><?php echo wc_price( $parent_order->get_meta( 'partial_payment_paid_amount') ) ?></td>
    </tr>
    <tr>
        <td colspan='2'><?php esc_html_e("Due", 'shopengine-pro') ?></td>
        <td><?php echo wc_price( $parent_order->get_meta( 'partial_payment_due_amount') ) ?></td>
    </tr>
    </tfoot>
</table>

<h3 style="text-align:right"><a href='<?php echo $payment_url ?>'><?php esc_html_e("Pay now", 'shopengine-pro') ?></a> </h3>