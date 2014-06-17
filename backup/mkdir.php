<?php

require_once '../libs/BaiduPCS.class.php';
require_once './common.inc.php';

$targetPath = $ROOT_DIR."$argv[1]";
echo $targetPath;
$pcs = new BaiduPCS(ACCESS_TOKEN);
$result = $pcs->makeDirectory($targetPath);
echo $result;
