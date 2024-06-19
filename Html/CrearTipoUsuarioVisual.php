<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <title>Tipo Usuarios</title>
</head>
<body>
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
        <div class="RegistroTipoUsuario">
            <h2>Registrar tipo de usuario:</h>
            <br>
            <input type="text" name="tipoUsuario" placeholder="Ingrese el tipo de usuario">
            <br><br>
            <input type="submit" name="boton" value="Guardar">
            <br><br>
        </div>
        <div class="ActualizarTipoUsuario">
            <h2>Actualizar tipo de usuario:</h>
            <br>
            <input type="number" name="idActualizarusuario" placeholder="Ingrese el id del tipo usuario">
            <br><br>
            <input type="text" name="actualizarTipoUsuario" placeholder="Ingrese el nombre del tipo de usuario">
            <br><br>
            <input type="submit" value="Actualizar">
        </div>
   
    </div>
    <div class="input-group">
        <div class="BuscarIdCategoria">
            <h2>Buscar tipo de usuario por id:</h2>
            <input type="number" name="idTipoUsuario" placeholder="Ingrese id tipo de usuario">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
        <div class="EliminarCategoria"></div>
            <h2>Eliminar tipo de usuario:</h2>
            <input type="number" name="idTipoUsuarioEliminar" placeholder="Ingrese el tipo usuario">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    </form>
    </main>
    
    <?php
    include '../Logica/CrearTipoUsuario.php';
    ?>
</body>
</html>