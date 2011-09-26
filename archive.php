<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

					<div <?php post_class(); ?>>
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
							
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<span class="post-meta"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'mobius' ), the_title_attribute( 'echo=0' ) ); ?>">#</a> &nbsp; |  &nbsp; <?php the_author(); ?> &nbsp; |  &nbsp; <?php comments_popup_link(__('No Comments &#187;', 'mobius'), __('1 Comment &#187;', 'mobius'), __('% Comments &#187;', 'mobius'), '', __('Comments Closed', 'mobius') ); ?></span>
								<span class="date"><?php _e('Posted on', 'mobius');?><?php the_time(get_option('date_format')); ?></span>
							</div>
							
							<?php the_content(__('Read the rest of this entry &raquo;', 'mobius')); ?>

							<div class="clear"></div>
							<div class="post-footer">
								<?php _e('Written by', 'mobius');?> <?php the_author(); ?> <?php the_category(', '); ?> <?php the_tags('&nbsp; | &nbsp; '. __('Tags:', 'mobius') . ' ', ', ', '<br />'); ?>
							</div>
						</div>
					</div>
							
		<?php endwhile; ?>
					<div id="pagination">
						<ul>
							<li class="default"><div class="fr"><?php previous_posts_link(__('Newer Entries &raquo;', 'mobius')); ?></div> <?php next_posts_link(__('&laquo; Older Entries', 'mobius')); ?></li>
						</ul>
						<div class="clear"></div>
					</div>
	<?php else : ?>
					<div class="post">
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
								<h2><?php _e('Not Found', 'mobius');?></h2>
								<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.','mobius');?></p>
							</div>
						</div>
					</div>
	<?php endif; ?>
<?php get_footer(); ?>
