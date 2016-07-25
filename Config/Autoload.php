<?php namespace Config;

    class Autoload
    {

        public static function run()
        {
            spl_autoload_register(function($clase){
                $ruta = str_replace("\\", "/", $clase) . ".php";
                //print "Autoload: ".$ruta;
                include_once $ruta;
            });
        }
    }

?>