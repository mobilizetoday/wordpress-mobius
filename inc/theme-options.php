<?php
/**
 * Mobius Theme Options
 */

function mobius_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'mobius-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-09-12' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'mobius_admin_enqueue_scripts' );

function mobius_theme_options_init() {
	if ( false === mobius_get_theme_options() )
		add_option( 'mobius_theme_options', mobius_get_default_theme_options() );

	register_setting(
		'mobius_options',
		'mobius_theme_options',
		'mobius_theme_options_validate'
	);
}
add_action( 'admin_init', 'mobius_theme_options_init' );

function mobius_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'mobius' ),
		__( 'Theme Options', 'mobius' ),
		'edit_theme_options',
		'theme_options',
		'mobius_theme_options_render_page'
	);

	if ( ! $theme_page )
		return;

	$help = '<p>' . __( 'Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Mobius, provides the following Theme Options:', 'mobius' ) . '</p>' .
		'<ol>' .
			'<li>' . __( '<strong>Color Scheme</strong>: You can choose a color palette of "Sky Blue", "Amethyst" or "Rain Forest" for your site.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Mobile Layout</strong>: You can choose if you want your site&#8217;s mobile layout to manage sidebar visibility.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Show Twitter Icon</strong>: Choose whether you want twitter icon to be displayed.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Twitter URL</strong>: Here you may specify address of your twitter page.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Show Facebook Icon</strong>: Choose whether you want facebook icon to be displayed.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Facebook URL</strong>: Here you may specify address of your facebook page.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Show RSS Icon</strong>: Choose whether you want RSS icon to be displayed.', 'mobius' ) . '</li>' .
			'<li>' . __( '<strong>Mobile Layout</strong>: You can choose if you want your site&#8217;s mobile layout to manage sidebar visibility.', 'mobius' ) . '</li>' .
		'</ol>' .
		'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'mobius' ) . '</p>' .
		'<p><strong>' . __( 'For more information:', 'mobius' ) . '</strong></p>' .
		'<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'mobius' ) . '</p>' .
		'<p>' . __( '<a href="http://www.mobilizetoday.com/" target="_blank">MobilizeToday.com</a>', 'mobus' ) . '</p>';

	add_contextual_help( $theme_page, $help );
}
add_action( 'admin_menu', 'mobius_theme_options_add_page' );

