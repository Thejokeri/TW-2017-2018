<?php
    function valcuenta_bancaria($cuenta1,$cuenta2,$cuenta3,$cuenta4){
        if (strlen($cuenta1)!=4) return false;
        if (strlen($cuenta2)!=4) return false;
        if (strlen($cuenta3)!=2) return false;
        if (strlen($cuenta4)!=10) return false;

        if (mod11_cuenta_bancaria("00".$cuenta1.$cuenta2)!=$cuenta3{0}) return false;
        if (mod11_cuenta_bancaria($cuenta4)!=$cuenta3{1}) return false;
        return true;
        }
        //////////////////////////////////////////////////////////////////////////////////////

        function mod11_cuenta_bancaria($numero){
        if (strlen($numero)!=10) return "?";

        $cifras = Array(1,2,4,8,5,10,9,7,3,6);
        $chequeo=0;
        for ($i=0; $i < 10; $i++)
            $chequeo += substr($numero,$i,1) * $cifras[$i];

        $chequeo = 11 - ($chequeo % 11);
        if ($chequeo == 11) $chequeo = 0;
        if ($chequeo == 10) $chequeo = 1;
        return $chequeo;
    }   
?>