<?php
    if(isset($_COOKIE['nombrevacio']) || isset($_COOKIE['apellidosvacio']) || isset($_COOKIE['prendavacio'])){
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
                            <h1>Comprar prendas</h1>
                            <form action="index1.php" method="POST">
                                <fieldset>
                                    <legend>Información personal</legend>
                                        Nombre: <br> <br>
HTML;
                                        if(isset($_COOKIE['nombre'])){
                                            echo '<input type="text" name="nombre" value="', $_COOKIE['nombre'], '"/>';
                                            echo "<br> <br>";
                                        }else{
                                            echo '<input type="text" name="nombre"/>';
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }
                        echo <<<HTML
                                        Apellidos: <br> <br>
HTML;
                                        if(isset($_COOKIE['apellidos'])){
                                            echo '<input type="text" name="apellidos" value="', $_COOKIE['apellidos'], '"/>';
                                            echo "<br> <br>";
                                        }else{
                                            echo '<input type="text" name="apellidos"/>';
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }

                                        if(isset($_COOKIE['prenda'])){
                                            echo '<select name="prenda">';
                                                echo '<option value="', $_COOKIE['prenda'], '" selected>', $_COOKIE['prenda'], '</option>';
                                                echo '<option value="camisa">camisa</option>';
                                                echo '<option value="pantalon">pantalon</option>';
                                                echo '<option value="falda">falda</option>';                                    
                                            echo '</select>';
                                        }else{
                                            echo '<select name="prenda">';
                                                echo '<option value="" selected>prenda</option>';
                                                echo '<option value="camisa">camisa</option>';
                                                echo '<option value="pantalon">pantalon</option>';
                                                echo '<option value="falda">falda</option>';                                    
                                            echo '</select>';
                                            echo '<p style="color:red;">Campo vacio</p>';
                                        }
                        echo <<<HTML
                                </fieldset>
                                <br>
                                <input type="submit" name="envio" value="Enviar"/>
                            </form>
                        </body>
                    </html>
HTML;
    }else{
        session_start();
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
                            <h1>Comprar prendas</h1>
                            <form action="index1.php" method="POST">
                                <fieldset>
                                    <legend>Información personal</legend>
                                        Nombre: <br> <br>
                                        <input type="text" name="nombre"/>
                                        <br> <br>
                                        Apellidos: <br> <br>
                                        <input type="text" name="apellidos"/> 
                                        <br> <br>
                                        <select name="prenda">
                                            <option value="" selected>prenda</option>
                                            <option value="camisa">camisa</option>
                                            <option value="pantalon">pantalon</option>
                                            <option value="falda">falda</option>                                        
                                        </select>
                                </fieldset>
                                <br>
                                <input type="submit" name="envio" value="Enviar"/>
                            </form>
                        </body>
                    </html>
HTML;
    }
?>