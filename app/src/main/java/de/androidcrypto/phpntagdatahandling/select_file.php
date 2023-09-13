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