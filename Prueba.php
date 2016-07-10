<?php
        include 'CRUD.php';
        $conn = new Conexion();
        $connEsta = $conn->EstablecerConexion();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#table').DataTable();
            });
        </script>
    </head>
    <body>
        <?php
            echo "<div ><table id='table' class='display'> <thead> <tr>";
        $SP_Ver = "EXEC [dbo].[SELECT_Transacion]";
        $resultado = sqlsrv_query( $connEsta, $SP_Ver);
        

        while ($datos = sqlsrv_fetch_array( $resultado)) { //WHILE para los datos de las columnas //fetch_object Retorna los datos de una fila
                foreach($datos as $dato){
                    echo $dato;
                }
        }
        ?>
    </body>
</html>
