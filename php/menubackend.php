<?php
session_start();
$myfile = fopen("../json/menu-items.json", "w");
$object = file_get_contents('php://input');
fwrite($myfile, $object);
fclose($myfile);
exit();
?>