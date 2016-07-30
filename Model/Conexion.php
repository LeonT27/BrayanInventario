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

        public function exe($query, $array, $salida_Mala=" ", $salida_Buena=" ")
        {
            $stmt = sqlsrv_prepare( $this->conn, $query, $array);
            if( !$stmt ) 
            {
                $_SESSION['Error']=" in preparing statement .\n".print_r( sqlsrv_errors(), true);
                //header("location: $salida_Mala"); 
            }
            $stmt = sqlsrv_execute($stmt);
            if( $stmt == FALSE )  
            {
                $_SESSION['Error']=" in executing statement .\n".print_r( sqlsrv_errors(), true);
                //header("location: $salida_Mala");  
            }
            else
            {
                header("location: $salida_Buena");
            }
        }

        public function getConn()
        {
            return $this->conn;
        }

        public function ver_Tabla($nomTabla, $mostrar=TRUE) {
            switch ($nomTabla) {
                case '[dbo].[SELECT_TipoInventario]':
                    $controlador = 'tipoinventario';
                    $str = 'ID_TipoInventario';
                    break;
                case '[dbo].[SELECT_Articulos]':
                    $controlador = 'articulos';
                    $str = 'ID_Articulos';
                    break;
                case '[dbo].[SELECT_Almacenes]':
                    $controlador = 'almacenes';
                    $str = 'ID_Almacen';
                    break;
            }
            echo "<div class='row'><table id='table_id'> <thead> <tr>";
            $SP_Ver = "EXEC $nomTabla";
            $resultado = sqlsrv_query( $this->conn, $SP_Ver);
            $i = 0;
            if(sqlsrv_has_rows($resultado) === FALSE)
            {
                echo "<div class='msg msg-alerta'>
                    <p><span>Alerta</span> tabla sin datos</p>
                </div>";
            }
            else
            {
            if ($resultado) {
                $metaData = sqlsrv_field_metadata($resultado);
                for ($i = 0; $i < count($metaData); $i++) {
                    echo "<th>".$metaData[$i]["Name"] . "</th>";
                }
                if($mostrar==TRUE)
                {
                    echo "<th>&nbsp;</th>";
                    echo "<th>&nbsp;</th>";
                }
                echo "</tr> </thead>";
                echo "<tbody> <tr>";
                while ($datos = sqlsrv_fetch_object( $resultado)) {
                    foreach($datos as $dato){
                        echo "<td>".$dato."</td>";
                    }
                    //Iconos para modificar y borrar
                    if($mostrar==TRUE)
                    {
                        echo "<td><a href='/$controlador/update/".$datos->$str."'>Modificar</a></td>";
                        echo "<td><a href='/$controlador/delete/".$datos->$str."'>Borrar</a></td>";
                    }
                    echo "</tr> ";
                }
                echo "</tbody> </table>  </div>";
            } else {
                echo "No hay folma";
            }
            }
        }

        public function consulta_Listar($query)
        {
            $resultado = sqlsrv_query( $this->conn, $query);
            return $resultado;
        }
    }
?>