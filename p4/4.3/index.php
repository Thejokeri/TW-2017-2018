<?php
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
                            <input type="submit" value="Enviar"/>
                        </form>
                    </body>
                </html>
HTML;
?>