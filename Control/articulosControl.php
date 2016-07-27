<?php namespace Control;
    
    use Model\Articulos as Articulos;


    class articulosControl
    {
        private $articulos;

        public function __construct()
        {
            $this->articulos = new Articulos();
        }

        public function index()
        {

        }

        public function delete($id)
        {
            $this->articulos->id = $id;
            print  $this->articulos->id;
            $this->articulos->borrar();
            header("Location: /articulos/");
        }
    }

?>
