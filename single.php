<?php get_header(); ?>

<div class="container ini">


  <div class="row">



    <div class="col-md-10 col-md-offset-1">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


        <h5 class="data text-center"><?php the_time('d/m/Y'); ?></h5>
        <h2 class="text-center"><?php the_title(); ?></h2>
        <hr class="half">


        <?php  the_post_thumbnail(); ?>

        <?php the_content(); ?>

      <?php endwhile; wp_reset_query(); ?>



    </div>




  </div>


</div>

<?php get_footer(); ?>