<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <link rel="icon" href="../Img/Valknut.svg.png" type="image/png">
    <title>Facturas</title>
</head>
<body>
<div class="boton-externo">
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
         <div class="RegistrarFactura">
            <h2>Crear factura:</h>
            <br>
            <br>
            <input type="submit" name="boton" value="Crear factura">
        </div>
        <div class="ActualizarFactura">
            <h2>Actualizar factura:</h>
            <br>
            <input type="number" name="idActualizarFactura" placeholder="Ingrese id de la factura">
            <br><br>
            <input type="date" name="actualizarFecha" id="">
            <br><br>
            <input type="submit" value="Actualizar">
        </div>
    </div>

    <div class="input-group">
        <div class="EliminarFactura">
            <h2>Eliminar factura:</h>
            <br>
            <input type="number" name="idFacturaEliminar" placeholder="Ingrese numero factura">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
        </div>
        <div class="BuscarFacturaId">
            <h2>Buscar factura por id:</h>
            <br>
            <input type="number" name="idFactura" placeholder="Ingrese id de factura">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
    </div>
    </form>
</main>
    <?php
    include '../Logica/CrearFactura.php';
    ?>
</body>
</html>