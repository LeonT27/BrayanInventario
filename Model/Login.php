<?php namespace Model;

    class Login
    {
        private $user;
        private $pass;
        private $conexion;

        public function __construct()
        {
            $this->conexion = new Conexion;
        }
        
        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $dato)
        {
            $this->$atributo = $dato;
        }

        public function validar()
        {
            $query = "SELECT Usuario FROM [IDInventario].[dbo].[LOGIN] WHERE Usuario = ? AND Password = ? ";
            //print $query;
            $array = array(
                    array($this->user),  
                    array($this->pass)
                    );
            $stmt = sqlsrv_query($this->conexion->getConn(), $query, $array);
            if($stmt)
            {
                //echo "SI";
            }
            else
            {
                echo "NO ".print_r( sqlsrv_errors(), true);
            }
            return $stmt;
        }

        public function logout()
        {
            session_destroy();
            unset($_SESSION['login_user']);
        }
    }

?>