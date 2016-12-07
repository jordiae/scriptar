<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,100,500' rel='stylesheet' type='text/css'>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
 <link rel="stylesheet" href="http://146.185.138.154/wp-content/themes/labstrap/css/jquery.fileupload.css">


<!--

<link rel="stylesheet" type="text/css" href="http://146.185.138.154/wp-content/themes/labstrap/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="http://146.185.138.154/wp-content/themes/labstrap/css/demo2.css" /> -->
<link rel="stylesheet" type="text/css" href="http://146.185.138.154/wp-content/themes/labstrap/css/component.css" />




	<?php wp_head(); ?>
</head>
<body itemscope itemtype="http://schema.org/WebSite" <?php body_class(); ?>>
	<header class="navbar navbar-inverse navbar-static-top" id="top" role="banner">
		<nav role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="brand">
						<a href="<?php echo get_option('home'); ?>">
							<?php bloginfo ( 'name' ); ?>
						</a>
					</div>
				</div>
				<?php
				wp_nav_menu( array(
					'menu'              => 'top',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav nav-pills menutop',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>
			</div>
		</nav>
	</header>