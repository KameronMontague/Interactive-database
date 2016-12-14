<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Image Collector</title>

        <?php include DOCROOT.'header.php'; 	?>

</head>
<body>
        <h1>Image Collector</h1>


<?php

// Load different search url
$bingurl = "http://www.bing.com/images/search?q=";
$upcurl = "http://www.upcitemdb.com/upc/%";
$amazonurl = "https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=";

//Gets value from database row
$searchdata = $_GET;

//Bing Output
$newurl = $bingurl . implode($searchdata);

$newurl = str_replace(' ', '', $newurl);	
	
$html = file_get_contents($newurl);
	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
	echo '<table border=1>';
		echo "<td>";
		echo "<b>Bing Output</b>";
		echo '<img src="' . $matches[ 1 ][ 1 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 2 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 3 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 4 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 5 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 6 ] . '" />';
		echo "</td>";
		
//UPC Output
$newurl = $upcurl . implode($searchdata);

$newurl = str_replace(' ', '', $newurl);	
	
$html = file_get_contents($newurl);
	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
		echo "<td>";
		echo "<b>UPCitemdb Output</b>";
		echo '<img src="' . $matches[ 1 ][ 1 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 2 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 3 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 4 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 5 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 6 ] . '" />';
		echo "</td>";
		
//Amazon Output
$newurl = $amazonurl . implode($searchdata);

$newurl = str_replace(' ', '', $newurl);	
	
$html = file_get_contents($newurl);
	preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
		echo "<td>";
		echo "<b>Amazon Output</b>";		
		echo '<img src="' . $matches[ 1 ][ 1 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 2 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 3 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 4 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 5 ] . '" />';
		echo '<img src="' . $matches[ 1 ][ 6 ] . '" />';
		echo "</td>";
		
	echo '</table>';



?>

</body>
</html>
