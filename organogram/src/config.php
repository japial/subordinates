<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


function debug($data, $dump=false){
    echo "<pre>"; 
    if($dump){
        var_dump($data);
    }else{
        print_r($data);
    }
    echo "</pre>"; 
}

function env($key, $default){
    return isset($_ENV[$key]) ? $_ENV[$key] : $default;
}

?>