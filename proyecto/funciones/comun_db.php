<?php

    require_once("credenciales.php");

    function ComprobarDatosVacios($post){
        $comprobar = false;
        
        foreach ($post as $k => $v){
            if($v == "")
                $comprobar = true;
        }

        return $comprobar;
    }


    // Funciones de BBDD
    function BD_conexion(){
        static $called = false;
        if (!$called) {
            $foo_called = true;
            $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
        
            session_start();

            if(!$db){
                return "Error de conexión a la base de datos (".mysqli_connect_errno(). ") : ".mysqli_connect_error();
            }

            mysqli_set_charset($db,"utf8");
            return $db;
        }else{
            return $db;
        }
    }
    
    function BD_CrearUsuario($db, $post){
        $consulta = sprintf("SELECT id FROM usuarios_proyecto WHERE id = '%s';", mysqli_real_escape_string($db, $post["id"]));
        $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));
        

        if($resultado || ComprobarDatosVacios($post)){
            return false;
        }else{
            $consulta = sprintf("INSERT INTO usuarios_proyecto (id, password, nombre, apellido, email, tlf, tipo) VALUES ('%s','%s','%s','%s','%s',%d,%d);", 
                            mysqli_real_escape_string($db, $post["id"]), 
                            password_hash($post["password"], PASSWORD_DEFAULT),  
                            mysqli_real_escape_string($db, $post["nombre"]),  
                            mysqli_real_escape_string($db, $post["apellido"]),
                            mysqli_real_escape_string($db, $post["email"]),
                            mysqli_real_escape_string($db, $post["tlf"]),
                            mysqli_real_escape_string($db, $post["tipo"]));
        
            $resultado = mysqli_query($db, $consulta);
            return true;
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

    function BD_ListarConciertos($db,$consulta){
        $resultado = mysqli_query($db,$consulta);

        $nombre = null;
        $mostrar = false;

        if(mysqli_num_rows($resultado) > 0){
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
        }else{
            echo "<span><p>No se ha encontrado ningun resultado</p></span>";
        }
    }

    function BD_ListarAlbum($db, $consulta){
        $resultado = mysqli_query($db,$consulta);

        echo '<ul class="image_album">';
        while($fila = mysqli_fetch_row($resultado)){
            echo '<li><a href=index.php?disco=', $fila['0'], '>', '<img src="data:image/jpeg;base64,'.base64_encode( $fila['5'] ).'"/></a></li>';
        }
        echo "</ul>";
    }

    function BD_ListarCanciones($db,$value,$cancion){
        $consultaralbum = 'SELECT DISTINCT * FROM album WHERE nombre = "'. $value.'"';
        $consultarcancion = 'SELECT DISTINCT * FROM canciones WHERE nombre_album = "'.$value.'"';
        $resultado1 = mysqli_query($db,$consultaralbum);
        $resultado2 = mysqli_query($db,$consultarcancion);
        $cancion = "«".$cancion."»";

        while($fila = mysqli_fetch_row($resultado1)){
            $nombre = str_replace('_', ' ', $fila['0']);
            echo "<h1>".$nombre."</h1>";
        echo <<<HTML
                <span><table>
                    <tr>
HTML;
                echo '<td rowspan="4">', '<img src="data:image/jpeg;base64,'.base64_encode( $fila['5'] ).'"/></td>
                        <td>'.$fila['4'].'</td>
                    </tr>
                    <tr>
                        <td>'.$fila['1'].'</td>
                    </tr>
                    <tr>
                        <td>'.$fila['2'].'</td>
                    </tr>
                    <tr>
                        <td>'.$fila['3'].'</td>
                    </tr>';
        }
        echo <<<HTML
                </table></span>

                <span><h1>Lista de canciones</h1></span>

                <span><table>
                    <tr>
                        <th>Posición</th>
                        <th>Canción</th>
                        <th>Duración</th>
                    </tr>
HTML;
            while($fila = mysqli_fetch_row($resultado2)){
                if($fila['1'] == $cancion)
                    echo '<tr class="found"><td>'.$fila['0'].'</td><td>'.$fila['1'].'</td><td>'.$fila['3'].'</td></tr>';
                else
                    echo '<tr><td>'.$fila['0'].'</td><td>'.$fila['1'].'</td><td>'.$fila['3'].'</td></tr>';
            }    
        echo <<<HTML
                </table></span>
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