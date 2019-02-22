<?php
$domains = array('www.randonner-leger.org', 'dev.randonner-leger.org');
if (in_array($_SERVER['HTTP_HOST'], $domains)) {
	$domain = $_SERVER['HTTP_HOST'];
	$site_url = 'https://' . $domain;
} else {
	$domain = 'localhost';
	$site_url = 'http://' . $domain;
}
$redirect_url = $site_url . htmlentities($_SERVER['REQUEST_URI']);
$redirect_url = str_replace('/wiki','/forum/wiki', $redirect_url);
$redirect_url = str_replace('/association','/forum/association', $redirect_url);
$redirect_url = str_replace('/forum/uploads/','/forum/uploads/index.php', $redirect_url);
?>
<div class="redirect">
	<form id="login" method="post" action="<?php echo path_to_forum; ?>login.php?action=in" onsubmit="return process_form(this)">

					<input type="hidden" name="form_sent" value="1" />
					<input type="hidden" name="redirect_url" value="<?php echo $redirect_url; ?>" />
					<input type="hidden" name="csrf_token" value="<?php echo pun_csrf_token(); ?>" />
					<label class="conl required"><strong>Nom d'utilisateur <span>(obligatoire)</span></strong><br /><input type="text" name="req_username" value="" maxlength="25" tabindex="1" /><br /></label>
					<label class="conl required"><strong>Mot de passe <span>(obligatoire)</span></strong><br /><input type="password" name="req_password" tabindex="2" /><br /></label>

		<p><input type="submit" name="login" value="Connexion"> <a href="javascript:history.go(-1)" class="secondary-button">Retour</a></p>
	</form>
</div>
