<!DOCTYPE html>

<html>
  <head>
    <title>Very Simple PHP gallery</title>
    <meta charset="utf-8">

    <!-- (A) CSS & JS -->
    <link href="1b-gallery.css" rel="stylesheet">
    <script src="1c-gallery.js"></script>
  </head>
  <body>
    <div class="gallery"><?php
      // source https://gist.github.com/code-boxx/45a0c839ba499c4eacf01e008acd20cd
      // https://code-boxx.com/simple-php-gallery-from-folder/
      // (B) GET IMAGES IN GALLERY FOLDER
      //$dir = __DIR__ . DIRECTORY_SEPARATOR . "gallery" . DIRECTORY_SEPARATOR;
      $uploadDirectory = 'images/'; // ATTENTION: directoryname without trailing /
      $subDirectoryName = 'folder2';
      $dir = __DIR__ . DIRECTORY_SEPARATOR . $uploadDirectory . $subDirectoryName . DIRECTORY_SEPARATOR;
      $imageDir = $uploadDirectory . $subDirectoryName . DIRECTORY_SEPARATOR;

      $images = glob("$dir*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);
      // (C) OUTPUT IMAGES
      foreach ($images as $i) {
        printf("<img src=" . $imageDir ."%s>", rawurlencode(basename($i)));
        //printf("<img src='images/folder1/%s'>", rawurlencode(basename($i)));
        //printf("<img src='%s%s'>", $dir, rawurlencode(basename($i)));
      }
    ?></div>
  </body>
</html>