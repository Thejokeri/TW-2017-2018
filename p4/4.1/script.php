<?php

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        
        // Creamos el recurso
        $curl = curl_init(); 

        $nombre = urlencode($_POST['nombre']);

        $url = "http://bencore.ugr.es/iii/encore/search?formids=target&lang=spi&suite=def&reservedids=lang%2Csuite&submitmode=&submitname=&target=$nombre";

        // Establecemos las opciones
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

        //$output contiene el output string
        $output = curl_exec($curl); 
        
        preg_match_all('{<a id="recordDisplayLink2Component\w*[0-9]*" href=".*">\s*(.*)<\/a><\/span>\s*<span class="title">\s*<span class="additionalFields customSecondaryText">(.*)</span>}', $output, $array);
      
        echo "Busqueda realizada con nombre: ", $_POST['nombre'],", mostrando ", (count($array[1])), " libros y autores:";
        echo "<br><br>"; 
        
        for($i = 0; $i < count($array[1]); $i++){
                echo "&nbsp;&nbsp; - ", $array[1][$i], " ", $array[2][$i], "<br>";
                echo "<br>";
        }
        
        //cerramos el recurso 
        curl_close($curl);      
?>