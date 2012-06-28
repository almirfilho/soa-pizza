<?php
$xml = Xml::fromArray(array('response' => $order));
echo $xml->asXML();
?>