<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Estilo.css">
    <link rel="icon" href="../Img/Valknut.svg.png" type="image/png">
    <title>Inicio</title>
</head>
<body>

    <main>
    <form action="" method="post">
    
    <div class="input-group">
        <div class="Login">
            <h2>Inicio sesion:</h2>
            <input type="email" name="correoCredencial" placeholder="Ingrese el correo">
            <br><br>
            <input type="password" name="passwordCredencial" placeholder="Ingrese la contraseña">
            <br><br>
            <input type="submit" name="inicioSesion" value="Iniciar">
            <br><br>
        </div>
    </div>
    </form>
</main>

    <?php
    include '../Logica/InicioSesion.php';
    ?>
</body>
</html>