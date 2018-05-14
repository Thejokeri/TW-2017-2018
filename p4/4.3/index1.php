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
                        <form action="index2.php" method="POST">
                            <fieldset>
                                <legend>Talla y color</legend>
                                    <select name="talla">
                                        <option value="" selected>talla</option>
HTML;
                                        for($i = 30; $i <= 50; $i++)
                                        echo '<option value="',$i,'">',$i,'</option>';
                        echo <<<HTML
                                                                              
                                    </select>
                                    <select name="color">
                                        <option value="" selected>color</option>;
                                        <option value="rojo">rojo</option>;
                                        <option value="verde">verde</option>;
                                        <option value="azul">azul</option>;
                                    </select>
                            </fieldset>
                            <br>
                            <input type="submit" value="Enviar"/>
                        </form>
                    </body>
                </html>
HTML;
?>