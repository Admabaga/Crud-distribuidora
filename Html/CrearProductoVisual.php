<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <title>Productos</title>
</head>
<body>

<div class="boton-externo">
    <button onclick="window.location.href='redireccion.php';">Cerrar sesion</button>
</div>
<style>
.boton-externo {
    position: absolute;
    top: 10px; 
    right: 10px; 
    z-index: 1000; 
}

.boton-externo button {
    background-color: #007bff; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    border-radius: 10px;
    font-size: 12px; 
    cursor: pointer; 
    transition: background-color 0.3s ease; 
}

.boton-externo button:hover {
    background-color: #007bff; 
}


    </style>
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
        <div class="RegistrarProducto">
            <h2>Registrar producto:</h>
            <br>
            <input type="text" name="nombreProducto" placeholder="Ingrese el nombre del producto">
            <br><br>
            <input type="number" name="cantidadProducto" placeholder="Ingrese la cantidad">
            <br><br>
            <input type="number" name="precioUnitario" placeholder="Ingrese el precio unitario">
            <br><br>
            <input type="number" name="fkCategoria" placeholder="Ingrese categoria">
            <br><br>
            <input type="number" name="fkProveedor" placeholder="Ingrese proveedor">
            <br><br>
            <input type="submit" name="boton" value="Guardar">
        </div>
        <div class="ActualizarProducto">
            <h2>Actualizar producto:</h>
            <br>
            <input type="number" name="idActualizarProducto" placeholder="Ingrese el id del producto">
            <br><br>
            <input type="text" name="actualizarNombreProducto" placeholder="Ingrese el nombre">
            <br><br>
            <input type="number" name="actualizarCantidadProducto" placeholder="Ingrese cantidad">
            <br><br>
            <input type="number" name="actualizarPrecioProducto" placeholder="Ingrese precio unitario">
            <br><br>
            <input type="number" name="actualizarCategoria" placeholder="Ingrese categoria">
            <br><br>
            <input type="number" name="actualizarProveedorProducto" placeholder="Ingrese proveedor">
            <br><br>
            <input type="submit" value="Actualizar">
        </div>

    </div>
    <div class="input-group">
        <div class="BuscarProductoId">
            <h2>Buscar producto por id:</h>
            <br>
            <input type="number" name="idProducto" placeholder="Ingrese id del producto">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
        <div class="EliminarProducto">
            <h2>Eliminar producto:</h>
            <br>
            <input type="number" name="idProductoEliminar" placeholder="Ingrese producto">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
        </div>
    </div>
  
    </form>
</main>
    <?php
    include '../Logica/CrearProducto.php';
    ?>
</body>
</html>