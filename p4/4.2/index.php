<?php
    require "pag_comun.php";
    
    if(isset($_POST['botonenvio'])){
        // Validar los datos
        
        $camposvacios = array_keys($_POST, NULL);
        $campos = $_POST;
        $validacion = array();

        ob_start();
        $validacion = mb_revista_inicio($camposvacios, $campos, $validacion);
        $validacion = mb_revista($camposvacios, $campos, $validacion);
        $validacion = mb_revista_fin($camposvacios, $campos, $validacion);

        if(validacion($validacion)){
            ob_end_clean();
            if($campos['metodopago'] == 'contrareembolso'){
                unset($campos['tipotarjeta']);
                unset($campos['numtarjeta']);
                unset($campos['mestarjeta']);
                unset($campos['aniotarjeta']);
                unset($campos['cvc']);
            }

            unset($campos['divulgacion']);
            unset($campos['motor']);
            unset($campos['viajes']);
            
            listar_info($campos);
        }
    }else{
        if(isset($_POST['tema'])) {  
            // Generar el formulario
            $tema = urlencode($_POST['tema']);
            $num_tema = num_tema($tema);
            revista_inicio();
            revista($tema);
            revista_fin($num_tema);
        }else{
            // Generar el index
            index();
        }
    }

?>