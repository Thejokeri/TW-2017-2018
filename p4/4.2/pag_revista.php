<?php
    require "pag_comun.php";

    $tema = urlencode($_GET['tema']);

    function num_tema($tema){
        if($tema == "divulgacion"){
            $num = 1;
        }

        if($tema == "motor"){
            $num = 2;
        }

        if($tema == "viajes"){
            $num = 3;
        }
        return $num;
    }

    $num_tema = num_tema($tema);

    revista_inicio();
    revista($tema);
    revista_fin($num_tema);
?>