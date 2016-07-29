<?php namespace Control;

    use Model\Login as Login;

    class loginControl
    {
        private $login;

        public function __construct()
        {
            $this->login = new Login;
        }

        public function index()
        {
            if($_POST)
            {
                if(isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['username']))
                {
                    $this->login->user = $_POST['username'];
                    $this->login->pass = $_POST['password'];

                    $row_count = sqlsrv_has_rows($this->login->validar());
                    if($row_count === TRUE)
                    {
                        $_SESSION['login_user'] = $this->login->user;
                        //print $_SESSION['login_user'];
                        header("location: /articulos/");
                    }
                    else 
                    {
                        $_SESSION['Error'] = ' al introducir las credenciales, intentelo denuevo.';
                        //header("location: /login/");
                    }
                
                }
                else 
                {
                    $_SESSION['Error'] = ' al dejar los campos vacios.'; 
                    //header("location: /login/");
                }
            }
        }

        public function out()
        {
            $this->login->logout();
            header("Location: /login/");
        }
    }

?>