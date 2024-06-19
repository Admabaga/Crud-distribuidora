<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <title>Usuarios</title>
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
        <div class="RegistroUsuario">
            <h2>Registrar Usuario:</h2>
            <input type="number" name="identificacion" placeholder="Ingrese su numero de identificacion">
            <br><br>
            <input type="text" name="nombreUsuario" placeholder="Ingrese el nombre del usuario">
            <br><br>
            <input type="text" name="apellidoUsuario" placeholder="Ingrese el apellido del usuario">
            <br><br>
            <input type="email" name="correoElectronico" placeholder="Ingrese su correo electronico">
            <br><br>
            <input type="number" name="telefono" placeholder="Ingrese su telefono">
            <br><br>
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <br><br>
            <input type="number" name="fkTipoUsuario" placeholder="Ingrese el tipo de usuario">
            <br><br>
            <input type="submit" name="boton" value="Registrar">
        </div>
        <div class="ActualizarUsuarios">
            <h2>Actualizar usuario:</h2>
            <input type="number" name="idActualizarUsuario" placeholder="Ingrese identificacion">
            <br><br>
            <input type="text" name="actualizarNombreUsuario" placeholder="Ingrese nombre">
            <br><br>
            <input type="text" name="actualizarApellido" placeholder="Ingrese apellido">
            <br><br>
            <input type="email" name="actualizarEmail" placeholder="Ingrese correo">
            <br><br>
            <input type="number" name="actualizarTelefono" placeholder="Ingrese telefono">
            <br><br>
            <input type="password" name="actualizarPassword" placeholder="Ingrese contraseña">
            <br><br>
            <input type="number" name="actualizarTipoUsuario" placeholder="Ingrese tipo de usuario">
            <br><br>
            <input type="submit" value="Actualizar">

        </div>
    </div>

    <div class="input-group">
        <div class="buscarUsuarioId">
            <h2>Buscar usuario por identificacion:</h2>
            <input type="number" name="idUsuario" placeholder="Ingrese el numero de cedula">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
        </div>
        <div class="EliminarUsuarioId">
            <h2>Eliminar usuario:</h2>
            <input type="number" name="idUsuarioEliminar" placeholder="Ingrese el numero de cedula">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
        </div>
    </div>
    </form>
    </main>

    <?php
    include '../Logica/Registro.php';
    ?>
</body>
</html>