<?php
// source: https://stackoverflow.com/questions/8889025/unzip-a-file-with-php
// assuming file.zip is in the same directory as the executing script.
//$file = 'SleekDB-master_2023-09-28.zip';
$file = 'db.zip';

// get the absolute path to $file
$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
  // extract it to the path we determined above
  $zip->extractTo($path);
  $zip->close();
  echo "WOOT! $file extracted to $path";
} else {
  echo "Doh! I couldn't open $file";
}