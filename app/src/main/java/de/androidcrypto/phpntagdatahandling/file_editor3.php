<?php

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
$fName = "test2.md";
$fileName = $fullUploadDirectory . $fName;
echo "fileName: " . $fileName ."<br />";
// https://www.youtube.com/watch?v=1vS2KXf0Esc
if (file_exists($fileName)) {
  $file = $fileName;
  $current = file_get_contents($file);
  $current = str_replace(chr(0), "", $current);
  echo "current: ##" . $current . "###" . "<br />";
} else {
  $myFile = fopen($fileName, "w");
  $current = "";
  header("Refresh:0");
}

?>
<form action="file_editor3_process.php" method="post">
  <input type="hidden" name="filename" value="<?php echo $fileName ?>">
  <textarea rows="20" cols="50" name="comment"><?php echo htmlspecialchars($current);?></textarea>
  <input type="submit">
</form>