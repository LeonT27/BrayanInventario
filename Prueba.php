<?php
    require_once "Config/Autoload.php";
    Config\Autoload::run();

    $conn = new Model\Login;

    $conn->user = "Tolen";
    $conn->pass = 123456;
    $conn();


