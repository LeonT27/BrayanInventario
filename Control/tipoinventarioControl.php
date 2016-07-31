<?php namespace Control;

    use Model\TipoInventario as Tipo;

    class tipoinventarioControl
    {
        private $tipo;

        public function __construct()
        {
            self::access();
            $this->tipo = new Tipo;
        }

        public function delete($id)
        {
            $this->tipo->id = $id;
            $this->tipo->borrar();
        }

        public function add()
        {
            if($_POST)
            {
                if(!empty($_POST['descripcion']) && !empty($_POST['cuenta']))
                {
                    $this->tipo->descripcion = $_POST['descripcion'];
                    $this->tipo->cuenta = $_POST['cuenta'];
                    $this->tipo->estado = $_POST['estado'];
                    $this->tipo->insertar();
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.';
                }
            }
        }

        public function update($id)
        {
            $this->tipo->id = $id;
            $datos = $this->tipo->listar_Registro();
            if($_POST)
            {
                if(!empty($_POST['descripcion']) && !empty($_POST['cuenta']))
                {
                    $this->tipo->descripcion = $_POST['descripcion'];
                    $this->tipo->cuenta = $_POST['cuenta'];
                    $this->tipo->estado = $_POST['estado'];
                    $this->tipo->modificar();
                    //header("Location: /articulos/");
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