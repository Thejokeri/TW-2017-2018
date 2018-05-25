<?php

    require_once("credenciales.php");

    // Funciones de BBDD
    function BD_conexion(){
        static $foo_called = false;
        if (!$foo_called) {
            $foo_called = true;
            $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
        
            session_start();

            if(!$db){
                return "Error de conexión a la base de datos (".mysqli_connect_errno(). ") : ".mysqli_connect_error();
            }

            mysqli_set_charset($db,"utf8");
            return $db;
        }
    }
    
    function BD_CrearUsuario($db, $post){
        $consulta = sprintf("SELECT nombre FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $post["nombre"]));
        $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        
        if($resultado['nombre'] == $post['nombre'] && !empty($post['nombre'])){
            CrearUsuario(true,$post);
        }else{
            if(!empty($post['nombre']) && !empty($post['apellido']) && !empty($post['email']) && !empty($post['passwd']) && !empty($post['tipo'])){

                $consulta = sprintf("INSERT INTO usuarios(nombre,apellido,email,passwd,tipo) VALUES ('%s','%s','%s','%s',%d);", 
                            mysqli_real_escape_string($db, $post["nombre"]), 
                            mysqli_real_escape_string($db, $post["apellido"]),  
                            mysqli_real_escape_string($db, $post["email"]),  
                            password_hash($post["passwd"], PASSWORD_DEFAULT),  
                            mysqli_real_escape_string($db, $post["tipo"]));

                $resultado = mysqli_query($db, $consulta);
                mensaje_correcto(1);
            }else{
                CrearUsuario(false,$post);
            }
        }
    }

    function BD_ModificarUsuario($db, $post){
        $consulta = sprintf("SELECT nombre FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $post["nombre"]));
        $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        
        if($resultado['nombre'] == $post['nombre'] && !empty($post['nombre'])){
            ModificarUsuario($db,true);
        }else{
            $consulta = sprintf("SELECT * FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $post["seleccionado"]));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
            if(empty($post['nombre']))
                $nombre = $resultado['nombre'];
            else
                $nombre = $post['nombre'];
             
            if(empty($post['apellido']))
                $apellido = $resultado['apellido'];
            else
                $apellido = $post['apellido'];

            if(empty($post['email']))
                $email = $resultado['email'];
            else
                $email = $post['email'];

            if(empty($post['passwd']))
                $passwd = $resultado['passwd'];
            else
                $passwd = password_hash($post['passwd'], PASSWORD_DEFAULT);

            if(empty($post['tipo']))
                $tipo = $resultado['tipo'];
            else
                $tipo = $post['tipo'];

            $consulta = sprintf("UPDATE usuarios SET nombre='%s', apellido='%s', email='%s', passwd='%s', tipo=%d WHERE nombre = '%s';", 
                                mysqli_real_escape_string($db, $nombre),   
                                mysqli_real_escape_string($db, $apellido),  
                                mysqli_real_escape_string($db, $email),  
                                $passwd,  
                                mysqli_real_escape_string($db, $tipo), 
                                $post["seleccionado"]);
                                
            $resultado = mysqli_query($db, $consulta);
            mensaje_correcto(2);
        }
    }

    function BD_BorrarUsuario($db, $post){
        $consulta = sprintf("SELECT nombre FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $post["nombre"]));
        $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        
        if(!$resultado){
            BorrarUsuario($db,true);
        }else{
            $consulta = sprintf("DELETE FROM usuarios WHERE nombre = '%s'", mysqli_real_escape_string($db, $post["nombre"]));
            $resultado = mysqli_query($db, $consulta);
            mensaje_correcto(3);
        }
    }

    function BD_ListarUsuarios($db){
        $consulta = "SELECT * FROM usuarios;";
        $resultado = mysqli_query($db,$consulta);

        echo <<<HTML
            <table border = '1'>
                <thead><tr><th> Usuario </th><th> Apellidos </th><th> E-mail </th><th> Tipo </th><tr></thead>
                <tbody>
HTML;
            while($fila = mysqli_fetch_row($resultado)){
                if($fila['4'] == 1)
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['1'] ,"</td><td>", $fila['2'] ,"</td><td> usuario </td></tr>";
                else
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['1'] ,"</td><td>", $fila['2'] ,"</td><td> administrador </td></tr>";
            }
        echo <<<HTML
                </tbody>
            </table>
HTML;
    }

    function BD_ListarConciertos($db){
        $consulta = "SELECT * FROM concierto;";
        $resultado = mysqli_query($db,$consulta);

        $nombre = null;
        $mostrar = false;
        
        while($fila = mysqli_fetch_row($resultado)){
            if($fila['4'] != $nombre){
                $nombre = $fila['4'];
                echo "<span><h1>$nombre</h1></span>";
                $mostrar = true;
            }
            echo "<span><table>";
            if($mostrar)
                echo "<tr><th> Fecha </th><th> País </th><th> Ciudad </th><th> Lugar </th><tr>";
            $newDate = date("d-m-Y", strtotime($fila['0']));
            echo "<tr><td>", $newDate, "</td><td>", $fila['1'], "</td><td>", $fila['2'], "</td><td>", $fila['3'], "</td></tr>";
            echo "</table></span> <span><p>";
            echo $fila['5'];
            echo "</p></span>";
            $mostrar = false;
        }
    }

    function BD_ListarAlbum($db){
        $consulta = "SELECT * FROM album;";
        $resultado = mysqli_query($db,$consulta);

        echo '<ul  class="image_album">';
        while($fila = mysqli_fetch_row($resultado)){
            echo "<li>", '<a href="index.php?disco='.$fila['nombre']."</a>", '<img src="data:image/jpeg;base64,'.base64_encode( $fila['5'] ).'"/>',"</li>";
        }

        echo "</ul>";
    }

    // Funciones HTML

    function Index(){
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
                        <form action="index.php" method="POST">
                            <fieldset>
                                <legend>Introduzca sus credenciales</legend>
                                        Usuario: <br> <br>
                                        <input type="text" name="usuario" value="root"/>
                                        <br> <br>
                                        Contraseña: <br> <br>
                                        <input type="password" name="passwd" value="root"/> 
                                        <br> <br>
                            </fieldset>
                            <br>
                            <input type="submit" name="envio" value="Enviar"/>
                        </form>
                        <p> * admin: root, contraseña: root </p>
                        <p> * user: user, contraseña: user </p>
                    </body>
                    </html>
HTML;
    }

    function Logged($db){
       
        if(isset($_SESSION['nombre']) && isset($_SESSION['passwd'])){
            $verificado = true;
        }else{
            $consulta = sprintf("SELECT passwd FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $_POST['usuario']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db, $consulta));
            if($resultado && password_verify($_POST['passwd'], $resultado['passwd'])){
                $_SESSION['nombre'] = $_POST['usuario'];
                $_SESSION['passwd'] = $_POST['passwd'];
                $verificado = true;
            }else{
                $verificado = false;
            }
        }
            
        if($verificado){
            $consulta = sprintf("SELECT tipo FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $_SESSION['nombre']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
            if($resultado['tipo'] == 2){
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
HTML;
                            echo "<p> Bienvenido administrador: ", $_SESSION["nombre"], "</p>";
                            echo "<br>";
                echo <<<HTML
                            <form action="index.php" method="POST">
                                <input type="hidden" name="entrarBD"> 
                                <input type="submit" name="crear" value="Crear Usuario"/> <br> <br>
                                <input type="submit" name="modificar" value="Modificar Usuarios"/> <br> <br>
                                <input type="submit" name="borrar" value="Borrar Usuario"/> <br> <br>
                                <input type="submit" name="logout" value="Logout"/> <br> <br>
HTML;
                                BD_ListarUsuarios($db);
                echo <<<HTML
                            </form>
                        </body>
                        </html>
HTML;
        }else{
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
HTML;
                            echo "<p> Bienvenido usuario: ", $_SESSION["nombre"], "</p>";
                echo <<<HTML
                            <p> Los usuario normales no tienes permiso para realizar operaciones sobre la base de datos. </p>
                            <form action="index.php" method="POST">
                                <input type="submit" name="logout" value="Logout"/>
                            </form>
                        </body>
                        </html>
HTML;
            }
        }else{
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
                        <form action="index.php" method="POST">
                            <p style="color:red;">Usuario o contraseña incorrectas</p>
                            <br>
                            <fieldset>
                                <legend>Introduzca sus credenciales</legend>
                                        Usuario: <br> <br>
                                        <input type="text" name="usuario"/>
                                        <br> <br>
                                        Password: <br> <br>
                                        <input type="password" name="passwd"/> 
                                        <br> <br>
                            </fieldset>
                            <br>
                            <input type="submit" name="envio" value="Enviar"/>
                        </form>
                    </body>
                    </html>
HTML;
        }
    }

    function CrearUsuario($fallo,$post){
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
HTML;
                    if($fallo)
                        echo '<p style="color:red;">Usuario ya existente</p>';
            echo<<<HTML
                    <form action="index.php" method="POST">
                        <p>Rellene los campos para crear un usuario</p>
                        Nombre: <br> <br>
HTML;
                        if(empty($post['nombre']) && !is_null($post)){
                            echo '<input type="text" name="nombre"/>';
                            echo '<p style="color:red;">Campo vacio</p>';
                        }else{
                            if(is_null($post)){
                                echo '<input type="text" name="nombre"/>';
                                echo '<br> <br>';
                            }else{
                                echo '<input type="text" name="nombre" value="', $post['nombre'], '"/>';
                                echo "<br> <br>";
                            }
                        }
            echo<<<HTML
                        Apellidos: <br> <br>
HTML;
                        if(empty($post['apellido']) && !is_null($post)){
                            echo '<input type="text" name="apellido"/>';
                            echo '<p style="color:red;">Campo vacio</p>';
                        }else{
                            if(is_null($post)){
                                echo '<input type="text" name="apellido"/>';
                                echo '<br> <br>';
                            }else{
                                echo '<input type="text" name="apellido" value="', $post['apellido'], '"/>';
                                echo "<br> <br>";
                            }
                        }
            echo<<<HTML
                        Email: <br> <br>
HTML;
                        if(empty($post['email']) && !is_null($post)){
                            echo '<input type="email" name="email"/>';
                            echo '<p style="color:red;">Campo vacio</p>';
                        }else{
                            if(is_null($post)){
                                echo '<input type="email" name="email"/>';
                                echo '<br> <br>';
                            }else{
                                echo '<input type="email" name="email" value="', $post['email'], '"/>';
                                echo "<br> <br>";
                            }
                        }
            echo<<<HTML
                        Contraseña: <br> <br>
HTML;
                        if(empty($post['passwd']) && !is_null($post)){
                            echo '<input type="password" name="passwd"/>';
                            echo '<p style="color:red;">Campo vacio</p>';
                        }else{
                            echo '<input type="password" name="passwd"/>';
                            echo "<br> <br>";
                        }
            echo<<<HTML
                        Tipo de usuario: <br> <br>
                        <select name="tipo">
                            <option value="1" selected>usuario</option>
                            <option value="2">administrador</option>
                        </select>
                        <br> <br>
                        <input type="hidden" name="accionBD">
                        <br> <br>
                        <input type="submit" name="crearusuario" value="Crear Usuario"/> <input type="submit" name="envio" value="Volver"/>
                    </form>
                </body>
                </html>
HTML;
    }

    function ModificarUsuario($db,$fallo){
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
HTML;
                    if($fallo)
                        echo '<p style="color:red;">Usuario ya existente</p>';
            echo<<<HTML
                    <form action="index.php" method="POST">
                        <p>Seleccione el usuario a modificar</p>
HTML;
                        $consulta = "SELECT * FROM usuarios;";
                        $resultado = mysqli_query($db,$consulta);
                        $p = true;
                        while($fila = mysqli_fetch_row($resultado)){
                            if($p){
                                echo '<label><input type="radio" name="seleccionado" value="', $fila['0'], '" checked/> ', $fila['0'] ," </label> <br> <br>";
                                $p = false;
                            }else
                                echo '<label><input type="radio" name="seleccionado" value="', $fila['0'], '"/> ', $fila['0'] ," </label> <br> <br>";
                        }
            echo<<<HTML
                        <p> Introduzca los nuevos campos, dejar en blanco para no modificar: </p>
                        Nombre: <br> <br>
                        <input type="text" name="nombre"/>
                        <br> <br>
                        Apellidos: <br> <br>
                        <input type="text" name="apellido"/> 
                        <br> <br>
                        Email: <br> <br>
                        <input type="email" name="email"/> 
                        <br> <br>
                        Contraseña: <br> <br>
                        <input type="password" name="passwd"/> 
                        <br> <br>
                        Tipo de usuario: <br> <br>
                        <select name="tipo">
                            <option value="1" selected>usuario</option>
                            <option value="2">administrador</option>
                        </select>
                        <input type="hidden" name="accionBD">
                        <br> <br>
                        <input type="submit" name="modificarusuario" value="Modificar Usuario"/> <input type="submit" name="envio" value="Volver"/>
                    </form>
                </body>
                </html>
HTML;
    }

    function BorrarUsuario($db,$fallo){
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
                    <form action="index.php" method="POST">
                        <p>Seleccione el usuario a borrar:</p>
HTML;
                        $consulta = "SELECT * FROM usuarios;";
                        $resultado = mysqli_query($db,$consulta);
                        $p = true;
                        while($fila = mysqli_fetch_row($resultado)){
                            if($p){
                                echo '<label><input type="radio" name="nombre" value="', $fila['0'], '" checked/> ', $fila['0'] ," </label> <br> <br>";
                                $p = false;
                            }else
                                echo '<label><input type="radio" name="nombre" value="', $fila['0'], '"/> ', $fila['0'] ," </label> <br> <br>";
                        }
            echo<<<HTML
                        <input type="hidden" name="accionBD">
                        <br><br>
                        <input type="submit" name="borrarusuario" value="Borrar Usuario"/> <input type="submit" name="envio" value="Volver"/>
                    </form>
                </body>
                </html>
HTML;
    }

    function mensaje_correcto($value){
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
                        <form action="index.php" method="POST">
HTML;
                            if($value == 1)
                                echo "<p> Usuario creado con éxito </p>";
                            
                            if($value == 2)
                                echo "<p> Usuario modificado con éxito </p>";

                            if($value == 3)
                                echo "<p> Usuario borrado con éxito </p>";
            echo <<<HTML
                            <input type="submit" name="envio" value="Volver"/> <input type="submit" name="logout" value="Logout"/> 
                        </form>
                    </body>
                    </html>
HTML;
    }

    function Logout(){
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        
        session_unset();
        $param = session_get_cookie_params();

        setcookie(session_name(), $_COOKIE[session_name()], time() - 100000, 
        $param['path'], $param['domain'], $param['secure'], $param['httponly']);
        session_destroy();

        $url = "https://void.ugr.es/~ftm19971718/p4/4.4/index.php";
        header('Location: '.$url);
    }

?>