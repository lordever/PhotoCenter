<?php
$begin = "images";
print '<script type="text/javascript">
			var count =' . $_GET["count"] . '; 
			var id = ' . $_GET["id"] . ';'
        . 'var link = new Array();';
for ($i = 0; $i < $_GET["count"]; $i++) {
    print "link[$i] =  '" . strstr($link[$i], $begin) . "';";
}
print '</script>';
print '<script type="text/javascript" src="../js/functionsOfImage.js"></script>';
?>
