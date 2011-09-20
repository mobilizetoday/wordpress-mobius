<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php

add_theme_support( 'automatic-feed-links' );
$content_width = 670;

// Register sidebar
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="part widget %2$s"><div class="sm-slide-block inactive">',
		'before_title' => '<div class="sm-title"><h4>',
		'after_title' => '</h4><a href="javascript:;" class="sm-open-close">Close block</a></div><div class="sm-block"><div>',
		'after_widget' => '</div></div></div><div class="clear"></div></div>',		
	));
}

//Localization
load_theme_textdomain('mobius', get_template_directory() . '/lang');

require( dirname( __FILE__ ) . '/inc/theme-options.php' );

// Custom comments code
function mobius_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
		<?php echo get_avatar($comment,$size='48' ); ?>
		</div>
		<cite class="fn"><?php comment_author_link(); ?>:</cite> 
		
		<div class="p">
	<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.'); ?></em>
		<br />
	<?php endif; ?>

	<?php comment_text(); ?>
			<p><span class="comment-time"><?php echo comment_date('d.m.Y');?> <?php comment_time('H:i'); ?> <?php echo comment_reply_link(array( 'depth' =>
   $depth, 'max_depth' => $args['max_depth'] ));  ?>   <?php edit_comment_link(); ?>
</span></p>

		</div>
	</div>
<?php
}

// Custom search widget
function mobius_search_form($form) {
	$form = '<div class="sm-title"><h4>Search</h4><a href="javascript:void(null)" class="sm-open-close">Close block</a>					</div>
					<div class="sm-block">
						<div><form method="get" action="' . home_url() . '/" >
	<fieldset>
	<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />
	<input type="submit" class="submit" id="searchsubmit" value="'.esc_attr('Search').'" />
	</fieldset>
	</form>';
return $form;
}
add_filter('get_search_form', 'mobius_search_form');

// Custom password-protected form
function mobius_password_form($form) {
	$subs = array(
		'#<form(.*?)>#' => '<form$1><fieldset>',
		'#<p><label(.*?)>Password:#' => '',
		'#</p>#' => '',
		'#</label>#' => '',
		'#<p>This post is password protected. To view it please enter your password below:#' => '<p>This post is password protected. To view it please enter your password below:</p><ul>',
		'#<input(.*?)type="password"(.*?) />#' => '<li><label class="caption">Password</label><span class="form-row row-first"> <input$1type="password" /></span></li>',
		'#<input type="submit" name="Submit" value="Submit" />#' => '<li><input type="submit" value="Submit" class="submit" /></li>',
		'#</form(.*?)>#' => '</fieldset></form><div class="clear"></div>'
	);
	echo preg_replace(array_keys($subs), array_values($subs), $form);
}

add_filter('the_password_form', 'mobius_password_form');

if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
		'main' => 'Main Menu'
	) ); 
}

add_filter('widget_title', 'theme_widget_title');
function theme_widget_title( $str ) {
	$str = ' ' . $str;
	return $str;
}

function theme_custom_menu($menu_id = 'nav-main-top') {
	$menu = '';
	$menu_name = 'main';

	$locations = get_nav_menu_locations();
	$menu_term = isset($locations[$menu_name]) ? wp_get_nav_menu_object( $locations[$menu_name] ) : null;
	if (isset($menu_term->term_id)) {
		$menu_items = wp_get_nav_menu_items($menu_term->term_id);

		if (is_array($menu_items) && sizeof($menu_items)) {

			$menu = wp_nav_menu( array(
				'theme_location' => $menu_name,
				'container' => 'none',
				'menu_class' => false,
				'menu_id' => $menu_id,
				'depth' => 2,
				'echo' => false
			) );
		}
	}

	if (!empty($menu)) {
		echo $menu;
	}
	else {
		echo '<ul id="'.$menu_id.'">';
		wp_list_pages('title_li=');
		echo '</ul>';
	}
}