<?php
require_once 'configRL.php';
define('PUN_ROOT', folder_forum . '/' );
require_once folder_forum.'/include/common.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Randonner-leger.org</title>
<?php include PUN_ROOT.'include/user/header_favicon.php';?>
<?php include PUN_ROOT.'include/user/header_img_aleatoire.php';?>
<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum.'style/Global/global.css?version=' . current_theme . '' ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo path_to_forum.'style/'.RLStyle($pun_user['style']).'.css?version=' . current_theme . ''; ?>"  id="MyCss" />
<?php
GetRLStyle();
// END MODIF RL
?>
<style>
.menu-forum-toggle {
	display: none;
}
</style>
<style>
.flex-container {
	display: flex;
	flex-wrap: nowrap;
	flex-wrap: wrap;
}

.flex-container > div {
	width: 25%;
	margin: 0 1.5em 1.5em 0;
	padding:2em 2%;
}
.flex-container.grid-2 > div {
	width: 40%;
}
.flex-container > div:last-child {
	margin-right: 0;
}
</style>
</head>

<body>
<?php include folder_forum.'/include/user/header.php' ?>
<?php include folder_forum.'/include/user/menuG.php' ?>

<div id="dokuwiki__site" class="extwiki">

	<div id="dokuwiki__top" class="site dokuwiki">

		<div id="dokuwiki__header">

			<div class="pad group">

				<div class="headings group">
					<h1><a href="<?php echo path_to_home ?>"><img src="/rl/wiki/lib/tpl/RL/images/logo.png" alt="" width="64" height="64"> <span>Le site de la randonnée légère et de la MUL (marche ultra-légère)</span></a></h1>

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

<!-- BEGIN HEADER RL -->
<?php include folder_forum.'/include/user/footer.php' ?>
<!-- END RL -->

</body>
</html>
