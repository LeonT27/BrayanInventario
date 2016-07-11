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
        }
        else
        {
            $_SESSION['Error'] = ' al dejar los campos vacios.';
            header("location: Agregar-TipoInventario.php");
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
        }
        else
        {
            $_SESSION['Error'] = ' al dejar los campos vacios.';
            header("location: Modificar-TipoInventario.php?ID=".$_POST['ID']."");
        }
    }

    if(!empty($_GET['Eliminar']))
    {
        $crud->Borrar_Tipo_Inventario($_GET['ID']);
        header("location: Ver-TipoInventario.php");
    }
?>