<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script scr="https://kit.fontawesome.com/f6e8724f6b.js" crossorigin="anonymous"></script>
    <title>Registrar Usuarios</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Registrar Clientes</h1>
                <br>
                <?php
                if (isset($_POST["enviar"])) {
                    include_once "conexiondb.php";
                    $titulo = trim($_POST["titulo"]);
                    $precio_regular = trim($_POST["precio_regular"]);
                    $precio_oferta = trim($_POST["precio_oferta"]);
                    $fecha_inicio = trim($_POST["fecha_inicio"]);
                    $fecha_final = trim($_POST["fecha_final"]);
                    $fecha_limite = trim($_POST["fecha_limite"]);
                    $cantidad_cupones = trim($_POST["cantidad_cupones"]);
                    $descripcion = trim($_POST["descripcion"]);
                    $estado = trim($_POST["estado"]);

                    $database = new conexion();
                    $dbconnection = $database->create_conection();

                    $sql = "INSERT INTO cupones (titulo, precio_regular, precio_oferta, fecha_inicio, fecha_final, fecha_limite, cantidad_cupones, descripcion, estado ) VALUES(:titulo, :precio_regular, :precio_oferta, :fecha_inicio, :fecha_final, :fecha_limite, :cantidad_cupones, :descripcion, :estado)";
                    $statement = $dbconnection->prepare($sql);
                    $statement->bindparam(":titulo", $titulo);
                    $statement->bindparam(":precio_regular", $precio_regular);
                    $statement->bindparam(":precio_oferta", $precio_oferta);
                    $statement->bindparam(":fecha_inicio", $fecha_inicio);
                    $statement->bindparam(":fecha_final", $fecha_final);
                    $statement->bindparam(":fecha_limite", $fecha_limite);
                    $statement->bindparam(":cantidad_cupones", $cantidad_cupones);
                    $statement->bindparam(":descripcion", $descripcion);
                    $statement->bindparam(":estado", $estado);
                    $statement->execute();

                    if ($statement->rowCount() == 1) {
                        $message = "<div class= 'alert alert-danger' role = 'alert'>";
                        $message .= "<h4 class= 'alert-heading'><i  class= 'fa fa-user-plus'></i> Nuevo cliente agregado</h4> ";
                        $message .= "<p>cliente agregado exitosamente</p>";
                        $message .= "</div>";

                        echo $message;
                    } else {
                        $message = "<div class= 'alert alert-danger' role = 'alert'>";
                        $message .= "<h4 class= 'alert-heading'><i  class= 'fa fa-ban'></i> usuario no agregado</h4> ";
                        $message .= "<p>Ocurrio un error en su consulta  no e pudo guardar el ususario</p><br>";
                        $message .= "</div>";

                        echo $message;
                    }
                    $database->close_connection($dbconnection);
                }

                ?>

                <form id="registro-entrada" method="post">

                    <div class="form">
                        <label for="tipo-entrada-input">titulo:</label>
                        <input type="text" name="titulo" value="titulo" placeholder="titulo">
                    </div>
                    <div class="form">
                        <label for="monto-entrada-input">precio_regular:</label>
                        <input type="text" name="precio_regular" vakue="precio_regular">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">precio_oferta:</label>
                        <input type="text" name="precio_oferta" value="precio_oferta" placeholder="precio_oferta">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">fecha_inicio:</label>
                        <input type="date" name="fecha_inicio" value="" placeholder="fecha_inicio">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">fecha_final:</label>
                        <input type="date" name="fecha_final" value="" placeholder="fecha_final">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">fecha_limite:</label>
                        <input type="date" name="fecha_limite" value="" placeholder="fecha_limite">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">cantidad_cupones:</label>
                        <input type="text" name="cantidad_cupones" value="cantidad_cupones"
                            placeholder="cantidad_cupones">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">descripcion:</label>
                        <input type="text" name="descripcion" value="descripcion" placeholder="descripcion">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">estado:</label>
                        <input type="estado" name="estado" value="estado" placeholder="estado">
                    </div>
                    <input name="enviar" type="submit" value="registrar">
                </form>
            </div>
        </div>
    </div>
</body>