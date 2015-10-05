<?php
$xml = simplexml_load_file("./xml/drinks.xml");
foreach ($xml->beers->beer as $beer){
    echo "<li> $beer </li>";
}

print ("<br>");
foreach ($xml->housepours->housepour as $housepour){
    echo "<li> $housepour </li>";
}

?>