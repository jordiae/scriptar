<?php get_header(); ?>
<?php

/*@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );*/

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filer = basename($_FILES["fileToUpload"]["name"]);
$filer2 = substr($filer, 0, -4);
$filernou = $filer2 . ".flac";
$fila = "http://146.185.138.154/wp-content/themes/labstrap/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$ruta = '/var/www/html/wp-content/themes/labstrap/';

$options = [
    'encoding' => 'FLAC',
    'sampleRate' => 16000,
    'languageCode' => 'en-US'];
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="cap">
<div class="container">
 
        <h2 class="text-center"><?php the_title(); ?></h2>

</div>
</div>


<div class="container ini">

<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
}

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 20000000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "mp3" && $imageFileType != "ogg" && $imageFileType != "wav" ) {
//     echo "Sorry, only mp3, ogg, & wav files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
// }

$array_output = array();
exec('ffprobe -v error -show_entries format=duration \-of default=noprint_wrappers=1:nokey=1 ' . $ruta . $filer,$array_output);
exec('echo'); // NECESSARY (LOL)
echo $array_output[0];
if (intval($array_output[0])>120) {
    echo 'Should you wish to upload an audio file longer than 2 minutes, please contact sales :)\n';
}
else {
    //ffmpeg -i somefile.mp3 -f segment -segment_time 3 -c copy out%03d.mp3
    //echo('ffmpeg -i '. $ruta . $filer .' -f segment -segment_time 7 -c copy ' . $filer . '%03d.mp3');
    exec('ffmpeg -i '. $ruta . $filer .' -f segment -segment_time 7 -c copy ' . $ruta . $filer . '%03d.mp3');

    //exec('rm' . $ruta . $filer);

    $files = array();
    foreach (glob($ruta . $filer . '*') as $filename) {
        exec('ffmpeg -i '. $filename .' -acodec flac -ar 16000  -ac 1 ' . $filename . '.flac');
        $results = $speech->recognize(fopen($filename . '.flac', 'r'), $options);
        var_dump($results);
       // exec('rm' . $filename . ' ' . $filename . '.flac');
    }
    //exec('rm' . $ruta . $filer . '*');
}
 ?>

</div>




<?php endwhile; ?>


<?php /*endwhile*/; wp_reset_query(); ?>


<?php get_footer(); ?>
