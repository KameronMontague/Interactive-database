<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Image Collector</title>

        <?php include DOCROOT.'header.php'; 	?>
        <script src="http://localhost/script.js"></script>

		
        <style>
                form input[type=url] 
                {
                        width: 300px
                }
                #output img
                {
                        border: 1px solid #ccc;
                        padding: 10px;
                        margin: 10px;
                        display: inline-block;
                }
        </style>
</head>
<body>
        <h1>Image Fetcher</h1>
		
		<?php
$html = file_get_contents('http://www.bing.com/images/search?q=dragons');
preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
echo $matches[ 1 ][ 0 ];
echo '<img src="http://www.bing.com/images/search?q=dragons' . $matches[ 1 ][ 0 ] . '" />';

?>
		<form action="scan.php" method="post" id="url-form">
                <input type="text" name="url" />
                <input type="submit" value="Get Images" />
        </form>
		
        <div id="output"></div>
		

				

		
</body>
</html>