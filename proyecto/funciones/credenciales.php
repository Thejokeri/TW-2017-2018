<?php 
    
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath("credenciales.php") == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        
        $url = 'https://void.ugr.es/~ftm19971718/proyecto/index.php';
        
        die( header('Location: '.$url) );
    }
DEFINE('DB_HOST','localhost'); 
DEFINE('DB_USER','ftm19971718'); 
DEFINE('DB_PASSWD','vpUQhIjf'); 
DEFINE('DB_DATABASE','ftm19971718');
?>