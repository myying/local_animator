<!-- Web picture animator  - Yue Ying 2016
animate picture sequence loated i in /path/to/dir by visiting
host_url/animator.php?dir=./path/to/dir
-->

<html>

<body onkeydown='javascript:shortcut(event)'>
<?php
$dir=$_GET["dir"];
if ($dh = opendir($dir)){
  while (($file = readdir($dh)) !== false){
    if($file=="." || $file==".."){
      continue;
    } else{
      $filelist[]=$file;
    }
  }
}
closedir($dh);
sort($filelist);
echo "<h3><button onclick='javascript:shortcut1(-1)'>left</button>/<button onclick='javascript:shortcut1(1)'>right</button> to navigate</h3>";
echo "<p id='imagecap'></p>";
echo "<img style='width:100%;' name=animation src='' alt='' />";
?>
</body>
</html>

<script type='text/javascript'>
dir='<?php echo $dir; ?>';
imagelist=new Array();
n='<?php echo count($filelist); ?>';
imagelist='<?php echo join(',',$filelist); ?>'.split(',');
//load all images
images=new Array();
for(var j=0; j<n; j++){
  images[j]=new Image();
  images[j].src=dir+'/'+imagelist[j];
}
//initial image shown
i=0;
document.animation.src=images[i].src;
document.getElementById("imagecap").innerHTML=imagelist[i];
//shortcuts to advance forward backward
function shortcut(event) {
  key=event.keyCode;
  if(key==37) {
    if(i>0){ i--;}
    else{ i=n-1;}
  }
  if(key==39) {
    if(i<n-1){ i++;}
    else{ i=0;}
  }
  document.animation.src=images[i].src;
  document.getElementById("imagecap").innerHTML=imagelist[i];
}
function shortcut1(key) {
  if(key==-1) {
    if(i>0){ i--;}
    else{ i=n-1;}
  }
  if(key==1) {
    if(i<n-1){ i++;}
    else{ i=0;}
  }
  document.animation.src=images[i].src;
  document.getElementById("imagecap").innerHTML=imagelist[i];
}
</script>
