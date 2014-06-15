<?php

require_once '../libs/BaiduPCS.class.php';
//请根据实际情况更新$access_token与$appName参数
$access_token = '26.ea657a9f947381620ba1e902022664c3.2592000.1405430890.1377041433-1869753';
//应用目录名
$appName = 'vpsbk';
//应用根目录
$root_dir = '/apps' . '/' . $appName .'/';

$file =  $argv[1];
//文件名称
$fileName = basename($file);
//新文件名，为空表示使用原有文件名
$newFileName = '';
$filepath = dirname($file);
$host = "ubuntu1204";
$targetPath = $root_dir."/$host/$filepath/";

$pcs = new BaiduPCS($access_token);

if (!file_exists($file)) {
	exit('文件不存在，请检查路径是否正确');
} else {
	$pcs->makeDirectory($targetPath);
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);
	
	$result = $pcs->upload($fileContent, $targetPath, $fileName, $newFileName);
	fclose($handle);
	
	echo $result;
}
?>
