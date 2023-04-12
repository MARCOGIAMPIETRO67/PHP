<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    
    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

    if($usuario != "" && $clave != ""){
        header("Location: acceso-confirmado.php");
    } else {
        $msg = "Valido para usuarios registrados";
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de ingreso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                    <?php if(isset($msg)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    
                    <?php } ?>
                
                <form method="POST" action="">
                    <div class="my-3">
                        <label for="">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="">Clave:</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div class="my-3">
                        <button type="submit" name="btnIngresar" class="btn btn-primary">INGRESAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>