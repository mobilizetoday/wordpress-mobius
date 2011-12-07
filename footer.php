<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>

				</div>
				<a name="skip-to-nav"></a>

				<div id="mobile-navigation">
				<?php theme_custom_menu('nav-main-top'); ?>
				<div class="mobile-search">

					<form action="<?php echo home_url(); ?>/">
						<fieldset>
							<div><input type="submit" value="" class="submit" /> <input type="text" name="s" value="<?php _e('SEARCH','mobius');?>" /> </div>
						</fieldset>
					</form>
				</div>
				</div>


			</div>
		</div>

		<div class="sidebar sl">
		
			<?php get_sidebar(); ?>

		</div>
		
		</div>

	</div>
	<div id="footer">
		<strong class="mobile-optimized" title="<?php _e('This page is optimized for mobile phones','mobius');?>"><?php _e('Optimized for mobile devices','mobius');?></strong>
		<p><?php _e('Powered By', 'mobius'); ?> <a href="http://wordpress.org" title="WordPress.org">WordPress</a></p>
		<p><em><?php _e('Design &amp; development by','mobius');?></em> <a id="mobilizetoday" href="http://www.mobilizetoday.com">MobilizeToday.com</a></p>
	</div>
<?php wp_footer(); ?>
	<script type="text/javascript">
		var path = "<?php echo home_url(); ?>";
	</script>
</body>
</html>