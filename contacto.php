<?php
/*
Template Name: Contacto
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="mapa" id="map-canvas">
</div>
<div class="container ini">
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <form action="" method="POST">
        <input type="hidden" name="_next" value="//sitelabs.es/presupuesto-recibido" />
        <div class="form-group">
          <input style="margin-top: 20px" type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre..." required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" required placeholder="E-mail">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="nombre" name="telefono" placeholder="Teléfono" required>
        </div>
        <div class="form-group">
          <textarea name="mensaje" id="" cols="30" rows="14" class="form-control" id="mensaje" name="mensaje" placeholder="Cuéntanos qué tienes en mente..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-bottom: 20px">Enviar</button>
      </form>
    </div>
    <div class="col-lg-6 col-md-6">
      <h3 class="contacto">Contacto</h3>
      <p>Pídenos información para llevar a cabo tu proyecto web.</p>
      <div class="well">
        <strong>Teléfono: </strong>93 444 44 44<br>
        <strong>E-mail: </strong>hola@xxxxx.es
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <h3 class="contacto">Dirección</h3>
          Carrer Lorem Ipsum<br>
          23-29<br>
          08042 - Barcelona<br>
        </div>
        <div class="col-md-6">
          <h3 class="contacto">Horario</h3>
          De lunes a sábado de 09:00 a 21:00
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&language=en"></script>
<script>
var cd = new google.maps.LatLng(41.5465829,2.095881);
function initialize() {
var mapOptions = {
zoom: 16,
center: cd,
scrollwheel: false
};
var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php endwhile; ?>
<?php get_footer(); ?>