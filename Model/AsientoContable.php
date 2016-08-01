<?php namespace Model;

    class AsientoContable
    {
        private $description;   //Descripcion
        private $origin;        //Identificador del Tipo de Inventario
        private $typeMovement;  //Tipo de Movimiento (DB, CR)
        private $created;       //Fecha Asiento
        private $amount;        //Monto Asiento
        private $accountId;     //Cuenta Contable
        private $chCode;

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $dato)
        {
            $this->$atributo = $dato;
        }

        public function http_Get($url)
        {
            $ch = curl_init();  
 
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
            $output=curl_exec($ch);

            $responseData = json_decode($output, TRUE);

            curl_close($ch);

            $_SESSION['Error'] .= $responseData[error][message];

            return $responseData;
        }

        public function http_Post($url)
        {
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode(self::post_Data())
            ));

            $response = curl_exec($ch);

            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //echo $http_code;
            // Decode the response
            $responseData = json_decode($response, TRUE);

            $_SESSION['Error'] .= $responseData[error][message];
            $this->chCode = $http_code;
            return $http_code;
        }

        private function post_Data()
        {
            $postData = array(
              "description" => $this->description,
              "origin" => $this->origin,
              "typeMovement" => $this->typeMovement,
              "created" => $this->created,
              "amount" => $this->amount,
              "accountId" => $this->accountId
            );

            return $postData;
        }

        public function listar_Cuentas()
        {
            $get = self::http_Get('http://contability-app.azurewebsites.net/api/Accounts');
            return $get;
        }

    }

?>