<?php
include("../BD/Conexion.php");

$usuario = new Usuario();
$usuario->crearUsuarioEnDb($conexion);
$usuario->traerusuarios($conexion);
$usuario->eliminarUsuarioDb($conexion);
$usuario->actualizarUsuario($conexion);
class Usuario {
    public function crearUsuarioEnDb($conexion) {
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Registrar':
                    if(strlen($_POST["identificacion"]) >= 1 &&
                    strlen($_POST["nombreUsuario"]) >= 1 &&
                    strlen($_POST["apellidoUsuario"]) >= 1 &&
                    strlen($_POST["correoElectronico"]) >= 1 &&
                    strlen($_POST["telefono"]) >= 1 &&
                    strlen($_POST["password"]) >= 1 &&
                    strlen($_POST["fkTipoUsuario"]) >= 1 ){
                        $id = TRIM($_POST["identificacion"]);
                        $nombreUsuario = trim($_POST["nombreUsuario"]);
                        $apellidoUsuario = trim($_POST["apellidoUsuario"]);
                        $correoElectronico = trim($_POST["correoElectronico"]);
                        $telefono = trim($_POST["telefono"]);
                        $password = trim($_POST["password"]);
                        $fkTipoUsuario = trim($_POST["fkTipoUsuario"]);
                        $sql = "INSERT INTO usuario
                        (identificacion, nombreUsuario, apellidoUsuario, clave, telefonoUsuario,
                         correoElectronicoUsuario, fkTipoUsuario) VALUES
                         ('$id',
                         '$nombreUsuario',
                         '$apellidoUsuario',
                         '$password',
                         '$telefono',
                         '$correoElectronico',
                         '$fkTipoUsuario')";
                        $resultado = mysqli_query($conexion, $sql);
                        if ($resultado === TRUE) {
                            echo "<script>
                            alert('Usuario registrado!');
                            </script>";
                        } else {
                            die("No se puede registrar usuario". $conexion->error);
                                }
                    }   
            
                }
         }   
    }
    public function traerUsuarios($conexion){
        $consulta = "SELECT u.identificacion AS identificacion, u.nombreUsuario AS nombre,
        u.apellidoUsuario AS apellido, u.clave AS direccion,  u.telefonoUsuario AS telefono,
        u.correoElectronicoUsuario AS correo, t.tipoUsuario AS tipoUsuario
        FROM usuario u
        LEFT JOIN TipoUsuario t ON u.fktipoUsuario = t.idtipoUsuario";

        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Buscar':
                    $idUsuario = trim($_POST["idUsuario"]); 
                    $consulta = "SELECT u.identificacion AS identificacion, u.nombreUsuario AS nombre,
                               u.apellidoUsuario AS apellido, u.clave AS direccion,  u.telefonoUsuario AS telefono,
                               u.correoElectronicoUsuario AS correo, t.tipoUsuario AS tipoUsuario
                               FROM usuario u 
                               LEFT JOIN TipoUsuario t ON u.fktipoUsuario = t.idtipoUsuario
                               WHERE u.identificacion = '$idUsuario'";
                    break;
            default:
            break;   
  
            }
        }
    
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>Identificacion</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Correo</th><th>Tipo usuario</th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['identificacion']. "</td>";
                $output.= "<td>". $row['nombre']. "</td>";
                $output.= "<td>". $row['apellido']. "</td>";
                $output.= "<td>". $row['telefono']. "</td>";
                $output.= "<td>". $row['correo']. "</td>";
                $output.= "<td>". $row['tipoUsuario']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay usuarios disponibles.";
        }
        echo $output;
    }

    public function eliminarUsuarioDb($conexion) {
        $consulta = "";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Eliminar':
                    $idUsuario = trim($_POST["idUsuarioEliminar"]); 
                    $consulta = "DELETE FROM usuario WHERE  identificacion = '$idUsuario'";
                    $resultado = mysqli_query($conexion, $consulta);
                        if ($resultado === TRUE) {
                            echo "<script>
					alert('Usuario eliminado!');
					</script>";

                        } else {
                            die("No se puede eliminar el usuario". $conexion->error);
                                }
                    break;
                    default:
                    break;   
  
            }
        }

    }
    public function actualizarUsuario($conexion) {
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Actualizar':
                    $id = trim($_POST["idActualizarUsuario"]); // Corrección aquí
                    $nombreUsuario = trim($_POST["actualizarNombreUsuario"]);
                    $apellidoUsuario = trim($_POST["actualizarApellido"]);
                    $correoElectronico = trim($_POST["actualizarEmail"]);
                    $telefono = trim($_POST["actualizarTelefono"]);
                    $password = trim($_POST["actualizarPassword"]); // Asumiendo que quieres usar esta contraseña
                    $fkTipoUsuario = trim($_POST["actualizarTipoUsuario"]);
                    
                    // Definir las variables que faltaban
                    $clave = $password; // Debes decidir qué hacer con la contraseña
                    $telefonoUsuario = $telefono;
                    $correoElectronicoUsuario = $correoElectronico;
                    $identificacion = $id; // Asegúrate de que $id es un número
                    
                    $sql = "UPDATE usuario SET 
                    nombreUsuario=?, apellidoUsuario=?, clave=?, telefonoUsuario=?,
                        correoElectronicoUsuario=?, fkTipoUsuario=? WHERE identificacion =?";
                    $resultado = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_bind_param($resultado, "sssisii", $nombreUsuario, $apellidoUsuario, $clave, $telefonoUsuario, $correoElectronicoUsuario, $fkTipoUsuario, $identificacion); // Corrección aquí
                    $ejecutar= mysqli_stmt_execute($resultado);
                    if ($ejecutar === TRUE) {
                        echo "<script>
                        alert('Usuario actualizado!');
                        </script>";
                    } else {
                        die("No se puede actualizar usuario: ". mysqli_error($conexion));
                    }
                }   
            
                }
           
    }
}


?>