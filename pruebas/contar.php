<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function contar($aArray){
    $contador = 0;
    foreach($aArray as $item){
         $contador++;
    }
    return $contador;
}

$aNotas = array(9, 8, 9.50, 4, 7, 8);


$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50
    
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
    
);
$aPacientes[] = array(
    "dni" => "13.345.432",
    "nombre" => "Juan Paz",
    "edad" => 70,
    "peso" => 80
    
);
$aPacientes[] = array(
    "dni" => "43.934.967",
    "nombre" => "Sofia perez",
    "edad" => 22,
    "peso" => 65
    
);

echo "Cantidad de productos: " .contar($aProductos) ."<br>";
echo "Cantidad de pacientes: " .contar($aPacientes) ."<br>";
echo "Cantidad de notas: " .contar($aNotas) ."<br>";

?>