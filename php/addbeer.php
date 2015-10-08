<?php

$drinks = simplexml_load_file('./xml/drinks.xml');
$beers = $drinks->xpath('//beer');
$i = 0;
foreach ($beers as $beer) {
    $i++;
}
print($i);
$newBeer = $drinks->beers->addChild('beer', $_POST["beer$i"]);
$drinks->saveXML('./xml/drinks.xml');
header('Location: admin.php');
exit();
?>

