<?php
/**
 * @author Ruben Ramirez Rivera
 */

 $n1 = $_GET['a'];

 $msgSoap = <<<ERD
 <?xml version="1.0" encoding="utf-8"?>
 <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
     <NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/">
       <ubiNum>{$n1}</ubiNum>
     </NumberToWords>
   </soap:Body>
 </soap:Envelope>
 ERD;

 $curl = curl_init();

 curl_setopt_array($curl, [
    CURLOPT_URL => 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso',
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
//  var_dump($response);
 $matches = [];
 preg_match('|<m:numbertowordsresult>([.]+)</m:numbertowordsresult>|', $response, $matches);
//  var_dump($matches);
 echo $n1 . ' en palabras es ' . $response;

?>