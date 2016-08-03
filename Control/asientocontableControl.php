<?php namespace Control;

    use Model\TipoInventario as Tipo;
    use Model\AsientoContable as Asiento;

    class asientocontableControl
    {
        private $tipo;
        private $asiento;

        public function __construct()
        {
            self::access();
            $this->tipo = new Tipo;
            $this->asiento = new Asiento;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function index()
        {
            if($_POST)
            {
                if(!empty($_POST['monto']))
                {
                    $this->asiento->description = $_POST['descripcion'];
                    $this->asiento->origin = $_POST['tipoinventario'];
                    $this->asiento->typeMovement = $_POST['movimiento'];
                    $this->asiento->created = $_POST['fecha'];
                    $this->asiento->amount = $_POST['monto'];
                    $this->asiento->accountId = $_POST['cuenta'];

                    if($this->asiento->http_Post('http://contability-app.azurewebsites.net/api/AccountEntries')==200)
                    {
                        $_SESSION['mensaje'] = "Se registro exitosamente";
                    }
                }
                else
                {
                    $_SESSION['Error'] = ' al dejar el monto vacio.';
                }
                
            }
            $datos = $this->tipo->listar();
            return $datos;
        }

        private function access()
        {
            if(empty($_SESSION['login_user']))
            {
                header("location: /login/");
            }
        }

        public function listar_Cuentas()
        {
            $resultado = $this->asiento->listar_Cuentas();
            return $resultado;
        }

    }

    $asiento = new asientocontableControl();

?>