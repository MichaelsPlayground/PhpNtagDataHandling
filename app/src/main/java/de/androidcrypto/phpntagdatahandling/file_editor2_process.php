<?php
// https://www.youtube.com/watch?v=1vS2KXf0Esc
// capture comment from form using POST

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
$fName = "test4.md";
$fileName = $fullUploadDirectory . $fName;$uploadDirectory = "/uploads/";

//$location = "http://fluttercrypto.bplaced.net/apps/ntag/file_editor2.php";
$location = "Location: file_editor2.php";

$comment = $_POST["comment"];
// get the file
$file = $fileName;
// write the new text
file_put_contents($file, $comment);
// send user back to index page to view changes
//echo 'comment: ' . $comment ."###" . "<br />";
header($location);
?>