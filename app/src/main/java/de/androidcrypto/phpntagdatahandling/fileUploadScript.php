<?php
    // source: https://blog.filestack.com/thoughts-and-knowledge/php-file-upload/
    //$currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    $currentDirectory = dirname(__FILE__);
    $fullUploadDirectory = $currentDirectory . $uploadDirectory;

    if (!file_exists($fullUploadDirectory)) {
        mkdir($fullUploadDirectory, 0777, true);
    }

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['md','jpeg','jpg','png']; // These will be the only file extensions allowed

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
    // uploadPath: /users/fluttercrypto/www/apps/ntag/uploads/test3.md
    echo 'uploadPath: ' . $uploadPath . "\n";
    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        echo 'didUpload: ' . $didUpload . "\n";
        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }
    }
?>
