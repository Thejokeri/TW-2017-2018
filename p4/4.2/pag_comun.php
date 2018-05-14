<?php
  
    function index(){
            echo <<<HTML
                <!DOCTYPE html>
                <!-- Ejemplo de página web -->
                    <html lang="es">

                    <head>
                        <title>Tecnologías Web</title>
                        <meta charset="utf-8">
                        <meta name="author" content="Fernando Talavera Mendoza">
                        <meta name="keywords" content="tecnologías web, html, programación">
                        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
                    </head>

                    <body>
                        <h1>EDITODO</h1>
                        <form action="index.php" method="POST">
                            <fieldset>
                                <legend>Área Temática</legend>
                                Seleccion un área temática: <br>
                                <label><input type="radio" name="tema" value="divulgacion" checked/> Divulgación </label><br>
                                <label><input type="radio" name="tema" value="motor"/> Motor </label><br>
                                <label><input type="radio" name="tema" value="viajes"/> Viajes </label><br>
                            </fieldset>
                            <br>
                            <input type="submit" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
    }

    function valcuenta_bancaria($cuenta1,$cuenta2,$cuenta3,$cuenta4){
        if (strlen($cuenta1)!=4) return false;
        if (strlen($cuenta2)!=4) return false;
        if (strlen($cuenta3)!=2) return false;
        if (strlen($cuenta4)!=10) return false;

        if (mod11_cuenta_bancaria("00".$cuenta1.$cuenta2)!=$cuenta3[0]) return false;
        if (mod11_cuenta_bancaria($cuenta4)!=$cuenta3[1]) return false;
        return true;
    }

    function mod11_cuenta_bancaria($numero){
        if (strlen($numero)!=10) return "?";

        $cifras = Array(1,2,4,8,5,10,9,7,3,6);
        $chequeo=0;
        for ($i=0; $i < 10; $i++)
            $chequeo += substr($numero,$i,1) * $cifras[$i];

        $chequeo = 11 - ($chequeo % 11);
        if ($chequeo == 11) $chequeo = 0;
        if ($chequeo == 10) $chequeo = 1;
        return $chequeo;
    }

    function esmayordeedad($fechanacimiento){
        $from = new DateTime($fechanacimiento);
        $to = new DateTime('today');
        
        if($from->diff($to)->y > 18)
            return true;
        else
            return false;
    }

    function select_fechanac(){
        echo <<<HTML
                            Fecha de nacimiento: <br> <br>
                            <select name="diafecha">
                                <option value="" selected>día</option>
HTML;
                                for($i = 1; $i <= 31; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';
                    echo <<<HTML
                                </select>    
                                <select name="mesfecha">
                                    <option value="" selected>mes</option>
HTML;
                                for($i = 1; $i <= 12; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';
                    
                    echo <<<HTML
                                </select> 
                                <select name="aniofecha">
                                    <option value="" selected>año</option>
HTML;
                                for($i = 1900; $i <= 2018; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';
                    echo <<<HTML
                            </select>
HTML;
    }

    function select_fechatarjeta(){
        echo <<<HTML
                    Fecha de caducidad y código de seguridad: <br> <br>
HTML;
                    echo <<<HTML
                                <select name="mestarjeta">
                                    <option value="" selected>--</option>
HTML;
                                for($i = 1; $i <= 12; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                    </select> / 
HTML;
                    echo <<<HTML
                                <select name="aniotarjeta">
                                    <option value="" selected>----</option>
HTML;
                                for($i = 2018; $i <= 2029; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                </select>
                                <br> <br>
HTML;
    }

    function revista_inicio(){
        echo <<<HTML
            <!DOCTYPE html>
            <!-- Ejemplo de página web -->
                <html lang="es">

                <head>
                    <title>Tecnologías Web</title>
                    <meta charset="utf-8">
                    <meta name="author" content="Fernando Talavera Mendoza">
                    <meta name="keywords" content="tecnologías web, html, programación">
                    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
                </head>

                <body>
                    <h1>EDITODO</h1>
                    <form action="index.php" method="POST">
                        <fieldset>
                            <legend>Información personal</legend>
                                Nombre: <br> <br>
                                <input type="text" name="nombre"/>
                                <br> <br>
                                Apellidos: <br> <br>
                                <input type="text" name="apellidos"/> 
                                <br> <br>
                                Dirección Postal: <br> <br>
                                <input type="number" name="cp"/> 
                                <br> <br>
HTML;
                                echo select_fechanac();
                    echo <<<HTML
                                <br> <br>
                                Teléfono: <br> <br>
                                <input type="number" name="tlf"/>
                                <br> <br>
                                Email: <br> <br>
                                <input type="email" name="email"/> 
                                <br> <br>
                                Número de CC: <br> <br>
                                <input type="number" name="cc"/> 
                                <br> <br>
                        </fieldset>

                        <br>

                        <fieldset>
                            <legend>Información sobre la suscripción</legend>
                            Marque de entre todas estas revistas: <br> <br>
HTML;
}

    function revista($value){
        if($value == "divulgacion"){
            echo <<< HTML
            <label><input type="radio" name="revista" value="div1"/> Sabelotodo </label>
            <label><input type="radio" name="revista" value="div2"/> Solo sé que no sé nada </label>
            <label><input type="radio" name="revista" value="div3"/> Muy interesado </label>
            <label><input type="radio" name="revista" value="div4"/> Ciencia con sabor </label>
            <input type="hidden" name="divulgacion" value="">
            <br> <br>
HTML;
        }

        if($value == "motor"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="motor1"/> Supercoches </label>
            <label><input type="radio" name="revista" value="motor2"/> Corre que te pillo </label>
            <label><input type="radio" name="revista" value="motor3"/> El más lento de la carretera </label>
            <input type="hidden" name="motor" value="">
            <br> <br>
HTML;
        }

        if($value == "viajes"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="viajes1"/> Paraiso del mundo </label>
            <label><input type="radio" name="revista" value="viajes2"/> Conoce tu ciudad </label>
            <label><input type="radio" name="revista" value="viajes3"/> La casa de tu vecino: rincones inhóspitos </label>
            <input type="hidden" name="viajes" value="">
            <br> <br>
HTML;
        }   

    }

    function revista_fin($value){
        echo  <<<HTML
                                    Método de suscripción: <br> <br>
                                    <label><input type="radio" name="tiposuscripcion" value="anual"/> Anual </label>
                                    <label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual </label>
                                    <br> <br>
                                   
                                    Seleccione un métedo de pago: <br> <br>
                                    <label><input type="radio" name="metodopago" value="tarjeta"/> Tarjeta </label>
                                    <label><input type="radio" name="metodopago" value="contrareembolso"/> Contra reembolso </label>
                                    <br> <br>

                                    Marque su tarjeta: <br> <br>
                                    <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal </label>
                                    <label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney </label>
                                    <label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard </label>
                                    <label><input type="radio" name="tipotarjeta" value="visa"/> Visa </label>
                                    <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard </label>
                                    <label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express </label>
                                    <label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB </label>
                                    <br> <br>

                                    Número de tarjeta: <br> <br>
                                    <input type="number" name="numtarjeta"/> 
                                    <br> <br>
HTML;
                                    echo select_fechatarjeta();
                        echo <<<HTML
                                    CVC: <input type="number" min="3" name="cvc"/> 

                            </fieldset>
                            
                            <br>

                            <fieldset>
                                <legend>Otra información</legend>
                                    Temas de interés: <br> <br>                             
HTML;

                                    if($value == 1)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" checked/> Divulgación </label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" /> Divulgación </label> ';
                                    
                                    if($value == 2)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" checked/> Motor </label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" /> Motor </label> ';
                                    if($value == 3)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" checked/> Viajes </label> ';
                                    else  
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" /> Viajes </label> ';

echo <<<HTML
                            </fieldset>
                            <br>
                            <input type="checkbox" name="publicidad" value="true"/> Desea recibir publicidad a su email.<br> <br>
                            <br>
                            <input type="submit" name="botonenvio" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
    }

    function mb_revista_inicio($camposvacios, $campos, $validacion){
        echo <<<HTML
            <!DOCTYPE html>
            <!-- Ejemplo de página web -->
                <html lang="es">

                <head>
                    <title>Tecnologías Web</title>
                    <meta charset="utf-8">
                    <meta name="author" content="Fernando Talavera Mendoza">
                    <meta name="keywords" content="tecnologías web, html, programación">
                    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
                </head>

                <body>
                    <h1>EDITODO</h1>
                    <form action="index.php" method="POST">
                        <fieldset>
                            <legend>Información personal</legend>
                                Nombre: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'nombre')){
                                    $validacion['nombre'] = false;
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(preg_match('{^[A-Z][a-z]}', $campos['nombre'])){
                                        $validacion['nombre'] = true;
                                        echo '<input type="text" name="nombre" value="', $campos['nombre'], '"/>';
                                        echo "<br> <br>";
                                    }else{
                                        $validacion['nombre'] = false;
                                        echo '<input type="text" name="nombre" value="', $campos['nombre'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                }
                    echo <<<HTML
                                Apellidos: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'apellidos')){
                                    $validacion['apellidos'] = false;
                                    echo '<input type="text" name="apellidos"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(preg_match('{^[A-Z][a-z]}', $campos['apellidos'])){
                                        $validacion['apellidos'] = true;
                                        echo '<input type="text" name="apellidos" value="', $campos['apellidos'], '"/>';
                                        echo "<br> <br>";
                                    }else{
                                        $validacion['apellidos'] = false;
                                        echo '<input type="text" name="apellidos" value="', $campos['apellidos'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                }  
                    echo <<<HTML
                                Dirección Postal: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'cp')){
                                    $validacion['cp'] = false;
                                    echo '<input type="number" name="cp"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(preg_match('{^[0-9]{5}$}', $campos['cp'])){
                                        $validacion['cp'] = true;
                                        echo '<input type="number" name="cp" value="', $campos['cp'], '"/>';
                                        echo "<br> <br>";
                                    }else{
                                        $validacion['cp'] = false;
                                        echo '<input type="number" name="cp" value="', $campos['cp'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                }
                    echo <<<HTML
                                Fecha de nacimiento: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'diafecha') || is_vacio($camposvacios, 'mesfecha') || is_vacio($camposvacios, 'aniofecha')){
                                    $validacion['fechanacimiento'] = false;
                                    if(!is_vacio($camposvacios, 'diafecha')){
                                        echo '<select name="diafecha">';
                                        echo '<option value="', $campos['diafecha'], '" selected>', $campos['diafecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }else{
                                        echo '<select name="diafecha">';
                                        echo '<option value="" selected>día</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }

                                    if(!is_vacio($camposvacios, 'mesfecha')){
                                        echo '<select name="mesfecha">';
                                        echo '<option value="', $campos['mesfecha'], '" selected>', $campos['mesfecha'],'</option>';
                                        for($i = 1; $i <= 12; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }else{
                                        echo '<select name="mesfecha">';
                                        echo '<option value="" selected>mes</option>';
                                        for($i = 1; $i <= 12; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }
                                    
                                    if(!is_vacio($camposvacios, 'aniofecha')){
                                        echo '<select name="aniofecha">';
                                        echo '<option value="', $campos['aniofecha'], '" selected>', $campos['aniofecha'],'</option>';
                                        for($i = 1900; $i <= 2018; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }else{
                                        echo '<select name="aniofecha">';
                                        echo '<option value="" selected>año</option>';
                                            for($i = 1900; $i <= 2018; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    $fechanacimiento = $campos['aniofecha'] . '-' . $campos['mesfecha'] . '-' . $campos['diafecha']; 
                                    if(!esmayordeedad($fechanacimiento)){
                                        $validacion['fechanacimiento'] = false;
                                        echo '<select name="diafecha">';
                                        echo '<option value="', $campos['diafecha'], '" selected>', $campos['diafecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';

                                        echo '<select name="mesfecha">';
                                        echo '<option value="', $campos['mesfecha'], '" selected>', $campos['mesfecha'],'</option>';
                                            for($i = 1; $i <= 12; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    
                                        echo '<select name="aniofecha">';
                                        echo '<option value="', $campos['aniofecha'], '" selected>', $campos['aniofecha'],'</option>';
                                            for($i = 1900; $i <= 2018; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';

                                        echo '<p style="color:red;">Campo erroneo, no eres mayor de edad</p>';
                                    }else{
                                        $validacion['fechanacimiento'] = true;
                                        echo '<select name="diafecha">';
                                        echo '<option value="', $campos['diafecha'], '" selected>', $campos['diafecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';

                                        echo '<select name="mesfecha">';
                                        echo '<option value="', $campos['mesfecha'], '" selected>', $campos['mesfecha'],'</option>';
                                            for($i = 1; $i <= 12; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    
                                        echo '<select name="aniofecha">';
                                        echo '<option value="', $campos['aniofecha'], '" selected>', $campos['aniofecha'],'</option>';
                                            for($i = 1900; $i <= 2018; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';

                                        echo '<br> <br>';
                                    }
                                }
                        
                    echo <<<HTML

                                Teléfono: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'tlf')){
                                    $validacion['tlf'] = false;
                                    echo '<input type="number" name="tlf"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(preg_match('{^[0-9]{9}$}', $campos['tlf'])){
                                        $validacion['tlf'] = true;
                                        echo '<input type="number" name="tlf" value="', $campos['tlf'], '"/>';
                                        echo "<br> <br>";
                                    }else{
                                        $validacion['tlf'] = false;
                                        echo '<input type="number" name="tlf" value="', $campos['tlf'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                }
                    echo <<<HTML
                                Email: <br> <br>
HTML;
                                if(is_vacio($camposvacios, 'email')){
                                    $validacion['email'] = false;
                                    echo '<input type="email" name="email"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(filter_var($campos['email'], FILTER_VALIDATE_EMAIL)){
                                        $validacion['email'] = true;
                                        echo '<input type="email" name="email" value="', $campos['email'], '"/>';
                                        echo "<br> <br>";
                                    }else{
                                        $validacion['email'] = false;
                                        echo '<input type="email" name="email" value="', $campos['email'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                    
                                }
                    echo <<<HTML
                                Número de CC: <br> <br> 
HTML;
                                if(is_vacio($camposvacios, 'cc')){
                                    $validacion['cc'] = false;
                                    echo '<input type="number" name="cc"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    if(preg_match('{^[0-9]{20}$}', $campos['cc'])){
                                        $cuenta1 = substr($campos['cc'], 0, 4);
                                        $cuenta2 = substr($campos['cc'], 4, 4);
                                        $cuenta3 = substr($campos['cc'], 8, 2);
                                        $cuenta4 = substr($campos['cc'], 10, 10);

                                        if(valcuenta_bancaria($cuenta1,$cuenta2,$cuenta3,$cuenta4)){
                                            $validacion['cc'] = true;
                                            echo '<input type="number" name="cc" value="', $campos['cc'], '"/>';
                                            echo "<br> <br>";
                                        }else{
                                            $validacion['cc'] = false;
                                            echo '<input type="number" name="cc" value="', $campos['cc'], '"/>';
                                            echo '<p style="color:red;">Campo erroneo</p>';
                                        }
                                    }else{
                                        $validacion['cc'] = false;
                                        echo '<input type="number" name="cc" value="', $campos['cc'], '"/>';
                                        echo '<p style="color:red;">Campo erroneo</p>';
                                    }
                                }
                    echo <<<HTML
                        </fieldset>

                        <br>

                        <fieldset>
                            <legend>Información sobre la suscripción</legend>
                            Marque de entre todas estas revistas: <br> <br>
HTML;

        return $validacion;
    }

    function mb_revista($camposvacios, $campos, $validacion){
        if(!array_key_exists('revista',$campos)){
            $validacion['revista'] = false;
            if(is_vacio($camposvacios, 'divulgacion')){
                echo <<< HTML
                <input type="hidden" name="divulgacion" value="">
                <label><input type="radio" name="revista" value="div1"/> Sabelotodo </label>
                <label><input type="radio" name="revista" value="div2"/> Solo sé que no sé nada </label>
                <label><input type="radio" name="revista" value="div3"/> Muy interesado </label>
                <label><input type="radio" name="revista" value="div4"/> Ciencia con sabor </label>
                <p style="color:red;">Campo vacio</p>
HTML;
            }

            if(is_vacio($camposvacios, 'motor')){
                echo <<<HTML
                <input type="hidden" name="motor" value="">
                <label><input type="radio" name="revista" value="motor1"/> Supercoches </label>
                <label><input type="radio" name="revista" value="motor2"/> Corre que te pillo </label>
                <label><input type="radio" name="revista" value="motor3"/> El más lento de la carretera </label>
                <p style="color:red;">Campo vacio</p>
HTML;
            }

            if(is_vacio($camposvacios, 'viajes')){
                echo <<<HTML
                <input type="hidden" name="viajes" value="">
                <label><input type="radio" name="revista" value="viajes1"/> Paraiso del mundo </label>
                <label><input type="radio" name="revista" value="viajes2"/> Conoce tu ciudad </label>
                <label><input type="radio" name="revista" value="viajes3"/> La casa de tu vecino: rincones inhóspitos </label>
                <p style="color:red;">Campo vacio</p>
HTML;
            }   
        }else{
            $validacion['revista'] = true;
            if(is_vacio($camposvacios, 'divulgacion')){
                if($campos['revista'] == 'div1')
                    echo '<label><input type="radio" name="revista" value="div1" checked/> Sabelotodo </label>';
                else
                    echo '<label><input type="radio" name="revista" value="div1"/> Sabelotodo </label>';
                
                if($campos['revista'] == 'div2')
                    echo '<label><input type="radio" name="revista" value="div2" checked/> Solo sé que no sé nada </label>';
                else
                    echo '<label><input type="radio" name="revista" value="div2"/> Solo sé que no sé nada </label>';
                
                if($campos['revista'] == 'div3')
                    echo '<label><input type="radio" name="revista" value="div3" checked/> Muy interesado </label>';
                else
                    echo '<label><input type="radio" name="revista" value="div3"/> Muy interesado </label>';
                
                if($campos['revista'] == 'div4')
                    echo '<label><input type="radio" name="revista" value="div4" checked/> Ciencia con sabor </label>';
                else
                    echo '<label><input type="radio" name="revista" value="div4"/> Ciencia con sabor </label>';
                echo '<input type="hidden" name="divulgacion" value="">';
                echo '<br> <br>';
            }

            if(is_vacio($camposvacios, 'motor')){
                if($campos['revista'] == 'motor1')
                    echo '<label><input type="radio" name="revista" value="motor1" checked/> Supercoches </label>';
                else
                    echo '<label><input type="radio" name="revista" value="motor1"/> Supercoches </label>';
                
                if($campos['revista'] == 'motor2')
                    echo '<label><input type="radio" name="revista" value="motor2" checked/> Corre que te pillo </label>';
                else
                    echo '<label><input type="radio" name="revista" value="motor2"/> Corre que te pillo </label>';
                
                if($campos['revista'] == 'motor3')
                    echo '<label><input type="radio" name="revista" value="motor3" checked/> El más lento de la carretera </label>';
                else
                    echo '<label><input type="radio" name="revista" value="motor3"/> El más lento de la carretera </label>';

                echo '<input type="hidden" name="motor" value="">';
                echo '<br> <br>';
            }

            if(is_vacio($camposvacios, 'viajes')){
                if($campos['revista'] == 'viajes1')
                    echo '<label><input type="radio" name="revista" value="viajes1" checked/> Paraiso del mundo </label>';
                else
                    echo '<label><input type="radio" name="revista" value="viajes1"/> Paraiso del mundo </label>';
                
                if($campos['revista'] == 'viajes2')
                    echo '<label><input type="radio" name="revista" value="viajes2" checked/> Conoce tu ciudad </label>';
                else
                    echo '<label><input type="radio" name="revista" value="viajes2"/> Conoce tu ciudad </label>';
                
                if($campos['revista'] == 'viajes3')
                    echo '<label><input type="radio" name="revista" value="viajes3" checked/> La casa de tu vecino: rincones inhóspitos </label>';
                else
                    echo '<label><input type="radio" name="revista" value="viajes3"/> La casa de tu vecino: rincones inhóspitos </label>';

                echo '<input type="hidden" name="viajes" value="">';
                echo '<br> <br>';
            }  
        }
        
        return $validacion;
    }

    function mb_revista_fin($camposvacios, $campos, $validacion){
        $tarjeta = false;
        echo  <<<HTML
                                    Método de suscripción: <br> <br>
HTML;
                                    if(!array_key_exists('tiposuscripcion',$campos)){
                                        $validacion['tiposuscripcion'] = false;
                                        echo '<label><input type="radio" name="tiposuscripcion" value="anual"/> Anual </label>';
                                        echo '<label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual </label>';
                                        echo '<p style="color:red;">Campo vacio</p>';
                                    }else{
                                        $validacion['tiposuscripcion'] = true;
                                        if($campos['tiposuscripcion'] == 'anual')
                                            echo '<label><input type="radio" name="tiposuscripcion" value="anual" checked/> Anual </label>';
                                        else
                                            echo '<label><input type="radio" name="tiposuscripcion" value="anual"/> Anual </label>';
                                         
                                        if($campos['tiposuscripcion'] == 'bianual')
                                            echo '<label><input type="radio" name="tiposuscripcion" value="bianual" checked/> Bianual </label>';   
                                        else
                                            echo '<label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual </label>';

                                        echo '<br> <br>';
                                    }
                        echo <<<HTML
                                   
                                    Seleccione un métedo de pago: <br> <br>
HTML;
                                    if(!array_key_exists('metodopago',$campos)){
                                        $validacion['metodopago'] = false;
                                        echo '<label><input type="radio" name="metodopago" value="tarjeta"/> Tarjeta </label>';
                                        echo '<label><input type="radio" name="metodopago" value="contrareembolso"/> Contra reembolso </label>';
                                        echo '<p style="color:red;">Campo vacio</p>';
                                    }else{
                                        $validacion['metodopago'] = true;
                                        if($campos['metodopago'] == 'tarjeta'){
                                            $tarjeta = true;
                                            echo '<label><input type="radio" name="metodopago" value="tarjeta" checked/> Tarjeta </label>';
                                        }else
                                            echo '<label><input type="radio" name="metodopago" value="tarjeta"/> Tarjeta </label>';
                                         
                                        if($campos['metodopago'] == 'contrareembolso')
                                            echo '<label><input type="radio" name="metodopago" value="contrareembolso" checked/> Contra reembolso </label>';   
                                        else
                                            echo '<label><input type="radio" name="metodopago" value="contrareembolso"/> Contra reembolso </label>';
                                        
                                        echo '<br> <br>';
                                    }
                        echo <<<HTML
                                    

                                    Marque su tarjeta: <br> <br>
HTML;
                                    if($tarjeta){
                                        if(!array_key_exists('tipotarjeta',$campos)){
                                            $validacion['tipotarjeta'] = false;
                                            echo '<label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="visa"/> Visa </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express </label>';
                                            echo '<label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB </label>';
                                            echo '<p style="color:red;">Campo vacio</p>';  
                                        }else{
                                            $validacion['tipotarjeta'] = true;
                                            if($campos['tipotarjeta'] == 'paypal')
                                                echo '<label><input type="radio" name="tipotarjeta" value="paypal" checked/> Paypal </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal </label>';

                                            if($campos['tipotarjeta'] == 'webmoney')
                                                echo '<label><input type="radio" name="tipotarjeta" value="webmoney" checked/> WebMoney </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney </label>';

                                            if($campos['tipotarjeta'] == 'paysafecard')
                                                echo '<label><input type="radio" name="tipotarjeta" value="paysafecard" checked/>  paysafecard </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard </label>';

                                            if($campos['tipotarjeta'] == 'Visa')
                                                echo '<label><input type="radio" name="tipotarjeta" value="visa" checked/> Visa </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="visa"/> Visa </label>';

                                            if($campos['tipotarjeta'] == 'mastercard')
                                                echo '<label><input type="radio" name="tipotarjeta" value="mastercard" checked/> MasterCard </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard </label>';

                                            if($campos['tipotarjeta'] == 'americanexpress')
                                                echo '<label><input type="radio" name="tipotarjeta" value="americanexpress" checked/>  American Express </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express </label>';

                                            if($campos['tipotarjeta'] == 'jcb')
                                                echo '<label><input type="radio" name="tipotarjeta" value="jcb" checked/>  JCB </label>';
                                            else
                                                echo '<label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB </label>';
                                            
                                            echo '<br> <br>';
                                        }
                                    }else{
                                        echo '<label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="visa"/> Visa </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express </label>';
                                        echo '<label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB </label>';
                                        echo '<br> <br>';
                                    }

                        echo <<<HTML

                                    Número de tarjeta: <br> <br>
HTML;
                                    if($tarjeta){
                                        if(is_vacio($camposvacios, 'numtarjeta')){
                                            $validacion['numtarjeta'] = false;
                                            echo '<input type="text" name="numtarjeta"/>';
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }else{
                                            if(preg_match('{^[0-9]{16}$}', $campos['numtarjeta'])){
                                                $validacion['numtarjeta'] = true;
                                                echo '<input type="text" name="numtarjeta" value="', $campos['numtarjeta'], '"/>';
                                                echo "<br> <br>";
                                            }else{
                                                $validacion['numtarjeta'] = true;
                                                echo '<input type="text" name="numtarjeta" value="', $campos['numtarjeta'], '"/>';
                                                echo '<p style="color:red;">Campo erroneo</p>';
                                            }
                                        }
                                    }else{
                                        echo '<input type="text" name="numtarjeta"/>';
                                        echo "<br> <br>";
                                    }

                                    if($tarjeta){
                                        if(is_vacio($camposvacios, 'mestarjeta') || is_vacio($camposvacios, 'aniotarjeta')){
                                            $validacion['tarjetaefecha'] = false;
                                            echo "Fecha de caducidad y código de seguridad: <br> <br>";
                                            if(!is_vacio($camposvacios, 'mestarjeta')){
                                                echo '<select name="mestarjeta">';
                                                echo '<option value="', $campos['mestarjeta'], '" selected>', $campos['mestarjeta'],'</option>';
                                                for($i = 1; $i <= 12; $i++)
                                                    echo '<option value="',$i,'">',$i,'</option>';
                                                echo '</select>';
                                            }else{
                                                echo '<select name="mestarjeta">';
                                                echo '<option value="" selected>--</option>';
                                                for($i = 1; $i <= 12; $i++)
                                                    echo '<option value="',$i,'">',$i,'</option>';
                                                echo '</select>';
                                            }
                                        
                                            if(!is_vacio($camposvacios, 'aniotarjeta')){
                                                echo '<select name="aniotarjeta">';
                                                echo '<option value="', $campos['aniotarjeta'], '" selected>', $campos['aniotarjeta'],'</option>';
                                                for($i = 2018; $i <= 2029; $i++)
                                                    echo '<option value="',$i,'">',$i,'</option>';
                                                echo '</select>';
                                            }else{
                                                echo '<select name="aniotarjeta">';
                                                echo '<option value="" selected>----</option>';
                                                    for($i = 2018; $i <= 2029; $i++)
                                                        echo '<option value="',$i,'">',$i,'</option>';
                                                echo '</select>';
                                            }
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }else{
                                            $validacion['tarjetaefecha'] = true;
                                            echo "Fecha de caducidad y código de seguridad: <br> <br>";
                                            echo '<select name="mestarjeta">';
                                            echo '<option value="', $campos['mestarjeta'], '" selected>', $campos['mestarjeta'],'</option>';
                                                for($i = 1; $i <= 12; $i++)
                                                    echo '<option value="',$i,'">',$i,'</option>';
                                            echo '</select>';
                                            
                                            echo '<select name="aniotarjeta">';
                                            echo '<option value="', $campos['aniotarjeta'], '" selected>', $campos['aniotarjeta'],'</option>';
                                                for($i = 2018; $i <= 2029; $i++)
                                                    echo '<option value="',$i,'">',$i,'</option>';
                                            echo '</select>';
                                            echo "<br> <br>";
                                        }
                                    }else{
                                        echo select_fechatarjeta();
                                    }
                        echo <<<HTML
                                    CVC:
HTML;
                                    if($tarjeta){
                                        if(is_vacio($camposvacios, 'cvc')){
                                            $validacion['cvc'] = false;
                                            echo '<input type="number" min="3" name="cvc"/>';
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }else{
                                            if(preg_match('{^[0-9]{3}$}', $campos['cvc'])){
                                                $validacion['cvc'] = true;
                                                echo '<input type="number" min="3" name="cvc" value="', $campos['cvc'], '"/>';
                                            }else{
                                                $validacion['cvc'] = false;
                                                echo '<input type="number" min="3" name="cvc" value="', $campos['cvc'], '"/>';
                                                echo '<p style="color:red;">Campo erroneo</p>';
                                            }
                                        }
                                    }else{
                                        echo '<input type="number" min="3" name="cvc"/>';
                                    }
                    echo <<<HTML
                            </fieldset>
                            
                            <br>

                            <fieldset>
                                <legend>Otra información</legend>
                                    Temas de interés: <br> <br>                             
HTML;
                                    if(is_vacio($camposvacios, 'divulgacion'))
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" checked/> Divulgación </label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" /> Divulgación </label> ';
                                    
                                    if(is_vacio($camposvacios, 'motor'))
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" checked/> Motor </label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" /> Motor </label> ';
                                    if(is_vacio($camposvacios, 'viajes'))
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" checked/> Viajes </label> ';
                                    else  
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" /> Viajes </label> ';

echo <<<HTML
                            </fieldset>
                            <br>
                            <input type="checkbox" name="publicidad" value="true"/> Desea recibir publicidad a su email.<br> <br>
                            <br>
                            <input type="submit" name="botonenvio" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
    
    return $validacion;
    }

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

    function is_vacio($camposvacios, $nombre){
        $indice = array_search($nombre, $camposvacios);
        if($camposvacios[$indice] == $nombre){
            return true;
        }else{
            unset($camposvacios[$nombre]);
            return false;
        }
    }

    function validacion($value){

        if(!empty($value)){
            foreach ($value as $key => $valor){
                if(!$valor){
                    return false;
                }
            }
        }else
            return false;

        return true;
    }

    function listar_info($post){
        echo <<<HTML
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <title id="titulo">Variables recibidas</title>
                    </head>
                <body>
HTML;
                        echo "<ul>";

                        foreach ($post as $c => $v) {
                            if (is_array($v)) { 
                                echo "<li>$c = "; 
                                print_r($v); 
                                echo "</li>";
                            } else
                                echo "<li>$c = $v</li>";
                        }
                            
                        echo "</ul>"; 
                        
        echo <<<HTML
                </body>
            </html>
HTML;
    }
?>