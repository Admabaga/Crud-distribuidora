<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <div class="buscarUsuarioId">
            <input type="number" name="idVentaEliminar" placeholder="Ingrese id venta">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    <div class="buscarVentaId">
            <input type="number" name="idVenta" placeholder="Ingrese id de la venta">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>
        <input type="number" name="fkProducto" placeholder="Ingrese el producto">
        <br><br>
        <input type="number" name="fkVendedor" placeholder="Ingrese el vendedor">
        <br><br>
        <input type="number" name="fkCLiente" placeholder="Ingrese identificacion del cliente">
        <br><br>
        <input type="number" name="cantidad" placeholder="Ingrese cantidad del producto">
        <br><br>
        <input type="submit" name="boton" value="Registrar">
    </form>
    <?php
    include '../Logica/CrearVenta.php';
    ?>
</body>
</html>