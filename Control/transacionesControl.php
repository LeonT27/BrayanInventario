<?php namespace Control;

    use Model\Articulos as Articulos;
    use Model\Transaciones as Transaciones;

    class transacionesControl
    {
        private $transaciones;
        private $articulo;

        public function __construct()
        {
            $this->transaciones = new Transaciones;
            $this->articulo = new Articulos;
        }

        public function add()
        {
            if($_POST)
            {
                if(!empty($_POST['fecha']) && !empty($_POST['cantidad']))
                {
                    $this->transaciones->tipo = $_POST['tipo'];
                    $this->transaciones->articulo = $_POST['articulo'];
                    $this->transaciones->fecha = $_POST['fecha'];
                    $this->transaciones->cantidad = $_POST['cantidad'];
                    $this->transaciones->insertar();
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
            $datos = $this->articulo->listar();
            return $datos;
        }
    }

?>