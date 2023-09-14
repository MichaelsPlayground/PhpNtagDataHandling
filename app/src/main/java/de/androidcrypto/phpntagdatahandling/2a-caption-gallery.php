<!DOCTYPE html>
<html>
  <head>
    <title>Very Simple PHP gallery</title>
    <meta charset="utf-8">

    <!-- (A) CSS & JS -->
    <link href="2b-caption-gallery.css" rel="stylesheet">
    <script src="1c-gallery.js"></script>
  </head>
  <body>
    <div class="gallery"><?php
      // https://gist.github.com/code-boxx/45a0c839ba499c4eacf01e008acd20cd
      // https://code-boxx.com/simple-php-gallery-from-folder/
      // (B) GET IMAGES IN GALLERY FOLDER
      $uploadDirectory = 'images/'; // ATTENTION: directoryname without trailing /
      $subDirectoryName = 'folder1';
      $dir = __DIR__ . DIRECTORY_SEPARATOR . $uploadDirectory . $subDirectoryName . DIRECTORY_SEPARATOR;
      $imageDir = $uploadDirectory . $subDirectoryName . DIRECTORY_SEPARATOR;

      //$dir = __DIR__ . DIRECTORY_SEPARATOR . "gallery" . DIRECTORY_SEPARATOR;
      $images = glob("$dir*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);

      // (C) OUTPUT IMAGES
      foreach ($images as $i) {
        $img = basename($i);
        $caption = substr($img, 0, strrpos($img, "."));
        printf("<figure><img src=" . $imageDir ."%s><figcaption>%s</figcaption></figure>",
        rawurlencode($img), $caption
        /*                                                       );
        printf("<figure><img src='gallery/%s'><figcaption>%s</figcaption></figure>",
          rawurlencode($img), $caption
          */
        );
      }
    ?></div>
  </body>
</html>