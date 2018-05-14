<?php
    echo <<<HTML
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <title id="titulo">Variables recibidas</title>
                    </head>
                <body>
                    <h1>Comprar prendas</h1>
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
?>