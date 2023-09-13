<?php
// NOT WORKING
$currentDirectory = dirname(__FILE__);
$uploadDirectory = "/uploads/";
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
echo 'fullUploadDirectory: ' . $fullUploadDirectory ."<br />";

if(isset($_POST['create_file']))
{
 $file_name=$_POST['file_name'];
 $folder= $fullUploadDirectory;
 //$ext=".txt";
 //$file_name=$folder."".$file_name."".$ext;
 $file_name=$folder."".$file_name;
 $create_file = fopen($file_name, 'w');
 fclose($create_file);
}

if(isset($_POST['edit_file']))
{
 $file_name=$_POST['file_name'];
 $write_text=$_POST['edit_text'];
 //$folder="files/";
 $folder= $fullUploadDirectory;
 //$ext=".txt";
 //$file_name=$folder."".$file_name."".$ext;
 $file_name=$folder."".$file_name;
 echo 'file_name: ' . $file_name ."<br />";
 $edit_file = fopen($file_name, 'w');

 fwrite($edit_file, $write_text);
 fclose($edit_file);
}

if(isset($_POST['delete_file']))
{
 $file_name=$_POST['file_name'];
 //$folder="files/";
 $folder= $fullUploadDirectory;
 //$ext=".txt";
 //$file_name=$folder."".$file_name."".$ext;
 $file_name=$folder."".$file_name;
 unlink($file_name);
}
?>