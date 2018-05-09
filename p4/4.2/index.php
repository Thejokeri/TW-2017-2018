<?php
    require "pag_comun.php";
    
    if(isset($_POST['botonenvio'])){
        // Validar los datos
    
        $camposvacios = array_keys($_POST, NULL);
        $campos = $_POST;

        print_r($campos);
        
        mb_revista_inicio($camposvacios, $campos);
        mb_revista($tema);
        mb_revista_fin($num_tema);
        
        if(empty($camposvacios)){
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