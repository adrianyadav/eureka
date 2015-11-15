<?php
session_start();

/*
* Updates the Drinks XML file with input data
* @param items, $item
*
*/
function updateDrinksXML ($item, $items){
    $drink = $item;
    $drinks = $items;
    $data = simplexml_load_file("../xml/drinks.xml");
    $items = $data->xpath("//$drink");
    $totalitems = 0;
    foreach ($items as $item) {
        $totalitems++;
    }
    for ($i = 0; $i < $totalitems; $i++){
        if ($drinks == "beers") {
            $data->beers->beer[$i] = $_POST["beer$i"];
            $handle = fopen("../xml/drinks.xml", "wb");
            fwrite($handle, $data->asXML());
            fclose($handle);
        } else if ($drinks = "housepours") {
            $data->housepours->housepour[$i] = $_POST["housepour$i"];
            $handle = fopen("../xml/drinks.xml", "wb");
            fwrite($handle, $data->asXML());
            fclose($handle);
        }
    }

}
/*
* Deletes all empty nodes in Drinks.xml
*
*/
function deleteEmptyNodes (){
    $file  = '../xml/drinks.xml';
    $xpath = '//*[not(text())]';
    if (!$xml = simplexml_load_file($file)) {
        throw new Exception("Exception");
    }
    foreach ($xml->xpath($xpath) as $remove) {
        unset($remove[0]);
    }
    $xml->asXML($file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateDrinksXML("beer", "beers");
    updateDrinksXML("housepour", "housepours");
    deleteEmptyNodes();
    header('Location: ../admin.php');
    exit();
} else {
    exit();
}
?>