<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
endif;



add_editor_style( 'editor-style.css' );
add_action('init', 'my_init_method');


add_image_size( 'portfolio_thumb', 600, 400, true );



function my_init_method() {
  if (is_admin() == false ):
    wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');
  wp_enqueue_script( 'jquery' );
  endif;
}    

require_once('wp_bootstrap_navwalker.php');

add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );

function my_custom_excerpt($text, $raw_excerpt) {
  if( ! $raw_excerpt ) {
    $content = apply_filters( 'the_content', get_the_content() );
    $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
  }
  return $text;
}

function vb_pagination( $query=null ) {

  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;

  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );

  if ($query->max_num_pages > 1) :
    ?>
  <ul class="pagination">
    <?php
    foreach ( $paginate as $page ) {
      echo '<li>' . $page . '</li>';
    }
    ?>
  </ul>
  <?php
  endif;
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function calc_pos($val) {
  if($val == "Derecha") {
    return "pull-right";
  } else {
    return "pull-left";
  }
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
      'page_title'  => 'Opciones Metatrap',
      'menu_title'  => 'Opciones Metatrap',
      'menu_slug'   => 'opciones-metatrap',
      'capability'  => 'edit_posts',
      'redirect'  => false
    ));
    


  
  }






function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


add_image_size( 'thu', 300, 300, true ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

require '/var/www/vendor/autoload.php';
use Google\Cloud\Speech\SpeechClient;

# Instantiates a client
$speech = new SpeechClient([
// 'projectId' => $projectId,
'keyFilePath' => '/var/www/html/wp-content/themes/labstrap/key.json'

]);

global $target_dir;
$target_dir = get_template_directory() . "/";


function ifes(){

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "mp3" && $imageFileType != "ogg" && $imageFileType != "wav" ) {
    echo "Sorry, only mp3, ogg, & wav files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  
}


