<?php

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
$fName = "test4.md";
$fileName = $fullUploadDirectory . $fName;
echo "fileName: " . $fileName ."<br />";
// https://www.youtube.com/watch?v=1vS2KXf0Esc
if (file_exists($fileName)) {
  $file = $fileName;
  $current = file_get_contents($file);
  echo "current: " . $current . "###" . "<br />";
} else {
  $myFile = fopen($fileName, "w");
  $current = "";
  header("Refresh:0");
}

?>
<form action="file_editor2_process.php" method="post">
  <textarea rows="20" cols="50" name="comment" value = "">
  <?php // output text captured in line 5
  echo $current;
  ?>
  </textarea>
  <input type="submit">
</form>