		<?php
$html = file_get_contents('http://www.4chan.org/');
preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
echo $matches[ 1 ][ 0 ];
echo '<img src="http://www.4chan.org/' . $matches[ 1 ][ 0 ] . '" />';
echo '<img src="' . $matches[ 1 ][ 0 ] . '" />';

?>