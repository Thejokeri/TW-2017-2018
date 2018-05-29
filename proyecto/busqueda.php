<?php
    require "comun_html.php";
 
    $db = BD_conexion();

    function ContentBusqueda($db,$value,$consulta){
        switch($value){
            // Texto de cancion o album
            case 0:
                $consultacancion = 'SELECT * FROM canciones WHERE nombre = "«'.$_POST['search'].'»"';
                $nombre = str_replace(' ', '_', $_POST['search']);
                $consultalbum = 'SELECT * FROM album WHERE nombre = "'.$nombre.'"';  
                $resultadocancion = mysqli_query($db,$consultacancion);
                $resultadoalbum = mysqli_query($db,$consultalbum);

                echo <<<HTML
                    <main class="main-grid">
                        <article>
                            <span><p>Mostrando resultado de la búsqueda: </p></span>
HTML;
                            if(mysqli_num_rows($resultadocancion) > 0){
                                $fila = mysqli_fetch_row($resultadocancion);
                                BD_ListarCanciones($db,$fila['2'],$_POST['search']);
                            }else{
                                if(mysqli_num_rows($resultadoalbum) > 0){
                                    BD_ListarCanciones($db,$nombre,null);
                                }else{
                                    echo "<span><p>No se ha encontrado ningun resultado</p></span>";
                                }
                            }
                echo <<<HTML
                        </article>
                    </main>
HTML;

            break;

            // Fecha del album
            case 1:
                echo <<<HTML
                    <main class="main-grid">
                        <article>
                            <span><p>Mostrando resultado de la búsqueda: </p></span>
HTML;
                            BD_ListarAlbum($db,$consulta);
                echo <<<HTML
                        </article>
                    </main>
HTML;
            break;

            // Select del concierto y Fecha del concierto
            case 2:
                echo <<<HTML
                    <main class="main-grid">
                        <article>
                            <span><p>Mostrando resultado de la búsqueda: </p></span>
HTML;
                            BD_ListarConciertos($db,$consulta);
                echo <<<HTML
                        </article>
                    </main>
HTML;
            break;
        }
    }

    if(isset($_POST['discografia_searchbutton'])){
        if(isset($_POST['search']) && !empty($_POST['search'])){ 
            Encabezado(2);
            Aside($db);
            ContentBusqueda($db,0,null);
            Footer();
        }else{
            if(isset($_POST['fecha_iniciocancion']) && isset($_POST['fecha_fincancion'])){
                $fecha_inicio = date("Y-m-d", strtotime($_POST['fecha_iniciocancion']));
                $fecha_fin = date("Y-m-d", strtotime($_POST['fecha_fincancion']));
                $consulta = 'SELECT * FROM album WHERE fecha >= "'.$fecha_inicio.'" and fecha <= "'.$fecha_fin.'"';
                Encabezado(2);
                Aside($db);
                ContentBusqueda($db,1,$consulta);
                Footer();
            }
        }
    }

     if(isset($_POST['conciertos_searchbutton'])){
        //Select
        if(isset($_POST['conciertos_search'])){
            $consulta = 'SELECT * FROM concierto WHERE nombre = "'.$_POST['conciertos_search'].'"';
            Encabezado(3);
            Aside($db);
            ContentBusqueda($db,2,$consulta);
            Footer();
        }else{
            if(isset($_POST['fecha_iniciogira']) && isset($_POST['fecha_fingira'])){
                $fecha_inicio = date("Y-m-d", strtotime($_POST['fecha_iniciogira']));
                $fecha_fin = date("Y-m-d", strtotime($_POST['fecha_fingira']));
                $consulta = 'SELECT * FROM concierto WHERE fecha >= "'.$fecha_inicio.'" and fecha <= "'.$fecha_fin.'"';
                Encabezado(3);
                Aside($db);
                ContentBusqueda($db,2,$consulta);
                Footer();
            }
        }
    }   
?>