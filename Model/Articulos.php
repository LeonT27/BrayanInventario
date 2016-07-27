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
            $salida_Mala = "Agregar-Articulo.php";
            $salida_Buena = "Ver-Articulo";

            $this->conexion($query, $array, $salida_Mala, $salida_Buena);

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
            $salida_Mala = "Modificar-Articulo.php?ID=".$this->id."";
            $salida_Buena = "Ver-Articulo";

            $this->conexion($query, $array, $salida_Mala, $salida_Buena);
        }

        public function borrar($ID)
        {
            $query = "EXEC	[dbo].[ELinar_Articulos]
		                @ID = ?";
            $array = array( array(&$ID) );
            $salida_Mala = "Ver-Articulo.php";
            $salida_Buena = "Ver-Articulo";

            $this->conexion($query, $array, $salida_Mala, $salida_Buena);
        }

        public function ver()
        {
            $this->conexion->ver_Tabla('[dbo].[SELECT_Articulos]');
        }
    }

?>
