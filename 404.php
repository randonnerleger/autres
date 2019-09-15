<?php
require_once 'configRL.php';
define('PUN_ROOT', folder_forum . '/' );
require_once folder_forum.'/include/common.php';

$request=$_SERVER['REQUEST_URI'];

$thumb = false;
if ((strpos($request, 'thumbs/') !== false)) {

	$request = str_replace("thumbs/", "", $request);
	$thumb = true;

}

require 'forum/uploads/fotoo-import.php';

if(array_key_exists($request,$MovedImg)) {

	$NewImg = $MovedImg[$request];

	if ( $thumb ) {

		$length = -4;
		if ( ($GetExt=substr($MovedImg[$request], -4) == 'jpeg' ))
			$length = -5;

		$NewImg=substr_replace($NewImg, '.s', $length, $length);

	}

	$NewUrl="https://".$_SERVER['HTTP_HOST'].$NewImg;
	header("HTTP/1.0 301 Moved Permanently");
	header("Location: $NewUrl");
	header("Connection: close");
	exit();

} else {

	header("HTTP/1.0 404 Not Found");

}

echo '
<!DOCTYPE html>
<html>
	<head>
		<title>404</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex">
		<link rel="stylesheet" type="text/css" href="' . path_to_forum . 'style/Global/global.css?version=' . current_theme . '" />
		<link rel="stylesheet" type="text/css" href="' . path_to_forum . 'style/' . RLStyle($pun_user['style']).'.css?version=' . current_theme . '" />
	</head>

	<body>

	<div id="punredirect" class="pun">

		<img src="' . folder_rl  . '/tpl/img/logo.png" />
		<div class="top-box"></div>
		<div class="punwrap">
		<div id="brdmain">
		<div class="block">
			<h2>404</h2>
			<div class="box">
			<div class="inbox login">

			Cette page n\'existe pas

			</div>
			</div>
		</div>
		</div>
		</div>
		<div class="end-box"></div>

	</div>

	</body>
</html>
';
