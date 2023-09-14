<?php

$option = isset($_POST['directory']) ? $_POST['directory'] : false;
if ($option) {
  $subDirectoryName = $_POST['directory'];
} else {
  echo "You need to select a directory for upload, aborted";
  exit;
}

$returnUrl = 'http://fluttercrypto.bplaced.net/apps/ntag/imageupload3.php';

// source: https://blog.filestack.com/thoughts-and-knowledge/php-file-upload/
$uploadDirectory = '/images/';
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory . $subDirectoryName . '/';

if (!file_exists($fullUploadDirectory)) {
  // this  should not happen as we selected an existing directory
  mkdir($fullUploadDirectory, 0755, true);
}

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $fullUploadDirectory . basename($fileName);
    echo 'uploadPath: ' . $uploadPath ."<br />";
    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded" ."<br />";
          echo "<a href=" . $returnUrl . ">Return to image upload</a>" ."<br />";
          //echo "<a href='http://fluttercrypto.bplaced.net/apps/ntag/imageupload2.php'>Return to image upload</a>" ."<br />";
        } else {
          echo "An error occurred. Please contact the administrator." . "<br />";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" ."<br />";
        }
      }

    }
?>
