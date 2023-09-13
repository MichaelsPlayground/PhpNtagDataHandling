<?php
session_start(); // start up your PHP session!

// was this file called by select_file4.php ?
// then the post contains the fileName
$option = isset($_POST['s1']) ? $_POST['s1'] : false;
if ($option) {
  $fName = $_POST['s1'];
  $_SESSION['filename'] = $fName; // store session data
  //echo htmlentities($_POST['s1'], ENT_QUOTES, "UTF-8");
} else {
  if(isset($_SESSION['filename'])) {
    // read stored session
    //echo "read stored session" . "<br />";
    $fName = $_SESSION['filename'];
    //echo "fName: " . $fName . "<br />";
  } else {
    echo "You need to call this code from select_file5.php, aborted";
    exit;
  }
}

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
$fileName = $fullUploadDirectory . $fName;

echo "fileName: " . $fileName ."<br />";
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
<form action="file_editor5_process.php" method="post">
  <input type="hidden" name="filename" value="<?php echo $fileName ?>">
  <textarea rows="20" cols="50" name="comment"><?php echo htmlspecialchars($current);?></textarea>
  <button type="submit">speichern</button><br /><br />
  <button type="submit" formaction="select_file5.php">select file</button>
</form>