<?php namespace Model;

    class TipoInventario
    {
        private $id;
        private $descripcion;
        private $cuenta;
        private $estado;
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
        }

        public function insertar()
        {
            $query = "EXEC	[dbo].[Insert_TipoInventario]
		                        @Descripcion = ?,
		                        @Cuenta_Contable = ?,
		                        @Estado = ?";
            $array = array(
                        array(&$this->descripcion),  
                        array(&$this->cuenta),
                        array(&$this->estado)
                      );
            $salida_Mala = "/tipoinventario/add/";
            $salida_Buena = "/tipoinventario/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function modificar()
        {
            $query = "EXEC	[dbo].[Modificar_TipoInventario]
		                        @ID = ?,
		                        @Descripcion = ?,
		                        @Cuenta_Contable = ?,
		                        @Estado = ?";
            $array = array(
                       array(&$this->id),
                       array(&$this->descripcion),  
                       array(&$this->cuenta),
                       array(&$this->estado)
                     );
            $salida_Mala = "/tipoinventario/update/";
            $salida_Buena = "/tipoinventario/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function borrar()
        {
            $query = "EXEC	[dbo].[Elimar_TipoInventario] @ID = ?";
            $array = array( array(&$this->id) );
            //$salida_Mala = "/tipoinventario/update/";
            $salida_Buena = "/tipoinventario/";
            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function listar()
        {
            $query = "SELECT * FROM Tipos_Inventarios";
            $resultado = $this->conexion->consulta_Listar($query);
            return $resultado;
        }

        public function ver()
        {
            $this->conexion->ver_Tabla('[dbo].[SELECT_TipoInventario]');
        }

        public function listar_Registro()
        {
            $query = "SELECT * FROM Tipos_Inventarios WHERE ID_TipoInventario =".$this->id;
            $resultado = $this->conexion->consulta_Listar($query);
            return $resultado;
        }
    }

?>