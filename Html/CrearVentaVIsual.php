<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <title>Ventas</title>
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
           <div class="RegistroVenta">
            <h2>Registrar venta:</h2>
            <br>
            <input type="number" name="fkProducto" placeholder="Ingrese el producto">
            <br><br>
            <input type="number" name="fkVendedor" placeholder="Ingrese el vendedor">
            <br><br>
            <input type="number" name="fkCLiente" placeholder="Ingrese identificacion del cliente">
            <br><br>
            <input type="number" name="cantidad" placeholder="Ingrese cantidad del producto">
            <br><br>
            <input type="number" name="fkFactura" placeholder="Ingrese numero factura">
            <br><br>
            <input type="submit" name="boton" value="Registrar">
        </div>
        <div class="ActualizarVenta">
            <h2>Actualizar venta:</h2>
            <br>
            <input type="number" name="idActualizarVenta" placeholder="Ingrese id de la venta">
            <br><br>
            <input type="number" name="actualizarVendedor" placeholder="Ingrese vendedor">
            <br><br>
            <input type="number" name="actualizarCliente" placeholder="Ingrese el cliente">
            <br><br>
            <input type="number" name="actualizarCantidad" placeholder="Ingrese cantidad">
            <br><br>
            <input type="number" name="actualizarProducto" placeholder="Ingrese producto">
            <br><br>
            <input type="number" name="actualizarFactura" placeholder="Ingrese factura">
            <br><br>
            <input type="submit" value="Actualizar">

        </div>

    </div>
    <div class="input-group">
        <div class="EliminarVenta">
            <h2>Eliminar venta:</h2>
            <br>
            <input type="number" name="idVentaEliminar" placeholder="Ingrese id venta">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
        </div>
        <div class="BuscarVentaId">
            <h2>Buscar venta por id:</h2>
            <br>
            <input type="number" name="idVenta" placeholder="Ingrese id de la venta">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
    </div>

   
    </form>
</main>
    <?php
    include '../Logica/CrearVenta.php';
    ?>
</body>
</html>