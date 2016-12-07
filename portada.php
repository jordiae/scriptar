<?php /* Template Name: Portada */ ?>
<?php
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>




<!-- Jumbotron   -->
<div class="cap jumbo">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h1><?php the_field('titol_jumbotron'); ?></h1>
        <p><?php the_field('descripcio_jumbotron'); ?></p>
        <a href="<?php the_field('link_jumbotron'); ?>" class="btn btn-lg btn-inverse "><?php the_field('boto_jumbotron'); ?></a>
      </div>
    </div>
  </div>
</div>

<div class="seccio"><div class="container text-center">

<form action="http://146.185.138.154/upload" method="post" enctype="multipart/form-data">   
    <input type="file" name="fileToUpload" id="fileToUpload" required><br>
    <input type="submit" value="Upload audio" class="btn-info btn" name="submit" style="margin-top: 20px">
</form>

</div></div>



<?php
// check if the flexible content field has rows of data
if( have_rows('flex') ):
// loop through the rows of data
while ( have_rows('flex') ) : the_row();
if( get_row_layout() == 'foto_mes_imatge' ): ?>
<div class="seccio">
  <div class="container">
    
    <div class="row">
      <?php if (get_sub_field('position') === 'left') { ?>
      <div class="col-md-4 text-center">
        <img src="<?php the_sub_field('imatge')?>">
      </div>
      <div class="col-md-7 col-md-offset-1">
        <h3><?php the_sub_field('titol')?></h3>
        <p><?php the_sub_field('text')?></p>
      </div>
      <?php } else { ?>
      <div class="col-md-7">
        <h3><?php the_sub_field('titol')?></h3>
        <p><?php the_sub_field('text')?></p>
      </div>
      <div class="col-md-4 col-md-offset-1 text-center">
        <img src="<?php the_sub_field('imatge')?>">
      </div>
      <?php } ?>
      
    </div>
  </div>
</div>
<?php elseif( get_row_layout() == 'tabla' ): ?>
<div class="seccio">
  <div class="container">
    
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <?php if (get_sub_field('titulo')) { ?>
        <h3 class="text-center" style="margin-bottom: 20px"><?php the_sub_field('titulo')?></h3>
        <?php }?>
        <?php if (get_sub_field('text')) { ?>
        <?php the_sub_field('text')?>
        <?php }?>
        <?php $table = get_sub_field( 'tabla' );
        if ( $table ) {
        echo '<table style="margin-top:60px" class="table text-left table-bordered" border="0">';
          if ( $table['header'] ) {
          echo '<thead>';
            echo '<tr>';
              foreach ( $table['header'] as $th ) {
              echo '<th>';
                echo $th['c'];
              echo '</th>';
              }
            echo '</tr>';
          echo '</thead>';
          }
          echo '<tbody>';
            foreach ( $table['body'] as $tr ) {
            echo '<tr>';
              foreach ( $tr as $td ) {
              echo '<td>';
                echo $td['c'];
              echo '</td>';
              }
            echo '</tr>';
            }
          echo '</tbody>';
        echo '</table>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php elseif( get_row_layout() == 'ticks' ): ?>
<div class="seccio ticks">
  <div class="container text-center">
    
    <div class="row">
      
      
      <div class="col-md-10 col-md-offset-1">
        <h3><?php the_sub_field('titulo')?></h3>
        <p><?php the_sub_field('text')?></p>
        
        <?php
        // check if the repeater field has rows of data
        if( have_rows('repeaterticks') ): ?>
        <ul class="checks text-center" style="margin-top:30px">
          <?php while ( have_rows('repeaterticks') ) : the_row(); ?>
          <li class=""><i class="fa fa-check"></i> <?php the_sub_field('tick'); ?></li>
          <?php   endwhile; ?>
        </ul>
        <?php else : endif; ?>
      </div>
    </div>
  </div>
</div>
<?php elseif( get_row_layout() == 'imatge_background' ): ?>
<div class="seccio secciobg" style="background: url('<?php the_sub_field('imatge')?>') center center; background-size: cover">
  <div class="container">
    
    <div class="row">
      
      
      <div class="col-md-10 col-md-offset-1 text-center">
        <h3><?php the_sub_field('titol')?></h3>
        <p><?php the_sub_field('text')?></p>


        <?php if (get_sub_field('boton')) { ?>
        <a href="<?php the_sub_field('linkboton')?>" class="btn btn-lg btn-inverse "><?php the_sub_field('boton')?></a>
        <?php }?>


      </div>
    </div>
  </div>
</div>
<?php  elseif( get_row_layout() == 'nomes_text' ): ?>
<div class="seccio">
  <div class="container">
    
    <div class="row">
      
      
      <div class="col-md-12 text-center">
        <?php if (get_sub_field('titol')) { ?>
        <h3><?php the_sub_field('titol')?></h3>
        <?php }?>
        <?php if (get_sub_field('text')) { ?>
        <?php the_sub_field('text')?>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<?php  elseif( get_row_layout() == 'caracteristiques' ): ?>
<div class="seccio">
  <div class="container">


    <?php if (get_sub_field('titol')) { ?>
        <h3 class="text-center" style="margin-bottom: 60px"><?php the_sub_field('titol')?></h3>
        <?php }?>


    <div class="row">




<?php $count = count(get_sub_field('repeatercarac'));
if ($count == 2) {
$col = 6;
}
elseif ($count == 3) {
$col = 4;
} else {
$col = 3;
}
?>
<?php
              // check for rows (sub repeater)
if( have_rows('repeatercarac') ): ?>

      <?php
      // loop through rows (sub repeater)
      while( have_rows('repeatercarac') ): the_row(); ?>
  
      <div class="col-md-<?php echo $col; ?> text-center">
        <img src="<?php the_sub_field('imatge')?>">
        <h3><?php the_sub_field('titol')?></h3>
        <p><?php the_sub_field('text')?></p>
      </div>
      <?php endwhile; ?>

<?php endif; //if( get_sub_field('items') ): ?>

    </div>
  </div>
</div>


<?php
endif;
endwhile;
else :
// no layouts found
endif;
?>
<?php endwhile; ?>
<?php /*endwhile*/; wp_reset_query(); ?>











<?php get_footer(); ?>