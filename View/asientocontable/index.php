<?php
    $cuentas = $asiento->listar_Cuentas();
?>

<a class="logout" href="/login/out/">Log Out</a>
<div class="row">
    <nav>
        <ul>
            <li><a href="/articulos">Articulos</a></li>
            <li><a href="/tipoinventario/">Tipo de Inventario</a></li>
            <li><a href="/almacenes/">Almacenes</a></li>
            <li><a href="/transaciones/">Transaciones</a></li>
            <li><a href="/asientocontable/">Asiento Contable</a></li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="msg msg-error visi">
        <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
    </div>
    <p class="mensaje"><?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']);?></p>
    <form method="post" action="" class="articulos-form">
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
                <label for="tipoinventario">Tipo de Inventario</label>
            </div>
            <div class="col span-1-of-3">
                <select name="tipoinventario" id="tipoinventario">
                    <?php while($row = sqlsrv_fetch_object($datos)) {?>
                    <option value="<?php echo $row->ID_TipoInventario; ?>"><?php echo $row->Descripcion; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="cuenta">Cuenta Contable</label>
            </div>
            <div class="col span-1-of-3">
                <select name="cuenta" id="cuenta">
                    <?php foreach($cuentas as $cuenta) {?>
                    <option value="<?php echo $cuenta[id]; ?>"><?php echo $cuenta[description]; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-3">
                <label for="movimiento">Tipo de Movimiento</label>
            </div>
            <div class="col span-1-of-3">
                <select name="movimiento" id="movimiento">
                    <option value="0" selected>Debito</option>
                    <option value="1" >Credito</option>
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
                <label for="monto">Monto</label>
            </div>
            <div class="col span-1-of-3">
                <input type="number" name="monto" id="monto">
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
