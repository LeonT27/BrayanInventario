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
<?php 
    $articulos = new Model\TipoInventario;
    $articulos->ver();
?>
<a class="boton-a" href="/tipoinventario/add/">+</a>