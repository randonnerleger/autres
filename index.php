<?php
require_once 'configRL.php';
define('PUN_ROOT', folder_forum . '/' );
require_once (folder_forum.'/include/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Randonner-leger.org</title>
<?php require_once (PUN_ROOT.'include/user/header_favicon.php');?>
<?php require_once (PUN_ROOT.'include/user/header_img_aleatoire.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum.'style/Global/global.min.css?version=' . current_theme . '' ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum.'style/'.RLStyle($pun_user['style']).'.css?version=' . current_theme . ''; ?>"  id="MyCss" />
<link rel="stylesheet" type="text/css" href="<?php echo path_to_rl ?>tpl/fonts/fork-awesome/style.css?version='<?php echo current_theme ?>" />
<?php
GetRLStyle();
?>
<style>
.menu-forum-toggle {
	display: none;
}
</style>
</head>

<body>
<?php require_once (folder_forum.'/include/user/header.php') ?>
<?php require_once (folder_forum.'/include/user/menuG.php') ?>

<div id="dokuwiki__site" class="extwiki">

	<div id="dokuwiki__top" class="site dokuwiki">

		<div id="dokuwiki__header">

			<div class="pad group">

				<div class="headings group">
					<h1><a href="<?php echo path_to_home ?>"><span>Le site de la randonnée légère et de la MUL (marche ultra-légère)</span></a></h1>

					<div id="brdwelcome" class="inbox">
						<p class="conl">
							<span>
							<?php
							if ( $pun_user['username'] == 'Guest' ) {
								echo 'Vous n\'êtes pas identifié(e).';
							} else {
								echo 'Connecté(e) sous l\'identité&#160; <strong>' . $pun_user['username'] . '</strong>';
							}
							?>
							</span>
						</p>
						<div class="clearer"></div>
					</div>

				</div>

			</div>

		</div>

		<div class="wrapper group">

			<div id="dokuwiki__content">

				<div class="pad group">

					<div class="page group">

<?php

						require_once( 'index_content.php' );

						require_once( 'index_feeds.php' );

						require_once( 'index_contact.php' );

?>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php require_once (folder_forum.'/include/user/footer.php') ?>

<style>
.decouverte::before,
.association::before,
.wiki::before,
.forum::before {
	content: "\f059";
	font-family: ForkAwesome;
	padding-right: 10px;
	font-weight: normal;
	font-size: 1.4em;
	position: absolute;
	top: 7px;
	left:11px;
}
.decouverte::before {content: "\f0eb";}
.association::before {content: "\f0c0";}
.forum::before {content: "\f0e6";}
.wiki::before {content: "\f02d";}
.grid-5 h3 {font-size: 1.2em;margin-bottom:10px;margin-left: 30px;}
.grid-5 div.wrap_box,.grid-5 .wrap_box {font-size: .9em;padding: 10px;}
.extwiki .dokuwiki div.wrap_box {min-height: auto;}
figure {margin-bottom:0;}
figure img {width:calc(100% - 8px);height: auto;border:4px solid #000;}
figcaption {font-size: .9em;}
@media (max-width:780px){
	[class^=grid-] div {margin-bottom:10px;}
	[class^=grid-] div.wrap_box {padding: 10px;}
}
@media (min-width:780px){
	[class^=grid-] {margin-bottom:3em;}
[class*=" grid-"],[class^=grid-]{display:-ms-grid;display:grid;grid-auto-flow:dense}[class*=" grid-"].has-gutter,[class^=grid-].has-gutter{grid-gap:1rem}[class*=" grid-"].has-gutter-l,[class^=grid-].has-gutter-l{grid-gap:2rem}[class*=" grid-"].has-gutter-xl,[class^=grid-].has-gutter-xl{grid-gap:4rem}}@media (min-width:480px){.autogrid,.grid{display:-ms-grid;display:grid;grid-auto-flow:column;grid-auto-columns:1fr}.autogrid.has-gutter,.grid.has-gutter{grid-column-gap:1rem}.autogrid.has-gutter-l,.grid.has-gutter-l{grid-column-gap:2rem}.autogrid.has-gutter-xl,.grid.has-gutter-xl{grid-column-gap:4rem}}[class*=grid-2]{-ms-grid-columns:(1fr)[2];grid-template-columns:repeat(2,1fr)}[class*=grid-3]{-ms-grid-columns:(1fr)[3];grid-template-columns:repeat(3,1fr)}[class*=grid-4]{-ms-grid-columns:(1fr)[4];grid-template-columns:repeat(4,1fr)}[class*=grid-5]{-ms-grid-columns:(1fr)[5];grid-template-columns:repeat(5,1fr)}[class*=grid-6]{-ms-grid-columns:(1fr)[6];grid-template-columns:repeat(6,1fr)}[class*=grid-7]{-ms-grid-columns:(1fr)[7];grid-template-columns:repeat(7,1fr)}[class*=grid-8]{-ms-grid-columns:(1fr)[8];grid-template-columns:repeat(8,1fr)}[class*=grid-9]{-ms-grid-columns:(1fr)[9];grid-template-columns:repeat(9,1fr)}[class*=grid-10]{-ms-grid-columns:(1fr)[10];grid-template-columns:repeat(10,1fr)}[class*=grid-11]{-ms-grid-columns:(1fr)[11];grid-template-columns:repeat(11,1fr)}[class*=grid-12]{-ms-grid-columns:(1fr)[12];grid-template-columns:repeat(12,1fr)}[class*=col-1]{grid-column:auto/span 1}[class*=row-1]{grid-row:auto/span 1}[class*=col-2]{grid-column:auto/span 2}[class*=row-2]{grid-row:auto/span 2}[class*=col-3]{grid-column:auto/span 3}[class*=row-3]{grid-row:auto/span 3}[class*=col-4]{grid-column:auto/span 4}[class*=row-4]{grid-row:auto/span 4}[class*=col-5]{grid-column:auto/span 5}[class*=row-5]{grid-row:auto/span 5}[class*=col-6]{grid-column:auto/span 6}[class*=row-6]{grid-row:auto/span 6}[class*=col-7]{grid-column:auto/span 7}[class*=row-7]{grid-row:auto/span 7}[class*=col-8]{grid-column:auto/span 8}[class*=row-8]{grid-row:auto/span 8}[class*=col-9]{grid-column:auto/span 9}[class*=row-9]{grid-row:auto/span 9}[class*=col-10]{grid-column:auto/span 10}[class*=row-10]{grid-row:auto/span 10}[class*=col-11]{grid-column:auto/span 11}[class*=row-11]{grid-row:auto/span 11}[class*=col-12]{grid-column:auto/span 12}[class*=row-12]{grid-row:auto/span 12}@media (min-width:480px) and (max-width:767px){[class*=grid-][class*=-small-1]{-ms-grid-columns:(1fr)[1];grid-template-columns:repeat(1,1fr)}[class*=col-][class*=-small-1]{grid-column:auto/span 1}[class*=grid-][class*=-small-2]{-ms-grid-columns:(1fr)[2];grid-template-columns:repeat(2,1fr)}[class*=col-][class*=-small-2]{grid-column:auto/span 2}[class*=grid-][class*=-small-3]{-ms-grid-columns:(1fr)[3];grid-template-columns:repeat(3,1fr)}[class*=col-][class*=-small-3]{grid-column:auto/span 3}[class*=grid-][class*=-small-4]{-ms-grid-columns:(1fr)[4];grid-template-columns:repeat(4,1fr)}[class*=col-][class*=-small-4]{grid-column:auto/span 4}[class*=-small-all]{grid-column:1/-1}}.item-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.item-last{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.grid-offset{visibility:hidden}.col-all{grid-column:1/-1}.row-all{grid-row:1/-1}
</style>
</body>
</html>
