<?php
    require "comun_html.php";

    $db = BD_conexion();

    if(isset($_GET['id'])){
        Encabezado($_GET['id']);
        Aside();
        Content($_GET['id'],$db);
        Footer(); 
    }else{
        Encabezado(0);
        aside();
        content(0,$db);
        Footer();
    }

    /* require "comun.php";

    $db = BD_conexion();

    if(isset($_POST['accionBD']) && (isset($_POST['crearusuario']) || isset($_POST['modificarusuario']) || isset($_POST['borrarusuario']))){
        if(isset($_POST['crearusuario']))
            BD_CrearUsuario($db,$_POST);
        elseif(isset($_POST['modificarusuario']))
            BD_ModificarUsuario($db,$_POST);
        elseif(isset($_POST['borrarusuario']))
            BD_BorrarUsuario($db,$_POST);
    }else{
        if(isset($_POST['entrarBD']) || isset($_POST['logout'])){
            if(isset($_POST['crear']))
                CrearUsuario(false,null);
            elseif (isset($_POST['modificar']))
                ModificarUsuario($db,false);
            elseif (isset($_POST['borrar']))
                BorrarUsuario($db,false);
            elseif(isset($_POST['logout']))
                Logout();
        }else{
            if(isset($_POST['envio'])){
                Logged($db);
            }else{
                Index();
            }
        }
    }*/
?>