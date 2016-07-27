<?php
    session_start();
     
    define('DS', DIRECTORY_SEPARATOR) ;   
    define ('ROOT', realpath(dirname(__FILE__)) . DS);

    require_once "Config/Autoload.php";
    Config\Autoload::run();
    require_once "View/template.php";
    Config\Enrutador::run($req = new Config\Request());

    if(!empty($_SESSION['login_user']) && $req->controlador == "login")
    {
        //print $_SESSION['login_user']; 
        header("location: /articulos/");
    } 
?>
