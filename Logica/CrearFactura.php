<?php
include("../BD/Conexion.php");



$factura = new Factura();
$factura->crearFacturaEnDb($conexion);
$factura->traerFacturas($conexion);
$factura->eliminarFactura($conexion);

class Factura{
    public function crearFacturaEnDb($conexion){
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Crear factura':
                        $sql = "INSERT INTO factura
                                    ( fecha) VALUES
                                    (NOW())";
                        $resultado = mysqli_query($conexion, $sql);
                        if ($resultado === TRUE) {
                            echo "<script>
                            alert('Factura registrada!');
                            </script>";
                        } else {
                                die("No se puede crear la factura.". $conexion->error);
                                }
                }
        }

    }

    public function traerFacturas($conexion){
        $consulta = "SELECT f.idFactura AS id_factura, f.fecha AS fecha_factura,
               v.idVenta AS id_venta, v.fkCLiente AS Cliente,  v.fkVendedor AS Vendedor, v.fkProducto AS id_producto,
                v.cantidad AS cantidad_venta, v.valorTotal AS valor_Total,v.valorUnitario AS valor_Unitario
        FROM factura f
        LEFT JOIN venta v ON f.idFactura = v.fkFactura
        ORDER BY f.fecha DESC
    ";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Buscar':
                    $idFactura = trim($_POST["idFactura"]); 
                    $consulta = "SELECT f.idFactura AS id_factura, f.fecha AS fecha_factura,
                                v.idVenta AS id_venta, v.fkCLiente AS Cliente,  v.fkVendedor AS Vendedor, v.fkProducto AS id_producto,
                                v.cantidad AS cantidad_venta, v.valorTotal AS valor_Total,v.valorUnitario AS valor_Unitario
                                FROM factura f
                                LEFT JOIN venta v ON f.idFactura = v.fkFactura
                                WHERE f.idFactura = '$idFactura'
                                ORDER BY f.fecha DESC
                                ";
                    break;
            default:
            break;   
    
            }
        }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Factura</th><th>Fecha Factura</th><th>ID Venta</th><th>ID CLiente</th><th>Vendedor</th><th>Producto</th><th>Cantidad</th><th>Valor total</th><th>Valor Unitario</th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_factura']. "</td>";
                $output.= "<td>". $row['fecha_factura']. "</td>";
                $output.= "<td>". $row['id_venta']. "</td>";
                $output.= "<td>". $row['Cliente']. "</td>";
                $output.= "<td>". $row['Vendedor']. "</td>";
                $output.= "<td>". $row['id_producto']. "</td>";
                $output.= "<td>". $row['cantidad_venta']. "</td>";
                $output.= "<td>". $row['valor_Total']. "</td>";
                $output.= "<td>". $row['valor_Unitario']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay facturas disponibles.";
        }
        echo $output;
   
    }

    public function eliminarFactura($conexion) {
        $consulta = "";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Eliminar':
                    $idFactura = trim($_POST["idFacturaEliminar"]); 
                    $consulta = "DELETE FROM factura WHERE  idFactura = '$idFactura'";
                    $resultado = mysqli_query($conexion, $consulta);
                        if ($resultado === TRUE) {
                            echo "<script>
                            alert('Factura eliminada!');
                            </script>";
                        } else {
                            die("No se puede eliminar la factura". $conexion->error);
                                }
                    break;
                    default:
                    break;   
  
            }
        }

    }
}




?>