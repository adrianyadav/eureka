<?php
session_start();
?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = simplexml_load_file("../xml/drinks.xml");
    $beers = $data->xpath('//beer');
    $totalbeers = 0;
    foreach ($beers as $beer) {
        $totalbeers++;
    }
    $housepours = $data->xpath('//housepour');
    $totalhousepours = 0;
    foreach ($housepours as $housepour) {
        $totalhousepours++;
    }
    for ($i = 0; $i < $totalbeers; $i++){
        $data->beers->beer[$i] = $_POST["beer$i"];
        $handle = fopen("../xml/drinks.xml", "wb");
        fwrite($handle, $data->asXML());
        fclose($handle);
    }
    for ($x = 0; $x < $totalhousepours; $x++){
        $data->housepours->housepour[$x] = $_POST["housepour$x"];
        $handle = fopen("../xml/drinks.xml", "wb");
        fwrite($handle, $data->asXML());
        fclose($handle);
    }
    $file  = '../xml/drinks.xml';
    $xpath = '//*[not(text())]';
    if (!$xml = simplexml_load_file($file)) {
        throw new Exception("Exception");
    }
    foreach ($xml->xpath($xpath) as $remove) {
        unset($remove[0]);
    }
    $xml->asXML($file);
    header('Location: ../admin.php');
    exit();
} else {
    header('Location:../admin.php');
    exit();
}
?>