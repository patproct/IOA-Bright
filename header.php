<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php bloginfo('name'); wp_title('&#8226;',1,'left'); ?></title>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="Indiana Outboard Association, Modified Racing Hydroplanes, Modified Racing Runabouts, Stock Outboard Racing, DIY, racing, midwest, Indiana, Ohio, Michigan, Illinois, Oklahoma, Kentucky, APBA, American, United States, USA" name="keywords" />
		
		<link rel="alternate" href="<?php bloginfo('rss2_url'); ?>" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> RSS" />
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic|Open+Sans:300italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/wpcore.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/colorbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="text/css" />
		
		<!-- <script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>  -->
		<script>
		 // WebFont.load({
		 //   google: {
		      // families: ['Open Sans', 'Arvo']
		 //   }
		 // });
		</script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/hoverintent.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.colorbox-min.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/custom.js" type="text/javascript"></script>
		
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="globalContainer">
			<div id="redStripe" class="stripe"></div>
			<div id="whiteStripe" class="stripe"></div>
			<div id="blackStripe" class="stripe"></div>
			<div id="container">
				<div id="header">
					<h1 id="blog_title"><?php bloginfo('name'); ?></h1>
					<p id="subtitle"><?php bloginfo('description'); ?></p>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?> Home" id="homelink"></a>
				</div>
				<div id="content">
					<?php include 'partials/left-sidebar.php'; ?>
					<div id="centerCol">
