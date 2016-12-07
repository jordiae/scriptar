<?php get_header(); ?>


<div class="container start">



<h1><?php printf( __( 'Resultats per: %s' ), '' . get_search_query() . '' ); ?></h1>
<?php if ( have_posts() ) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <h2>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php the_excerpt(); ?>
  <?php endwhile; ?>
<?php else: ?>
  <h2>No s'ha trobat res</h2>
  <p>
Cerca una altra cosa  </p>
<?php endif; ?>

  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    

<div class="text-center">

<?php
if ( function_exists('vb_pagination') ) {
  vb_pagination();
}
?>
</div>


  <?php endif; ?>



</div>


</div>

<?php get_footer(); ?>
