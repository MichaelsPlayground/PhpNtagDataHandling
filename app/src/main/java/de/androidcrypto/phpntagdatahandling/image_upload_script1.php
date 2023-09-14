<?php
    // source: https://blog.filestack.com/thoughts-and-knowledge/php-file-upload/
    //$currentDirectory = getcwd();
    $uploadDirectory = "/images/";

    $currentDirectory = dirname(__FILE__);
    $fullUploadDirectory = $currentDirectory . $uploadDirectory;

    if (!file_exists($fullUploadDirectory)) {
        mkdir($fullUploadDirectory, 0755, true);
    }

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
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
