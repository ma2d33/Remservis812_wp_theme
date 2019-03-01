<?php 

	/*
		template name:services rem812
	*/
get_header(); ?>
	
		<div class="row">
			<div class="col-md-3 hidden-xs col-xs-12 rem-side-menu">
				<?php
					wp_nav_menu( array(
					 	'theme_location'=>'primary',
						'container'=>false,
						'menu_class'=> 'nav flex-column'
					) 
				);
				?>
				<div class="rem-advert-div">
					<?php get_sidebar( 'secondary' ); ?>
				</div><!-- .rem-advert-div -->
			</div>
			<div class="col-md-9 col-xs-12 rem-content-div">
				<h1 class="rem-content-title"><?php the_title();?></h1>
				<?php if ( have_posts() ) : ?>
    				<?php while ( have_posts() ) : the_post(); ?>
        				<p><?php the_content(); ?></p>
    			<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>


<?php  get_footer(); ?>



