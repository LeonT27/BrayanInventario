<?php
include('Conn.php');

class CRUD
{

    var $conn;
    var $connEsta;

    function CRUD( )
    {  
        $this->conn = new Conexion();
        $this->connEsta = $this->conn->EstablecerConexion();
    }

    function Insert_Tipo_Inventario($descripcion, $cuenta, $estado)
    {
        $SP_Insertar = "EXEC	[dbo].[Insert_TipoInventario]
		                        @Descripcion = ?,
		                        @Cuenta_Contable = ?,
		                        @Estado = ?";
        $array = array(
                        array(&$descripcion),  
                        array(&$cuenta),
                        array(&$estado)
                      );
        $stmt1 = sqlsrv_prepare( $this->connEsta, $SP_Insertar, $array);
        if( !$stmt1 ) {
            echo 'Error in executing statement .\n';
            die( print_r( sqlsrv_errors(), true));
        }
        $stmt = sqlsrv_execute( $stmt1 );
        if( $stmt == FALSE )  
        {
             echo "Error in executing statement .\n";  
             die( print_r( sqlsrv_errors(), true));  
        }
   }

   function Borrar_Tipo_Inventario($ID)
   {
       $SP_Borrar = "EXEC	[dbo].[Elimar_TipoInventario] 
		                        @ID = ?";
       $array = array( array(&$ID) );
       $stmt1 = sqlsrv_prepare( $this->connEsta, $SP_Borrar, $array);

       if( !$stmt1 ) {
            echo 'Error in executing statement .\n';
            die( print_r( sqlsrv_errors(), true));
        }

        $stmt = sqlsrv_execute( $stmt1 );

        if( $stmt == FALSE )  
        {
             echo "Error in executing statement .\n";  
             die( print_r( sqlsrv_errors(), true));  
        }
   }

   function Modificar_Tipo_Inventario($ID, $descripcion, $cuenta, $estado)
   {
       $SP_Modificar = "EXEC	[dbo].[Modificar_TipoInventario]
		                        @ID = ?,
		                        @Descripcion = ?,
		                        @Cuenta_Contable = ?,
		                        @Estado = ?";
       $array = array(
                       array(&$ID),
                       array(&$descripcion),  
                       array(&$cuenta),
                       array(&$estado)
                     );
       $stmt1 = sqlsrv_prepare( $this->connEsta, $SP_Modificar, $array);

       if( !$stmt1 ) {
            echo 'Error in executing statement .\n';
            die( print_r( sqlsrv_errors(), true));
        }

        $stmt = sqlsrv_execute( $stmt1 );

        if( $stmt == FALSE )  
        {
             echo "Error in executing statement .\n";  
             die( print_r( sqlsrv_errors(), true));  
        }
   }

   function VerTabla($nomTabla) {
        switch ($nomTabla) {
            case '[dbo].[SELECT_TipoInventario]':
                $controlador = 'TipoInventario';
                $str = 'ID_TipoInventario';
                break;
            case '[dbo].[SELECT_Articulos]':
                $controlador = 'Articulos';
                $str = 'ID_Articulos';
                break;
            case '[dbo].[SELECT_Almacenes]':
                $controlador = 'Almacenes';
                $str = 'ID_Almacen';
                break;
            case '[dbo].[SELECT_Transacion]':
                $controlador = 'Transacion';
                $str = 'ID_Transacion';
                break;
        }

        echo "<div class='row'><table id='table_id'> <thead> <tr>";
        $SP_Ver = "EXEC $nomTabla";
        $resultado = sqlsrv_query( $this->connEsta, $SP_Ver);
        $i = 0;
        if ($resultado) {
            $metaData = sqlsrv_field_metadata($resultado);
            for ($i = 0; $i < count($metaData); $i++) {
                echo "<th>".$metaData[$i]["Name"] . "</th>";
            }
            echo "<th>&nbsp;</th>";
            echo "<th>&nbsp;</th>";
            echo "</tr> </thead>";
            echo "<tbody> <tr>";
            while ($datos = sqlsrv_fetch_object( $resultado)) {
                foreach($datos as $dato){
                    echo "<td>".$dato."</td>";
                }
                //Iconos para modificar y borrar
                echo "<td><a href='/Controlador$controlador.php?Modificar=si&ID=".$datos->$str."'>Modificar</a></td>";
                echo "<td><a href='/Controlador$controlador.php?Eliminar=si&ID=".$datos->$str."'>Borrar</a></td>";
                echo "</tr> ";
            }
            echo "</tbody> </table>  </div>";
        } else {
            echo "No hay folma";
        }
    }

    function modTO($tabla, $id) {
        $SP_Ver = "SELECT * FROM $tabla WHERE $id";
        $resultado = sqlsrv_query( $this->connEsta, $SP_Ver);
        if(!$resultado){
            echo 'dimelo mmg';
        }
        $datos = sqlsrv_fetch_object( $resultado);
        return $datos;
    }
}
?>

