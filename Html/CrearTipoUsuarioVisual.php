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
            <input type="number" name="idTipoUsuarioEliminar" placeholder="Ingrese id tipo de usuario">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    <div class="buscarVentaId">
            <input type="number" name="idTipoUsuario" placeholder="Ingrese el tipo usuario">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>
        <input type="text" name="tipoUsuario" placeholder="Ingrese el tipo de usuario">
        <br><br>
        <input type="submit" name="boton" value="Guardar">
    </form>
    <?php
    include '../Logica/CrearTipoUsuario.php';
    ?>
</body>
</html>