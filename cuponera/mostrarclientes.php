<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script scr="https://kit.fontawesome.com/f6e8724f6b.js" crossorigin="anonymous"></script>
    <title>Mostrar Entradas</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container contenedor-mostrar-entrada">
        <div class="row">
            <div class="col-md-12">
                <h1 id="titulo-h1-mostrar-entrada">Clientes Suscritos</h1>
                <br>
                <div class="table-responsive">
                    <table class="table table-stripped table-bordered table-hover" id="tabla-principal-entrada-vista">
                        <thead class="dark">
                            <tr>
                                <th>idClientes</th>
                                <th>correo</th>
                                <th>usuario</th>
                                <th>contrasena</th>
                                <th>nombre</th>
                                <th>apellido</th>
                                <th>dui</th>
                                <th>fecha de nacimiento</th>


                            </tr>
                        </thead>

                        <tr>
                            <?php
                            include_once "conexiondb.php";

                            $database = new conexion();
                            $dbconnection = $database->create_conection();
                            $sql = "SELECT * FROM clientes order by idClientes ASC";
                            $result = $dbconnection->query($sql);
                            if ($result->rowCount() > 0) {
                                foreach ($result as $fila) {
                                    echo "<tr>";
                                    echo "<td>" . $fila["idClientes"] . "</td>";
                                    echo "<td>" . $fila["correo"] . "</td>";
                                    echo "<td>" . $fila["usuario"] . "</td>";
                                    echo "<td>" . $fila["contrasena"] . "</td>";
                                    echo "<td>" . $fila["nombre"] . "</td>";
                                    echo "<td>" . $fila["apellido"] . "</td>";
                                    echo "<td>" . $fila["dui"] . "</td>";
                                    echo "<td>" . $fila["fecha_de_nacimiento"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class= 'text-center'>No hay datos que mostrar</td></tr>";
                            }

                            $database->close_connection($dbconnection);
                            ?>
                        </tr>


                    </table>
                </div>

            </div>

        </div>

    </div>
</body>