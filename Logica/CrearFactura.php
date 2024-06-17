<?php
include("../BD/Conexion.php");



$factura = new Factura();
$factura->crearFacturaEnDb($conexion);
$factura->traerFacturas($conexion);

class Factura{
    public function crearFacturaEnDb($conexion){
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Guardar':
                    if(strlen(trim($_POST["fkVenta"])) >= 1 ){
                        $venta = trim($_POST["fkVenta"]);
                        $sql = "INSERT INTO factura
                                    (fkVenta, fecha) VALUES
                                    ('$venta', NOW())";
                        $resultado = mysqli_query($conexion, $sql);
                        if ($resultado === TRUE) {
                        echo "Factura  ingresada!";
                        } else {
                                die("No se puede crear la factura.". $conexion->error);
                                }
                    }
                }
        }

    }

    public function traerFacturas($conexion){
        $consulta = "SELECT f.idFactura AS id_factura, f.fecha AS fecha_factura,
               v.idVenta AS id_venta, v.fkCLiente AS Cliente,  v.fkVendedor AS Vendedor, v.fkProducto AS id_producto,
                v.cantidad AS cantidad_venta, v.valorTotal AS valor_Total,v.valorUnitario AS valor_Unitario
        FROM factura f
        LEFT JOIN venta v ON f.fkVenta = v.idVenta
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
                                LEFT JOIN venta v ON f.fkVenta = v.idVenta
                                ORDER BY f.fecha DESC
                                 WHERE f.idFactura = '$idFactura'";
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
}




?>