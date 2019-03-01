<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php bloginfo( 'name' );?></title>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top rem-header-nav">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		       <?php the_custom_logo( );?>
		      </a>
		    </div>
		  </div>
		</nav>
	</header>
	<section>
		<div class="rem-header-image" style="background-image: url(<?php header_image(); ?>);">
			<h1 class="rem-header-text"><?php echo get_bloginfo( 'description','raw'); ?></h1>
		</div>
	</section>
	
	<section>