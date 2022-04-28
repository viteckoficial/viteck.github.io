<?php
defined('ABSPATH') || exit;
?>

<div class="shopengine">

	<?php

    do_action('woocommerce_before_customer_login_form');

	while ( have_posts() ): the_post();
	\ShopEngine\Core\Page_Templates\Hooks\Base_Content::instance()->load_content_designed_from_builder();
	endwhile;

	do_action('woocommerce_after_customer_login_form'); ?>

</div>
