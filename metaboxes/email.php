<?php

/**
 * User Profile Email Metabox
 * 
 * @package User/Profiles/Metaboxes/Email
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Render the contact metabox for user profile screen
 *
 * @since 0.1.0
 *
 * @param WP_User $user The WP_User object to be edited.
 */
function wp_user_profiles_email_metabox( $user = null ) {
	$current_user = wp_get_current_user(); ?>

	<table class="form-table">
		<tr class="user-email-wrap">
			<th><label for="email"><?php _e('Email'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
			<td><input type="email" name="email" id="email" value="<?php echo esc_attr( $user->user_email ) ?>" class="regular-text ltr" />
			<?php
			$new_email = get_option( $current_user->ID . '_new_email' );
			if ( $new_email && $new_email['newemail'] != $current_user->user_email && $user->ID == $current_user->ID ) : ?>
			<div class="updated inline">
			<p><?php
				printf(
					__( 'There is a pending change of your email to %1$s. <a href="%2$s">Cancel</a>' ),
					'<code>' . $new_email['newemail'] . '</code>',
					esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
			); ?></p>
			</div>
			<?php endif; ?>
			</td>
		</tr>
	</table>

	<?php
}