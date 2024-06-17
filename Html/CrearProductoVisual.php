<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <div class="buscarVentaId">
            <input type="number" name="idProducto" placeholder="Ingrese id del producto">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>

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
    </form>
    <?php
    include '../Logica/CrearProducto.php';
    ?>
</body>
</html>