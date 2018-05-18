<?php
    require_once("credenciales.php");

    function verificar_passwd($bdpasswd,$inputpasswd){
        // HASH
        return ($bdpasswd == $inputpasswd);
    }

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
        
        if($resultado['nombre'] == $post['nombre']){
            CrearUsuario(true);
        }else{
            $consulta = sprintf("INSERT INTO usuarios(nombre,apellido,email,passwd,tipo) VALUE ('%s','%s','%s','%s','%s');", 
                                mysqli_real_escape_string($db, $post["nombre"]), 
                                mysqli_real_escape_string($db, $post["apellido"]), 
                                mysqli_real_escape_string($db, $post["email"]), 
                                mysqli_real_escape_string($db, $post["passwd"]), 
                                mysqli_real_escape_string($db, $post["tipo"]));
            $resultado = mysqli_query($db, $consulta);
            mensaje_correcto(1);
        }
    }

    function BD_ModificarUsuario($db){
        echo "modificar usuario";
    }

    function BD_BorrarUsuario($db){
        echo "borrar usuario";
    }

    function BD_ListarUsuarios($db){
        $consulta = "SELECT * FROM usuarios;";
        $resultado = mysqli_query($db,$consulta);

        echo <<<HTML
            <table border = '1'>
                <thead><tr><th> Usuario </th><th> Apellidos </th><th> E-mail </th><th> Contraseña </th><th> Tipo </th><tr></thead>
                <tbody>
HTML;
            while($fila = mysqli_fetch_row($resultado)){
                if($fila['4'] == 0)
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['1'] ,"</td><td>", $fila['2'] ,"</td><td>", $fila['3'] ,"</td><td> usuario </td></tr>";
                else
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['1'] ,"</td><td>", $fila['2'] ,"</td><td>", $fila['3'] ,"</td><td> administrador </td></tr>";
            }
        echo <<<HTML
                </tbody>
            </table>
HTML;
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

    function Logged($db){
        if(isset($_SESSION["nombre"]) && isset($_SESSION["passwd"])){
            $consulta = sprintf("SELECT passwd FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $_SESSION['nombre']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        }else{
            $_SESSION['nombre'] = $_POST['usuario'];
            $_SESSION['passwd'] = $_POST['passwd'];
            $consulta = sprintf("SELECT passwd FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $_SESSION['nombre']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        }

        if($resultado && verificar_passwd($resultado['passwd'],$_SESSION['passwd'])){
            $consulta = sprintf("SELECT tipo FROM usuarios WHERE nombre = '%s';", mysqli_real_escape_string($db, $_SESSION['nombre']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
            if($resultado['tipo'] == 1){
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
                                <input type="hidden" name="entrarBD" value=""> 
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
                            <br> <br>
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

    function CrearUsuario($fallo){
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
                            <option value="usuario" selected>usuario</option>
                            <option value="admin">administrador</option>
                        </select>
                        <br> <br>
                        <input type="hidden" name="accionBD" value="">
                        <br> <br>
                        <input type="submit" name="crearusuario" value="Crear Usuario"/>
                    </form>
                </body>
                </html>
HTML;
    }

    function ModificarUsuario(){
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
                        <p>Seleccione el usuario a modificar</p>
                        <!-- RadioButton -->
                        <p> Introduzca los nuevos campos: </p>
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
                            <option value="usuario" selected>usuario</option>
                            <option value="admin">administrador</option>
                        </select>
                        <input type="hidden" name="accionBD" value="">
                        <br> <br>
                        <input type="submit" name="modificarusuario" value="Modificar Usuario"/>
                    </form>
                </body>
                </html>
HTML;
    }

    function BorrarUsuario(){
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
                        <!--Radio Buttons-->
                        <input type="hidden" name="accionBD" value="">
                        <br><br>
                        <input type="submit" name="borrarusuario" value="Borrar Usuario"/>
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
                            <input type="submit" name="envio" value="Volver"/> <br> <br>
                            <input type="submit" name="logout" value="Logout"/> 
                        </form>
                    </body>
                    </html>
HTML;
    }

    function Logout(){

    }
?>