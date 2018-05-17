<?php
     if(!isset($_POST['envio'])){
        $url = "https://void.ugr.es/~ftm19971718/p4/4.3/index.php";
        header('Location: '.$url);
        die();
    }else{
       if(empty($_POST['talla']) || empty($_POST['color'])){
            if(empty($_POST['talla']))
                setcookie("tallavacio"," ");
            else{
                if($_POST['talla'] >= 30 && $_POST['talla'] <= 50)
                   setcookie("talla", $_POST['talla']);
                else
                    setcookie("tallaerror", $_POST['talla']);
            }

            if(empty($_POST['color']))
                setcookie("colorvacio"," ");
            else
                setcookie("color", $_POST['color']);
 
            $url = "https://void.ugr.es/~ftm19971718/p4/4.3/index1.php";
            header('Location: '.$url);
        }else{
            if(isset($_COOKIE['tallavacio']) && isset($_COOKIE['tallaerror']) && isset($_COOKIE['colorvacio'])){
                unset($_COOKIE['tallavacio']);
                unset($_COOKIE['tallaerror']);
                unset($_COOKIE['colorvacio']);

                setcookie("tallavacio"," ", time() - 1000000);
                setcookie("tallaerror"," ", time() - 1000000);
                setcookie("colorvacio"," ", time() - 1000000);
            }

            setcookie("talla",$_POST['talla']);
            setcookie("color",$_POST['color']);

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
                                        <h1>Resumen</h1>
                                        <main>
                                            <ul>
HTML;
                                                echo "<li> Nombre: ", $_COOKIE['nombre'], "</li>";
                                                echo "<li> Apellidos: ", $_COOKIE['apellidos'], "</li>";
                                                echo "<li> Prenda: ", $_COOKIE['prenda'], "</li>";
                                                echo "<li> Talla: ", $_COOKIE['talla'], "</li>";
                                                echo "<li> Color: ", $_COOKIE['color'], "</li>";
                            echo <<<HTML
                                            </ul>
                                        </main>
                                    </body>
                                </html>
HTML;

            unset($_COOKIE['nombre']);
            unset($_COOKIE['apellidos']);
            unset($_COOKIE['prenda']);
            unset($_COOKIE['talla']);
            unset($_COOKIE['color']);

            setcookie("nombre"," ", time() - 1000000);
            setcookie("apellidos"," ", time() - 1000000);
            setcookie("prenda"," ", time() - 1000000);
            setcookie("talla"," ", time() - 1000000);
            setcookie("color"," ", time() - 1000000);
        }
    }
?>