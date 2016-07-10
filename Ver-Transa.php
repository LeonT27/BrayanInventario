<?php
session_start();
include 'Crud.php';

if(empty($_SESSION['login_user']))
{
    header("location: index.php");
}
 $crud = new CRUD();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>D' Brayan's inventario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="stylesheet" type="text/css" href="/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300italic,400italic' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="/js/scrit.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
    </head>
    <body>
        <header>
            <div class="row">
                <h1 class="thu-real">Thu real inventario</h1>
            </div>
            <a class="logout" href="Logout.php">Log Out</a>
            <div class="row">
                <nav>
                    <ul>
                        <li><a href="Ver-Articulo.php">Articulos</a></li>
                        <li><a href="Ver-TipoInventario.php">Tipo de Articulos</a></li>
                        <li><a href="Ver-Almacenes.php">Almacenes</a></li>
                        <li><a href="Ver-Transa.php">Transaciones</a></li>
                        <li><a href="AsientoContable.php">Asiento Contable</a></li>
                    </ul>
                </nav>
            </div>
            <?php $crud->VerTabla('[dbo].[SELECT_Transacion]'); ?>
            <a class="boton-a" href="Agregar-TipoInventario.php">+</a>
        </header>
    </body>
</html>
