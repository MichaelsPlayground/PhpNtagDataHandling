<?php

$uploadDirectory = "/uploads/";
$currentDirectory = dirname(__FILE__);
$fullUploadDirectory = $currentDirectory . $uploadDirectory;
if (!file_exists($fullUploadDirectory)) {
  mkdir($fullUploadDirectory, 0777, true);
}

    // configuration
    $url = 'http://fluttercrypto.bplaced.net/apps/ntag/simplest_file_editor.php';
    $yourfilePath = $fullUploadDirectory . 'test2.md';

    // check if form has been submitted
    if (isset($_POST['text'])){
        // save the text contents
        file_put_contents($yourfilePath, $_POST['text']);

        // redirect to form again
        header(sprintf('Location: %s', $url));
        printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
        exit();
    }

    // read the textfile
    $text = file_get_contents($yourfilePath);

?>
<!-- HTML form -->
<form action="" method="post">
    <textarea name="text"><?php echo htmlspecialchars($text) ?></textarea>
    <input type="submit" />
    <input type="reset" />
</form>