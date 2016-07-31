<?php namespace Control;

    use Model\Almacenes as Almacenes;

    class almacenesControl
    {
        private $almacenes;

        public function __construct()
        {
            self::access();
            $this->almacenes = new Almacenes();
        }

        public function add()
        {
            if($_POST)
            {
                if(!empty($_POST['descripcion']))
                {
                    $this->almacenes->descripcion = $_POST['descripcion'];
                    $this->almacenes->estado = $_POST['estado'];
                    $this->almacenes->insertar();
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
        }

        public function delete($id)
        {
            $this->almacenes->id = $id;
            $this->almacenes->borrar();
        }

        public function update($id)
        {
            $this->almacenes->id = $id;
            $datos = $this->almacenes->listar_Registro();
            if($_POST)
            {
                if(!empty($_POST['descripcion']))
                {
                    $this->almacenes->descripcion = $_POST['descripcion'];
                    $this->almacenes->estado = $_POST['estado'];
                    $this->almacenes->modificar();
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
            return $datos;
        }

        private function access()
        {
            if(empty($_SESSION['login_user']))
            {
                header("location: /login/");
            }
        }
    }

?>