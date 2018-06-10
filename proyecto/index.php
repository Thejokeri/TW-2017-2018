<?php
    require "./funciones/comun_html.php";

    $db = BD_conexion();
    
    if(isset($_GET['disco'])){
        Encabezado(2);
        Aside($db);
        Content($db,2);
        Footer();
        exit;
    }

    if(isset($_GET['id'])){
        if($_GET['id'] == "logout"){
            Logout();
        }else{
            Encabezado($_GET['id']);
            Aside($db);
            Content($db,$_GET['id']);
            Footer();
        } 
    }else{
        Encabezado(0);
        Aside($db);
        Content($db,0);
        Footer();
    }
?>