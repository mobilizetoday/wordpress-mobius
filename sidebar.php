<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>

<?php
			
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>

			<div class="part pages">
				<div class="sm-slide-block inactive">
					<div class="sm-title">
						<h4><?php _e('Pages','mobius');?></h4>
						<a href="javascript:void(null)" class="sm-open-close"><?php _e('Close block','mobius');?></a>
					</div>
					<div class="sm-block">
						<div>
							<?php theme_custom_menu('nav-menu-sidebar'); ?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			
			<div class="part categories">
				<div class="sm-slide-block inactive">
					<div class="sm-title">
						<h4><?php _e('Categories','mobius');?></h4>
						<a href="javascript:void(null)" class="sm-open-close"><?php _e('Close block','mobius');?></a>
					</div>
					<div class="sm-block">
						<div>
							<ul>
								<?php wp_list_categories('show_count=0&title_li='); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="part archives">
				<div class="sm-slide-block inactive">
					<div class="sm-title">
						<h4><?php _e('Archives','mobius');?></h4>
						<a href="javascript:void(null)" class="sm-open-close"><?php _e('Close block','mobius');?></a>
					</div>
					<div class="sm-block">
						<div>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="part meta">
				<div class="sm-slide-block inactive">
					<div class="sm-title">
						<h4><?php _e('Meta','mobius');?></h4>
						<a href="javascript:void(null)" class="sm-open-close"><?php _e('Close block','mobius');?></a>
					</div>
					<div class="sm-block">
						<div>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
								<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
								<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
								<?php wp_meta(); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="part blogroll">
				<div class="sm-slide-block inactive">
					<div class="sm-title">
						<h4><?php _e('Blogroll','mobius');?></h4>
						<a href="javascript:void(null)" class="sm-open-close"><?php _e('Close block','mobius');?></a>
					</div>
					<div class="sm-block">
						<div>
							<ul>
								<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
           
			<?php endif; ?>
 			