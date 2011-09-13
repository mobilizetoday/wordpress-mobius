<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
					<div class="post">
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
								<h2><?php the_title(); ?></h2>

								<span class="post-meta"><?php the_author(); ?></span>
								<span class="date"><?php _e('Posted on','mobius');?> <?php the_time(get_option('date_format')); ?></span>
							</div>
							
							<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;','mobius') . '</p>'); ?>
							
							<div class="clear"></div>

							
							<hr/>
							<?php comments_template(); ?> 
							
						</div>
					</div>
					
		<?php endwhile; else: ?>
		
		
		<?php endif; ?>

<?php get_footer(); ?>
