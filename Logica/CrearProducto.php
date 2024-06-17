<?php
include("../BD/Conexion.php");


$producto = new Producto();
$producto->crearProductoEnDb($conexion);
$producto->traerProductos($conexion);
class Producto {
    public function crearProductoEnDb($conexion) {
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Guardar':
                    if(strlen($_POST["nombreProducto"]) >= 1 &&
                        strlen($_POST["cantidadProducto"]) >= 1 &&
                        strlen($_POST["precioUnitario"]) >= 1 &&
                        strlen($_POST["fkCategoria"]) >= 1 &&
                        strlen($_POST["fkProveedor"]) >= 1 ){
                            $nombreProducto = TRIM($_POST["nombreProducto"]);
                            $cantidadProducto = trim($_POST["cantidadProducto"]);
                            $precioUnitario = trim($_POST["precioUnitario"]);
                            $fkCategoria = trim($_POST["fkCategoria"]);
                            $fkProveedor = trim($_POST["fkProveedor"]);
                            $sql = "INSERT INTO producto
                            (nombreProducto, cantidadProducto, precioUnitario, fkCategoria, fkProveedor) VALUES
                            ('$nombreProducto',
                            '$cantidadProducto',
                            '$precioUnitario',
                            '$fkCategoria',
                            '$fkProveedor')";
                            $resultado = mysqli_query($conexion, $sql);
                            if ($resultado === TRUE) {
                                echo "Producto registrado!";
                            } else {
                                die("No se puede registrar producto". $conexion->error);
                                    }
                    }
            }
        }
    }

    public function traerProductos($conexion){
        $consulta = "SELECT p.idProducto AS id_producto, p.nombreProducto AS nombreProducto,
               p.cantidadProducto AS cantidad, p.precioUnitario AS precio,  c.nombreCategoria AS categoria,
                pr.nombreProveedor AS proveedor
                
        FROM producto p
        LEFT JOIN categoria c ON p.fkCategoria = c.idCategoria
        LEFT JOIN proveedor pr ON p.fkproveedor = pr.idProveedor
  
    ";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Buscar':
                    $idProducto = trim($_POST["idProducto"]); 
                    $consulta = "SELECT p.idProducto AS id_producto, p.nombreProducto AS nombreProducto,
                                p.cantidadProducto AS cantidad, p.precioUnitario AS precio,  c.nombreCategoria AS categoria,
                                pr.nombreProveedor AS proveedor
                                FROM producto p
                                LEFT JOIN categoria c ON p.fkCategoria = c.idCategoria
                                LEFT JOIN proveedor pr ON p.fkproveedor = pr.idProveedor
                                 WHERE p.idProducto = '$idProducto'";
                    break;
            default:
            break;   
    
            }
        }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Producto</th><th> Nombre </th><th> Cantidad </th><th> Precio </th><th> Categoria </th><th> Proveedor </th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_producto']. "</td>";
                $output.= "<td>". $row['nombreProducto']. "</td>";
                $output.= "<td>". $row['cantidad']. "</td>";
                $output.= "<td>". $row['precio']. "</td>";
                $output.= "<td>". $row['categoria']. "</td>";
                $output.= "<td>". $row['proveedor']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay productos disponibles.";
        }
        echo $output;
   
    }

}

?>