<?php

// important: use "abc" instead of 'abc', otherwise linebreak won't work !

function checkFileExists($subfolder, $fn) {
  $currentDirectory = dirname(__FILE__);
  $fullUploadPath = $currentDirectory . $subfolder . $fn;
  if (file_exists($fullUploadPath)) {
    echo "The file " . basename($fileName) . " is existing in " . $subfolder ."<br />";
  } else {
    echo "The file " . basename($fileName) . " is NOT existing in " . $subfolder ."<br />";
  }
}


$currentDirectory = dirname(__FILE__);
$uploadDirectory = "/uploads/";
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
echo 'fullUploadDirectory: ' . $fullUploadDirectory ."<br />";

$fileName = 'test.md';
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
echo 'uploadPath: ' . $uploadPath ."<br />";

if (file_exists($uploadPath)) {
  echo "The file " . basename($fileName) . " is existing in " . $uploadDirectory ."<br />";
} else {
  echo "The file " . basename($fileName) . " is NOT existing in " . $uploadDirectory ."<br />";
}

$fileName = 'test3.md';
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
echo 'uploadPath: ' . $uploadPath ."<br />";

if (file_exists($uploadPath)) {
  echo "The file " . basename($fileName) . " is existing" ."<br />";
} else {
  echo "The file " . basename($fileName) . " is NOT existing" ."<br />";
}

$fileName = 'test2.md';
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
echo 'uploadPath: ' . $uploadPath ."<br />";

if (file_exists($uploadPath)) {
  echo "The file " . basename($fileName) . " is existing" ."<br />";
} else {
  echo "The file " . basename($fileName) . " is NOT existing" ."<br />";
}

$fileName = 'test4.md';
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
echo 'uploadPath: ' . $uploadPath ."<br />";

if (file_exists($uploadPath)) {
  echo "The file " . basename($fileName) . " is existing" ."<br />";
} else {
  echo "The file " . basename($fileName) . " is NOT existing" ."<br />";
}

checkFileExists("/uploads/", "image-1.jpg");
checkFileExists("/images/", "image-1.jpg");
