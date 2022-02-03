<?php
define('ABSPATH', dirname(__FILE__) . '/');

define("current_theme",			"2.4.2");									# Numéro du thème. Utilisé pour appel css et scripts.js dans le footer.

define("folder_rl",				"");									# Renseigner le sous dossier ou serait le site RL, en localhost notamment
define("folder_forum",			"forum");								# Nom du dossier ou est le forum
define("folder_uploads",		"forum/uploads");						# Nom du dossier uploads
define("folder_wiki",			"wiki");								# Nom du dossier ou est le wiki
define("home_rl",				"doku.php?id=start");					# Home de RL

define("path_abs",				dirname($_SERVER["PHP_SELF"]));			# /!\ NE PAS TOUCHER => on détermine le chemin absolu de la page
define("path_abs_page",			$_SERVER['REQUEST_URI']);				# /!\ NE PAS TOUCHER => on détermine le chemin absolu de la page et le fichier
define("path_to_rl",			folder_rl.'/');							# /!\ NE PAS TOUCHER => On détermine le chemin vers rl sur le serveur ou en local
define("path_to_forum",			path_to_rl.folder_forum.'/');			# /!\ NE PAS TOUCHER => Construction automatique du chemin vers le forum
define("path_to_wiki",			path_to_rl.folder_wiki.'/');			# /!\ NE PAS TOUCHER => Construction automatique du chemin vers wiki
define("path_to_home",			path_to_rl.folder_wiki.'/'.home_rl);	# /!\ NE PAS TOUCHER => Construction du lien vers la Home Page localhost notamment

define("count_path_abs",		strlen(path_abs));						# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin absolu
define("count_path_to_rl",		strlen(path_to_rl));					# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin rl
define("count_path_to_forum",	strlen(path_to_forum));					# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin forum
define("count_path_to_wiki",	strlen(path_to_wiki));					# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin wiki

define("current_folder",		substr(path_abs, count_path_to_rl));	# Je détermine le dossier dans lequel je suis

// Initialisation des variables utilisées dans le menu gauche
$conf['pun_style'] = isset($pun_user['style']) ? $pun_user['style'] : '' ;
$conf['group_id'] = isset($pun_user['group_id']) ? $pun_user['group_id'] : '' ;
$conf['id'] = isset($pun_user['id']) ? $pun_user['id'] : '' ;

// Site url et affichage des erreurs en local hors www. et dev
$domains = array('www.randonner-leger.org', 'dev.randonner-leger.org');
if (in_array($_SERVER['HTTP_HOST'], $domains)) {
	$domain = $_SERVER['HTTP_HOST'];
	$site_url = 'https://' . $domain;
} else {
	$domain = 'localhost';
	$site_url = 'http://' . $domain;

	// Afficher les erreurs à l'écran
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	// Enregistrer les erreurs dans un fichier de log
	ini_set('log_errors', 1);
	// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	ini_set('error_log', '/log_error_php.txt');
}

function where() {

	$GLOBALS['menuG_forum']='';
	$GLOBALS['Iam_forum']='';
	$GLOBALS['Iam_wiki']='';
	$GLOBALS['menuG_start'] = '';
	$GLOBALS['menuG_presentation'] = '';
	$GLOBALS['menuG_association'] = '';
	$GLOBALS['menuG_guides'] = '';
	$GLOBALS['menuG_wiki_gene'] = '';

	# Lorsque je suis dans un emplacement, il est "active" et l'intitulé sera en gras
	# dans le menu gauche et ouvert si thème responsive

	switch (current_folder) {
		case folder_forum:
		case folder_uploads:
			$GLOBALS['menuG_forum']='active';
			$GLOBALS['Iam_forum']='selected="1"';
		break;

		default:
			$GLOBALS['Iam_wiki']='selected="1"';

			if ($_SERVER['PHP_SELF'] == folder_rl."/tetris.php") {
				//
			} else {

			$where = substr(path_abs_page, count_path_to_wiki+12,6);	# doku.php?id= = 12 caractères

			switch ($where) {
				case "";
					$GLOBALS['menuG_start'] = 'active';					# Je suis sur la page d'accueil
					break;
				case "presen";
				case "faq_de" :
					$GLOBALS['menuG_presentation'] = 'active';			# Je suis dans les pages découvertes du wiki
					break;
				case "associ";
				case "camps_":
					$GLOBALS['menuG_association'] = 'active';			# Je suis sur les pages "association"
					break;
				case "guide:":
					$GLOBALS['menuG_guides'] = 'active';				# Je suis sur les pages "Guide d'utilisation'"
					break;
				default:
					$GLOBALS['menuG_wiki_gene'] = 'active';				# Je sur une autre age du wiki
					break;
				}
			break;
		}
	}
}
where();

