<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"])){
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}


if($_POST){

    if(isset($_POST["btnEnviar"])){

        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = array("nombre" => $nombre, "dni" => $dni, "telefono" => $telefono, "edad" => $edad);

        $_SESSION["listadoClientes"] = $aClientes;
    }

    if(isset($_POST["btnEliminar"])){
        session_destroy();
        $aClientes = array();
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
    <title>clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1 me-5">
                <form action="" method="post" class="form">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control my-2" placeholder="Ingrese su Nombre">
                    </div>

                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control">
                    </div>

                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control">
                    </div>

                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="text" id="txtEdad" name="txtEdad" class="form-control">
                    </div>

                        <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Enviar</button>
                        <button type="submit" name="btnEliminar" class="btn bg-danger text-white">Eliminar</button>

                </form>
            </div>
            <div class="col-6 ms-5">
                <table class="table table-hover shadow border">
                    <thead>
                        <th>Nombre:</th>
                        <th>DNI:</th>
                        <th>Telefono:</th>
                        <th>Edad:</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td><form method="post" action=""><button type="submit" name="btnBorrar"><i class="bi bi-trash"></i></button></form></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>