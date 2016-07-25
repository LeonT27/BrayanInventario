<?php namespace Config;

    class Enrutador
    {
        public static function run(Request $request)
        {
            $controlador = $request->controlador . "Control";
            //print $controlador;
            $ruta = ROOT . "Control" . DS . "$controlador.php";
            //print $ruta;
            $metodo = $request->metodo;
            //print $metodo;
            $argumento = $request->argumento;

            if(is_readable($ruta))
            {
                require_once $ruta;
                $mostar = "Control\\" . $controlador;
                $controlador = new $mostar;
                if(!isset($argumento))
                {
                    call_user_func(array($controlador, $metodo));
                }
                else
                {
                    call_user_func_array(array($controlador, $metodo), $argumento);
                }
            }

            $ruta = ROOT . "View" . DS . $request->controlador . DS . $request->metodo . ".php";
            //print $ruta;
            if(is_readable($ruta))
            {
                require_once $ruta;
            }
        }
    }

?>