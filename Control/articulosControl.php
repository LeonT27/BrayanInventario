<?php namespace Control;
    
    use Model\Articulos as Articulos;
    use Model\TipoInventario as Tipo;


    class articulosControl
    {
        private $articulos;
        private $tipo;

        public function __construct()
        {
            $this->articulos = new Articulos();
            $this->tipo = new Tipo();
        }

        public function index()
        {

        }

        public function delete($id)
        {
            $this->articulos->id = $id;
            $this->articulos->borrar();
            header("Location: /articulos/");
        }

        public function add()
        {
            if($_POST)
            {
                if(!empty($_POST['descripcion']) && !empty($_POST['costo']))
                {
                    $this->articulos->descripcion = $_POST['descripcion'];
                    $this->articulos->existencias = $_POST['existencias'];
                    $this->articulos->tipo_Inventario = $_POST['tipoinventario'];
                    $this->articulos->costo_Unitario = $_POST['costo'];
                    $this->articulos->estado = $_POST['estado'];
                    $this->articulos->insertar();
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
            $datos = $this->tipo->listar();
            return $datos;
        }

        public function update($id)
        {
            $this->articulos->id = $id;
            $datos = $this->articulos->listar_Registro();
            if($_POST)
            {
                if(!empty($_POST['descripcion']) && !empty($_POST['costo']))
                {
                    $this->articulos->descripcion = $_POST['descripcion'];
                    $this->articulos->existencias = $_POST['existencias'];
                    $this->articulos->tipo_Inventario = $_POST['tipoinventario'];
                    $this->articulos->costo_Unitario = $_POST['costo'];
                    $this->articulos->estado = $_POST['estado'];
                    $this->articulos->modificar();
                    //header("Location: /articulos/");
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
            return $datos;
            
        }

        public function listarTipo()
        {
            $resultado = $this->tipo->listar();
            return $resultado;
        }

    }

    $control = new articulosControl();

?>
