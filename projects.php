<?php /* Template Name: Projects */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="cap">
	<div class="container">
		
		<h2 class="text-center"><?php the_title(); ?></h2>
	</div>
</div>
<?php if( '' !== get_post()->post_content ) { ?>
<div class="seccio">
	<div class="container">
		
		<?php the_content(); ?>
	</div>
</div>
<?php } ?>
<?php if( have_rows('proyecto') ): ?>
<?php  while ( have_rows('proyecto') ) : the_row(); ?>
<div class="seccio">
	<div class="container">
		<div class="row">
			<div class="col-md-4 text-center">
				<img src="<?php the_sub_field('imagen'); ?>">
			</div>
			<div class="col-md-7 col-md-offset-1">
				<h2><?php the_sub_field('titulo'); ?></h2>
				<p><?php the_sub_field('texto'); ?></p>
			</div>
		</div>
	</div>
</div>
<?php  endwhile; ?>
<?php else :  endif; ?>
<?php endwhile; ?>
<?php /*endwhile*/; wp_reset_query(); ?>
<?php get_footer(); ?>