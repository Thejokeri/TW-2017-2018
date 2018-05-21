<?php
    require "comun.php";

    if(isset($_GET['id'])){
        Encabezado($_GET['id']);
        aside();
        content($_GET['id']);
        Footer();
    }else{
        Encabezado(0);
        aside();
        content(0);
        Footer();
    }
?>