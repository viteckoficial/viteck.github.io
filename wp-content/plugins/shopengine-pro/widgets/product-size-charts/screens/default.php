<?php

use ShopEngine\Widgets\Products;
use ShopEngine_Pro\Modules\Product_Size_Charts\Product_Size_Charts;

$product            = Products::instance()->get_product(get_post_type());
$product_size_chart = \ShopEngine\Core\Register\Module_List::instance()->get_list()['product-size-charts'];

if ($product_size_chart['status'] === 'active'):

    $chart_status = get_post_meta($product->get_id(), Product_Size_Charts::OPTION_STATUS_KEY, true);
    $chart_uid    = get_post_meta($product->get_id(), Product_Size_Charts::OPTION_KEY, true);

    if ($chart_status === 'yes' && !empty($chart_uid)) {

        $key = array_search($chart_uid, array_column($product_size_chart['settings']['charts']['value'], '_uid'));

        if (false !== $key) {

            $chart = $product_size_chart['settings']['charts']['value'][$key]['attachment_id'];
            ?>
                <div class="shopengine-product-size-chart-body">
                    <?php if( $shopengine_product_size_type === 'modal' ): ?>
                    <button class="shopengine-product-size-chart-button"><?php echo esc_html($shopengine_product_size_charts_button_text); ?></button>
                    <div class="shopengine-product-size-chart" data-model="yes">
                        <div class="shopengine-product-size-chart-contant">
                            <img src="<?php echo esc_url($chart)?>" alt="">
                        </div>
                    </div>
                    <?php elseif( $shopengine_product_size_type === 'normal' ): ?>
                        <h2 class="shopengine-product-size-chart-heading"><?php echo esc_html( $shopengine_product_size_charts_title_text ); ?></h2>
                        <div class="shopengine-product-size-chart-img">
                            <img src="<?php echo esc_url($chart)?>"/>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
        }
    }

endif;