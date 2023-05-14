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
                <h1>Registrar Usuario</h1>

                <br>
                <?php
                if (isset($_POST["enviar"])) {
                    // include_once "cuponera/conexiondb.php";
                    include_once "conexiondb.php";
                    $usuario = trim($_POST["usuario"]);
                    $contrasena = trim($_POST["contrasena"]);
                    $nombre = trim($_POST["nombre"]);
                    $apellido = trim($_POST["apellido"]);

                    $database = new conexion();
                    $dbconnection = $database->create_conection();


                    $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido) VALUES(:usuario, :contrasena, :nombre, :apellido)";
                    $statement = $dbconnection->prepare($sql);
                    $statement->bindparam(":usuario", $usuario);
                    $statement->bindparam(":contrasena", $contrasena);
                    $statement->bindparam(":nombre", $nombre);
                    $statement->bindparam(":apellido", $apellido);
                    $statement->execute();

                    if ($statement->rowCount() == 1) {
                        $message = "<div class= 'alert alert-danger' role = 'alert'>";
                        $message .= "<h4 class= 'alert-heading'><i  class= 'fa fa-user-plus'></i> usuario agregado</h4> ";
                        $message = "<p>Usuario agregado exitosamente</p>";
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
                        <label for="tipo-entrada-input">usuario:</label>
                        <input type="text" name="usuario" value="usuario" placeholder="usuario">
                    </div>
                    <div class="form">
                        <label for="monto-entrada-input">contrasena:</label>
                        <input type="password" name="contrasena" value="contrasena">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">nombre:</label>
                        <input type="text" name="nombre" value="nombre" placeholder="nombre">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">apellido:</label>
                        <input type="text" name="apellido" value="apellido" placeholder="apellido">
                    </div>

                    <input name="enviar" type="submit" value="registrar">
                </form>

            </div>
        </div>
    </div>
</body>