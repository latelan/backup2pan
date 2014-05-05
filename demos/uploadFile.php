<?php
#ini_set("error_reporting","E_ALL & ~E_NOTICE"); 

require_once '../libs/BaiduPCS.class.php';
//请根据实际情况更新$access_token与$appName参数
$access_token = '26.5c7e7b60295043d75b9e8b60b5acf68f.2592000.1401812629.1377041433-1869753';
//应用目录名
$appName = 'vpsbk';
//应用根目录
$root_dir = '/apps' . '/' . $appName . '/';

echo $root_dir;
//上传文件的目标保存路径，此处表示保存到应用根目录下
$targetPath = $root_dir;
//要上传的本地文件路径
$file = dirname(__FILE__) . '/' . 'yun.jpg';
//文件名称
$fileName = basename($file);
//新文件名，为空表示使用原有文件名
$newFileName = '';

$pcs = new BaiduPCS($access_token);

if (!file_exists($file)) {
	exit('文件不存在，请检查路径是否正确');
} else {
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);

	$result = $pcs->upload($fileContent, $targetPath, $fileName, $newFileName);
	fclose($handle);
	echo "yes";
	echo $result;
}
?>
