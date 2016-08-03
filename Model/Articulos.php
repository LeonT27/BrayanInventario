<?php namespace Model;

    class Articulos
    {
        private $id;
        private $descripcion;
        private $existencias;
        private $tipo_Inventario;
        private $costo_Unitario;
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
            $query = "EXEC	[dbo].[Insert_Articulos]
		                        @Descripcion = ?,
		                        @Existencias = ?,
		                        @ID_TipoInventario = ?,
		                        @Costo_Unitario = ?,
		                        @Estado = ?";
            $array = array(
                        array(&$this->descripcion),  
                        array(&$this->existencias),
                        array(&$this->tipo_Inventario),
                        array(&$this->costo_Unitario),
                        array(&$this->estado)
                      );
            $salida_Mala = "/articulos/add/";
            $salida_Buena = "/articulos/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);

        }

        public function modificar()
        {
            $query = "EXEC	[dbo].[Modificar_Articulos]
		                        @ID = ?,
		                        @Descripcion = ?,
		                        @Existencias = ?,
		                        @ID_TipoInventario = ?,
		                        @Costo_Unitario = ?,
		                        @Estado = ?";
            $array = array(
                        array(&$this->id), 
                        array(&$this->descripcion),  
                        array(&$this->existencias),
                        array(&$this->tipo_Inventario),
                        array(&$this->costo_Unitario),
                        array(&$this->estado)
                      );
            $salida_Mala = "/articulos/add/";
            $salida_Buena = "/articulos/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function borrar()
        {
            $query = "EXEC	[dbo].[ELinar_Articulos]
		                @ID = ?";
            $array = array( array(&$this->id) );
            $salida_Mala = "/articulos/";
            $salida_Buena = "/articulos/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function ver()
        {
            $this->conexion->ver_Tabla('[dbo].[SELECT_Articulos]');
        }

        public function listar_Registro()
        {
            $query = "SELECT * FROM Articulos WHERE ID_Articulos =".$this->id;
            $resultado = $this->conexion->consulta_Listar($query);
            return $resultado;
        }

        public function listar()
        {
            $query = "SELECT * FROM Articulos WHERE Estado = 1";
            $resultado = $this->conexion->consulta_Listar($query);
            return $resultado;
        }
    }

?>
