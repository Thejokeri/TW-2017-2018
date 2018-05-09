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
                                <label><input type="radio" name="tema" value="divulgacion" checked/> Divulgación</label><br>
                                <label><input type="radio" name="tema" value="motor"/> Motor</label><br>
                                <label><input type="radio" name="tema" value="viajes"/> Viajes</label><br>
                            </fieldset>
                            <br>
                            <input type="submit" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
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
                    <p>Seleccione de nuestro amplio catálogo de revistas entre estas temáticas:</p>
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
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }

        if($value == "motor"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="motor1"/> Supercoches </label>
            <label><input type="radio" name="revista" value="motor2"/> Corre que te pillo </label>
            <label><input type="radio" name="revista" value="motor3"/> El más lento de la carretera </label>
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }

        if($value == "viajes"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="viajes1"/> Paraiso del mundo </label>
            <label><input type="radio" name="revista" value="viajes2"/> Conoce tu ciudad </label>
            <label><input type="radio" name="revista" value="viajes3"/> La casa de tu vecino: rincones inhóspitos </label>
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }   

    }

    function revista_fin($value){
        echo  <<<HTML
                                    Método de suscripción: <br> <br>
                                    <label><input type="radio" name="tiposuscripcion" value="anual"/> Anual</label>
                                    <label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual</label>
                                    <input type="hidden" name="tiposuscripcion" value="">
                                   
                                    Seleccione un métedo de pago: <br> <br>
                                    <label><input type="radio" name="pago" value="tarjeta"/> Tarjeta</label>
                                    <label><input type="radio" name="pago" value="contrareembolso"/> Contra reembolso</label>
                                    <input type="hidden" name="metodopagohidden" value="">

                                    Marque su tarjeta: <br> <br>
                                    <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal</label>
                                    <label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney</label>
                                    <label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard</label>
                                    <label><input type="radio" name="tipotarjeta" value="Visa"/> Visa</label>
                                    <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard</label>
                                    <label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express</label>
                                    <label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB</label>
                                    <input type="hidden" name="tipotarjetahidden" value="">
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
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" checked/>Divulgación</label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" />Divulgación</label> ';
                                    
                                    if($value == 2)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" checked/>Motor</label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" />Motor</label> ';
                                    if($value == 3)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" checked/>Viajes</label> ';
                                    else  
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" />Viajes</label> ';

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

    function mb_revista_inicio($campos_vacios, $campos){
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
                    <p>Seleccione de nuestro amplio catálogo de revistas entre estas temáticas:</p>
                    <form action="index.php" method="POST">
                        <fieldset>
                            <legend>Información personal</legend>
                                Nombre: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'nombre')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['nombre'], '"/>';
                                    echo "<br> <br>";
                                }
                    echo <<<HTML
                                Apellidos: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'apellidos')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['apellidos'], '"/>';
                                    echo "<br> <br>";
                                }  
                    echo <<<HTML
                                Dirección Postal: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'cp')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['cp'], '"/>';
                                    echo "<br> <br>";
                                }
                    echo <<<HTML
                                Fecha de nacimiento: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'diafecha') || is_vacio($campos_vacios, 'mesfecha') || is_vacio($campos_vacios, 'aniofecha')){
                                    if(!is_vacio($campos_vacios, 'diafecha')){
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

                                    if(!is_vacio($campos_vacios, 'mesfecha')){
                                        echo '<select name="mesfecha">';
                                        echo '<option value="', $campos['mesfecha'], '" selected>', $campos['mesfecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }else{
                                        echo '<select name="mesfecha">';
                                        echo '<option value="" selected>mes</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }
                                    
                                    if(!is_vacio($campos_vacios, 'aniofecha')){
                                        echo '<select name="aniofecha">';
                                        echo '<option value="', $campos['aniofecha'], '" selected>', $campos['aniofecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }else{
                                        echo '<select name="aniofecha">';
                                        echo '<option value="" selected>año</option>';
                                            for($i = 1; $i <= 31; $i++)
                                                echo '<option value="',$i,'">',$i,'</option>';
                                        echo '</select>';
                                    }
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<select name="diafecha">';
                                    echo '<option value="', $campos['diafecha'], '" selected>', $campos['diafecha'],'</option>';
                                    for($i = 1; $i <= 31; $i++)
                                        echo '<option value="',$i,'">',$i,'</option>';
                                    echo '</select>';

                                    echo '<select name="mesfecha">';
                                    echo '<option value="', $campos['mesfecha'], '" selected>', $campos['mesfecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                    echo '</select>';
                                    
                                    echo '<select name="aniofecha">';
                                    echo '<option value="', $campos['aniofecha'], '" selected>', $campos['aniofecha'],'</option>';
                                        for($i = 1; $i <= 31; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                                    echo '</select>';
                                    echo "<br> <br>";
                                }
                        
                    echo <<<HTML

                                Teléfono: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'tlf')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['tlf'], '"/>';
                                    echo "<br> <br>";
                                }
                    echo <<<HTML
                                Email: <br> <br>
HTML;
                                if(is_vacio($campos_vacios, 'email')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['email'], '"/>';
                                    echo "<br> <br>";
                                }
                    echo <<<HTML
                                Número de CC: <br> <br> 
HTML;
                                if(is_vacio($campos_vacios, 'cc')){
                                    echo '<input type="text" name="nombre"/>';
                                    echo '<p style="color:red;">Campo vacio</p>';
                                }else{
                                    echo '<input type="text" name="nombre" value="', $campos['cc'], '"/>';
                                    echo "<br> <br>";
                                }
                    echo <<<HTML
                        </fieldset>

                        <br>

                        <fieldset>
                            <legend>Información sobre la suscripción</legend>
                            Marque de entre todas estas revistas: <br> <br>
HTML;
    }

    function mb_revista(){
        if($value == "divulgacion"){
            echo <<< HTML
            <label><input type="radio" name="revista" value="div1"/> Sabelotodo </label>
            <label><input type="radio" name="revista" value="div2"/> Solo sé que no sé nada </label>
            <label><input type="radio" name="revista" value="div3"/> Muy interesado </label>
            <label><input type="radio" name="revista" value="div4"/> Ciencia con sabor </label>
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }

        if($value == "motor"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="motor1"/> Supercoches </label>
            <label><input type="radio" name="revista" value="motor2"/> Corre que te pillo </label>
            <label><input type="radio" name="revista" value="motor3"/> El más lento de la carretera </label>
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }

        if($value == "viajes"){
            echo <<<HTML
            <label><input type="radio" name="revista" value="viajes1"/> Paraiso del mundo </label>
            <label><input type="radio" name="revista" value="viajes2"/> Conoce tu ciudad </label>
            <label><input type="radio" name="revista" value="viajes3"/> La casa de tu vecino: rincones inhóspitos </label>
            <input type="hidden" name="revistas">
            <br> <br>
HTML;
        }   

    }

    function mb_revista_fin(){
        echo  <<<HTML
                                    Método de suscripción: <br> <br>
                                    <label><input type="radio" name="tiposuscripcion" value="anual"/> Anual</label>
                                    <label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual</label>
                                    <input type="hidden" name="tiposuscripcion" value="">
                                   
                                    Seleccione un métedo de pago: <br> <br>
                                    <label><input type="radio" name="pago" value="tarjeta"/> Tarjeta</label>
                                    <label><input type="radio" name="pago" value="contrareembolso"/> Contra reembolso</label>
                                    <input type="hidden" name="metodopagohidden" value="">

                                    Marque su tarjeta: <br> <br>
                                    <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal</label>
                                    <label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney</label>
                                    <label><input type="radio" name="tipotarjeta" value="paysafecard"/>  paysafecard</label>
                                    <label><input type="radio" name="tipotarjeta" value="Visa"/> Visa</label>
                                    <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard</label>
                                    <label><input type="radio" name="tipotarjeta" value="americanexpress"/>  American Express</label>
                                    <label><input type="radio" name="tipotarjeta" value="jcb"/>  JCB</label>
                                    <input type="hidden" name="tipotarjetahidden" value="">
                                    <br> <br>

                                    Número de tarjeta: <br> <br>
                                    <input type="number" name="numtarjeta"/> 
                                    <br> <br>
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
                                    CVC: <input type="number" min="3" name="cvc"/> 

                            </fieldset>
                            
                            <br>

                            <fieldset>
                                <legend>Otra información</legend>
                                    Temas de interés: <br> <br>                             
HTML;

                                    if($value == 1)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" checked/>Divulgación</label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="1" />Divulgación</label> ';
                                    
                                    if($value == 2)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" checked/>Motor</label> ';
                                    else
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="2" />Motor</label> ';
                                    if($value == 3)
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" checked/>Viajes</label> ';
                                    else  
                                        echo '&nbsp;<label><input type="checkbox" name="temas-interes[]" value="3" />Viajes</label> ';

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

    function validacion($post){
        if(isset($_POST['nombre'])){

        }

        if(isset($_POST['apellidos'])){

        }

        if(isset($_POST['cp'])){

        }

        if(isset($_POST['diafecha']) && isset($_POST['mesfecha']) && isset($_POST['aniofecha'])){

        }

        if(isset($_POST['tlf'])){

        }

        if(isset($_POST['cc'])){

        }

        if(isset($_POST['numtarjeta'])){

        }

        if(isset($_POST['mestarjeta'])){

        }

        if(isset($_POST['aniotarjeta'])){

        }

        if(isset($_POST['cvc'])){

        }

        return true;
    }

    function listar_info($post){
            echo "<p>Listando los elementos del formulario: </p>"; 
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
    }
?>