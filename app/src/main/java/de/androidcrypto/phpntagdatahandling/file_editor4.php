<?php

// was this file called by file_editor4_process.php ?
// then the header contains the fileName
$headers = headers_list();
    foreach ( $headers as $header )
        {
        echo "<li>$header</li>";
        }

// was this file called by select_file4.php ?
// then the post contains the fileName
$option = isset($_POST['s1']) ? $_POST['s1'] : false;
   if ($option) {
      $fName = $_POST['s1'];
      //echo htmlentities($_POST['s1'], ENT_QUOTES, "UTF-8");
   } else {
     echo "s1 is required";
     exit;
   }

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
//$fName = "test2.md";
$fileName = $fullUploadDirectory . $fName;

//echo "fileName: " . $fileName ."<br />";
// https://www.youtube.com/watch?v=1vS2KXf0Esc
if (file_exists($fileName)) {
  $file = $fileName;
  $current = file_get_contents($file);
  $current = str_replace(chr(0), "", $current);
  //echo "current: ##" . $current . "###" . "<br />";
} else {
  $myFile = fopen($fileName, "w");
  $current = "";
  header("Refresh:0");
}

?>
<form action="file_editor4_process.php" method="post">
  <input type="hidden" name="filename" value="<?php echo $fileName ?>">
  <textarea rows="20" cols="50" name="comment"><?php echo htmlspecialchars($current);?></textarea>
  <input type="submit">
</form>