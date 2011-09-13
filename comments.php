<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments','mobius') ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h1><?php comments_number(__('No Responses','mobius'), __('One Response','mobius'), __('% Responses','mobius'));?> </h1>
	<div class="alignleft"><?php previous_comments_link(); ?></div>
	<div class="alignright"><?php next_comments_link(); ?></div>
		
	<div class="clear"></div>
	<ol class="commentlist">
	<?php wp_list_comments('callback=mobius_comment'); ?>
	</ol>
	
	<div class="alignleft"><?php previous_comments_link(); ?></div>
	<div class="alignright"><?php next_comments_link(); ?></div>
		
	<div class="clear"></div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed','mobius');?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<?php

$fields = array(
	'author' => '<p class="field"><label class="caption" for="author">' . __( 'Name' ) . '</label> ' .
	            '<span class="form-row row-first"> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="22" tabindex="1" /></span></p>',
	'email'  => '<p class="field"><label class="caption" for="email">' . __( 'Email' ) . '</label> ' .
	            '<span class="form-row"> <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="22" tabindex="1" /></span></p>',
	'url'    => '<p class="field"><label class="caption" for="url">' . __( 'Website' ) . '</label>' .
	            '<span class="form-row"> <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" tabindex="3" /></span></p>',
);

$args = array(
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => '<p class="field"><label class="caption">'. _x( 'Comment', 'noun' ).'</label> <span class="form-row"><textarea name="comment" id="comment" rows="3" cols="25" tabindex="4"></textarea></span></p>',
	'label_submit' => 'Submit Comment'
);

comment_form( $args  );
?>

<?php endif; ?>