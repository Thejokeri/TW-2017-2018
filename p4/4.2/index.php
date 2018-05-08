<?php
    require "pag_comun.php";
    
    if(isset($_POST['botonenvio'])){
        // Validar los datos
        $camposvacio = array_keys($_POST, null);
        
        if(empty($camposvacio)){
            if(validacion($_POST))
                listar_info($_POST);
        }
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
    
?>