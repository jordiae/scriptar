<?php get_header(); ?>


  <div class="container">
    <div class="row">

<div class="col-lg-8 col-md-8">

<h2>
  <?php if( is_author() ): ?>
    Autor: <?php echo $author_name ?>
  <?php elseif( is_category() ): ?>
    Categoria: <?php single_cat_title(); ?>
  <?php elseif( is_tag() ): ?>
    Tag: <?php single_tag_title(); ?>
  <?php elseif( is_year() ): ?>
    Arxiu <?php the_time('Y'); ?>
  <?php elseif( is_month() ): ?>
    Arxiu <?php the_time('F Y'); ?>
  <?php else: ?>
    Arxiu
  <?php endif; ?>
</h2>

<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php $author_name = get_the_author_meta('nickname'); ?>
    
    <h2>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php the_excerpt(); ?>
    
  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <h2>No posts found</h2>
<?php endif; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev">
    <?php next_posts_link( __( '&larr; Older posts' ) ); ?>
  </div>
  <div class="next">
    <?php previous_posts_link( __( 'Newer posts &rarr;' ) ); ?>
  </div>
<?php endif; ?>

</div>
<div class="col-lg-4 col-md-4">

<?php get_sidebar(); ?>

</div>

</div>
</div>

<?php get_footer(); ?>