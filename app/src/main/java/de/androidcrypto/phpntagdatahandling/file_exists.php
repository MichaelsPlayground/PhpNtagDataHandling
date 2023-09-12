<?php

// important: use "abc" instead of 'abc', otherwise linebreak won't work !

$currentDirectory = dirname(__FILE__);
$uploadDirectory = "/uploads/";
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
echo 'fullUploadDirectory: ' . $fullUploadDirectory ."<br />";

$fileName = 'test.md';
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
echo 'uploadPath: ' . $uploadPath ."<br />";

if (file_exists($uploadPath)) {
  echo "The file " . basename($fileName) . " is existing" ."<br />";
} else {
  echo "The file " . basename($fileName) . " is NOT existing" ."<br />";
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