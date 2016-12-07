<?php get_header(); ?>

<div class="cap">
<div class="container">
    <h2>Blog</h2>
  </div>
</div>

<div class="container index">


  <?php if ( have_posts() ): ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <span class="data"><?php the_time('d/m/Y'); ?></span>
      <h2>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <p><?php the_excerpt(); ?></p>

      <hr class="half">


    <?php endwhile; wp_reset_query(); ?>
  <?php else: ?>
    <h2>No se ha encontrado nada</h2>
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
</div>
</div>

<?php get_footer(); ?>