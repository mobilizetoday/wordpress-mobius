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

								<span class="post-meta"><?php the_author(); ?> </span>
								<span class="date"><?php _e('Posted on','mobius');?> <?php the_time(get_option('date_format')); ?></span>
							</div>
							
							<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;','mobius'). '</p>'); ?>
							
							<div class="clear"></div>
							<?php the_tags( '<p>' . __('Tags:', 'mobius') . ' ', ', ', '</p>'); ?>
							<p><?php _e('Categories:','mobius');?> <?php echo get_the_category_list(', '); ?></p>
							<p><?php edit_post_link(__('Edit this entry','mobius'),'',''); ?></p>
							
                            <?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong>' ,'mobius'), 'after' => '</p>', 'next_or_number' => 'number', 'pagelink' => 'page %')); ?>
							
							<hr/>
							<?php comments_template(); ?> 
							
						</div>
					</div>
					
		<?php endwhile; ?> 
		
					<div id="pagination">
						<ul>
							<li class="default"><div class="fr"><?php next_post_link('%link', __('Next post &raquo;','mobius'), TRUE); ?></div> <?php previous_post_link('%link', __('&laquo; Previous post','mobius'), TRUE); ?></li>
						</ul>
						<div class="clear"></div>
					</div>
		
		<?php else: ?>
		
		
		<?php endif; ?>

<?php get_footer(); ?>
