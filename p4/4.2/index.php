<?php
    require "pag_comun.php";
    
    $validacion = array();

    if(isset($_POST['botonenvio']) && validacion($validacion) && !empty($validacion))
        listar_info($campos);
    else{
        if(isset($_POST['botonenvio'])){
            // Validar los datos
        
            $camposvacios = array_keys($_POST, NULL);
            $campos = $_POST;
            
            $validacion = mb_revista_inicio($camposvacios, $campos, $validacion);
            $validacion = mb_revista($camposvacios, $campos, $validacion);
            $validacion = mb_revista_fin($camposvacios, $campos, $validacion);
            
        }else{
            if(isset($_POST['tema'])) {  
                // Generar el formulario
                $tema = urlencode($_POST['tema']);
                $num_tema = num_tema($tema);
                revista_inicio();
                revista($tema);
                revista_fin($num_tema);
            }else
                // Generar el index
                index();
        }
    }

?>