<?php 

function conectarDB() : mysqli{
    $db = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"], $_ENV["DB_NAME"]);

    if (!$db) {
       echo 'No se pudo conectar con la base de datos';
       exit; 
    }

    return $db;
}