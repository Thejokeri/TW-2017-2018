<?php

    // Encabezado de los HTMLs
    function Encabezado($value){
        $items = ["Home", "Biografía", "Discografía", "Tienda"];
        $links = ["index.php?id=0", "index.php?id=1", "index.php?id=2", "index.php?id=3"];
        echo <<<HTML
                        <!DOCTYPE html>
                        <!-- Ejemplo de página web -->
                        <html lang="es">   
                            <head>
HTML;
                                //Selecciono el titulo
                                echo "<title>Daft Punk | ".$items[$value]."</title>";
echo <<< HTML
                                <meta charset="utf-8">
                                <meta name="author" content="Fernando Talavera Mendoza">
                                <meta name="keywords" content="tecnologías web, html, programación">
                                <link rel="shortcut icon" href="./img/favicon.png" type="image/png">
                                <link rel="stylesheet" href="./style.css">
                            </head>
                            
                            <body class="grid">
                                <header class="header-grid">
                                    <img src="./img/logo-image-file.png" alt="Logo Imagen"/>
                                </header>
                                <nav class="nav-grid">
                                    <ul>
HTML;
                        // Genero el nav y activo el <a>
                        foreach ($items as $k => $v)
                            echo "<li".($k==$value?" class='active'":"").">"."<a href='".$links[$k]."'>".$v."</a></li>";
        echo <<<HTML
                                        <li id="right">
                                            <a href="index.php?login=0">Login</a>
                                        </li>
                                        <li id="right">
                                            <a href="index.php?register=0">Register</a>
                                        </li>
                                    </ul>
                                </nav>
HTML;
    }

    // Aside 
    function aside(){
        echo <<<HTML
            <aside class="aside-grid">
                hola
                <!--<form action="busqueda.php" method="POST">
                    <input type="text" name="discografia_search" placeholder="Buscar un disco, una canción o poner dos fechas"/>
                    <input type="submit" name="discografia_searchbutton" value="Enviar"/>
                </form>

                <form action="busqueda.php" method="POST">
                    <select name="conciertos_search" multiple>
                        
                    </select>
                    <br>
                    <input type="submit" name="conciertos_searchbutton" value="Enviar"/>
                </form>-->
            </aside>
HTML;
        /*  Edicion del archivo
            Gestor de compras
        */
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

    // El contenido del main de cada página
    function content($value){
        switch($value){
            // Home
            case 0:
                echo <<<HTML
                    <main class="main-grid">
                        <article>
                            <h1> Lorem ipusum </h1>
                            <p> Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum  
                                Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum Lorem ipusum 
                            </p>
                        </article>
                    </main>
HTML;
            break;

            // Biografía
            case 1:
                echo <<<HTML
                    <main class="main-grid">
                        <article>
            
                        </article>
                    </main> 
HTML;
            break;

            // Discografía
            case 2:
                echo <<<HTML
                    <main class="main-grid">
                        <article>

                        </article>
                    </main>
HTML;
            break;

            // Tienda
            case 3:
                echo <<<HTML
                    <main class="main-grid">
                        <article>
                            <h2>Tienda</h2>
                            
                            <!-- Añadir los albumes y el tipo de tarjeta y checkbox -->
                            <form action="index.php" method="POST">
                                <fieldset>
                                    <legend>Merchandise Oficial</legend>
                                    Álbumes: <br>
                                    <label><input type="checkbox" name="compra[]" value="homework"/> Homework</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="discovery"/> Discovery</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="human after all"/> Human After All</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="tron" /> Tron: Legacy</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="ram"/> Random Access Memories</label> <br>
                                </fieldset>

                                <fieldset>
                                    <legend>Datos personales y dirección de facturización</legend>
                                        Nombre: <br>
                                        <input type="text" name="nombre"/> <br> <br>
                                        Apellidos: <br>
                                        <input type="text" name="apellidos"/> <br> <br>
                                        Email: <br>
                                        <input type="email" name="email"/> <br> <br>
                                        Teléfono: <br>
                                        <input type="tel" name="tlf"/> <br> <br>
                                        Código Postal: <br>
                                        <input type="number" name="cp"/> <br> <br>
                                </fieldset>

                                <fieldset>
                                    <legend>Método de pago</legend>
                                        Seleccione un método de pago: <br> <br>
                                        <label><input type="radio" name="metodopago" value="tarjeta"/> Tarjeta </label>
                                        <label><input type="radio" name="metodopago" value="contrareembolso"/> Contra-reembolso </label>
                                        <br> <br>
                                        
                                        Seleccione una tarjeta: <br>
                                        <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal</label>
                                        <label><input type="radio" name="tipotarjeta" value="visa"/> Visa</label>
                                        <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard</label>
                                        <label><input type="radio" name="tipotarjeta" value="americanexpress"/> American Express</label>
                                        <br> <br>

                                        Número de tarjeta: <br>
                                        <input type="number" name="numtarjeta"/> <br> <br>
HTML;
                                        select_fechatarjeta();
                    echo <<<HTML
                                        CVC: <input type="number" min="3" name="cvc"/> <br> <br>
                                </fieldset>
                            
                                <input type="submit" name="enviar" value="Enviar" /> <input type="reset" value="Limpiar formulario"/>
                            </form>
                        </article>
                    </main> 
HTML;
            break;
        }



        // Generar el formuliario de Login register 
    }

    // Footer
    function Footer(){
        echo <<<HTML
                            <footer class="footer-grid">
                                <ul>
                                    <li><a>© 2018 Copyright</a></li>
                                    <li><a>Designed and built by Thejoker</a></li>
                                </ul>
                            </footer>
                        </body>
                    </html>
HTML;
    }
?>