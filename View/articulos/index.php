<a class="logout" href="/login/out/">Log Out</a>
<div class="row">
    <nav>
        <ul>
            <li><a href="Ver-Articulo.php">Articulos</a></li>
            <li><a href="Ver-TipoInventario.php">Tipo de Articulos</a></li>
            <li><a href="Ver-Almacenes.php">Almacenes</a></li>
            <li><a href="Ver-Transa.php">Transaciones</a></li>
            <li><a href="AsientoContable.php">Asiento Contable</a></li>
        </ul>
    </nav>
</div>
<?php 
    $articulos = new Model\Articulos;
    $articulos->ver();
?>
<a class="boton-a" href="Agregar-TipoInventario.php">+</a>