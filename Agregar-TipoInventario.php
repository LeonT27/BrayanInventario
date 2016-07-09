<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
                <meta charset="utf-8" />
        <title>D' Brayan's inventario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="stylesheet" type="text/css" href="/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300italic,400italic' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/scrit.js"></script>
    </head>
    <body>
        <header>
            <div class="row">
                <h1 class="thu-real">Thu real inventario</h1>
            </div>
            <div class="row">
                <h2>Agregar Tipo Inventario</h2>
                <div class="msg msg-error visi">
                    <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
                </div>
                <form method="post" action="ControladorTipoInventario.php" class="login-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="descripcion">Descripcion</label>
                        </div>
                        <div class="col span-1-of-3">
                            <input type="text" name="descripcion" id="descripcion">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="cuenta">Cuenta Contable</label>
                        </div>
                        <div class="col span-1-of-3">
                            <input type="text" name="cuenta" id="cuenta">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="estado">Estado</label>
                        </div>
                        <div class="col span-1-of-3">
                            <select name="estado" id="estado">
                                <option value="1" selected>Activo</option>
                                <option value="0" >Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input class="btn-login" type="submit" name="add" value="Registrar">
                        </div>
                    </div>
                </form>
            </div>
        </header>
    </body>
</html>
