<?php namespace Config;

    class Request
    {
        private $controlador;
        private $metodo;
        private $argumento;

        public function __construct()
        {
            if(isset($_GET['url']))
            {
                $ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $ruta = explode("/", $ruta);
                $ruta = array_filter($ruta);
                //print_r($ruta);

                $this->controlador = strtolower(array_shift($ruta));
                //print "<br>Controlador: ".$this->controlador;
                $this->metodo = strtolower(array_shift($ruta));
                if(!$this->metodo)
                {
                    $this->metodo = "index";
                }
                //print "<br>Metodo: ".$this->metodo;
                $this->argumento = strtolower(array_shift($ruta));
                //print "<br>Argumento: ".$this->argumento;
            }
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }
    }

?>