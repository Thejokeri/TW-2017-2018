<?php

    require "./funciones/comun_html.php";

    $db = BD_conexion();

    function ValidarUsuario($db,$post){
        if(isset($post['id']) && isset($post['password'])){
            $consulta = sprintf("SELECT password FROM usuarios_proyecto WHERE id = '%s';", mysqli_real_escape_string($db, $_POST['id']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db, $consulta));
                
            if(password_verify($post['password'], $resultado['password'])){
                $_SESSION['id'] = $post['id'];
                $_SESSION['password'] = $post['password'];
                return true;
            }else
                return false;
        }
    }

    function ContentLogin($db,$post){
        if(ValidarUsuario($db,$post)){
            $url = 'https://void.ugr.es/~ftm19971718/proyecto/index.php?logged=';
            header('Location: '.$url);
        }else{
            echo <<<HTML
                <main class="main-grid">
                    <article>
                        <h1>Login</h1>

                        <form action="login.php" method="POST">
                            <span><p> Usuario o contraseña incorrectas</p></span>
HTML;
                            echo '<span><label>Id de usuario: <input type="text" name="id" value="'.$post['id'].'"/></label></span>';
            echo <<<HTML
                            <span><label>Contraseña: <input type="password" name="password"/></label></span>
                            <span><input type="submit" name="login" value="Login"/></span>
                        </form>

                    </article>
                </main>
HTML;
        }
    }

    if(isset($_POST['login'])){        
        Encabezado(2);
        Aside($db);
        ContentLogin($db,$_POST);
        Footer();
    }
?>