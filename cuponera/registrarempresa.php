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
                <h1>Registrar Empresa</h1>
                <br>
                <?php
                if (isset($_POST["enviar"])) {
                    include_once "conexiondb.php";
                    $Nombre_empresa = trim($_POST["Nombre_empresa"]);
                    $direccion = trim($_POST["direccion"]);
                    $telefono = trim($_POST["telefono"]);
                    $correo = trim($_POST["correo"]);
                    $usuario = trim($_POST["usuario"]);
                    $contrasena = trim($_POST["contrasena"]);

                    $database = new conexion();
                    $dbconnection = $database->create_conection();

                    $sql = "INSERT INTO empresas (Nombre_empresa, direccion, telefono, correo, usuario, contrasena) VALUES(:Nombre_empresa, :direccion, :telefono, :correo, :usuario, :contrasena)";
                    $statement = $dbconnection->prepare($sql);
                    $statement->bindparam(":Nombre_empresa", $Nombre_empresa);
                    $statement->bindparam(":direccion", $direccion);
                    $statement->bindparam(":telefono", $telefono);
                    $statement->bindparam(":correo", $correo);
                    $statement->bindparam(":usuario", $usuario);
                    $statement->bindparam(":contrasena", $contrasena);
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
                        <label for="tipo-entrada-input">Nombre_empresa:</label>
                        <input type="text" name="Nombre_empresa" value="Nombre_empresa" placeholder="Nombre_empresa">
                    </div>
                    <div class="form">
                        <label for="monto-entrada-input">direccion:</label>
                        <input type="text" name="direccion" value="direccion">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">telefono:</label>
                        <input type="text" name="telefono" value="telefono" placeholder="telefono">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">correo:</label>
                        <input type="text" name="correo" value="correo" placeholder="correo">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">usuario:</label>
                        <input type="text" name="usuario" value="usuario" placeholder="usuario">
                    </div>
                    <div class="form">
                        <label for="tipo-entrada-input">contrasena:</label>
                        <input type="password" name="contrasena" value="" placeholder="contrasena">
                    </div>

                    <input name="enviar" type="submit" value="registrar">
                </form>
            </div>
        </div>
    </div>
</body>