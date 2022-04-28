<?php

do_action( 'woocommerce_before_lost_password_form' );
?>
	<div class="shopengine-account-form-login">
		<form method="post" class="woocommerce-ResetPassword woocommerce-form shopengine-account-form-login lost_reset_password">

			<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'shopengine-pro' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>


			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e('Username or email address', 'shopengine-pro'); ?>&nbsp;<span
						class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="user_login"
				       id="user_login" autocomplete="off" />
			</p>


			<div class="clear"></div>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" value="<?php esc_attr_e( 'Reset password', 'shopengine-pro' ); ?>"><?php esc_html_e( 'Reset password', 'shopengine-pro' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url(home_url('my-account')); ?>"><?php esc_html_e('Have Account? Login now', 'shopengine-pro'); ?></a>
			</p>
			<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

		</form>
	</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );
