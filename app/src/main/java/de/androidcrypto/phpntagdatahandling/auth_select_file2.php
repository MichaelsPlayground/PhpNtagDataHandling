<?php require_once(dirname(__FILE__) . '/auth3.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Selection</title>
</head>
<body>
<form action="" method="post" class="text-center form-inline">
<select name="s1">
      <option value="" selected="selected">-----</option>
    <?php
       $folder = '/uploads/';
       foreach(glob(dirname(__FILE__) . $folder . '/*') as $filename){
       $filename = basename($filename);
       echo "<option value='" . $filename . "'>".$filename."</option>";
    }
    ?>
</select>
<button type="submit" class="btn btn-primary btn-block" name="submit">Display Contents</button>
</form>
</body>
</html>