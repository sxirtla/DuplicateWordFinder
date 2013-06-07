<?php
require("DuplicateWordFinder.php");

$dwf = new DuplicateWordFinder();

$str = "With Cloud9 IDE, you can run your PHP pages, without relying on a third-party system like Apache hosting. We run PHP version 5.3.3.
You can choose to run PHP scripts via the command line, by typing php, followed by the name of your PHP file. However, this is not a very common use case. Most likely, you'll be running your own server and hosting PHP files.
Here's a simple demonstration. First, create a PHP file called hello_world.php, and paste this code into it:";

echo "<pre>";
print_r($dwf->dupWords($str));
echo "</pre>";
?>