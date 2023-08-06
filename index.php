<?php
define('ECM_THEME_DIR','themes');
define('ECM_THEME_FILE','theme.html');
define('ECM_NAME','RedeHacker.com Mini Chat v0.1');
define('ECM_WELCOME','Seja bem-vindo!');

if($_POST['name'] && $_POST['msg']){
	$fp = fopen('data.txt','r');
	$fr = fread($fp,filesize('data.txt')+1);
	fwrite(fopen('data.txt','w'),htmlentities($_POST['name']).'<'.htmlentities($_POST['msg']) .'>'.$fr);
}
$deft = ECM_THEME_DIR . '/ecm/' . ECM_THEME_FILE;
if($_GET['style']){
	$file = ECM_THEME_DIR . '\\' . $_GET['style'] . '\\' . ECM_THEME_FILE;
	if(file_exists($file)){
		$ft = fread(fopen($file,'r'),filesize($file)+1);
	}else{
		$file = $deft;
		$ft = fread(fopen($file,'r'),filesize($file)+1);
	}
}
if(!$file){
	$file = $deft;
}
if(!$ft){
	$ft = fread(fopen($file,'r'),filesize($file));
}
if($_POST['name'])
	$ft = str_replace('NICK_NAME',$_POST['name'],$ft);
else
	$ft = str_replace('NICK_NAME','',$ft);

$ft = str_replace('ECM_WELCOME',ECM_WELCOME,$ft);
echo $ft;