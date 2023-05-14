<?php
class conexion
{
    const DBHOSTNAME = "localhost";
    const DBUSER = "root";
    const DBPASS = "";
    const DBDATABASE = "cuponera";
    const CHARSET = "utf8mb4";


    public function create_conection()
    {
        try {
            @$connection = new PDO(
                "mysql:host =" . self::DBHOSTNAME .
                ";dbname=" . self::DBDATABASE . ";charset=" . self::CHARSET,
                self::DBUSER,
                self::DBPASS
            );

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "Error en la connexion", $e->getMessage();
            die();
        }
    }

    public function close_connection($connection)
    {
        $connection = null;
    }
}
?>