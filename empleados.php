<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] = array(
    "dni" => "33.300.123",
    "nombre" => "David Garcia",
    "sueldo" => 85000.30
    
);
$aEmpleados[] = array(
    "dni" => "23.684.385",
    "nombre" => "Ana del Valle",
    "sueldo" => 90000
    
);
$aEmpleados[] = array(
    "dni" => "13.345.432",
    "nombre" => "Andres Perez",
    "sueldo" => 100000
    
);
$aEmpleados[] = array(
    "dni" => "43.934.967",
    "nombre" => "Victoria Luz",
    "sueldo" => 70000
    
);

function calcularNeto($sueldo){
    return $neto = $sueldo - ($sueldo * 0.17);

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php foreach($aEmpleados as $empleado) { ?>
                        <tr>
                              <td><?php echo $empleado["dni"]; ?></td>
                              <td><?php echo mb_strtoupper ($empleado["nombre"]); ?></td>
                              <td>$<?php echo number_format(calcularNeto($empleado["sueldo"]), 2, ",", "."); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Cantidad de empleados activos: <?php echo count($aEmpleados); ?></p>
            </div>
        </div>
    </main>
</body>
</html>