<?php
/**
 * @author Ruben Ramirez Rivera
 */

$n1 = $_GET['a'];
$n2 = $_GET['b'];

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

echo $n1 . ' + ' . $n2 . ' = ' . $client->Add([
    'intA' => $n1,
    'intB' => $n2,
])->AddResult;

?>