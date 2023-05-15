<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){

    $strJson = file_get_contents("archivo.txt", );

    $aTareas = json_decode($strJson, true);

} else {
    $aTareas = array();
}


if (isset($_GET["id"]) && $_GET["id"] >= 0) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if ($_POST) {
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];


    if ($id >= 0) {
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    } else {
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    }


    $strJson = json_encode($aTareas);

    file_put_contents("archivo.txt", $strJson);
}
if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);
    
    $strJson = json_encode($aTareas);

    file_put_contents("archivo.txt", $strJson);

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
    <title>Gestor de tareas</title>
</head>
<body>
    <main class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-12 text-center py-3">
                    <h1>Gestor de Tareas</h1>
                </div>
            </div>
            <div class="row pb-3">
                <div class="py-1 col-4">
                    <label for="lstPrioridad">Prioridad</label>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control mb-3" required>
                        <option value="Seleccionar" disabled selected>Seleccionar</option>
                        <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta"? "selected": ""; ?>>Alta</option>
                        <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media"? "selected": ""; ?>>Media</option>
                        <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja"? "selected": ""; ?>>Baja</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Usuario</label>
                    <select name="lstUsuario" id="lstUsuario" class="form-control mb-3" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Marco" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Marco"? "selected": ""; ?>>Marco</option>
                        <option value="Lucas" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Lucas"? "selected": ""; ?>>Lucas</option>
                        <option value="Franco" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Franco"? "selected": ""; ?>>Franco</option>
                        <option value="Sofia" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Sofia"? "selected": ""; ?>>Sofia</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Estado</label>
                    <select name="lstEstado" id="lstEstado" class="form-control mb-3" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar"? "selected": ""; ?>>Sin asignar</option>
                        <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado"? "selected": ""; ?>>Asignado</option>
                        <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso"? "selected": ""; ?>>En proceso</option>
                        <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado"? "selected": ""; ?>>Terminado</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-1">
                    <label for="">Título</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control mb-3" required value="<?php echo isset($aTareas[$id])? $aTareas[$id]["titulo"]: ""; ?>">
                </div>
                <div class="col-12 py-1">
                    <label for="">Descripción</label>
                    <textarea name="txtDescripcion" id="txtDescripcion" required class="form-control mb-3"><?php echo isset($aTareas[$id])? $aTareas[$id]["descripcion"]: ""; ?></textarea>
                </div>
                <div class="col-12 py-1 text-center">
                    <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">Enviar</button>   
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
        <?php if(count($aTareas)): ?>
        <div class="row">
            <div class="col-12 pt-3">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aTareas as $pos => $tareas): ?>
                            <tr>
                                <td><?php echo $pos ?></td>
                                <td><?php echo $tareas["fecha"]; ?></td>
                                <td><?php echo $tareas["titulo"]; ?></td>
                                <td><?php echo $tareas["prioridad"]; ?></td>
                                <td><?php echo $tareas["usuario"]; ?></td>
                                <td><?php echo $tareas["estado"]; ?></td>
                                <td>
                                    <a href="?id=<?php echo $pos; ?>&do=editar" class="btn btn-secondary"><i class="bi-solid bi-pencil"></i></a>
                                    <a href="?id=<?php echo $pos; ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div> 
            </div>
        <?php endif; ?>    
    </main>
</body>
</html>