<?php require_once(dirname(__FILE__) . '/auth2.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Menu</title>
</head>
<body>

<h2>This is the Main Menu for Storage Management System</h2>

<nav>
  <ul>
    <li><strong>Home</strong></li>
    <li><a href="#">Navigation</a></li>
    <li><a href="#">Menu</a></li>
    <li><a href="1a-gallery.php">Images gallery</a></li>
    <li><a href="2a-caption-gallery.php">Images gallery with caption</a></li>
    <li><a href="select_file5.php">edit a document file</a></li>
    <li><a href="fileupload2.html">upload a document file</a></li>
    <li><a href="imageupload3.php">upload an image file</a></li>
    <li><a href="create_images_subdirectory.php">create an images subdirectory</a></li>
    <li><a href="generate_password_hash.php">Generate a new passphrase hash</a></li>
    <li><a href="zip_download.php">download zipped documents (immediately)</a></li>
    <li><a href="main_menu.php?logout=1"><h3>logout</h3></a></li>
  </ul>
</nav>

</body>
</html>