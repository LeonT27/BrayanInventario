<?php
    require_once "Config/Autoload.php";
    Config\Autoload::run();

    function xd($id)
    {
    $conn = new Model\Conexion;
    $query = "EXEC	[dbo].[ELinar_Articulos]
		                @ID = ?";
    $array = array( array(&$id) );

    $conn($query, $array); 
    }

    call_user_func_array("xd", array(3));

