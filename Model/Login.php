<?php namespace Model;

    class Login
    {
        private $user;
        private $pass;
        private $conexion;

        public function __construct()
        {
            $this->conexion = new Conexion();
        }
        
        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $dato)
        {
            $this->$atributo = $dato;
            return $this->$atributo;
        }

        public function __invoke()
        {
            $query = "SELECT Usuario FROM [IDInventario].[dbo].[LOGIN] WHERE Usuario = ? AND Password = ? ";
            $array = array(
                    array(&$this->user),  
                    array(&$this->pass)
                  );
            $stmt = sqlsrv_query($this->conexion, $query, $array);
            return $stmt;
        }
    }

?>