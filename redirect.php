<?php
define('RL_ROOT', '');
include RL_ROOT.'configRL.php';
define('PUN_ROOT', folder_forum.'/');
include PUN_ROOT.'include/common.php';

define('PUN_TURN_OFF_MAINT', 1);
define('PUN_QUIET_VISIT', 1);

$redirect = '<html>';
$redirect .= '<head>';
$redirect .= '<title>Redirection</title>';
$redirect .= '<meta http-equiv="refresh" content="5;URL=' . path_to_forum . 'login.php" />';
$redirect .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$redirect .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$redirect .= '<meta name="robots" content="noindex">';
$redirect .= '<link rel="stylesheet" type="text/css" href="' . path_to_forum . '/style/' . $pun_user['style'] . '" />';
$redirect .= '</head>';
$redirect .= '<body>';

$redirect .= '<div id="punredirect" class="pun">';
$redirect .= '<!-- BEGIN HEADER RL -->';
$redirect .= '<img src="' . folder_rl  . '/tpl/img/logo.png" />';
$redirect .= '<!-- END RL -->';
$redirect .= '<div class="top-box"></div>';
$redirect .= '<div class="punwrap">';
$redirect .= '<div id="brdmain">';
$redirect .= '<div class="block">';
$redirect .= '	<h2>Redirection</h2>';
$redirect .= '	<div class="box">';
$redirect .= '	<div class="inbox">';
$redirect .= '		<p>';
$redirect .= '		Vous devez être identifié au forum pour accéder à ces pages.<br />';
$redirect .= '		Redirection&#160;…<br /><br />';
$redirect .= '		<a href="' . path_to_forum . 'login.php">Cliquez ici si vous ne voulez pas attendre (ou si votre navigateur ne vous redirige pas automatiquement).</a>';
$redirect .= '		</p>';
$redirect .= '	</div>';
$redirect .= '	</div>';
$redirect .= '</div>';
$redirect .= '</div>';
$redirect .= '</div>';
$redirect .= '<div class="end-box"></div>';
$redirect .= '</div>';

$redirect .= '</body>';
$redirect .= '</html>';

echo $redirect;
