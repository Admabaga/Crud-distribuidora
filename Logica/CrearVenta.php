<?php
include("../BD/Conexion.php");


$venta = new Venta();
$venta->crearVentaEnDb($conexion);
$venta->traerVentas($conexion);
class Venta {
    public function crearVentaEnDb($conexion) {
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Registrar':
                    if( strlen($_POST["fkProducto"]) >= 1 &&
                        strlen($_POST["fkVendedor"]) >= 1 &&
                        strlen($_POST["fkCLiente"]) >= 1 &&
                        strlen($_POST["cantidad"]) >= 1  ){
                            $producto = trim($_POST["fkProducto"]);
                            $vendedor = trim($_POST["fkVendedor"]);
                            $cliente = trim($_POST["fkCLiente"]);
                            $cantidad = trim($_POST["cantidad"]);
                            $consulta = $conexion->prepare("SELECT precioUnitario FROM producto WHERE idProducto =?");
                            $consulta->bind_param('i', $producto); 
                            $consulta->execute();
                            $productoBD = $consulta->get_result()->fetch_assoc();
                            if ($productoBD) {
                                $precioProducto = $productoBD['precioUnitario'];
                                $total = $precioProducto * $cantidad;
                            }
                            $sql = "INSERT INTO venta
                            (fkProducto, fkVendedor, fkCliente, cantidad, valorUnitario, valorTotal) VALUES
                            ('$producto','$vendedor','$cliente','$cantidad','$precioProducto','$total')";
                            $resultado = mysqli_query($conexion, $sql);
                            if ($resultado === TRUE) {
                                echo "Venta registrada!";
                            } else {
                                die("No se puede registrar venta". $conexion->error);
                                    }
                }
            }
        }
    }

    public function traerVentas($conexion){
        $consulta = "SELECT v.idVenta AS id_venta, u.nombreUsuario AS Cliente,  uv.nombreUsuario AS Vendedor,
         p.nombreProducto AS producto, v.cantidad AS cantidad_venta,
           v.valorTotal AS valor_Total, v.valorUnitario AS valor_Unitario
        FROM venta v
        LEFT JOIN producto p ON v.fkProducto = p.idProducto
        LEFT JOIN usuario u ON v.fkCliente = u.identificacion
        LEFT JOIN usuario uv ON v.fkVendedor = u.identificacion
    ";

    if(isset($_POST["boton"])){
        switch($_POST["boton"]){
            case 'Buscar':
                $idVenta = trim($_POST["idVenta"]); 
                $consulta = "SELECT v.idVenta AS id_venta, u.nombreUsuario AS Cliente,  uv.nombreUsuario AS Vendedor,
                            p.nombreProducto AS producto, v.cantidad AS cantidad_venta,
                            v.valorTotal AS valor_Total, v.valorUnitario AS valor_Unitario
                            FROM venta v
                            LEFT JOIN producto p ON v.fkProducto = p.idProducto
                            LEFT JOIN usuario u ON v.fkCliente = u.identificacion
                            LEFT JOIN usuario uv ON v.fkVendedor = u.identificacion
                            WHERE v.idVenta = '$$idVenta'";
                break;
        default:
        break;   

        }
    }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Venta</th><th>CLiente</th><th>Vendedor</th><th>Producto</th><th>Cantidad</th><th>Valor total</th><th>Valor Unitario</th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_venta']. "</td>";
                $output.= "<td>". $row['Cliente']. "</td>";
                $output.= "<td>". $row['Vendedor']. "</td>";
                $output.= "<td>". $row['producto']. "</td>";
                $output.= "<td>". $row['cantidad_venta']. "</td>";
                $output.= "<td>". $row['valor_Total']. "</td>";
                $output.= "<td>". $row['valor_Unitario']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay ventas disponibles.";
        }
        echo $output;
   
    }

}


?>