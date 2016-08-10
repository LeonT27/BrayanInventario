<?php namespace View;

    $template = new Template();

    class Template
    {
        public function __construct()
        {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>D' Brayan's inventario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/View/template/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/View/template/css/grid.css">
        <link rel="stylesheet" type="text/css" href="/View/template/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/View/template/css/style.css">
        <link rel="stylesheet" type="text/css" href="/View/template/css/queries.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300italic,400italic' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="/View/template/js/scrit.js"></script>
        <script>
            visiToggle('false');
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
    </head>
    
    <body>
        <header>
            <div class="row">
                <h1 class="thu-real">SISTEMA DE INVENTARIO</h1>
            </div>
<?php
        }

        public function __destruct()
        {
?>
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

<?php
        }
    }

?>
