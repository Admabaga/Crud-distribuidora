<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="registroUsuario">
    <form action="" method="post">
    <div class="buscarUsuarioId">
            <input type="number" name="idUsuarioEliminar" placeholder="Ingrese el numero de cedula">
            <br><br>
            <input type="submit" name="boton" value="Eliminar">
            <br><br>
    </div>
    <div class="buscarUsuarioId">
            <input type="number" name="idUsuario" placeholder="Ingrese el numero de cedula">
            <br><br>
            <input type="submit" name="boton" value="Buscar">
            <br><br>
    </div>
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
    </form>
    </div>

    <?php
    include '../Logica/Registro.php';
    ?>
</body>
</html>