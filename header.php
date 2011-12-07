<?php
/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/icon-pda.png"/>
<link rel="SHORTCUT ICON" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.ico"/>
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
	$options = mobius_get_theme_options();

    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		wp_enqueue_script('jquery');
?>
	
	<script type="text/javascript">
	// <![CDATA[
	if (screen.width > 640 && window.location.search.substring(1) != "mobile" && !navigator.userAgent.match(/Android/i))
	{
		//desktop version
		document.write('<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" media="screen,tv,projection" />');
		document.write('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/desktop-<?php echo $options['color_scheme']; ?>.css" type="text/css" id="skin" media="screen,tv,projection" />');
		document.write('<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->');

	}
	else
	{
		//mobile version
		document.write('<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />');
		document.write('<link rel="stylesheet"  href="<?php echo get_stylesheet_directory_uri(); ?>/css/mobile.css" type="text/css" media="all" />');
	 	document.write('<link rel="stylesheet"  href="<?php echo get_stylesheet_directory_uri(); ?>/css/mobile-<?php echo $options['color_scheme']; ?>.css" type="text/css" id="skin" media="all" />');
		
		<?php if ($options['mobile_layout'] == 'content') { ?>
		document.write('<style type="text/css"> div.sl { display: none !important; }</style>');		
		<?php } ?>

	 	var ua = navigator.userAgent.toLowerCase();
	 	if ((ua.indexOf('iemobile') != -1) || (ua.indexOf('msie') != -1))
	 		document.write('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie-mobile.css" type="text/css" media="all" />');
	 	else if (ua.indexOf('blackberry') != -1)
	 		document.write('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();  ?>/css/blackberry.css" type="text/css" media="all" />');
	 	else if ((ua.indexOf('symbian') != -1) || (ua.indexOf('midp') != -1))
	 		document.write('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/symbian.css" type="text/css" media="all" />');
	}
	// ]]>
	</script>

<?php wp_head(); ?>
        <script type="text/javascript">
	// <![CDATA[
	if (screen.width > 640 && window.location.search.substring(1) != "mobile" && !navigator.userAgent.match(/Android/i))
	{
		//desktop version
		document.write('<'+'script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.checkbox.min.js"><'+'/script>');
		document.write('<'+'script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.stylish-select.min.js"><'+'/script>');
		document.write('<'+'script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/desktop.js"><'+'/script>');
	}
	else
	{
		//mobile version
	 	document.write('<'+'script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/mobile.js"><'+'/script>');
	}
	// ]]>
	</script>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="middle">

		<div id="container">
			<div id="content">

				<div id="header">
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
					<strong><?php bloginfo('description'); ?></strong>
				</div>

				<div id="icons">
					<div class="transparency"></div>
					<div class="items">
						<a href="#skip-to-nav" class="skip-navigation"><?php _e('Skip To Navigation','mobius');?></a>
						<?php if ($options['show_rss']) { ?><a href="<?php echo bloginfo('rss_url');?>" class="rss"></a><?php } ?>
						<?php if ($options['show_twitter']) { ?><a href="<?php echo $options['twitter_url'];?>" class="twitter"></a><?php } ?>
						<?php if ($options['show_facebook']) { ?><a href="<?php echo $options['facebook_url'];?>" class="facebook"></a><?php } ?>


					</div>

				</div>

				<div id="menu">
					<div class="transparency"></div>
						<div id="search-box">

							<form action="<?php echo home_url();?>/">
								<fieldset>
									<div><input type="text" name="s" value="<?php _e('Search...','mobius');?>" /></div>
								</fieldset>

							</form>

						</div>
					<div class="items">
						
						<?php theme_custom_menu('nav-main-bottom'); ?>
						<a href="javascript:void(null)" class="show-search"></a>
					</div>
                                </div>
				<div class="clear"></div>
				<div>