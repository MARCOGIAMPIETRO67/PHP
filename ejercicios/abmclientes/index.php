<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(file_exists("archivo.txt")){

    $jsonClientes = file_get_contents("archivo.txt", );

    $aClientes = json_decode($jsonClientes, true);

} else {

    $aClientes = array();

}


$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if ($pos>=0){

        $aClientes[$pos] = array("dni" => $dni,
                         "nombre" => $nombre,
                         "telefono" => $telefono,
                         "correo" => $correo,
                         "imagen" => $nombreImagen);

    } else {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_temp = $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_temp, "imagenes/$nombreImagen");
        }


    $aClientes[] = array("dni" => $dni,
                         "nombre" => $nombre,
                         "telefono" => $telefono,
                         "correo" => $correo,
                         "imagen" => $nombreImagen);

    }
    $jsonClientes = json_encode($aClientes);

    file_put_contents("archivo.txt", $jsonClientes);
}




if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aClientes[$pos]);

    $jsonClientes = json_encode($aClientes);

    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
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
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="pb-1">
                        <label for="txtDni">DNI: *</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["dni"]: ""; ?>">
                    </div>
                
                    <div class="pb-1">
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>

                    <div class="pb-1">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>

                    <div class="pb-1">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div class="pb-1">
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary text-white">Guardar</button>
                        <a href="index.php" class="btn bg-danger my-2">NUEVO</a>
                    </div>

                </form>
            </div>
            <div class="col-6 ms-5">
                <table class="table table-hover shadow border">
                    <thead>
                        <th>Imagen:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Telefono:</th>
                        <th>Correo:</th>
                        <th>Acciones</th>
                    </thead>
                    <?php foreach ($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td>
                                <?php if($cliente["imagen"] != ""): ?>
                                    <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                                <?php endif; ?>
                                
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi-solid bi-pencil"></i></a>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></td></a>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>