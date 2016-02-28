<?php
$isview = false;
$qq = $_POST["qq"];
if(isset($qq)){
	$isview = true; 
}else{
	$isview = false;
}
if($isview){
	$dst_path = 'background.png';
	$src_path = "http://q2.qlogo.cn/headimg_dl?bs=qq&dst_uin=" . $qq . "&spec=100";
	$dst = imagecreatefromstring(file_get_contents($dst_path));
	$src = imagecreatefromstring(file_get_contents($src_path));
	list($src_w, $src_h) = getimagesize($src_path);
	imagecopymerge($dst, $src, 200, 39, 0, 0, $src_w, $src_h, 100);
	$thumb = imagecreatetruecolor(120, 80);
	ImageCopyResized($thumb, $dst, 0, 0, 0, 0, 120, 80, 343, 229);
	list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
	header('Content-Type: image/png');
	imagepng($thumb);
	imagedestroy($dst);
	imagedestroy($src);
	imagedestroy($thumb);
}else{
	echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="pragma" content="no-cache" /> 
<meta http-equiv="cache-control" content="no-cache" /> 
<meta http-equiv="expires" content="0" /> 
<title>Nyamoe丢锅图生成器 Beta v1.0</title> 
<!--[if lt IE 6]> 
<style type="text/css"> 
.z3_ie_fix{ 
float:left; 
} 
</style> 
<![endif]--> 
<style type="text/css"> 
<!-- 
body{ 
background:none; 
} 
.passport{ 
border:1px solid red; 
background-color:#FFFFCC; 
width:400px; 
height:100px; 
position:absolute; 
left:49.9%; 
top:49.9%; 
margin-left:-200px; 
margin-top:-55px; 
font-size:14px; 
text-align:center; 
line-height:30px; 
color:#746A6A; 
} 
--> 
</style> 
<div class="passport"> 
<div style="padding-top:20px;"> 
<form method="post" style="margin:0px;">背锅的QQ 
<input type="text" name="qq" /> <input type="submit" value="丢锅！" /> 
</form> 
处理速度较慢，耐心等待。
</div> 
</div> 
</body> 
</html>  ';
} 
?>
