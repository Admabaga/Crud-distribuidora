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
            <input type="number" name="idFactura" placeholder="Ingrese id de factura">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>
        <input type="number" name="fkVenta" placeholder="Ingrese la venta">
        <br><br>
        <input type="submit" name="boton" value="Guardar">
    </form>
    <?php
    include '../Logica/CrearFactura.php';
    ?>
</body>
</html>