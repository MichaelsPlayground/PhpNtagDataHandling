<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload</title>
</head>
<body>
<form action="image_upload_script3.php" method="post" enctype="multipart/form-data">
    Upload an Image - select directory:
    <select name="directory">
        <option value="" selected="selected">-----</option>
        <?php
          $folder = '/images/';
          foreach(glob(dirname(__FILE__) . $folder . '/*', GLOB_ONLYDIR) as $filename){
          //foreach(glob(dirname(__FILE__) . $folder . '/*') as $filename){
            $filename = basename($filename);
            echo "<option value='" . $filename . "'>".$filename."</option>";
          }
        ?>
    </select>
    <br><br>
    <input type="file" name="the_file" id="fileToUpload">
    <br><br>
    <input type="submit" name="submit" value="Start Upload">
    <br><br>
    if the target directory does not exist...
    <button type="submit" formaction="create_images_subdirectory.php">Create a directory</button>
</form>
</body>
</html>