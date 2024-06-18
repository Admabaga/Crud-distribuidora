<?php
include("../BD/Conexion.php");

$proveedor = new Proveedor();
$proveedor->crearProveedorEnDb($conexion);
$proveedor->traerProveedores($conexion);
$proveedor->eliminarProveedor($conexion);

class Proveedor {
    public function crearProveedorEnDb($conexion) {
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Registrar':
                    if( strlen($_POST["nombreProveedor"]) >= 1 &&
                        strlen($_POST["direccionProveedor"]) >= 1 &&
                        strlen($_POST["correoElectronicoProveedor"]) >= 1 &&
                        strlen($_POST["telefonoProveedor"]) >= 1  ){
                            $nombreProveedor = trim($_POST["nombreProveedor"]);
                            $direccionProveedor = trim($_POST["direccionProveedor"]);
                            $correoElectronicoProveedor = trim($_POST["correoElectronicoProveedor"]);
                            $telefonoProveedor = trim($_POST["telefonoProveedor"]);
                            $sql = "INSERT INTO proveedor
                            (nombreProveedor, direccionProveedor, correoProveedor, telefonoProveedor) VALUES
                            ('$nombreProveedor'
                            ,'$direccionProveedor'
                            ,'$correoElectronicoProveedor'
                            ,'$telefonoProveedor')";
                            $resultado = mysqli_query($conexion, $sql);
                            if ($resultado === TRUE) {
                                echo "Proveedor registrado!";
                            } else {
                                die("No se puede registrar proveedor". $conexion->error);
                                    }
                }
            }
        }
    }

    public function traerProveedores($conexion){
        $consulta = "SELECT pr.idProveedor AS id_proveedor, pr.nombreProveedor AS nombreProveedor,
               pr.direccionProveedor AS direccion,
                pr.correoProveedor AS correo,  pr.telefonoProveedor AS telefono
        FROM proveedor pr
    ";
         
           if(isset($_POST["boton"])){
               switch($_POST["boton"]){
                   case 'Buscar':
                       $idProveedor = trim($_POST["idProveedor"]); 
                       $consulta = "SELECT pr.idProveedor AS id_proveedor, pr.nombreProveedor AS nombreProveedor,
                                    pr.direccionProveedor AS direccion,
                                    pr.correoProveedor AS correo,  pr.telefonoProveedor AS telefono
                                    FROM proveedor pr
                                    WHERE pr.idProveedor = '$idProveedor'";
                       break;
               default:
               break;   
       
               }
           }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Proveedor</th><th> Nombre proveedor</th><th> Direccion </th><th> Correo </th><th> Telefono </th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_proveedor']. "</td>";
                $output.= "<td>". $row['nombreProveedor']. "</td>";
                $output.= "<td>". $row['direccion']. "</td>";
                $output.= "<td>". $row['correo']. "</td>";
                $output.= "<td>". $row['telefono']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay proveedores disponibles.";
        }
        echo $output;
   
    }

    
    public function eliminarProveedor($conexion) {
        $consulta = "";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Eliminar':
                    $idProveedor = trim($_POST["idProveedorEliminar"]); 
                    $consulta = "DELETE FROM proveedor WHERE  idProveedor = '$idProveedor'";
                    $resultado = mysqli_query($conexion, $consulta);
                        if ($resultado === TRUE) {
                            echo "Proveedor eliminado!";
                        } else {
                            die("No se puede eliminar el proveedor". $conexion->error);
                                }
                    break;
                    default:
                    break;   
  
            }
        }

    }

}



?>