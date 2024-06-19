<?php
include("../BD/Conexion.php");

$tipoDeUsuario = new registrarTipoUsuario();
$tipoDeUsuario ->crearTipoUsuarioEnDb($conexion);
$tipoDeUsuario ->traerTipoUsuario($conexion);
$tipoDeUsuario ->eliminarTipoUsuario($conexion);

class registrarTipoUsuario{
    public function crearTipoUsuarioEnDb($conexion){
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Guardar':
                        if(strlen(trim($_POST["tipoUsuario"])) >= 1 ){
                            $tipoUsuario = trim($_POST["tipoUsuario"]);
                            $sql = "INSERT INTO TipoUsuario
                                        (tipoUsuario) VALUES
                             ('$tipoUsuario')";
                            $resultado = mysqli_query($conexion, $sql);
                            if ($resultado === TRUE) {
                                echo "<script>
                                alert('Tipo usuario agregado!');
                                </script>";
                            } else {
                                die("No se puede crear el tipo de usuario.". $conexion->error);
                                    }
            }
        }
        }
    }
    public function traerTipoUsuario($conexion){
        $consulta = "SELECT t.idTipoUsuario AS id_tipoUsuario, t.tipoUsuario AS tipoUsuario
        FROM TipoUsuario t
    ";
   
       if(isset($_POST["boton"])){
           switch($_POST["boton"]){
               case 'Buscar':
                   $idTipousuario = trim($_POST["idTipoUsuario"]); 
                   $consulta = "SELECT t.idTipoUsuario AS id_tipoUsuario, t.tipoUsuario AS tipoUsuario
                                FROM TipoUsuario t
                                WHERE t.idTipoUsuario = '$idTipousuario'";
                   break;
           default:
           break;   
   
           }
       }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Tipo de Usuario</th><th> Tipo de Usuario </th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_tipoUsuario']. "</td>";
                $output.= "<td>". $row['tipoUsuario']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay tipos de usuarios disponibles.";
        }
        echo $output;
   
    }
    public function eliminarTipoUsuario($conexion) {
        $consulta = "";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Eliminar':
                    $idTipousuario = trim($_POST["idTipoUsuarioEliminar"]); 
                    $consulta = "DELETE FROM TipoUsuario WHERE  idTipoUsuario = '$idTipousuario'";
                    $resultado = mysqli_query($conexion, $consulta);
                        if ($resultado === TRUE) {
                            echo "<script>
                            alert('Tipo usuario eliminado!');
                            </script>";
                        } else {
                            die("No se puede eliminar el tipo de usuario". $conexion->error);
                                }
                    break;
                    default:
                    break;   
  
            }
        }

    }
}
