<?php
include ('Conn.php');
session_start();

$conn = new Conexion();
$conn1 = $conn->EstablecerConexion();
if(isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['username']))
{
    $query = "SELECT Usuario FROM [IDInventario].[dbo].[LOGIN] WHERE Usuario = ? AND Password = ? ";
    $array = array(
                    array(&$_POST['username']),  
                    array(&$_POST['password'])
                  );

    $stmt = sqlsrv_query($conn1, $query, $array);
    $row_count = sqlsrv_has_rows($stmt);
    if($row_count === TRUE)
    {
        $_SESSION['login_user'] = $_POST['username'];
        header("location: Ver-Articulo.php");
    }
    else 
    {
        $_SESSION['Error'] = ' al introducir las credenciales, intentelo denuevo.';
        header("location: index.php");
    }
}
else 
{
    $_SESSION['Error'] = ' al dejar los campos vacios.'; 
    header("location: index.php");
}
    
      
?>