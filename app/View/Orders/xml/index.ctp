<?php
$xml = Xml::fromArray(array('response' => $orders));
echo $xml->asXML();
?>