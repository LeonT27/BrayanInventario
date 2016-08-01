<?php
    require_once "Model/AsientoContable.php";

    $obj = new Model\AsientoContable();

    /**$obj->description = "";
    $obj->origin = "1";
    $obj->typeMovement = "1";
    $obj->created = "2016-08-1";
    $obj->amount = 500;
    $obj->accountId = 1;
    **/
    $array = $obj->http_Get('http://contability-app.azurewebsites.net/api/Accounts');
    //var_dump($array);

    echo '<pre>';
    print_r ($array);
    echo '</pre>';

    echo $array[error][message];
?>