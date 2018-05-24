<?php

    // Encabezado de los HTMLs
    function Encabezado($value){
        $items = ["Home", "Biografía", "Discografía", "Conciertos"];
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
                                            <a href="index.php?register=0">Register</a>
                                        </li>
                                        <li id="right">
                                            <a href="index.php?login=0">Login</a>
                                        </li>
                                    </ul>
                                </nav>
HTML;
    }

    // Aside 
    function aside(){
        echo <<<HTML
            <aside class="aside-grid">
                <span><form action="busqueda.php" method="POST">
                    <span><label>Buscar un disco, una canción o poner dos fechas: <input class="search" type="text" name="discografia_search"/></label></span>
                    <span><input type="submit" name="discografia_searchbutton" value="Buscar"/></span>
                </form></span>
                
                <span><form action="busqueda.php" method="POST">
                    <span><label> Selecciona una concierto:<select name="conciertos_search" multiple>
                        <option> Alive 1997 </option>
                        <option> Alive 2006/2007 </option>
                    </select></label></span>
                    <span><input type="submit" name="conciertos_searchbutton" value="Mostrar Gira"/></span>
                </form></span>
            </aside>
HTML;
        /*  Edicion del archivo
            Gestor de compras
        */
    }

    function select_fechatarjeta(){
        echo <<<HTML
                    <label>Fecha de caducidad y código de seguridad: 
HTML;
                    echo <<<HTML
                                <span><select name="mestarjeta">
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
                                </select></span></label>
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
                            <h1> Home </h1>
                            <span><p> 
                                Daft Punk es un dúo de productores formado por los músicos franceses Guy-Manuel 
                                de Homem-Christo (n. 1974) y Thomas Bangalter (n. 1975).4​5​6​ Daft Punk alcanzó 
                                una gran popularidad en el estilo house a finales de la década de los 90 en Francia 
                                y continuó con su éxito los años siguientes, usando el estilo synthpop.4​5​7​ El dúo 
                                también es acreditado por la producción de canciones que se consideran esenciales en 
                                el estilo french house. 
                            </p></span>

                            <img id="main" src="./img/img2" alt="Cascos"/>

                            <span><p> 
                                El acrónimo "Daft", presente en su primer DVD, proviene de las iniciales de "A Story 
                                about Dogs, Androids, Firemen and Tomatoes". Estas palabras reciben significado al dúo 
                                musical por su primera canción «Da Funk» del año 1995 perteneciente al álbum Homework, 
                                dónde aparece un perro antropomorfo como protagonista en el vídeo. Luego "Androids" por 
                                la aparición de robots bailando en el vídeo «Around the World» del año 1997 del álbum 
                                Homework. "Fireman" (Bomberos en español) que aparecen en el video de «Burnin'» y "Tomatoes" 
                                por el vídeo «Revolution 909».
                            </p></span>

                            <span><p> 
                                A principios de la carrera del grupo, los miembros de la banda estaban influidos por bandas 
                                como The Beach Boys y The Rolling Stones. Bangalter y de Homem-Christo se encontraban originalmente 
                                en una banda llamada Darlin', que se disolvió después de un corto periodo de tiempo, permitiendo 
                                a los dos experimentar con música por su cuenta. El dúo se convirtió en Daft Punk, y lanzaron su 
                                aclamado álbum debut Homework en 1997. El segundo álbum, Discovery, lanzado en 2001, fue aún más 
                                exitoso, impulsado por los sencillos «One More Time», «Digital Love» y «Harder, Better, Faster, 
                                Stronger». En marzo de 2005, el dúo lanzó el álbum Human After All, recibiendo críticas mixtas. 
                                Sin embargo, «Robot Rock» y «Technologic» tuvieron éxito en el Reino Unido. Daft Punk hizo una gira 
                                a lo largo de 2006 y 2007 y lanzó su álbum en vivo Alive 2007, el cual ganó un Grammy al Mejor 
                                Álbum de Electrónica/Dance. El dúo compuso la música para la película Tron: Legacy y en 2010 lanzó 
                                el álbum de la banda sonora de la película.
                            </p></span>

                            <img id="main" src="./img/img1" alt="Daft Punk con Giorgio Moroder"/>

                            <span><p> 
                                Daft Punk es conocido por sus elaborados conciertos en los que incorporan efectos visuales, por el 
                                énfasis que ponen en la historia y los componentes visuales de sus producciones musicales. También 
                                porque desde 2001 en sus actuaciones o apariciones públicas aparecen disfrazados de robot. En muy 
                                raras ocasiones conceden entrevistas o aparecen en televisión.
                            </p></span>

                            <span><p> 
                                El dúo ha vendido más de 12 millones de álbumes, y más de 17 millones de sencillos.
                            </p></span>
                        </article>

                        <article>
                            <h1> Componentes </h1>
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
                            <table>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Points</th>
                                </tr>
                                <tr>
                                    <td>Peter</td>
                                    <td>Griffin</td>
                                    <td>$100</td>
                                </tr>
                                <tr>
                                    <td>Lois</td>
                                    <td>Griffin</td>
                                    <td>$150</td>
                                </tr>
                                <tr>
                                    <td>Joe</td>
                                    <td>Swanson</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>Cleveland</td>
                                    <td>Brown</td>
                                    <td>$250</td>
                                </tr>
                            </table>
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
                                    <li><a>Designed by Thejoker</a></li>
                                </ul>
                            </footer>
                        </body>
                    </html>
HTML;
    }
?>