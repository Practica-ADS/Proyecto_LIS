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
                <h1 id="titulo-h1-mostrar-entrada">Cupones en oferta</h1>
                <br>
                <div class="table-responsive">
                    <table class="table table-stripped table-bordered table-hover" id="tabla-principal-entrada-vista">
                        <thead class="dark">
                            <tr>
                                <th>idOfertas</th>
                                <th>titulo</th>
                                <th>precio_regular</th>
                                <th>precio_oferta</th>
                                <th>fecha_inicio</th>
                                <th>fecha_final</th>
                                <th>fecha_limite</th>
                                <th>cantidad_cupones</th>
                                <th>descripcion</th>

                            </tr>
                        </thead>

                        <tr>
                            <?php
                            include_once "conexiondb.php";

                            $database = new conexion();
                            $dbconnection = $database->create_conection();
                            $sql = "SELECT * FROM cupones order by idOfertas ASC";
                            $result = $dbconnection->query($sql);
                            if ($result->rowCount() > 0) {
                                foreach ($result as $fila) {
                                    echo "<tr>";
                                    echo "<td>" . $fila["idOfertas"] . "</td>";
                                    echo "<td>" . $fila["titulo"] . "</td>";
                                    echo "<td>" . $fila["precio_regular"] . "</td>";
                                    echo "<td>" . $fila["precio_oferta"] . "</td>";
                                    echo "<td>" . $fila["fecha_inicio"] . "</td>";
                                    echo "<td>" . $fila["fecha_final"] . "</td>";
                                    echo "<td>" . $fila["fecha_limite"] . "</td>";
                                    echo "<td>" . $fila["cantidad_cupones"] . "</td>";
                                    echo "<td>" . $fila["descripcion"] . "</td>";
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