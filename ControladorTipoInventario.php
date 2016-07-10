<?php
    session_start();
    include 'Crud.php';

    if(empty($_SESSION['login_user']))
    {
        header("location: index.php");
    }
    $crud = new CRUD();

    if(!empty($_POST['add']))
    {
        if(!empty($_POST['descripcion']) && !empty($_POST['cuenta']))
        {
            $crud->Insert_Tipo_Inventario($_POST['descripcion'],$_POST['cuenta'],$_POST['estado']);
            empty($_POST['add']);
            echo 'Agregando';
            header("location: Ver-TipoInventario.php");
        }
    }

    if(!empty($_GET['Modificar']))
    {
        header("location: Modificar-TipoInventario.php?ID=".$_GET['ID']."");
    }

    if(!empty($_POST['modi']))
    {
      if(!empty($_POST['descripcion']) && !empty($_POST['cuenta']) && !empty($_POST['ID']))
        {
            $crud->Modificar_Tipo_Inventario($_POST['ID'], $_POST['descripcion'], $_POST['cuenta'], $_POST['estado']);
            echo 'Modicando';
            header("location: Ver-TipoInventario.php");
        }  
    }

    if(!empty($_GET['Eliminar']))
    {
        $crud->Borrar_Tipo_Inventario($_GET['ID']);
        header("location: Ver-TipoInventario.php");
    }
?>