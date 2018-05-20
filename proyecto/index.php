<?php
    require "comun.php";

    if(isset($_GET['id'])){
        Encabezado($_GET['id']);
    }else{
        Encabezado(0);
    }
?>