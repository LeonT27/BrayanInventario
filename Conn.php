<?php
    
class Conexion 
{

    function __construct( ){  }


    var  $serverName = "pruebaunapec1.database.windows.net";
    var  $connectionInfo = array( "Database"=>"IDInventario", "UID"=>"leon", "PWD"=>"Admin123");

    function EstablecerConexion() 
    {
        $conn = sqlsrv_connect( $this->serverName, $this->connectionInfo);
        if( $conn ) {
            //echo "Conexión establecida.<br />";
        }else{
            echo "Conexión no se pudo establecer.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        return $conn;
    }

    function InterrupirConexion($conn) 
    {
        sqlsrv_close( $conn );
    }
}

?>