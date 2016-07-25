<?php namespace Model;

    class Conexion
    {
        private $conexion_Info = array( "Database"=>"IDInventario", 
                                        "UID"=>"leon", 
                                        "PWD"=>"Admin123");
        private $server_Name = "pruebaunapec1.database.windows.net";
        private $conn;

        public function __construct()
        {
            $this->conn = sqlsrv_connect( $this->server_Name, $this->conexion_Info);
        }

        public function __invoke($query, $array, $salida_Mala, $salida_Buena)
        {
            $stmt = sqlsrv_prepare( $this->conn, $query, $array);
            if( !$stmt ) {
                $_SESSION['Error']=" in executing statement .\n".print_r( sqlsrv_errors(), true);
                header("location: $salida_Mala"); 
            }
            $stmt = sqlsrv_execute( $stmt );
            if( $stmt == FALSE )  
            {
                $_SESSION['Error']=" in executing statement .\n".print_r( sqlsrv_errors(), true);
                header("location: $salida_Mala");  
            }
            else
            {
                header("location: $salida_Buena.php");
            }
        }
    }
?>