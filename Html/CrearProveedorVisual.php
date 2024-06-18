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
            <input type="number" name="idProveedorEliminar" placeholder="Ingrese proveedor">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    <div class="buscarVentaId">
            <input type="number" name="idProveedor" placeholder="Ingrese id del proveedor">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>

        <input type="text" name="nombreProveedor" placeholder="Ingrese el nombre del proveedor">
        <br><br>
        <input type="text" name="direccionProveedor" placeholder="Ingrese la direccion">
        <br><br>
        <input type="email" name="correoElectronicoProveedor" placeholder="Ingrese su correo electronico">
        <br><br>
        <input type="number" name="telefonoProveedor" placeholder="Ingrese su telefono">
        <br><br>
        <input type="submit" name="boton" value="Registrar">
    </form>
    <?php
    include '../Logica/CrearProveedor.php';
    ?>
</body>
</html>