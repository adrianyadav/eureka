<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hours = simplexml_load_file('../xml/hours.xml');
    $lines = $hours->xpath('/lines/line');
    $x = 0;
    
    $data = trim($_POST["hourstext"]);
    
    $dom=dom_import_simplexml($hours->line);
    $dom->parentNode->removeChild($dom);
    $hours->addChild('line', $data);
    
    $hours->saveXML('../xml/hours.xml');
    header('Location: ../admin.php');
    exit();
} else {
    header('Location: ../admin.php');
    exit();
}
?>