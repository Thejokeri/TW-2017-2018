<?php

    require_once("credenciales.php");

    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath("comun_db.php") == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        
        $url = 'https://void.ugr.es/~ftm19971718/proyecto/index.php';
        
        die( header('Location: '.$url) );
    }

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
    
    function BD_MostrarMod($db,$consulta){
        $resultado = mysqli_query($db,$consulta);
        $p = true;
        while($fila = mysqli_fetch_row($resultado)){
            $contenido = str_replace('_', ' ', $fila['0']);
        if($p){
            echo '<span><label><input type="radio" name="seleccionado" value="', $fila['0'], '" checked/> ', $contenido ," </label></span>";
            $p = false;
        }else
            echo '<span><label><input type="radio" name="seleccionado" value="', $fila['0'], '"/> ', $contenido ," </label></span>";
        }
    }

    function BD_CrearUsuario($db, $post){
        if(isset($post['id'])){
            $consulta = sprintf("SELECT id FROM usuarios_proyecto WHERE id = '%s';", mysqli_real_escape_string($db, $post["id"]));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));  
            
            if(isset($post['editar_usuario']) && isset($post['aniadir'])){
                unset($post['editar_usuario']);
                unset($post['aniadir']);
            }

            if($resultado){
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
        }else{
            return false;
        }
    }

    function BD_ModificarUsuario($db, $post){
        if(isset($post['id'])){
            if($post['id'] == $_COOKIE['id']){
                $consulta = sprintf("SELECT * FROM usuarios_proyecto WHERE id = '%s';", mysqli_real_escape_string($db, $_COOKIE['id']));
                $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));

                if(empty($post['password']))
                    $passwd = $resultado['password'];
                else
                    $passwd = password_hash($post['password'], PASSWORD_DEFAULT);

                $id = mysqli_real_escape_string($db, $post['id']);  
                $nombre = mysqli_real_escape_string($db, $post['nombre']);
                $apellido = mysqli_real_escape_string($db, $post['apellido']);
                $email = mysqli_real_escape_string($db, $post['email']);
                $tlf = mysqli_real_escape_string($db, $post['tlf']);
                $tipo = mysqli_real_escape_string($db, $post['tipo']);

                $seleccionado = $_COOKIE['id'];

                $consulta = "UPDATE usuarios_proyecto SET id = '$id', password= '$passwd', nombre = '$nombre', apellido = '$apellido', email = '$email', tlf = '$tlf', tipo = '$tipo' WHERE id = '$seleccionado';";
                $resultado = mysqli_query($db, $consulta);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    // Cambiar
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
        $consulta = "SELECT * FROM usuarios_proyecto;";
        $resultado = mysqli_query($db,$consulta);

        echo <<<HTML
            <table border = '1'>
                <thead><tr><th> Usuarios </th><th> Nombres </th><th> Apellidos </th><th> Email </th><th> Teléfono </th><th> Tipo </th><tr></thead>
                <tbody>
HTML;
            while($fila = mysqli_fetch_row($resultado)){
                if($fila['6'] == 1)
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['2'] ,"</td><td>", $fila['3'] ,"</td><td>", $fila['4'] ,"</td><td>", $fila['5'] ,"</td><td> Administrador </td></tr>";
                else
                    echo "<tr><td>", $fila['0'] ,"</td><td>", $fila['2'] ,"</td><td>", $fila['3'] ,"</td><td>", $fila['4'] ,"</td><td>", $fila['5'] ,"</td><td> Gestor de compras </td></tr>";
            }
        echo <<<HTML
                </tbody>
            </table>
HTML;
    }

    function BD_CrearComponente($db,$post){
        if(isset($post['nombre'])){
            $consulta = sprintf("SELECT nombre FROM componentes WHERE nombre = '%s';", mysqli_real_escape_string($db, $post['nombre']));
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));  
            
            if(isset($post['editar_componentes']) && isset($post['aniadir'])){
                unset($post['editar_componentes']);
                unset($post['aniadir']);
            }

            if($resultado){
                return false;
            }else{
                $nombre = mysqli_real_escape_string($db, $post['nombre']);
                $date = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $_POST['fecha_nac'])));
                $lugar = mysqli_real_escape_string($db, $post['lugar']);
                $texto = htmlentities(mysqli_real_escape_string($db, $_POST['biografia']));
                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";
                move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);

                $consulta = "INSERT INTO componentes(nombre, fecha_nac, lugar, foto, texto) VALUES ('$nombre', '$date', '$lugar', '$image', '$texto');";
                $resultado = mysqli_query($db, $consulta);
                
                return true;
            }
        }else{
            return false;
        }
    }
    
    function BD_ModificarComponente($db, $post){
        if(isset($post['nombre'])){
            if($post['nombre'] == $_COOKIE['nombre']){
                $consulta = sprintf("SELECT * FROM componentes WHERE nombre = '%s';", mysqli_real_escape_string($db, $_COOKIE['nombre']));
                $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));

                $nombre = mysqli_real_escape_string($db, $post['nombre']);
                $date = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $_POST['fecha_nac'])));
                $lugar = mysqli_real_escape_string($db, $post['lugar']);

                if(empty($post['biografia']))
                    $texto = $resultado['texto'];
                else
                    $texto = htmlentities(mysqli_real_escape_string($db, $_POST['biografia']));

                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";

                if($image != $resultado['foto'] && $image != '' && !empty($resultado['foto'])){
                    unlink($path.$resultado['foto']);
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);
                }else{
                    $imagen = $resultado['foto'];
                }
                    
                $consulta = "UPDATE componentes SET nombre = '$nombre', fecha_nac = '$date', lugar = '$lugar', foto = '$image', texto = '$texto' WHERE nombre = '$nombre';";
                $resultado = mysqli_query($db, $consulta);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    function BD_BorrarComponente($db, $post){}

    function BD_CrearBiografia($db,$post){
        $posicion = "SELECT posicion FROM biografia ORDER BY posicion DESC LIMIT 1;";
        $resultado = mysqli_fetch_row(mysqli_query($db,$posicion));  
        $posicion = $resultado['0'];
        $poscion = $posicion++;

        if(isset($post['editar_biografia']) && isset($post['aniadir'])){
                unset($post['editar_biografia']);
                unset($post['aniadir']);
        }

        if(!isset($post['titulo']) || !isset($post['biografia'])){
            return false;
        }else{
            if(!empty($post['titulo']) && !empty($post['biografia'])){
                $titulo = mysqli_real_escape_string($db, $post['titulo']);
                $texto = htmlentities(mysqli_real_escape_string($db, $_POST['biografia']));
                $texto = "<p>".$texto."</p>";
                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";
                move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);

                $consulta = "INSERT INTO biografia (posicion, titulo, imagen, texto) VALUES ('$posicion', '$titulo', '$image', '$texto');";
                $resultado = mysqli_query($db, $consulta);
                    
                return true;
            }else{
                return false;
            }
        }
    }

    function BD_ModificarBiografia($db, $post){
        if(isset($post['titulo'])){
            if($post['titulo'] == $_COOKIE['titulo']){
                $consulta = sprintf("SELECT * FROM biografia WHERE titulo = '%s';", mysqli_real_escape_string($db, $_COOKIE['titulo']));
                $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));

                $posicion = $resultado['posicion'];
                $titulo = mysqli_real_escape_string($db, $post['titulo']);

                if(empty($post['biografia']))
                    $texto = $resultado['texto'];
                else
                    $texto = "<p>".htmlentities(mysqli_real_escape_string($db, $_POST['biografia']))."</p>";

                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";

                if($image != $resultado['imagen'] && $image != '' && !empty($resultado['imagen'])){
                    unlink($path.$resultado['imagen']);
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);
                }else{
                    $imagen = $resultado['imagen'];
                }
                    
                $consulta = "UPDATE  biografia  SET  posicion = '$posicion', titulo = '$titulo', imagen = '$image', texto = '$texto' WHERE titulo = '$titulo'";
                $resultado = mysqli_query($db, $consulta);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function BD_BorrarBiografia($db, $post){}
       
    function BD_CrearDisco($db,$post){
        if(isset($post['fecha'])){
            $fecha = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $post['fecha'])));
            $consulta = "SELECT fecha FROM album WHERE fecha = '$fecha';";
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));  
            
            if(isset($post['editar_discografia']) && isset($post['aniadir']) && isset($post['enviar'])){
                unset($post['editar_componentes']);
                unset($post['aniadir']);
                unset($post['enviar']);
            }

            if($resultado){
                return false;
            }else{
                $nombre = str_replace(' ', '_', mysqli_real_escape_string($db, $post['nombre']));
                $disco = mysqli_real_escape_string($db, $post['discografia']);
                $formato = mysqli_real_escape_string($db, $post['formato']);
                $precio = mysqli_real_escape_string($db, $post['precio']);
                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";
                move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);

                $consulta = "INSERT INTO album(nombre, fecha, discografica, formato, precio, imagen) VALUES ('$nombre','$fecha','$disco','$formato','$precio','$image');";
                $resultado = mysqli_query($db, $consulta);
                
                for($i = 1; $i <= $_COOKIE['numerocanciones']; $i++){
                    $nombrecancion = mysqli_real_escape_string($db, $post['nombrecancion'.$i]);
                    $nombrecancion = "«".$nombrecancion."»";
                    $duracion = mysqli_real_escape_string($db, $post['duracion'.$i]);
                    $consulta= "INSERT INTO canciones(posicion, nombre, nombre_album, duracion) VALUES ('$i','$nombrecancion','$nombre','$duracion');";
                    $resultado = mysqli_query($db, $consulta);
                }

                return true;
            }
        }else{
            return false;
        }
    }

    function BD_ModificarDisco($db, $post){
        if(isset($post['album'])){
            if($post['album'] == $_COOKIE['album']){
                $consulta = sprintf("SELECT * FROM album WHERE nombre= '%s';", mysqli_real_escape_string($db, $_COOKIE['album']));
                $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));

                $album = mysqli_real_escape_string($db, $post['album']);
                $fecha = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $post['fecha'])));
                $disco = mysqli_real_escape_string($db, $post['discografia']);
                $formato = mysqli_real_escape_string($db, $post['formato']);
                $precio = mysqli_real_escape_string($db, $post['precio']); 

                $image = $_FILES['imagen']['name'];

                $path = "./imagenes/";

                if($image != $resultado['imagen'] && $image != '' && !empty($resultado['imagen'])){
                    unlink($path.$resultado['imagen']);
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$image);
                }else{
                    $imagen = $resultado['imagen'];
                }
                    
                $consulta = "UPDATE  album  SET  nombre = '$album', fecha = '$fecha', discografica = '$disco', formato = '$formato', precio = '$precio', imagen = '$imagen' WHERE nombre = '$album'";
                $resultado = mysqli_query($db, $consulta);

                for($i = 1; $i <= $_POST['fila']; $i++){
                    $nombrecancion = mysqli_real_escape_string($db, $post['nombrecancion'.$i]);
                    $nombrecancion = "«".$nombrecancion."»";
                    $duracion = mysqli_real_escape_string($db, $post['duracion'.$i]);
                    $consulta= "UPDATE   canciones   SET   posicion  = '$i',  nombre  = '$nombrecancion',  nombre_album  = '$album',  duracion  = '$duracion' WHERE posicion = '$i";
                    $resultado = mysqli_query($db, $consulta);
                }

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
      
    function BD_BorrarDisco($db, $post){}

    function BD_CrearConcierto($db,$post){
        if(isset($post['fecha'])){
            $fecha = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $post['fecha'])));
            $consulta = 'SELECT fecha FROM concierto WHERE fecha ="'.$fecha.'";';
            $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));  
            
            if(isset($post['editar_concierto']) && isset($post['aniadir'])){
                unset($post['editar_concierto']);
                unset($post['aniadir']);
            }

            if($resultado){
                return false;
            }else{
                $pais = mysqli_real_escape_string($db, $post['pais']);
                $ciudad = mysqli_real_escape_string($db, $post['ciudad']);
                $lugar = mysqli_real_escape_string($db, $post['lugar']);
                $nombre = mysqli_real_escape_string($db, $post['nombre']);
                $texto = htmlentities(mysqli_real_escape_string($db, $_POST['texto']));

                $consulta = "INSERT INTO concierto(fecha, pais, ciudad, lugar, nombre, textodescriptivo) VALUES ('$fecha','$pais','$ciudad','$lugar','$nombre','$texto')";
                $resultado = mysqli_query($db, $consulta);
                
                return true;
            }
        }else{
            return false;
        }
    }

    function BD_ModificarConcierto($db, $post){
        if(isset($post['fecha'])){
            if($post['fecha'] == $_COOKIE['fecha']){
                $consulta = sprintf("SELECT * FROM concierto WHERE fecha = '%s';", mysqli_real_escape_string($db, $_COOKIE['fecha']));
                $resultado = mysqli_fetch_assoc(mysqli_query($db,$consulta));

                $fecha = date("Y-m-d", strtotime(mysqli_real_escape_string($db, $post['fecha'])));
                $pais = mysqli_real_escape_string($db, $post['pais']);
                $ciudad = mysqli_real_escape_string($db, $post['ciudad']);
                $lugar = mysqli_real_escape_string($db, $post['lugar']);
                $nombre = mysqli_real_escape_string($db, $post['nombre']);

                if(empty($post['texto']))
                    $texto = $resultado['texto'];
                else
                    $texto = htmlentities(mysqli_real_escape_string($db, $_POST['texto']));

                $consulta = "UPDATE  concierto  SET  fecha = '$fecha', pais = '$pais', ciudad = '$ciudad', lugar = '$lugar', nombre = '$nombre', textodescriptivo = '$texto' WHERE fecha = '$fecha'";
                $resultado = mysqli_query($db, $consulta);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
      
    function BD_BorrarConcierto($db, $post){}

    function BD_ListarPedidos(){

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
            echo '<li><a href=index.php?disco=', $fila['0'], '>', '<img src="./imagenes/'.$fila['5'].'"/></a></li>';
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
                echo '<td rowspan="4">', '<img src="./imagenes/'.$fila['5'].'"/></td>
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

        unset($_COOKIE["logged-in"]);
        setcookie("logged-in",false);
        
        setcookie(session_name(), $_COOKIE[session_name()], time() - 100000, 
        $param['path'], $param['domain'], $param['secure'], $param['httponly']);
        session_destroy();

        $url = "https://void.ugr.es/~ftm19971718/proyecto/index.php";
        header('Location: '.$url);
    }
?>