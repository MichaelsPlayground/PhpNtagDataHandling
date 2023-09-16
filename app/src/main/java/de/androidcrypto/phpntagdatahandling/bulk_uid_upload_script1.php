<?php

// return true if conversion was successful without any other errors on failure
function hex2binary($str)
{
    return ctype_xdigit(strlen($str) % 2 ? "" : $str) ? hex2bin($str) : false;
}

    $uploadDirectory = "/temp/";
    $currentDirectory = dirname(__FILE__);
    $fullUploadDirectory = $currentDirectory . $uploadDirectory;

    if (!file_exists($fullUploadDirectory)) {
        mkdir($fullUploadDirectory, 0777, true);
    }

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['dat']; // These will be the only file extensions allowed

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
    echo 'uploadPath: ' . $uploadPath . "<br />";
    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file" . "<br />";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)" . "<br />";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        echo 'didUpload: ' . $didUpload . "<br />";
        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded" . "<br />";
        } else {
          echo "An error occurred. Please contact the administrator." . "<br />";
          die();
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "<br />";
          die();
        }
      }
      // at this point the file was uploaded, now read the data and do the necessary steps
      // the bulk file should be a list of tag UIDs, separated by a new line character
      echo '' . "<br />";
      echo '===== Bulk import of tag UIDs =====' . "<br />";
      echo 'uploaded file: ' . $uploadPath . "<br />";
      $lines = file($uploadPath, FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
      $count = 0;
      foreach($lines as $line) {
          $count += 1;
          echo str_pad($count, 3, 0, STR_PAD_LEFT).". ".$line . "<br />";
          // a tagUID is 7 bytes = 14 hex encoded characters long, so proceed on data only when exact 14 chars long
          if (strlen($line) === 14) {
            // try to convert to a binary value, just for checking that the data is a hex encoded byte array
            //$uidData = hex2bin($line);
            $uidData = hex2binary($line);
            if (strlen($uidData) === 7) {
              //echo 'data is valid' . "<br />";
              // next step is to check if the uid was registered before by checking the regtag directory
              $tagFileExtension = '.md';
              $tagFileRegisterDirectory = "/regtag/";
              $fullTagFilePath = $currentDirectory . $tagFileRegisterDirectory . $line . $tagFileExtension;
              //echo 'fullTagFilePath: ' . $fullTagFilePath . "<br />";
              if (file_exists($fullTagFilePath)) {
                echo 'the tag was registered before' . "<br />";
              } else {
                //echo 'the tag was NOT registered before, now register' . "<br />";
                $myfile = fopen($fullTagFilePath, "w") or die("Unable to create file!");
                $timestamp = date("Y-m-d H:i:s") . "\n" . "bulk";
                fwrite($myfile, $timestamp);
                fclose($myfile);
                echo 'the tagUid ' . $line  . ' is registered now' . "<br />";
              }
            } else {
              echo 'data is INVALID' . "<br />";
            }
          } else {
            echo 'data is INVALID' . "<br />";
          }
      }

      // delete the temp file
      unlink($uploadPath);
      echo 'The uploaded file was deleted after import' . "<br />";
      echo '===== Bulk import of tag UIDs ENDED =====' . "<br />";
    }
?>
