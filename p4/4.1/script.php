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
        
        $salida = '<span class="additionalFields customSecondaryText"> / Robin Nixon</span>';

        preg_match_all('{<a id="recordDisplayLink2Component\w*[0-9]*" href=".*">\s*(.*)<\/a>}', $output, $arraylibros);
        preg_match_all('{<span class="additionalFields customSecondaryText">\s(.*)</span><\/span>}', $output, $arrayautores);

        for($i=0;  $i < count($arraylibros); $i++){
                echo "$arraylibros[$i]";
        }

        //cerramos el recurso 
        curl_close($curl);      
?>