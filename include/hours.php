<ul id="open">
<li class="subheading">Opening Hours</li>
<?php
$xml = simplexml_load_file("./xml/hours.xml");

$lines = $xml->xpath('/lines/line');
$data = nl2br($xml->line);
echo "<li>".$data."</li>";
      
?>
</ul>