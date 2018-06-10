<?php

    require "./funciones/comun_html.php";

    $db = BD_conexion();
    
    function ContentRegister($db,$post){
        if(BD_CrearUsuario($db, $post)){
            echo <<<HTML
                <main class="main-grid">
                    <article>
                        <h1>Register</h1>
                            <span><p> Usuario creado con éxito</p></span>
                    </article>
                </main>
HTML;
        }else{
            echo <<<HTML
                <main class="main-grid">
                    <article>
                        <h1>Register</h1>

                        <form action="register.php" method="POST">
                            <span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>
HTML;
                            echo '<span><label>Id de usuario: <input type="text" name="id" value="'.$post['id'].'"/></label></span>';
                            echo '<span><label>Contraseña: <input type="password" name="password"/></label></span>';
                            echo '<span><label>Nombre: <input type="text" name="nombre" value="'.$post['nombre'].'"/></label></span>';
                            echo '<span><label>Apellidos: <input type="text" name="apellido" value="'.$post['apellido'].'"/></label></span> ';
                            echo '<span><label>Email: <input type="email" name="email" value="'.$post['email'].'"/></label></span>';
                            echo '<span><label>Teléfono: <input type="number" name="tlf"'.$post['tlf'].'"/></label></span>';
            echo <<<HTML
                            <span><label>Tipo de usuario: 
                            <select name="tipo">
                                <option value="1" selected>Administrador</option>
                                <option value="2">Gestor de compras</option>
                            </select></label></span>

                            <span><input type="submit" name="signup" value="Sign up"/></span>
                        </form>
                    </article>
                </main>
HTML;
        }
    }

    if(isset($_POST['signup'])){
        Encabezado(4);
        Aside($db);
        ContentRegister($db,$_POST);
        Footer();        
    }else{
        $url = 'https://void.ugr.es/~ftm19971718/proyecto/index.php';
        header('Location: '.$url);
    }
?>