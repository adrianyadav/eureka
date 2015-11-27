<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $drinks = simplexml_load_file('../xml/drinks.xml');
    $beers = $drinks->xpath('//beer');
    $i = 0;
    foreach ($beers as $beer) {
        $i++;
    }
    $newBeer = $drinks->beers->addChild('beer', $_POST["beer$i"]);
    $drinks->saveXML('../xml/drinks.xml');
    header('Location: ../admin.php');
    exit();
} else {
    header('Location: ../admin.php');
    exit();
}
?>

