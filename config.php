<?php

# Some constants
define('DOCROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('WEBROOT', getenv('WEBROOT'));
define('CURRENT_DIR', str_replace(DOCROOT, '', realpath('.').DIRECTORY_SEPARATOR));
define('CURRENT_URI', urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']));
define('ENV', $_SERVER['ENV']);

include(DOCROOT.'functions.php');

define('MAX_UPLOAD_SIZE', min(
        to_bytes(ini_get('upload_max_filesize')),
        to_bytes(ini_get('post_max_size')),
        to_bytes(ini_get('memory_limit'))
));




# Allowed source extensions
$site['allowed_source'] = array('php', 'html', 'js', 'css');


# Find source files
function ok($filename)
{
        global $site;
        if( ! in_array(pathinfo($filename, PATHINFO_EXTENSION), $site['allowed_source']))
                return NULL;

        else
                return sprintf('<li><a href="%sview-source.php?file=%s">%s</a></li>',
                        WEBROOT,
                        CURRENT_DIR.$filename,
                        $filename);
}
$site['source_files'] = array_filter(array_map('ok', scandir(DOCROOT.CURRENT_DIR)));


# Turn into object
$site = (object) $site;