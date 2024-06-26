<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <link rel="icon" href="../Img/Valknut.svg.png" type="image/png">
    <title>Categorias</title>
</head>
<body>
<div class="boton-externo">
    <img src="../Img/Valknut.svg.png" alt="" width="50px" height="50px">
    <button onclick="window.location.href='redireccion.php';">Cerrar sesion</button>
</div>

<script>

document.querySelector('.boton-externo button').addEventListener('click', function() {
    window.location.href = 'InicioSesionVisual.php';
});
</script>

<nav class="navbar">
    <ol>
        <li><a href="RegistrousuarioVisual.php"> Usuarios </a></li>
        <li><a href="CrearVentaVIsual.php"> Ventas </a></li>
        <li><a href="CrearTipoUsuarioVisual.php"> Tipo Usuarios</a></li>
        <li><a href="CrearProveedorVisual.php"> Proveedores </a></li>
        <li><a href="CrearProductoVisual.php"> Productos </a></li>
        <li><a href="CrearFacturaVisual.php"> Facturas </a></li>
        <li><a href="CrearCategoriaVisual.php"> Categorias </a></li>
    </ol>
</nav>
<main>
    <form action="" method="post">
    <div class="input-group">
        <div class="RegistroCategoria">
            <h2>Buscar Categoria:</h2>
            <input type="text" name="nombreCategoria" placeholder="Ingrese la categoria">
            <br><br>
            <input type="submit" name="boton" value="Guardar">
        </div>
        <div class="ActualizarCategoria">
            <h2>Actualizar categoria por id:</h2>
            <input type="number" name="idCategoriaActualizar" placeholder="Ingrese id categoria">
            <br><br>
            <input type="text" name="nombreCategoriaActualizar" placeholder="Ingrese la categoria">
            <br><br>
            <input type="submit" name="boton" value="Actualizar">
        </div>
    </div>
    <div class="input-group">
        <div class="BuscarIdCategoria">
            <h2>Buscar categoria por id:</h2>
            <input type="number" name="idCategoria" placeholder="Ingrese id categoria">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
        <div class="EliminarCategoria">
            <h2>Eliminar categoria por id:</h2>
            <input type="number" name="idCategoriaEliminar" placeholder="Ingrese id de la categoria">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
        </div>
    </div>
    </form>
    </main>
    <?php
    include '../Logica/CrearCategoria.php';
    ?>
</body>
</html>