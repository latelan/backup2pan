<?php

require_once '../libs/BaiduPCS.class.php';
require_once './common.inc.php';

$file =  $argv[1];
$fileName = basename($file);
$newFileName = '';
$filepath = dirname($file);
$remotePath = $ROOT_DIR."/$filepath/";

$pcs = new BaiduPCS(ACCESS_TOKEN);

if (!file_exists($file)) {
	exit('File not found.');
} else {
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);
	
	$result = $pcs->upload($fileContent, $remotePath, $fileName, $newFileName);
	fclose($handle);
	
	echo $result;
}
?>
