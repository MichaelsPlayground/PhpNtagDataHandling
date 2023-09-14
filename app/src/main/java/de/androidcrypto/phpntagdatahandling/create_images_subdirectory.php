<!DOCTYPE html>
<?php
  function createDirectory() {
    $returnUrl = 'http://fluttercrypto.bplaced.net/apps/ntag/main_menu.php';
    $add = $_POST["add"];
    // get the complete path name
    $uploadDirectory = '/images/';
    $currentDirectory = dirname(__FILE__);
    $fullUploadDirectory = $currentDirectory . $uploadDirectory . $subDirectoryName . '/';
    $fullPath = $fullUploadDirectory . $add;
    // check that the directory is not existing
    if(is_dir($fullPath) === true) {
     echo "The directory " . basename($add) . " is already existing" ."<br />";
     echo "<a href=" . $returnUrl . ">Return to Main Menu</a>" ."<br />";
    } else {
      $result = mkdir($fullPath, 0755);
      if ($result === true) {
        echo "The directory " . basename($add) . " was created" ."<br />";
        echo "<a href=" . $returnUrl . ">Return to Main Menu</a>" ."<br />";
      } else {
        echo "The directory " . basename($add) . " was NOT created" ."<br />";
        echo "<a href=" . $returnUrl . ">Return to Main Menu</a>" ."<br />";
      }
    }
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an images subdirectory</title>
</head>
<body>

<?php
  if (!isset($_POST['submit'])) {
?>

<form action = "" method = "post">
  <table>
    <tr>
      <td style = " border-style: none;"></td>
      <td bgcolor = "lightgreen" style = "font-weight: bold">
        Enter the new directory name and then press 'Create Directory':
      </td>
      <td bgcolor = "lightred">
        <input type = "text" style = "width: 220px;"
        class = "form-control" name = "add" id = "add" />
      </td>
      <td bgcolor = "lightgreen" colspan = "2">
        <input type = "submit" name = "submit" value = "Create directory" />
      </td>
    </tr>
  </table>
</form>
<?php
  } else {
    createDirectory();
  }
  ?>
  </body>
</html>