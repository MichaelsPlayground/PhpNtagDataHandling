<?php
    if(isset($_POST['submit'])){
        echo 'Hello World' . "<br />";
        echo 'passphrase: ' . $_POST['passphrase'] . "<br />";
        echo password_hash($_POST['passphrase'], PASSWORD_DEFAULT) . "<br />";
    }
?>

<html>
     <body>
         <form method="post">
             <input type="text" name="passphrase">
             <input type="submit" name="submit" value="click">
         </form>
     </body>
</html>