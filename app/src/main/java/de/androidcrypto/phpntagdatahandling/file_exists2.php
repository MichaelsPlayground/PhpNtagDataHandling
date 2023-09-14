<?php

// important: use "abc" instead of 'abc', otherwise linebreak won't work !

function checkFileExists($subfolder, $fn) {
  $currentDirectory = dirname(__FILE__);
  $fullUploadPath = $currentDirectory . $subfolder . $fn;
  if (file_exists($fullUploadPath)) {
    echo "The file " . basename($fn) . " is existing in " . $subfolder ."<br />";
  } else {
    echo "The file " . basename($fn) . " is NOT existing in " . $subfolder ."<br />";
  }
}

checkFileExists("/uploads/", "test.md");
checkFileExists("/uploads/", "test2.md");
checkFileExists("/uploads/", "test3.md");
checkFileExists("/uploads/", "test4.md");
checkFileExists("/uploads/", "test5.md");

checkFileExists("/uploads/", "image-1.jpg");
checkFileExists("/images/", "image-1.jpg");
