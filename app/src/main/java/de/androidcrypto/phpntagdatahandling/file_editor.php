<!DOCTYPE html><html>
<?php

// is working but the file content is shown below, but after Send the Contents textarea will be saved

#Customise this with your nick and (SHA1) hashed pass. I've left my writer's
$nick = "@Aera23's area";
$pass = "7110eda4d09e062aa5e4a390b0a572ac0d2c0220"; // "1234" = 7110eda4d09e062aa5e4a390b0a572ac0d2c0220
//  http://www.sha1-online.com/

#Advanced chunk prepares background and foreground colours
$hex=['0','2','4','6','8','a','c','e','f'];
$ca=rand(1,4);$cb=rand(1,4);$cc=rand(1,4);
$ba=rand(5,8);$bb=rand(5,8);$bc=rand(5,8);
#$total = ($ca + $cb + $cc) - ($ba + $bb + $bc);
$bg = '#'.$hex[$ba].$hex[$bb].$hex[$bc];$fg = '#'.$hex[$ca].$hex[$cb].$hex[$cc];


#Send login. You can change the SHA1 hash function.
if(sha1($_POST['pass'])!=$pass){
echo "<style>input{padding:0.1em; font-size:1.1em}body{background:$bg; color:$fg; font-family:corbel;font-size:1.4vw;padding:0.4em}a{color:$fg}</style><body><h2>$nick<mark>:)</mark></h2>
".'
<form action="file_editor.php" method="post">
Code: <input type="password" name="pass" value="4" autofocus>
<input type="hidden" name="f" value="'.$_GET['f'].'"><br><br>';
if($_POST['pass']!=""){echo 'Incorrect code.';}
echo '</form>';}

else{
#The writing part
if($_REQUEST['f']!="" && $_POST['data']!="")
{$file = $_POST['f'];$data = $_POST['data'];
if($data == 'clear'){$data = "";}
$w = fopen($file, "w");fwrite($w, $data); fclose($w);$t = "Done";}
else{$t = "File writer";}

echo '<style>body{background:'.$bg.'; color:'.$fg.'; font-family:calibri;font-size:1.2vw;padding:0.2em}mark,input,textarea{background:#cff}
a{background:#fff; color:'.$bg.'}
mark,code{color:inherit}
pre{white-space:pre-wrap; /* CSS 2.1+ */ white-space:-moz-pre-wrap;  /* Mozilla, since 1999 */}
input{padding:0.1em; font-size:1.1em}
</style><title>'.$nick.'</title>
<form id="w" action="file_editor.php?f='.$_POST["f"].'" method="post" accept-charset="UTF-8">
<input type="text" class="int" name="f" size="15" placeholder="File name" value="'.$_POST["f"].'"><br><br>';

$fs = filesize($_REQUEST['f']);
echo'<textarea form="w" id="html" class="int" name="data" width="200%" rows="20" cols="150" placeholder="Contents"></textarea><br>
<input type="hidden" name="pass" value="'.$_POST['pass'].'"><br>
<input type="submit" class="int" value="Send" accesskey="s"><br>';

#Outputs an image of the filesize. You can remove it if you don't have GD extension
$im=imagecreatetruecolor(200, 22);$bg=imagecolorallocate($im, 0, 60, 0);
$fg=imagecolorallocate($im, rand(128,255), rand(128,255), rand(128,255));
imagefill($im, 0, 0, $bg);imagestring($im, 4, 5, 5, $_REQUEST['f'].'; '.$fs.' bytes', $fg);
echo '<a href="'.$_REQUEST['f'].'"><img width="200" height="22" src="data:image/png;base64,';
ob_start();imagepng($im);imagedestroy($im);echo base64_encode(ob_get_clean()).'" alt="'.$fs.'"></a>
<br><br></form><pre style="background:#fff" id="aa">';

if($_REQUEST['f']!="")
{$source = show_source($_REQUEST['f'], true);
$source = str_replace("<br />","",$source);
$source = str_replace("&lt;","<mark>&lt;</mark>",$source);
$source = str_replace("&gt;","<mark>&gt;</mark>",$source);
echo $source;}

echo'</pre>';}
?>
</html>