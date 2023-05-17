<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("invitados.txt")){

    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");

} else {
    $aDocumentos = array();
}


if($_POST){

    if(isset($_POST["btnProcesar"])){
        $documento = $_REQUEST["txtDocumento"];

        if(in_array($documento, $aDocumentos)){
            $mensaje = "Bienvendo";
        } else {
            $mensaje = "No se encuentra en la lista de invitados";
        }

    }

    if(isset($_POST["btnVip"])){
        $codigo = $_REQUEST["txtCodigo"];

        if($codigo == "verde"){
            $mensaje = "Su código de acceso es " . rand(1000, 9999);
        } else {
            $mensaje = "Ud. no tiene pase VIP";
        }

    }
}




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Lista de invitados</h1>
            </div>
            <?php if (isset($mensaje)): ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="col-12">
            <h5>Complete el siguiente formulario:</h5>
        </div>
        <div class="col-6">
            <form action="" method="post">
                <div class="row">
                    <div class="col-12">
                        <p>Ingrese el DNI:</p>
                        <input type="text" name="txtDocumento" class="form-control">
                        <input type="submit" name="btnProcesar" value="Verificar invitado" class="btn btn-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="12-col bm-3">
                        <p>Ingresa el código secreto para el pase VIP:</p>
                        <input type="text" name="txtCodigo" class="form-control">
                        <input type="submit" name="btnVip" value="Verificar código" class="btn btn-primary">
                    </div>
                </div>   
            </form>
        </div>
    </main>
</body>
</html>