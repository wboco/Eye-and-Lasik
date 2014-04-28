<?php
require_once (trailingslashit( get_template_directory() ).'inc/Mobile_Detect.php');
$detect = new Mobile_Detect();

//$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
//$scriptVersion = $detect->getScriptVersion();


if (isset($_REQUEST['hank'])) {
	echo "Device type: " . $deviceType; 
	if ($detect->isMobile()){
		echo "mobile detected";
	}
	echo '<pre>';
	print_r($_COOKIE);
	echo 'detect';
	print_r($detect);
	echo '</pre>';
	
	echo '<h1>' . $detect->isMobile() . '</h1>';
}

if ($detect->isMobile() && !isset($_COOKIE['mobile_breaker'])) {
    // Any mobile device.
    // echo "mobile";
    header("Location: http://eyeandlasik.com/mobile/");
	exit;
}
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

	<?php wp_head(); ?>
	
	
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class('off-canvas hide-extras'); ?>>
	<!-- Row for blog navigation -->
	<div id="header" class="row top-header">
		<header class="twelve columns" role="banner">
			<div class="reverie-header seven columns">
				<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/eye_and_lasic_center_logo.png" alt="Eye & lasik Center" width="465" height="79" /></a></h1>
				<h5>Greenfield &nbsp; • &nbsp; Athol &nbsp; • &nbsp; Gardner<br />W. Springfield &nbsp; • &nbsp; Shelburne Falls</h5>
			</div>
			
			<div id="contact" class="five columns">
				<h4 class="subheader">800-676-5050</h4>
			</div>
		</header>
	</div>
		
		
	<!-- Start the main container -->
	<div id="container" class="container" role="document">
		<nav role="navigation" class="hide-for-small top-nav">
			<?php
				if ( has_nav_menu( 'primary_navigation' ) ):
			    	wp_nav_menu( array(
						'theme_location' => 'primary_navigation',
						'container' =>false,
						'menu_class' => '',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'items_wrap' => '<ul class="nav-bar">%3$s</ul>',
						'walker' => new reverie_walker())
					);
				endif;
				?>
		</nav>
		
		<div id="searchform">
			<form role="search" method="get" action="<?php echo home_url('/'); ?>">
				<input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'reverie'); ?>">
				<input type="submit" id="searchsubmit" value="<?php _e('Search', 'reverie'); ?>" class="postfix button">
			</form>
		</div>
		
		
		<p class="show-for-small">
			<a class='sidebar-button button' id="sidebarButton" href="#sidebar-off" >Menu</a>
		</p> 
			
			
		<!-- Start Off-Canvas Row -->
		<div class="row">
			<?php require_once('inc/graphic-nav.inc.php'); ?>