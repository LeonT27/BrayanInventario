<?php namespace Model;

    class Transaciones
    {
        private $id;
        private $tipo;
        private $articulo;
        private $fecha;
        private $cantidad;
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

        public function ver()
        {
            $this->conexion->ver_Tabla('[dbo].[SELECT_Transacion]', FALSE);
        }

        public function insertar()
        {
            $query = "EXEC	[dbo].[Insert_Transaccion]
		                    @TipoTran = ?,
		                    @IDArticulo = ?,
		                    @Fecha = ?,
		                    @Cantidad = ?";
            $array = array(
                        array(&$this->tipo),
                        array(&$this->articulo),
                        array(&$this->fecha),
                        array(&$this->cantidad)
                        );
            $salida_Mala = "/transaciones/add/";
            $salida_Buena = "/transaciones/";

            $this->conexion->exe($query, $array, $salida_Mala, $salida_Buena);
        }
    }

?>