<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//definición
function print_f2($variable){

    if(is_array($variable)){
        $contenido = "";
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        } 
        file_put_contents("datos.txt", $variable);

    } else {
        //entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado";
}

$aNotas = array(8, 5, 7, 9, 10, 11, 12);
$msg = "Este es una prueba";
print_f2($aNotas);

?>