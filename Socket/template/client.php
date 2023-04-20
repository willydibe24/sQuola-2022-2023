<?php 

    $address = "127.0.0.1";
    $port = 3000;
    set_time_limit(0);
    
    $input = "";

    $socket = socket_create(AF_INET, SOCK_STREAM, 0) 
    or die ("\nNon riesco a creare la socket");

    $result = socket_connect($socket, $address, $port)
    or die ("\nNon riesco a connettermi alla socket");

    while(true) {
        echo "\n\n";
        $input = readline("Inserisci un input: ");

        if(strtolower($input) === 'quit') break;

        socket_write($socket, $input, strlen($input))
        or die ("\nNon riesco a inviare il messaggio");

        $response = socket_read($socket, 1024)
        or die ("\nNon riesco a leggere il messaggio sulla socket");

        echo "\nMessaggio del server: $response";

    }

    socket_close($socket);

?> 