function get_browsername() {
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
		$browser = 'Microsoft Internet Explorer';
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
		$browser = 'Google Chrome';
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
		$browser = 'Mozilla Firefox';
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE) {
		$browser = 'Opera';
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE) {
		$browser = 'Apple Safari';
	} else {
		$browser = 'error'; //<-- Browser not found.
	}
return $browser;
}
$hackOperaMini = get_browsername() == 'Opera' ? 'opera' : '' ;

function GetRLStyle() {
	if ( isset($_COOKIE['RLFontSize'] ) ) {
		echo '<style id="MyCustomCss">.tclcon a, .pun .postmsg, #punpost .txtarea textarea, #punedit .txtarea textarea, #dokuwiki__site .page {font-size: ' . $_COOKIE['RLFontSize'] . 'rem; line-height: ' .( (float)$_COOKIE['RLFontSize'] + .8 ) .'rem;}</style>';
	} else {
		echo '<style id="MyCustomCss"></style>';
	}
}
function RLStyle($pun_user_style) {
	if ( isset($_COOKIE['RLFavoriteCss'] ) ) {
		$pun_user_style = str_replace('RL_Clair', '', $pun_user_style);
		$pun_user_style = str_replace('RL_Sombre', '', $pun_user_style);
		$rltheme = $_COOKIE['RLFavoriteCss'] . $pun_user_style ;
	} else {
		$rltheme = $pun_user_style;
		$isRLSombre = strpos($pun_user_style, 'RL_Sombre') !== false ? 'RL_Sombre' : 'RL_Clair' ;
		setcookie('RLFavoriteCss', $isRLSombre, time() + (86400 * 365), "/"); // 86400 = 1 day
	}
	return $rltheme;
}
function isRLSombre($pun_user_style) {
	$isRLSombre = strpos($pun_user_style, 'RL_Sombre') !== false ? 'checked' : '' ;

	if ( isset($_COOKIE['RLFavoriteCss'] ) )
		$isRLSombre = ($_COOKIE['RLFavoriteCss'] == 'RL_Sombre') ? 'checked' : '' ;

	echo $isRLSombre;
}
function get_new_size( $old_w, $old_h, $max = 800 ) {

	if( $old_w > $old_h ) {
		$new_w = $max;
		$new_h = $old_h * ( $max/$old_w );
	}

	if( $old_w < $old_h ) {
		$new_w = $old_w * ( $max/$old_h );
		$new_h = $max;
	}

	if( $old_w == $old_h ) {
		$new_w = $max;
		$new_h = $max;
	}

	return array(
		(int)$new_w,
		(int)$new_h
	);

}
function pingDomain($domain){

	$starttime = microtime(true);
	// supress error messages with @
	$file      = @fsockopen($domain, 80, $errno, $errstr, 10);
	$stoptime  = microtime(true);
	$status    = 0;

	if (!$file){
		$status = -1;  // Site is down
	} else {
		fclose($file);
		$status = ($stoptime - $starttime) * 1000;
		$status = floor($status);
	}

	return $status;

}
function get_rehost_attr( $url, $rehost = false ) {

	$parsed_url		 	= array_map( 'rawurlencode', parse_url( urldecode($url) ) );
	$ping				= pingDomain( $parsed_url );

	$parsed_url['path']	= str_replace( '%2F', '/', $parsed_url['path'] );
	$img_source			= filter_var( $parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path'], FILTER_SANITIZE_URL );
	$img_extension		= pathinfo( $parsed_url['path'], PATHINFO_EXTENSION );
	$img_sha			= sha1( $img_source );
	$rehost_folder		= substr( $img_sha, 0, 2 );
	$rehost_hash		= $rehost_folder . '/' . substr($img_sha, 2);
	$rehost_path		= 'i/' . $rehost_hash . ( null != $img_extension ? '.' . $img_extension : '' );

	$img_attr = array(
		'broken' => false,
		'source' => $img_source,
		'src' => path_to_forum . 'rehost/?img=' . $img_source,
		'extension' => $img_extension,
		'hash' => $rehost_hash,
		'folder' => $rehost_folder,
		'path' => $rehost_path,
		'width' => false,
		'height' => false
	);

	if ( $ping == -1 ) {														// Prevent 504 timeout
		$img_attr = array_merge( $img_attr, array(
			'broken' => true,
			'width' => 200,
			'height' => 200
		));
		return $img_attr;
	}

	if( file_exists( ABSPATH . folder_forum . '/rehost/' . $rehost_path) ) {	// Rehosted file exists, we return it
		$img_size = getimagesize( ABSPATH . folder_forum . '/rehost/' . $rehost_path );
		$img_attr = array_merge( $img_attr, array(
			'src' => path_to_forum . 'rehost/' . $rehost_path,
			'width' => $img_size[0],
			'height' => $img_size[1],
		));
	} else {																	// Rehosted file does not exists, let's do it
		$header_response = get_headers($img_source);
		if ($header_response && strpos( $header_response[0], "404" ) === false) {
			$img_size = getimagesize( $img_source );
			$img_attr = array_merge( $img_attr, array(
				'src' => path_to_forum . 'rehost/?img=' . $img_source,
				'width' => $img_size[0],
				'height' => $img_size[1],
			));
		}else {
			$img_size = false;
		}
	}

	if( $img_attr['width'] > 800 || $img_attr['height'] > 800) {				// Rehosted file is large than 800px
		$new_size = get_new_size( $img_attr['width'], $img_attr['height'], 800 );
		$img_attr['width'] = $new_size[0];
		$img_attr['height'] = $new_size[1];
	}

	if ( ! is_array( $img_size ) ) {											// Rehosted file is not an image
		$img_attr = array_merge( $img_attr, array(
			'broken' => true,
			'width' => 200,
			'height' => 200
		));
	}

	return $img_attr;

}
class UserInput {
	protected $post, $get, $cookie;
	/**
	* __construct
	*
	* Create a new instance of UserInput
	*/
	public function __construct() {
		$this->post = $_POST;
		$this->get = $_GET;
		$this->cookie = $_COOKIE;
	}

	public function get($key, $type = 'string', $options = array()) {
		if (!isset($this->get[$key])) {
			return false;
		}
		return filter_var($this->get[$key], $this->get_filter($type), $options);
	}

	public function post($key, $type='string', $options = array()) {
		if (!isset($this->post[$key])) {
			return false;
		}
		return filter_var($this->post[$key], $this->get_filter($type), $options);
	}

	public function cookie($key, $type='string', $options = array()) {
		if (!isset($this->cookie[$key])) {
			return false;
		}
		return filter_var($this->cookie[$key], $this->get_filter($type), $options);
	}
	private function get_filter($type) {
		switch (strtolower($type)) {
			case 'string':
				$filter = FILTER_SANITIZE_STRING;
				break;
			case 'int':
				$filter = FILTER_SANITIZE_NUMBER_INT;
				break;
			case 'float' || 'decimal':
				$filter = FILTER_SANITIZE_NUMBER_FLOAT;
				break;
			case 'encoded':
				$filter = FILTER_SANITIZE_ENCODED;
				break;
			case 'url':
				$filter = FILTER_SANITIZE_URL;
				break;
			case 'email':
				$filter = FILTER_SANITIZE_EMAIL;
				break;
			default:
				$filter = FILTER_SANITIZE_STRING;
		}
		return $filter;
	}
}
