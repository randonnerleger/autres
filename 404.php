<?php
require 'wiki/conf/local.protected.php';

$request=$_SERVER['REQUEST_URI'];

require 'forum/uploads/fotoo-import.php';

if(array_key_exists($request,$MovedImg)) {

	$NewUrl="https://".$_SERVER['HTTP_HOST'].$MovedImg[$request];
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
		<link rel="stylesheet" type="text/css" href="' . path_to_forum . 'style/' . $pun_user['style'] . '" />
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
