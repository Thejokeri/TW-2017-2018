<?php
    require "comun.php";

    $db = BD_conexion();

    if(isset($_POST['accionBD'])){
        if(isset($_POST['crearusuario']))
            BD_CrearUsuario($db,$_POST);
        elseif(isset($_POST['modificarusuario']))
            BD_ModificarUsuario($db,$_POST);
        elseif(isset($_POST['borrarusuario']))
            BD_BorrarUsuario($db,$_POST);

        //Volver a la pagina de logged
    }else{
        if(isset($_POST['entrarBD'])){
            if(isset($_POST['crear']))
                CrearUsuario(false);
            elseif (isset($_POST['modificar']))
                ModificarUsuario(false);
            elseif (isset($_POST['borrar']))
                BorrarUsuario(false);
            elseif(isset($_POST['logout']))
                Logout();
        }else{
            if(isset($_POST['envio'])){
                Logged($db);
            }else{
                Index();
            }
        }
    }
?>