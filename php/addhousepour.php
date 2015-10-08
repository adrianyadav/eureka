<?php
session_start();


$drinks = simplexml_load_file('../xml/drinks.xml');
$housepours= $drinks->xpath('//housepour');
$i = 0;
foreach ($housepours as $housepour) {
    $i++;
}
print($i);
$newHousepour = $drinks->housepours->addChild('housepour', $_POST["housepour$i"]);
$drinks->saveXML('../xml/drinks.xml');
header('Location: ../admin.php');
exit();
?>

