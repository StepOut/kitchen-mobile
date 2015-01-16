<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>


<div class="row">
<form method="post" class="lost_reset_password col-md-6">
<?php if(isset($_GET['reset'])){ echo '<div class="woocommerce-error">Passwor changed successfully. <a href="'.get_home_url().'/login">Login</a></div>'; } ?>
	<?php if( 'lost_password' == $args['form'] ) : ?>
		<?php if($_POST['wc_reset_password'] == 'Reset Password'){ echo '<div class="woocommerce-error">Check your email - we sent you an email with a confirmation link. Click on it to reset your password.</div>'; } elseif(isset($_POST['wc_reset_password'])){ echo 'custom message'; } ?>
        <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( '<h2>Forgot password</h2> <p class="intro">Please enter your email address. You will receive a link to create a new password via email.</p>', 'woocommerce' ) ); ?></p>

        <p><input class="input-text" type="text" placeholder="Email address" name="user_login" id="user_login" /></p>

	<?php else : ?>
		
        <h2>Reset password</h2>
        <p class="intro"><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>

        <p>
            <input type="password" placeholder="New password" class="input-text" name="password_1" id="password_1" />
        </p>
        <p>
            <input type="password" placeholder="Re-enter new password" class="input-text" name="password_2" id="password_2" />
        </p>

        <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
        <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />
		
    <?php endif; ?>

    <div class="clear"></div>

    <p class="form-row"><input type="submit" class="btn-orange" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" /></p>
	<?php wp_nonce_field( $args['form'] ); ?>

</form>
</div>