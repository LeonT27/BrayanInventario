<div class="row">
    <h2>Agregar Almacen</h2>
    <div class="msg msg-error visi">
        <p><span>Error</span> <?php echo $_SESSION['Error'];?></p>
    </div>
    <form method="post" action="" class="login-form">
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
<a class="boton-b" href="/almacenes/">Volver</a>