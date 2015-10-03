<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 4/10/2015
 * Time: 2:53 AM
 */
?>

<?php
$data = simplexml_load_file("./xml/drinks.xml");
$length = count($_POST);
for ($i = 0; $i < $length; $i++){
    $data->beers->beer[$i] = $_POST["beer$i"];
    $handle = fopen("./xml/drinks.xml", "wb");
    fwrite($handle, $data->asXML());
    fclose($handle);
}
header('Location: test.php');
exit();
?>
