<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <title>Proveedores</title>
</head>
<body>
<div class="boton-externo">
    <button onclick="window.location.href='redireccion.php';">Cerrar sesion</button>
</div>
<style>
.boton-externo {
    position: absolute;
    top: 10px; 
    right: 10px; 
    z-index: 1000; 
}

.boton-externo button {
    background-color: #007bff; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    border-radius: 10px;
    font-size: 12px; 
    cursor: pointer; 
    transition: background-color 0.3s ease; 
}

.boton-externo button:hover {
    background-color: #007bff; 
}


    </style>
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
        <div class="RegistrarProveedor">
            <h2>Registrar proveedor:</h>
            <br>
            <input type="text" name="nombreProveedor" placeholder="Ingrese el nombre del proveedor">
            <br><br>
            <input type="text" name="direccionProveedor" placeholder="Ingrese la direccion">
            <br><br>
            <input type="email" name="correoElectronicoProveedor" placeholder="Ingrese su correo electronico">
            <br><br>
            <input type="number" name="telefonoProveedor" placeholder="Ingrese su telefono">
            <br><br>
            <input type="submit" name="boton" value="Registrar">
        </div>
        <div class="ActualizarProveedor">
            <h2>Actualizar proveedor:</h>
            <br>
            <input type="number" name="idActualizarProveedor" placeholder="Ingrese el id del proveedor">
            <br><br>
            <input type="text" name="actulizarNombreProveedor" placeholder="Ingrese el nombre">
            <br><br>
            <input type="text" name="actualizarDireccionProveedor" placeholder="Ingrese direccion">
            <br><br>
            <input type="email" name="actualizarCorreoProveedor" placeholder="Ingrese correo">
            <br><br>
            <input type="number" name="actualizarTelefonoProveedor" placeholder="Ingrese telefono">
            <br><br>
            <input type="submit" value="Actualizar">
        </div>

    </div>

    <div class="input-group">
        <div class="EliminarProvedor">
                <h2>Eliminar proveedor:</h>
                <br>
                <input type="number" name="idProveedorEliminar" placeholder="Ingrese proveedor">
                <br><br>
                <input type="submit" name="boton" value="Eliminar">
                <br><br>
        </div>
        <div class="BuscarProveedor">
                <h2>Buscar proveedor por id:</h>
                <br>
                <input type="number" name="idProveedor" placeholder="Ingrese id del proveedor">
                <br><br>
                <input type="submit" name="boton" value="Buscar">
                <br><br>
        </div>
    </div>
    </form>
    </main>
    <?php
    include '../Logica/CrearProveedor.php';
    ?>
</body>
</html>