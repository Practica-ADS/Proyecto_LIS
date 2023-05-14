<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div id="login-contenedor">
        <div class="contenedor-formulario-login">
            <h1 id="titulo-h1-mostrar-entrada">Bienvenido distinguido empresario</h1>
            <form action="./index.php" id="login" method="post">
                <label for="usuario-input">Usuario: </label> <br>
                <input type="text" name="usuario" id="usuario-input" placeholder="JohnDoe123">
                <label for="contrasena-input">Contraseña: </label> <br>
                <input type="password" name="contrasena" id="contrasena-input">

                <input type="submit" value="Ingresar" name="enviar">
            </form>
            <?php
            include_once "conexiondb.php";

            $database = new conexion();
            $dbconnection = $database->create_conection();

            if (isset($_POST["enviar"])) {


                $usuario = $_POST["usuario"];
                $clave = $_POST["contrasena"];
                $sql = "SELECT * from empresas where nombre_usuario =:usuario and contrasena=:contra";

                $statement = $dbconnection->prepare($sql);
                $statement->bindparam(":usuario", $usuario);
                $statement->bindparam(":contra", $clave);
                $statement->execute();

                $datos = $statement->fetch(PDO::FETCH_ASSOC);

                if ($datos) {
                    header("location:inicioempresa.php");

                } else {
                    echo '<div class="alert alert-danger">acceso denegado1</div>';
                }


            }
            ?>


            <div id="contenedor-formulario-opciones-extras">
                <div id="recuperar-contrasena-html">
                    <a href="./recuperarContrasena.html">¿Olvido su contraseña?</a>
                </div>
                <div id="registrar-usuario-html">
                    <a href="./registrarusuario.php">¿No tiene cuenta?</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>