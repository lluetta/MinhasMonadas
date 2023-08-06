<?php
@header ("Expires: Fri, 03 Mar 2980 20:53:00 GMT");
@header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header ("Cache-Control: no-cache, must-revalidate");
@header ("Pragma: no-cache"); 

if($_GET['open'] == 1){
	$fp = fopen('data.txt','r');
	$fr = fread($fp,filesize('data.txt')+1);
	$fr = explode('>',$fr);
	for($i=0;$i<10;$i++){
		list($name,$msg) = explode('<',$fr[$i]);
		echo "<B>$name</B>: $msg<br>";
	}
}