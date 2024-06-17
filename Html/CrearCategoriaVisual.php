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
            <input type="number" name="idCategoriaEliminar" placeholder="Ingrese categoria">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    <div class="buscarVentaId">
            <input type="number" name="idCategoria" placeholder="Ingrese id categoria">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>
        <input type="text" name="nombreCategoria" placeholder="Ingrese la categoria">
        <br><br>
        <input type="submit" name="boton" value="Guardar">
    </form>
    <?php
    include '../Logica/CrearCategoria.php';
    ?>
</body>
</html>