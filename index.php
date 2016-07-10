<?php
session_start();
if(!empty($_SESSION['login_user']))
{
    header("location: Ver-Articulo.php");
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>D' Brayan's inventario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="stylesheet" type="text/css" href="/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300italic,400italic' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/scrit.js"></script>
        <script>
            visiToggle('false');
        </script>
    </head>
    
    <body>
        <header>
            <div class="row">
                <h1 class="thu-real">Thu real inventario 1</h1>
            </div>
            <div class="row">
                <div class="msg msg-error visi">
                    <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
                </div>
                <form method="post" action="login-form.php" class="login-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="username">Username</label>
                        </div>
                        <div class="col span-1-of-3">
                            <input type="text" name="username" id="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="password">Password</label>
                        </div>
                        <div class="col span-1-of-3">
                            <input type="password" name="password" id="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input class="btn-login" type="submit" name="login" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </header>
        <?php
            if(!empty($_SESSION['Error']))
            {
        ?>
        <script>
            visiToggle('true');
        </script>
        <?php
            } 
            unset($_SESSION['Error']);  
        ?>
    </body>
</html>