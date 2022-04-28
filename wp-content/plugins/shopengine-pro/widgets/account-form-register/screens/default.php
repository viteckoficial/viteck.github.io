<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 *
 *  * woocommerce/templates/myaccount/form-login.php
 */

if('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>

    <div class="shopengine-account-form-register">

        <form method="post"
              class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

			<?php do_action('woocommerce_register_form_start'); ?>

			<?php if('no' === get_option('woocommerce_registration_generate_username')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e('Username', 'shopengine-pro'); ?>&nbsp;<span
                                class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                           id="reg_username" autocomplete="username"
                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                </p>

			<?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e('Email address', 'shopengine-pro'); ?>&nbsp;<span
                            class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                       id="reg_email" autocomplete="email"
                       value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
            </p>

			<?php if('no' === get_option('woocommerce_registration_generate_password')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password"><?php esc_html_e('Password', 'shopengine-pro'); ?>&nbsp;<span
                                class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                           name="password"
                           id="reg_password" autocomplete="new-password"/>
                </p>

			<?php else : ?>

                <p class="woocommerce-pending-message"><?php esc_html_e('A password will be sent to your email address.', 'shopengine-pro'); ?></p>

			<?php endif; ?>

			<?php do_action('woocommerce_register_form'); ?>

            <p class="woocommerce-form-row form-row">
				<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit"
                        class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                        name="register"
                        value="<?php esc_attr_e('Register', 'shopengine-pro'); ?>"><?php esc_html_e('Register', 'shopengine-pro'); ?></button>
            </p>

			<?php do_action('woocommerce_register_form_end'); ?>

        </form>

    </div>
<?php

elseif(get_post_type() === \ShopEngine\Core\Template_Cpt::TYPE): ?>
    <div class="shopengine shopengine-editor-alert shopengine-editor-alert-warning">
		<?php echo esc_html__('Register option is turned off from settings', 'shopengine-pro'); ?>
    </div>
<?php
endif;
