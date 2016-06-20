<?php
ini_set("display_errors",0);error_reporting(0);					# Masque les erreur php

define("folder_rl",		"");						# Renseigner le sous dossier ou serait le site RL, en localhost notamment
define("folder_forum",		"forum");						# Nom du dossier ou est le forum
define("folder_wiki",		"wiki");						# Nom du dossier ou est le wiki
define("home_rl",			"doku.php?id=start");				# Home de RL

define("path_abs",		dirname($_SERVER["PHP_SELF"]));		# /!\ NE PAS TOUCHER => on détermine le chemin absolu de la page
define("path_abs_page",		$_SERVER['REQUEST_URI']);			# /!\ NE PAS TOUCHER => on détermine le chemin absolu de la page et le fichier
define("path_to_rl",		folder_rl.'/');					# /!\ NE PAS TOUCHER => On détermine le chemin vers rl sur le serveur ou en local
define("path_to_forum",		path_to_rl.folder_forum.'/');			# /!\ NE PAS TOUCHER => Construction automatique du chemin vers le forum
define("path_to_wiki",		path_to_rl.folder_wiki.'/');			# /!\ NE PAS TOUCHER => Construction automatique du chemin vers wiki
define("path_to_home",		path_to_rl.folder_wiki.'/'.home_rl);	# /!\ NE PAS TOUCHER => Construction du lien vers la Home Page localhost notamment

define("count_path_abs",	strlen(path_abs));				# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin absolu
define("count_path_to_rl",	strlen(path_to_rl));				# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin rl
define("count_path_to_forum",	strlen(path_to_forum));				# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin forum
define("count_path_to_wiki",	strlen(path_to_wiki));				# /!\ NE PAS TOUCHER => on détermine le nombre de caractères du chemin wiki

define("current_folder",	substr(path_abs, count_path_to_rl));	# Je détermine le dossier dans lequel je suis

function where () {
	if (current_folder == folder_forum) {
		$GLOBALS['menuG_forum']='active';
		$GLOBALS['Iam_forum']='selected="1"';
	} else {
		$GLOBALS['Iam_wiki']='selected="1"';
		
		if ($_SERVER['PHP_SELF'] == folder_rl."/tetris.php") {

		} else {
		$where = substr(path_abs_page, count_path_to_wiki+12,6);	# doku.php?id= = 12 caractères
		switch ($where) {
			case "start";
				$GLOBALS['menuG_start'] = 'active';			# Je suis sur la page d'accueil
				break;
			case "presen";
			case "faq_de" :
				$GLOBALS['menuG_presentation'] = 'active';	# Je suis dans les pages découvertes du wiki
				break;
			case "associ";
			case "camps_":
				$GLOBALS['menuG_association'] = 'active';		# Je suis sur les pages "association"
				break;
			case "guide:":
				$GLOBALS['menuG_guides'] = 'active';		# Je suis sur les pages "Guide d'utilisation'"
				break;
			default:
				$GLOBALS['menuG_wiki_gene'] = 'active';		# Je sur une autre age du wiki
				break;
												# Lorsque je suis dans un emplacement, il est "active" et l'intitulé sera en gras
												# dans le menu gauche et ouvert si thème responsive
			}
		}
	}
}
where();
?>