function mobius_color_schemes() {
	$color_scheme_options = array(
		'sky-blue' => array(
			'value' => 'sky-blue',
			'label' => __( 'Sky Blue', 'mobius' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/sky-blue.png'
		),
		'amethyst' => array(
			'value' => 'amethyst',
			'label' => __( 'Amethyst', 'mobius' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/amethyst.png'
		),
		'rain-forest' => array(
			'value' => 'rain-forest',
			'label' => __( 'Rain Forest', 'mobius' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/rain-forest.png'
		),
	);

	return apply_filters( 'mobius_color_schemes', $color_scheme_options );
}

function mobius_mobile_layouts() {
	$layout_options = array(
		'content-sidebar' => array(
			'value' => 'content-sidebar',
			'label' => __( 'With sidebar', 'mobius' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/content-sidebar.png',
		),
		'content' => array(
			'value' => 'content',
			'label' => __( 'No sidebar', 'mobius' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/content.png',
		),
	);

	return apply_filters( 'mobius_mobile_layouts', $layout_options );
}

function mobius_get_default_theme_options() {
	$default_theme_options = array(
		'color_scheme' => 'sky-blue',
		'show_twitter' => false,
		'twitter_url' => '',
		'show_facebook' => false,
		'facebook_url' => '',
		'show_rss' => false,
		'mobile_layout' => 'content-sidebar'
	);

	return apply_filters( 'mobius_default_theme_options', $default_theme_options );
}

function mobius_get_theme_options() {
	return get_option( 'mobius_theme_options', mobius_get_default_theme_options() );
}

function mobius_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'mobius' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

			<table width="100%" border="0" style="padding:5px 10px;">
				<tr>
					<td>
						<p style="margin:0;padding: 0 0 18px 0; font-size: 14px;">If you like this theme and want it to be even better as well as to see new FREE mobile compatible themes from <a href="http://www.mobilizetoday.com/"  target="_blank" title="Make your existing website mobile with MobilizeToday!">MobilizeToday.com</a>, you are welcome to donate.</p>
					</td>
					<td style="vertical-align:top;">
						<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<div>
								<input type="hidden" value="_s-xclick" name="cmd"/>
								<input type="hidden" value="LPEQ5VUBRJSLA" name="hosted_button_id"/>
								<input type="image" alt="PayPal - The safer, easier way to pay online!" name="submit" src="http://www.mobilizetoday.com/images/donate.gif"/>
								<img height="1" width="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt=""/>
							</div>
						</form>
					</td>
				</tr>
			</table>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'mobius_options' );
				$options = mobius_get_theme_options();
				$default_options =mobius_get_default_theme_options();
			?>

			<table class="form-table">
				<tr valign="top" class="image-radio-option color-scheme"><th scope="row"><?php _e( 'Color Scheme', 'mobius' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'mobius' ); ?></span></legend>
						<?php
							foreach ( mobius_color_schemes() as $scheme ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="mobius_theme_options[color_scheme]" value="<?php echo esc_attr( $scheme['value'] ); ?>" <?php checked( $options['color_scheme'], $scheme['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $scheme['thumbnail'] ); ?>" width="136" height="122" alt="" />
										<?php echo $scheme['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php echo _e('Show twitter icon', 'mobius'); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span>><?php echo _e('Show Twitter Icon', 'mobius'); ?></span></legend>
							<label for="mobius_show_twitter">
								<input type="checkbox" name="mobius_theme_options[show_twitter]" id="mobius_show_twitter" value="true" <?php checked( $options['show_twitter'], 1 ); ?> />
								<?php echo _e('Display twitter icon on site', 'mobius'); ?>
							</label>
						</fieldset>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="mobius_twitter_url"><?php echo _e('Twitter URL', 'mobius'); ?></label></th>
					<td><input name="mobius_theme_options[twitter_url]"  class="regular-text" id="mobius_twitter_url" type="text" value="<?php echo esc_attr( $options['twitter_url'] ); ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php echo _e('Show facebook icon', 'mobius'); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span>><?php echo _e('Show Facebook Icon', 'mobius'); ?></span></legend>
							<label for="mobius_show_facebook">
								<input type="checkbox" name="mobius_theme_options[show_facebook]" id="mobius_show_facebook" value="true" <?php checked( $options['show_facebook'], 1 ); ?> />
								<?php echo _e('Display facebook icon on site', 'mobius'); ?>
							</label>
						</fieldset>
					</td>
				</tr>
				
				<tr valign="top" >
					<th scope="row"><label for="mobius_facebook_url"><?php echo _e('Facebook URL', 'mobius'); ?></label></th>
					<td><input name="mobius_theme_options[facebook_url]"  class="regular-text" id="mobius_facebook_url" type="text" value="<?php echo esc_attr( $options['facebook_url'] ); ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php echo _e('Show RSS icon', 'mobius'); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span>><?php echo _e('Show RSS icon', 'mobius'); ?></span></legend>
							<label for="mobius_show_rss">
								<input type="checkbox" name="mobius_theme_options[show_rss]" id="mobius_show_rss" value="true" <?php checked( $options['show_rss'], 1 ); ?> />
								<?php echo _e('Display RSS icon on site', 'mobius'); ?>
							</label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top" class="image-radio-option mobile-layout"><th scope="row"><?php _e( 'Mobile Layout', 'mobius' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Mobile Layout', 'mobius' ); ?></span></legend>
						<?php
							foreach ( mobius_mobile_layouts() as $layout ) {
								?>
								<div class="layout">
									<label class="description">
										<input type="radio" name="mobius_theme_options[mobile_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['mobile_layout'], $layout['value'] ); ?> />
										<span>
											<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="68" height="122" alt="" />
											<?php echo $layout['label']; ?>
										</span>
									</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

function mobius_theme_options_validate( $input ) {
	$output = $defaults = mobius_get_default_theme_options();

	if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], mobius_color_schemes() ) )
		$output['color_scheme'] = $input['color_scheme'];

	if ( isset( $input['mobile_layout'] ) && array_key_exists( $input['mobile_layout'], mobius_mobile_layouts() ) )
		$output['mobile_layout'] = $input['mobile_layout'];

	$output['show_rss'] = isset($input['show_rss']) ? true : false;
	$output['show_twitter'] = isset($input['show_twitter']) ? true : false;
	$output['show_facebook'] = isset($input['show_facebook']) ? true : false;

	$output['facebook_url'] = $input['facebook_url'];
	$output['twitter_url'] = $input['twitter_url'];

	return apply_filters( 'mobius_theme_options_validate', $output, $input, $defaults );
}
