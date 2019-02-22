<?php
require_once ('configRL.php');

echo '<!DOCTYPE html>
	<html>
	<head>
	<title>Redirection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="' . path_to_forum . '/style/' . $pun_user['style'] . '" />
	</head>
	<body>

	<div id="punredirect" class="pun">
	<!-- BEGIN HEADER RL -->
	<img src="' . folder_rl  . '/tpl/img/logo.png" />
	<!-- END RL -->
	<div class="top-box"></div>
	<div class="punwrap">
	<div id="brdmain">
	<div class="block">
		<h2>Vous devez être identifié.e au forum pour accéder à ces pages</h2>
		<div class="box">
		<div class="inbox login">';

require_once ('login.php');

echo '		</div>
		</div>
	</div>
	</div>
	</div>
	<div class="end-box"></div>
	</div>

	</body>
	</html>';
