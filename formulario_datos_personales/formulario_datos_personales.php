<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="resultado.php">
                    <div class="my-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="">Telefono:</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="my-3">
                        <button type="submit" name="btnIngresar" class="btn btn-primary float-end">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>