<?php namespace Control;
    
    use Model\Login as Login;

    class loginControl
    {
        private $login;

        public function __construct()
        {
            $this->login = new Login();
        }

        public function validar()
        {
            if(isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['username']))
            {
                $this->login->user = $_POST['username'];
                $this->login->pass = $_POST['password'];

                $row_count = sqlsrv_has_rows($this->login());
                if($row_count === TRUE)
                {
                    $_SESSION['login_user'] = $_POST['username'];
                    //header("location: Ver-Articulo.php");
                }
                else 
                {
                    $_SESSION['Error'] = ' al introducir las credenciales, intentelo denuevo.';
                    //header("location: index.php");
                }
            }
            else 
            {
                $_SESSION['Error'] = ' al dejar los campos vacios.'; 
                //header("location: index.php");
            }
        }
    }

?>