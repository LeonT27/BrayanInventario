<div class="row">
    <h2>Agregar Transacion</h2>
    <div class="msg msg-error visi">
        <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
    </div>
    <form method="post" action="" class="articulos-form">
        <div class="row">
            <div class="col span-1-of-3">
                <label for="tipo">Tipo de transacion</label>
            </div>
            <div class="col span-1-of-3">
                <select name="tipo" id="tipo">
                    <option value="Entrada" selected>Entrada</option>
                    <option value="Salida" >Salida</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="articulo">Articulo</label>
            </div>
            <div class="col span-1-of-3">
                <select name="articulo" id="articulo">
                    <?php while($row = sqlsrv_fetch_object($datos)) {?>
                    <option value="<?php echo $row->ID_Articulos; ?>"><?php echo $row->Descripcion; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="fecha">Fecha</label>
            </div>
            <div class="col span-1-of-3">
                <input type="date" name="fecha" id="fecha">
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="cantidad">Cantidad</label>
            </div>
            <div class="col span-1-of-3">
                <input type="number" name="cantidad" id="cantidad">
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
<a class="boton-b" href="/transaciones/">Volver</a>