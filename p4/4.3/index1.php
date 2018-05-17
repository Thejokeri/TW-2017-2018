<?php
    if(isset($_COOKIE['tallavacio']) || isset($_COOKIE['tallaerror']) || isset($_COOKIE['colorvacio'])){
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
                                                Talla: <br> <br>
HTML;
                                                if(isset($_COOKIE['talla'])){
                                                    echo '<input type="number" name="talla" value="', $_COOKIE['talla'], '"/>';
                                                    echo "<br> <br>";
                                                }else{
                                                    if(isset($_COOKIE['tallaerror'])){
                                                        echo '<input type="number" name="talla" value="', $_COOKIE['tallaerror'], '"/>';
                                                        echo '<p style="color:red;">Campo erroneo, debe de estar entre 30 y 50</p>';
                                                    }
                                                    if(isset($_COOKIE['tallavacio'])){
                                                        echo '<input type="number" name="talla"/>';
                                                        echo '<p style="color:red;">Campo vacio</p>';
                                                    }
                                                }
     
                                                if(isset($_COOKIE['color'])){
                                                    echo '<select name="color">';
                                                        echo '<option value="', $_COOKIE['color'], '" selected>', $_COOKIE['color'], '</option>';
                                                        echo '<option value="rojo">rojo</option>';
                                                        echo '<option value="verde">verde</option>';
                                                        echo '<option value="azul">azul</option>';                                    
                                                    echo '</select>';
                                                }else{
                                                    echo '<select name="color">';
                                                        echo '<option value="" selected>color</option>';
                                                        echo '<option value="rojo">rojo</option>';
                                                        echo '<option value="verde">verde</option>';
                                                        echo '<option value="azul">azul</option>';                                    
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
        if(!isset($_POST['envio'])){
            $url = "https://void.ugr.es/~ftm19971718/p4/4.3/index.php";
            header('Location: '.$url);
            die();
        }else{
            if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['prenda'])){
                if(empty($_POST['nombre']))
                    setcookie("nombrevacio"," ");
                else
                    setcookie("nombre", $_POST['nombre']);
                
                if(empty($_POST['apellidos']))
                    setcookie("apellidosvacio"," ");
                else
                    setcookie("apellidos", $_POST['apellidos']);

                if(empty($_POST['prenda']))
                    setcookie("prendavacio"," ");
                else
                    setcookie("prenda", $_POST['prenda']);
                
                $url = "https://void.ugr.es/~ftm19971718/p4/4.3/index.php";
                header('Location: '.$url);
            }else{
                if(isset($_COOKIE['nombrevacio']) && isset($_COOKIE['apellidosvacio']) && isset($_COOKIE['prendavacio'])){
                    unset($_COOKIE['nombrevacio']);
                    unset($_COOKIE['apellidosvacio']);
                    unset($_COOKIE['prendavacio']);

                    setcookie("nombrevacio"," ", time() - 1000000);
                    setcookie("apellidosvacio"," ", time() - 1000000);
                    setcookie("prendavacio"," ", time() - 1000000);
                }

                setcookie("nombre",$_POST['nombre']);
                setcookie("apellidos",$_POST['apellidos']);
                setcookie("prenda",$_POST['prenda']);

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
                                                    Talla: <br> <br>
                                                    <input type="number" name="talla"/>
                                                    <br> <br>
                                                    <select name="color">
                                                        <option value="" selected>color</option>;
                                                        <option value="rojo">rojo</option>;
                                                        <option value="verde">verde</option>;
                                                        <option value="azul">azul</option>;
                                                    </select>
                                            </fieldset>
                                            <br>
                                            <input type="submit" name="envio" value="Enviar"/>
                                        </form>
                                    </body>
                                </html>
HTML;
        }
        }
    }

?>