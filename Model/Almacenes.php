<?php namespace Model;

    class Almacenes
    {
        private $id;
        private $descripcion;
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
            $query = "EXEC	[dbo].[Insert_Almancenes]
		                        @Descripcion = ?,
		                        @Estado = ?";
            $array = array(
                        array(&$this->descripcion),
                        array(&$this->estado)
                      );
            $salida_Mala = "/almacenes/add/";
            $salida_Buena = "/almacenes/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function modificar()
        {
            $query = "EXEC	[dbo].[Modificar_Almacenes]
		                    @IDAlmacenes = ?,
		                    @Descripcion = ?,
		                    @Estado = ?";
            $array = array(
                       array(&$this->id),
                       array(&$this->descripcion),
                       array(&$this->estado)
                     );
            $salida_Mala = "/almacenes/update/";
            $salida_Buena = "/almacenes/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function borrar()
        {
            $query = "EXEC	[dbo].[Elinar_Almacenes]
		                        @IDAlmacenes = ?";
            $array = array( array(&$this->id) );
            //$salida_Mala = "/tipoinventario/update/";
            $salida_Buena = "/almacenes/";
            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }

        public function ver()
        {
            $this->conexion->ver_Tabla('[dbo].[SELECT_Almacenes]');
        }

        public function listar_Registro()
        {
            $query = "SELECT * FROM Almacenes WHERE ID_Almacen =".$this->id;
            $resultado = $this->conexion->consulta_Listar($query);
            return $resultado;
        }
    }

?>