<?php
require_once 'configRL.php';
define('PUN_ROOT', folder_forum . '/' );
require_once folder_forum.'/include/common.php';
?>
<head>
	<title>Maintenance / Randonner-Leger</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum . 'style/Global/global.css?version=' . current_theme ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum . 'style/' . RLStyle($pun_user['style']).'.css?version=' . current_theme ?>" />
</head>
<body>

<div id="punmaint" class="pun">
<img src="<?php echo folder_rl ; ?>/tpl/img/logo.png" />
<div class="top-box"></div>
<div class="punwrap">

<div id="brdmain">
<div class="block">
	<h2>Maintenance</h2>
	<div class="box">
		<div class="inbox">
			<p>
				Le site Randonner-Leger est actuellement en maintenance.<br />
				Merci de revenir plus tard.
			</p>
		</div>
	</div>
</div>
</div>

</div>
<div class="end-box"></div>
</div>

</body>
</html>
