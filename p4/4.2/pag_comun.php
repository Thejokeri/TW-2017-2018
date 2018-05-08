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
                        <p>Seleccione de nuestro amplio catálogo de revistas entre estas temáticas:</p>
                        <form action="pag_revista.php" method="GET">
                            <fieldset>
                                <legend>Área Temática</legend>
                                Seleccion un área temática: <br>
                                <label><input type="radio" name="tema" value="divulgacion"/> Divulgación</label><br>
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
                    <form action="procesa.1.php" method="GET">
                        <fieldset>
                            <legend>Información personal</legend>
                                Nombre: <br>
                                <input type="text" name="nombre"/> <br> <br>
                                Apellidos: <br>
                                <input type="text" name="apellidos"/> <br> <br>
                                Dirección Postal: <br>
                                <input type="number" name="cp"/> <br> <br>
                                Fecha de nacimiento: <br>
                                <select name="diafecha">
                                    <option value="--" selected>día</option>
HTML;
                                for($i = 1; $i <= 31; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';
                    echo <<<HTML
                                </select>    
                                <select name="mesfecha">
                                    <option value="--" selected>mes</option>
HTML;
                                for($i = 1; $i <= 12; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';
                    
                    echo <<<HTML
                                </select> 
                                <select name="aniofecha">
                                    <option value="----" selected>año</option>
HTML;
                                for($i = 1900; $i <= 2018; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

        echo <<<HTML
                                </select> 
                                <br> <br>
                                Teléfono: <br>
                                <input type="number" name="tlf"/> <br> <br>
                                Email: <br>
                                <input type="text" name="email"/> <br> <br>
                                Número de CC: <br>
                                <input type="number" name="cc"/> <br> <br>
                        </fieldset>

                        <br>

                        <fieldset>
                            <legend>Información sobre la suscripción</legend>
HTML;
    }

    function revista($value){
        if($value == "divulgacion"){
            echo 'Marque de entre todas estas revistas: <br>
            <label><input type="checkbox" name="revista[]" value="div1"/> Sabelotodo</label>
            <label><input type="checkbox" name="revista[]" value="div2"/> Solo sé que no sé nada</label>
            <label><input type="checkbox" name="revista[]" value="div3"/> Muy interesado</label>
            <label><input type="checkbox" name="revista[]" value="div4"/> Ciencia con sabor</label>
            <br> <br>';
        }

        if($value == "motor"){
            echo 'Marque de entre todas estas revistas: <br>
            <label><input type="checkbox" name="revista[]" value="div1"/> Supercoches</label>
            <label><input type="checkbox" name="revista[]" value="div2"/> Corre que te pillo</label>
            <label><input type="checkbox" name="revista[]" value="div3"/> El más lento de la carretera</label>
            <br> <br>';
        }

        if($value == "viajes"){
            echo 'Marque de entre todas estas revistas: <br>
            <label><input type="checkbox" name="revista[]" value="div1"/> Paraiso del mundo</label>
            <label><input type="checkbox" name="revista[]" value="div2"/> Conoce tu ciudad</label>
            <label><input type="checkbox" name="revista[]" value="div3"/> La casa de tu vecino: rincones inhóspitos</label>
            <br> <br>';
        }             
    }

    function revista_fin($value){
        echo  <<<HTML
                                    Método de suscripción: <br>
                                    <label><input type="radio" name="tiposuscripcion" value="anual"/> Anual</label>
                                    <label><input type="radio" name="tiposuscripcion" value="bianual"/> Bianual</label>
                                    <br> <br>

                                    Seleccione un métedo de pago: <br>
                                    <label><input type="radio" name="pago" value="tarjeta"/> Tarjeta</label>
                                    <label><input type="radio" name="pago" value="contrareembolso"/> Contra reembolso</label>
                                    <br> <br>

                                    Marque su tarjeta: <br>
                                    <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal</label>
                                    <label><input type="radio" name="tipotarjeta" value="webmoney"/> WebMoney</label>
                                    <label><input type="radio" name="tipotarjeta" value="paysafecard"/> paysafecard</label>
                                    <label><input type="radio" name="tipotarjeta" value="Visa"/> Visa</label>
                                    <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard</label>
                                    <label><input type="radio" name="tipotarjeta" value="americanexpress"/> American Express</label>
                                    <label><input type="radio" name="tipotarjeta" value="jcb"/> JCB</label>
                                    <br> <br>

                                    Número de tarjeta: <br>
                                    <input type="number" name="numtarjeta"/> <br> <br>
                                    
                                    Fecha de caducidad y código de seguridad: <br>
HTML;

                    echo <<<HTML
                                <select name="mestarjeta">
                                    <option value="--" selected>--</option>
HTML;
                                for($i = 1; $i <= 12; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                    </select> / 
HTML;
                    echo <<<HTML
                                <select name="aniotarjeta">
                                    <option value="--" selected>----</option>
HTML;
                                for($i = 2018; $i <= 2029; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                    </select>
                                    CVC: <input type="number" min="3" name="cvc"/> <br> <br>
                            </fieldset>
                            
                            <br>

                            <fieldset>
                                <legend>Otra información</legend>
                                    Temas de interés: <br>                               
HTML;

                                    if($value == 1)
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="1" checked/>Divulgación</label>';
                                    else
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="1" />Divulgación</label>';
                                    
                                    if($value == 2)
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="2" checked/>Motor</label>';
                                    else
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="2" />Motor</label>';
                                    if($value == 3)
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="3" checked/>Viajes</label>';
                                    else  
                                        echo '<label><input type="checkbox" name="temas-interes[]" value="3" />Viajes</label>';

echo <<<HTML
                            </fieldset>
                            <br>
                            <input type="checkbox" name="guardar" value="true"/> Desea recibir publicidad a su email.<br> <br>
                            <br>
                            <input type="submit" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
    }
?>