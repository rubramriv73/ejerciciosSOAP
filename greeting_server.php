<?php
/**
 * @author Ruben Ramirez Rivera
 */
    
 class GreetingServer{

    function sayHello(string $name): string{
        return "Hello $name!";
    }
    function sayBye(string $name): string{
        return "Bye $name";
    }
}

 $server = new SoapServer(__DIR__.'/greetings.wsdl');

 $server->setClass(GreetingServer::class);
 $server->handle();

?>