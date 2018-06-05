<?php
    require "./funciones/comun_html.php";

    $db = BD_conexion();
    
    if(isset($_GET['logged'])){
        Encabezado(0,true);
        Aside($db,true);
        Content();
        Footer();
    }else{
        if(isset($_GET['disco'])){
            Encabezado(2,false);
            Aside($db,false);
            Content($db,2,null);
            Footer();
            exit;
        }

        if(isset($_GET['id'])){
            Encabezado($_GET['id'],false);
            Aside($db,false);
            Content($db,$_GET['id'],null);
            Footer(); 
        }else{
            Encabezado(0,false);
            Aside($db,false);
            Content($db,0,null);
            Footer();
        }
    }
?>