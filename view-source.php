<?php include 'config.php';

$source = '';
if(isset($_GET['file']))
{
        $dir = realpath(DOCROOT);
        $filename = realpath($_GET['file']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if($filename !== FALSE 
        && file_exists($filename) 
        && substr($filename, 0, strlen($dir)) == $dir
        && in_array($ext, $site->allowed_source))
        {
                $source = htmlspecialchars(file_get_contents($filename));
                $filename = str_replace(realpath(DOCROOT).DIRECTORY_SEPARATOR, '', $filename);

                if(dirname($filename) != '.')
                        $back_link = dirname($filename);
        }
        else
        {
                header("Status: 404 Not Found", true, 404);
                echo file_get_contents(WEBROOT.'error.php?404');
                exit;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>View source: <?php echo $filename ?></title>

        <?php include DOCROOT.'header.php' ?>
        <link href="<?php WEBROOT ?>prettify/prettify.css" type="text/css" rel="stylesheet" />
        <script src="<?php WEBROOT ?>prettify/prettify.js"></script>
        <style>
                body
                {
                        width: auto;
                        margin: 1.5em;
                }
                #source-code
                {
                        border: 0;
                        font: 12px/1.2 sans-serif;
                }
        </style>
        <script>$(function(){prettyPrint()});</script>
</head>
<body>
        <h1><?php echo $filename ?></h1>

        <pre id="source-code" class="prettyprint"><code class="language-<?php echo $ext ?>"><?php echo $source ?></code></pre>

        <?php include 'footer.php' ?>
</body>
</html>