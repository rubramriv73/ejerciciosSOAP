<?php
/**
 * @author Ruben Ramirez Rivera
 */

ini_set('soap.wsdl_cache_enabled', false);

$client = new SoapClient('greetings.wsdl');

echo $client->sayHello('Ruben');
?>