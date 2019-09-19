<?php
ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1');

function GetFeed($url) {
	$xml = file_get_contents($url);

	$posts = new SimpleXMLElement($xml);

	echo '		<ul>';
	foreach($posts->topic as $topic) {

	    echo '<li><a href="'.$topic->link.'"><b>'.$topic->title.'</b></a>';

	    // $post = strip_tags($topic->content);
	    // if(strlen($post) > 50) {
	    //     echo '<br />' . substr($post, 0, 150).'...<br />';
	    // }
	    // else {
	    //     echo '<br />' . $post.'<br />';
	    // }

	    // echo ' - <a href="'.$topic->author->uri.'">'.$topic->author->name.'</a></li>';
	}
	echo '		</ul>';

}

echo '<h2>Sur les forums</h2>';
echo '<div class="grid-2 has-gutter-l">';

	echo '	<div class="wrap_box plugin_wrap"><h3>Les derniers Messages</h3>';
		GetFeed('https://www.randonner-leger.org/forum/extern.php?action=feed&type=xml&show=10');
	echo '	</div>';

	echo '	<div class="wrap_box plugin_wrap"><h3>Les dernières sorties</h3>';
		GetFeed('https://www.randonner-leger.org/forum/extern.php?action=feed&fid=57&type=xml&show=10');
	echo '	</div>';

echo '</div>';
?>
