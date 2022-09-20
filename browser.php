<html>
<body>
<?php
if(isset($_GET["dir"])){
  $dir=$_GET["dir"];
} else {
  $dir=".";
}
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      $filelist[]=$file;
    }
  }
}
closedir($dh);
sort($filelist);
foreach($filelist as $file) {
  if(is_dir("$dir/$file")){
    $color="blue";
    $url="browser.php?dir=$dir/".rawurlencode($file);
    if($file=="."){
      $url="browser.php?dir=$dir";
    }
    if($file==".."){
      $url="browser.php?dir=".dirname($dir);
    }
  } else {
    $color="black";
    $url="$dir/".rawurlencode($file);
  }
  echo "<li><a href='$url' style='text-decoration:none'><font style='font-family:arial;color:$color;font-size:15px;'>$file</font></a></li>";
}
?>
</body>
</html>
