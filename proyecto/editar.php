<?php

    require "./funciones/comun_html.php";
 
    $db = BD_conexion();

    function Editar($db,$value){
        switch($value){
            // Editar Componentes
            case 0:
                if(isset($_POST['aniadir'])){
                    if(BD_CrearComponente($db,$_POST)){
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                        <span><p> Componente creado con éxito</p></span>
                                </article>
                            </main>
HTML;
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Componentes</h1>
                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <span><label>Nombre del componente: <input type="text" name="nombre" required/></label></span>
                                        <span><label>Fecha de nacimiento: <input type="text" name="fecha_nac" required/></label></span>
                                        <span><label>Lugar de nacimiento: <input type="text" name="lugar" required/></label></span>
                                        <span><label>Biografía: <textarea rows="5" name="biografia" placeholder="Ingrese el texto" required/></textarea></label></span>
                                        <span><label>Subir imagen: <input type="file" name="imagen" required/></label></span>
                                        <input type="hidden" name="editar_componentes">
                                        <span><input type="submit" name="aniadir" value="Añadir"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['modificar'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['seleccionado']))
                            setcookie('nombre', $_POST['seleccionado']);
                        if(BD_ModificarComponente($db,$_POST)){
                               echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Componente</h1>
                                            <span><p> Componente modificado con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Componente</h1>
HTML;
                                        $consulta = 'SELECT * FROM componentes WHERE nombre = "'.$_POST['seleccionado'].'";';
                                        $resultado = mysqli_query($db,$consulta);
                                        $resultado = mysqli_fetch_row($resultado);

                                        if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                            echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                            echo <<<HTML
                                        <form action="editar.php" method="POST" enctype="multipart/form-data">
HTML;
                                            echo '<span><label>Nombre: <input type="text" name="nombre" value="'.$resultado['0'].'" required/></label></span>';
                                            echo '<span><label>Fecha de nacimiento: <input type="text" name="fecha_nac" value="'.date("d-m-Y", strtotime($resultado['1'])).'" required/></label></span>';
                                            echo '<span><label>Lugar: <input type="text" name="lugar" value="'.$resultado['2'].'" required/></label></span>';
                                            echo '<span><label>Biografía: <textarea rows="5" name="biografia" placeholder="Ingrese el texto"/></textarea></label></span>';
                                            echo '<span><label>Subir imagen: <input type="file" name="imagen"/></label></span>';
                                echo <<<HTML
                                            <input type="hidden" name="editar_componentes">
                                            <input type="hidden" name="modificar">
                                            <span><input type="submit" name="enviar" value="Modificar"/></span>
                                        </form>
                                    </article>
                                </main>
HTML;
                        }
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Modificar Componente</h1>

                                    <form action="editar.php" method="POST">
HTML;
                                        BD_MostrarMod($db,"SELECT nombre FROM componentes;");
                            echo <<<HTML
                                        <input type="hidden" name="editar_componentes">
                                        <input type="hidden" name="modificar">
                                        <span><input type="submit" name="enviar" value="Modificar"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['borrar'])){

                }else{
                    echo <<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Editar Componentes</h1>

                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="editar_componentes">
                                    <span><input type="submit" name="aniadir" value="Añadir componentes"/></span>
                                    <span><input type="submit" name="modificar" value="Modificar componentes"/></span>
                                    <span><input type="submit" name="borrar" value="Borrar componentes"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                }
            break;

            // Editar Biografia
            case 1:
                if(isset($_POST['aniadir'])){
                    if(BD_CrearBiografia($db,$_POST)){
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Biografia</h1>
                                        <span><p> Biografia creada con éxito</p></span>
                                </article>
                            </main>
HTML;
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Biografía</h1>
                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <span><label>Título: <input type="text" name="titulo" required/></label></span>
                                        <span><label>Texto: <textarea rows="5" name="biografia" placeholder="Ingrese el texto" required/></textarea></label></span>
                                        <span><label>Subir imagen: <input type="file" name="imagen"/></label></span>
                                        <input type="hidden" name="editar_biografia">
                                        <span><input type="submit" name="aniadir" value="Añadir"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['modificar'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['seleccionado']))
                            setcookie('titulo', $_POST['seleccionado']);
                        if(BD_ModificarBiografia($db,$_POST)){
                               echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Biografia</h1>
                                            <span><p> Biografia modificado con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Biografia</h1>
HTML;
                                        $consulta = 'SELECT * FROM biografia WHERE titulo = "'.$_POST['seleccionado'].'";';
                                        $resultado = mysqli_query($db,$consulta);
                                        $resultado = mysqli_fetch_row($resultado);

                                        if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                            echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                            echo <<<HTML
                                        <form action="editar.php" method="POST" enctype="multipart/form-data">
HTML;
                                            echo '<span><label>Titulo: <input type="text" name="titulo" value="'.$resultado['1'].'"required/></label></span>';
                                            echo '<span><label>Biografía: <textarea rows="5" name="biografia" placeholder="Ingrese el texto"/></textarea></label></span>';
                                            echo '<span><label>Subir imagen: <input type="file" name="imagen"/></label></span>';
                                echo <<<HTML
                                            <input type="hidden" name="editar_biografia">
                                            <input type="hidden" name="modificar">
                                            <span><input type="submit" name="enviar" value="Modificar"/></span>
                                        </form>
                                    </article>
                                </main>
HTML;
                        }
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Modificar Biografia</h1>
                                    
                                    <form action="editar.php" method="POST">
HTML;
                                        BD_MostrarMod($db,"SELECT titulo FROM biografia;");
                            echo <<<HTML
                                        <input type="hidden" name="editar_biografia">
                                        <input type="hidden" name="modificar">
                                        <span><input type="submit" name="enviar" value="Modificar"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['borrar'])){

                }else{
                    echo <<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Editar Biografía</h1>
HTML;
                                    if(ComprobarDatosVacios($_POST))
                                        echo "<span><p> Los campos están vacios </p></span>";
                        echo <<<HTML
                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="editar_biografia">
                                    <span><input type="submit" name="aniadir" value="Añadir biografía"/></span>
                                    <span><input type="submit" name="modificar" value="Modificar biografía"/></span>
                                    <span><input type="submit" name="borrar" value="Borrar biografía"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                }
            break;

            // Editar Discografia
            case 2:
                if(isset($_POST['aniadir'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['canciones']))
                            setcookie('numerocanciones', $_POST['canciones']);
                        if(BD_CrearDisco($db,$_POST)){
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Añadir Discografia</h1>
                                            <span><p> Discografia creada con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Discografia</h1>
HTML;
                                    if(isset($_POST['fecha']) && ComprobarDatosVacios($_POST))
                                        echo "<span><p> Existe un disco con esa fecha</p></span>";
                        echo <<<HTML

                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <span><label>Nombre: <input type="text" name="nombre" required/></label></span>
                                        <span><label>Fecha: <input type="text" name="fecha" required/></label></span>
                                        <span><label>Discografía: <input type="text" name="discografia" required/></label></span>
                                        <span><label>Formato: <input type="text" name="formato" required/></label></span>
                                        <span><label>Precio: <input type="text" name="precio" required></label></span>
                                        <span><label>Subir imagen: <input type="file" name="imagen"/></label></span>

                                        <span><label>Canciones</label></span>
HTML;
                                        if(empty($_POST['canciones']))
                                            $canciones = $_COOKIE['numerocanciones'];
                                        else{
                                            $canciones = $_POST['canciones'];
                                        }

                                        for($i = 1; $i <= $canciones; $i++){
                                            echo '<label>'.$i.'º</label>';
                                            echo '<span><label>Nombre: <input type="text" name="nombrecancion'.$i.'" required/></label></span>';
                                            echo '<span><label>Duración: <input type="text" name="duracion'.$i.'" required/></label></span>';
                                        }
                                            
                        echo <<<HTML
                                        <input type="hidden" name="editar_discografia">
                                        <input type="hidden" name="enviar">
                                        <input type="hidden" name="aniadir">
                                        <span><input type="submit" name="aniadir" value="Añadir"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                        }
                    }else{
                        echo<<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Añadir Discografía</h1>

                                <form action="editar.php" method="POST">
                                    <select name="canciones">
                                            <option value="1" selected>1</option>
HTML;
                                        for($i = 2; $i <= 15; $i++)
                                            echo '<option value="',$i,'">',$i,'</option>';
                            echo <<<HTML
                                            </select> 
                                    <input type="hidden" name="editar_discografia">
                                    <input type="hidden" name="aniadir">
                                    <span><input type="submit" name="enviar" value="Enviar"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                    }
                }else if(isset($_POST['modificar'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['seleccionado']))
                            setcookie('album', $_POST['seleccionado']);
                        if(BD_ModificarDisco($db,$_POST)){
                               echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Discografia</h1>
                                            <span><p> Discografia modificado con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Discografia</h1>
HTML;
                                        $consulta = 'SELECT * FROM album WHERE  nombre = "'.$_POST['seleccionado'].'";';
                                        $resultado = mysqli_query($db,$consulta);
                                        $resultado = mysqli_fetch_row($resultado);

                                        if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                            echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                            echo <<<HTML
                                        <form action="editar.php" method="POST">
HTML;
                                            echo '<span><label>Nombre: <input type="text" name="album" value="'.$resultado['0'].'" required/></label></span>';
                                            echo '<span><label>Fecha: <input type="text" name="fecha" value="'.date("d-m-Y", strtotime($resultado['1'])).'" required/></label></span>';
                                            echo '<span><label>Discografia: <input type="text" name="disco" value="'.$resultado['2'].'" required/></label></span>';
                                            echo '<span><label>Formato: <input type="text" name="formato" value="'.$resultado['3'].'" required/></label></span>';
                                            echo '<span><label>Precio: <input type="text" name="precio" value="'.$resultado['4'].'" required/></label></span>';
                                            echo '<span><label>Subir imagen: <input type="file" name="imagen"/></label></span>';

                                            $consulta = 'SELECT * FROM canciones WHERE nombre_album = "'.$_POST['seleccionado'].'";';
                                            $resultado = mysqli_query($db,$consulta);
                                            
                                            while($fila = mysqli_fetch_row($resultado)){
                                                echo '<span><label>Nombre: <input type="text" name="nombrecancion'.$fila['0'].'" value="'.$fila['1'].'" required/></label></span>';
                                                echo '<span><label>Duración: <input type="text" name="duracion'.$fila['0'].'" value="'.$fila['3'].'" required/></label></span>';
                                            }
                                            echo '<input type="hidden" name="filas" value='.mysql_num_rows(mysqli_query($db,$consulta)).'>';
                                echo <<<HTML
                                            <input type="hidden" name="editar_discografia">
                                            <input type="hidden" name="modificar">
                                            <span><input type="submit" name="enviar" value="Modificar"/></span>
                                        </form>
                                    </article>
                                </main>
HTML;
                        }
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Modificar Discografia</h1>

                                    <form action="editar.php" method="POST">
HTML;
                                        BD_MostrarMod($db,"SELECT nombre FROM album;");
                            echo <<<HTML
                                        <input type="hidden" name="editar_discografia">
                                        <input type="hidden" name="modificar">
                                        <span><input type="submit" name="enviar" value="Modificar"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['borrar'])){

                }else{
                    echo <<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Editar Discografía</h1>

                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="editar_discografia">
                                    <span><input type="submit" name="aniadir" value="Añadir discografía"/></span>
                                    <span><input type="submit" name="modificar" value="Modificar discografía"/></span>
                                    <span><input type="submit" name="borrar" value="Borrar discografía"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                }
            break;

            // Editar Concierto
            case 3:
                if(isset($_POST['aniadir'])){
                    if(BD_CrearConcierto($db,$_POST)){
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Concierto</h1>
                                        <span><p> Concierto creada con éxito</p></span>
                                </article>
                            </main>
HTML;
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Concierto</h1>
HTML;
                                    if(isset($_POST['fecha']) && ComprobarDatosVacios($_POST))
                                        echo "<span><p> Existe un concierto con esa fecha, o hay campos vacios </p></span>";
                        echo <<<HTML

                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <span><label>Fecha: <input type="text" name="fecha" required/></label></span>
                                        <span><label>País: <input type="text" name="pais" required/></label></span>
                                        <span><label>Ciudad: <input type="text" name="ciudad" required/></label></span>
                                        <span><label>Lugar: <input type="text" name="lugar" required/></label></span>
                                        <span><label>Nombre del concierto: <input type="text" name="nombre" required></label></span>
                                        <span><label>Texto descriptivo: <textarea  rows="5" name="texto" placeholder="Ingrese el texto" required/></textarea></label></span>
                                        <input type="hidden" name="editar_concierto">
                                        <span><input type="submit" name="aniadir" value="Añadir"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['modificar'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['seleccionado']))
                            setcookie('fecha', $_POST['seleccionado']);
                        if(BD_ModificarConcierto($db,$_POST)){
                               echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Concierto</h1>
                                            <span><p> Concierto modificado con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Añadir Concierto</h1>
HTML;
                                        $consulta = 'SELECT * FROM concierto WHERE  fecha = "'.$_POST['seleccionado'].'";';
                                        $resultado = mysqli_query($db,$consulta);
                                        $resultado = mysqli_fetch_row($resultado);

                                        if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                            echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                            echo <<<HTML
                                        <form action="editar.php" method="POST">
HTML;
                                            echo '<span><label>Fecha: <input type="text" name="fecha" value="'.$resultado['0'].'" required/></label></span>';
                                            echo '<span><label>País: <input type="text" name="pais"value="'.$resultado['1'].'" required/></label></span>';
                                            echo '<span><label>Ciudad: <input type="text" name="ciudad" value="'.$resultado['2'].'" required/></label></span>';
                                            echo '<span><label>Lugar: <input type="text" name="lugar" value="'.$resultado['3'].'" required/></label></span>';
                                            echo '<span><label>Nombre del concierto: <input type="text" name="nombre" value="'.$resultado['4'].'" required/></label></span>';
                                            echo '<span><label>Texto descriptivo: <textarea  rows="5" name="texto" placeholder="Ingrese el texto" required/></textarea></label></span>';
                                echo <<<HTML
                                            <input type="hidden" name="editar_concierto">
                                            <input type="hidden" name="modificar">
                                            <span><input type="submit" name="enviar" value="Modificar"/></span>
                                        </form>
                                    </article>
                                </main>
HTML;
                        }
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Modificar Usuario</h1>

                                    <form action="editar.php" method="POST">
HTML;
                                        BD_MostrarMod($db,"SELECT fecha FROM concierto;");
                            echo <<<HTML
                                        <input type="hidden" name="editar_concierto">
                                        <input type="hidden" name="modificar">
                                        <span><input type="submit" name="enviar" value="Modificar"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['borrar'])){

                }else{
                    echo <<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Editar Conciertos</h1>

                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="editar_concierto">
                                    <span><input type="submit" name="aniadir" value="Añadir concierto"/></span>
                                    <span><input type="submit" name="modificar" value="Modificar concierto"/></span>
                                    <span><input type="submit" name="borrar" value="Borrar concierto"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                }
            break;

            // Editar Usuario
            case 4:
                if(isset($_POST['aniadir'])){
                    if(BD_CrearUsuario($db,$_POST)){
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Usuario</h1>
                                        <span><p> Usuario creada con éxito</p></span>
                                </article>
                            </main>
HTML;
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Añadir Usuario</h1>
HTML;
                                    if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                        echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                        echo <<<HTML
                                    <form action="editar.php" method="POST" enctype="multipart/form-data">
                                        <span><label>Id: <input type="text" name="id" required/></label></span>
                                        <span><label>Contraseña: <input type="password" name="password" required/></label></span>
                                        <span><label>Nombre: <input type="text" name="nombre" required/></label></span>
                                        <span><label>Apellidos: <input type="text" name="apellido" required/></label></span>
                                        <span><label>Email: <input type="email" name="email" required/></label></span>
                                        <span><label>Teléfono: <input type="number" name="tlf" required/></label></span>
                                        <span><label>Tipo de usuario: 
                                        <select name="tipo">
                                            <option value="1" selected>Administrador</option>
                                            <option value="2">Gestor de compras</option>
                                        </select></label></span>
                                        <input type="hidden" name="editar_usuario">
                                        <span><input type="submit" name="aniadir" value="Añadir"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['modificar'])){
                    if(isset($_POST['enviar'])){
                        if(isset($_POST['seleccionado']))
                            setcookie('id', $_POST['seleccionado']);
                        if(BD_ModificarUsuario($db,$_POST)){
                               echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Usuario</h1>
                                            <span><p> Usuario modificado con éxito</p></span>
                                    </article>
                                </main>
HTML;
                        }else{
                            echo <<<HTML
                                <main class="main-grid">
                                    <article>
                                        <h1>Modificar Usuario</h1>
HTML;
                                        $consulta = "SELECT * FROM usuarios_proyecto WHERE id = '".$_POST['seleccionado']."';";
                                        $resultado = mysqli_query($db,$consulta);
                                        $resultado = mysqli_fetch_row($resultado);

                                        if(isset($_POST['id']) && ComprobarDatosVacios($_POST))
                                            echo "<span><p> Existe un usuario con ese nombre, o hay campos vacios </p></span>";
                            echo <<<HTML
                                        <form action="editar.php" method="POST">
HTML;
                                            echo '<span><label>Id: <input type="text" name="id" value="'.$resultado['0'].'" required/></label></span>';
                                            echo '<span><label>Contraseña: <input type="password" name="password"/></label></span>';
                                            echo '<span><label>Nombre: <input type="text" name="nombre" value="'.$resultado['2'].'" required/></label></span>';
                                            echo '<span><label>Apellidos: <input type="text" name="apellido" value="'.$resultado['3'].'" required/></label></span>';
                                            echo '<span><label>Email: <input type="email" name="email" value="'.$resultado['4'].'" required/></label></span>';
                                            echo '<span><label>Teléfono: <input type="number" name="tlf" value="'.$resultado['5'].'" required/></label></span>';
                                echo <<<HTML
                                            <span><label>Tipo de usuario: 
                                            <select name="tipo">
                                                <option value="1" selected>Administrador</option>
                                                <option value="2">Gestor de compras</option>
                                            </select></label></span>
                                            <input type="hidden" name="editar_usuario">
                                            <input type="hidden" name="modificar">
                                            <span><input type="submit" name="enviar" value="Editar usuario"/></span>
                                        </form>
                                    </article>
                                </main>
HTML;
                        }
                    }else{
                        echo <<<HTML
                            <main class="main-grid">
                                <article>
                                    <h1>Modificar Usuario</h1>

                                    <form action="editar.php" method="POST">
HTML;
                                        BD_MostrarMod($db,"SELECT id FROM usuarios_proyecto;");
                            echo <<<HTML
                                        <input type="hidden" name="editar_usuario">
                                        <input type="hidden" name="modificar">
                                        <span><input type="submit" name="enviar" value="Modificar"/></span>
                                    </form>
                                </article>
                            </main>
HTML;
                    }
                }else if(isset($_POST['borrar'])){

                }else{
                    echo <<<HTML
                        <main class="main-grid">
                            <article>
                                <h1>Editar Usuario</h1>

                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="editar_usuario">
                                    <span><input type="submit" name="aniadir" value="Añadir usuario"/></span>
                                    <span><input type="submit" name="modificar" value="Modificar usuario"/></span>
                                    <span><input type="submit" name="borrar" value="Borrar usuario"/></span>
                                </form>
                            </article>
                        </main>
HTML;
                }
            break;
        }
    }

    if(!isset($_POST['editar_componentes']) && !isset($_POST['editar_biografia']) && !isset($_POST['editar_discografia']) && !isset($_POST['editar_concierto']) && !isset($_POST['editar_usuario'])){
        $url = 'https://void.ugr.es/~ftm19971718/proyecto/index.php';
        header('Location: '.$url);
    }else{
        if(isset($_POST['editar_componentes'])){
            Encabezado(5);
            Aside($db);
            Editar($db,0);
            Footer();
        }else if(isset($_POST['editar_biografia'])){
            Encabezado(5);
            Aside($db);
            Editar($db,1);
            Footer();
        }else if(isset($_POST['editar_discografia'])){
            Encabezado(5);
            Aside($db);
            Editar($db,2);
            Footer();
        }else if(isset($_POST['editar_concierto'])){
            Encabezado(5);
            Aside($db);
            Editar($db,3);
            Footer();
        }else if(isset($_POST['editar_usuario'])){
            Encabezado(5);
            Aside($db);
            Editar($db,4);
            Footer();
        }
    }
?>