<?php
/**
 * @author Ruben Ramirez Rivera
 */

 $n1 = $_GET['a'];
 $n2 = $_GET['b'];

 $msgSoap = <<<ERD
 <?xml version="1.0" encoding="utf-8"?>
 <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
     <Add xmlns="http://tempuri.org/">
       <intA>{$n1}</intA>
       <intB>{$n2}</intB>
     </Add>
   </soap:Body>
 </soap:Envelope>
 ERD;

 $curl = curl_init();

 curl_setopt_array($curl, [
    CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$msgSoap,
    CURLOPT_HTTPHEADER => ['Content-Type: text/xml; charset=utf-8',]
 ]);

 $response = curl_exec($curl);
 curl_close($curl);
 $matches = [];
 preg_match('|<AddResult>([0-9]+)</AddResult>|', $response, $matches);
 echo $n1 . ' + ' . $n2 . ' = ' . $matches[1].PHP_EOL;

?>