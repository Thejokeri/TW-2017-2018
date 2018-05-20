<?php

    function Encabezado($activo){
        $items = ["Home", "Biografía", "Discografía", "Filmografía", "Tienda"];
        $links = ["index.php?id=0", "index.php?id=1", "index.php?id=2", "index.php?id=3", "index.php?id=4"];
        echo <<<HTML
                        <!DOCTYPE html>
                        <!-- Ejemplo de página web -->
                        <html lang="es">   
                            <head>
HTML;
                                echo "<title>Daft Punk | ".$items[$activo]."</title>";
echo <<< HTML
                                <meta charset="utf-8">
                                <meta name="author" content="Fernando Talavera Mendoza">
                                <meta name="keywords" content="tecnologías web, html, programación">
                                <link rel="shortcut icon" href="./img/favicon.png" type="image/png">
                                <link rel="stylesheet" href="./estilo/style.css">
                            </head>
                            
                            <body>
                                <header>
                                    <img src="./img/horizontal.jpg" alt="Imagen horizontal" class="horizontal"/>
                                    <img src="./img/logo.jpg" alt="Logo" class="logo"/>
                                </header>
                            
                            <nav>
                                <ul>
HTML;
                        foreach ($items as $k => $v)
                            echo "<li".($k==$activo?" class='activo'":"").">"."<a href='".$links[$k]."'>".$v."</a></li>";

        echo <<<HTML
                                </ul>
                            </nav>
HTML;
    }


?>