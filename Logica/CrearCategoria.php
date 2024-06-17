<?php
include("../BD/Conexion.php");

$categoria = new registrarCategoria();
$categoria ->crearCategoriaEnBd($conexion);
$categoria ->traerCategorias($conexion);
$categoria ->eliminarCategoria($conexion);
class registrarCategoria{
    public function crearCategoriaEnBd($conexion){
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Guardar':
                    if(strlen(trim($_POST["nombreCategoria"])) >= 1 ){
                        $categoriaNombre = trim($_POST["nombreCategoria"]);
                        $sql = "INSERT INTO categoria
                        (nombreCategoria) VALUES
                        ('$categoriaNombre')";
                        $resultado = mysqli_query($conexion, $sql);
                        if ($resultado === TRUE) {
                        echo "Categoria  ingresada!";
                        } else {
                            die("No se puede crear la categoria.". $conexion->error);
                                }
                }            
            }
        }
    }

    
    public function traerCategorias($conexion){
        $consulta = "SELECT c.idCategoria AS id_categoria, c.nombreCategoria AS categoria
        FROM categoria c
    ";

            if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Buscar':
                    $idCategoria = trim($_POST["idCategoria"]); 
                    $consulta = "SELECT c.idCategoria AS id_categoria, c.nombreCategoria AS categoria
                                FROM categoria c
                                WHERE c.idCategoria = '$idCategoria'";
                    break;
            default:
            break;   

            }
            }
        $validarFacturas = mysqli_query($conexion, $consulta);
        if ($validarFacturas->num_rows > 0) {
            $output = "<table border='1'><tr><th>ID Categoria</th><th>Tipo categoria</th></tr>";
            while($row = $validarFacturas->fetch_assoc()) {
                $output.= "<tr>";
                $output.= "<td>". $row['id_categoria']. "</td>";
                $output.= "<td>". $row['categoria']. "</td>";
                $output.= "</tr>";
            }
            $output.= "</table>";
        } else {
            $output = "No hay categorias disponibles.";
        }
        echo $output;
   
    }
    public function eliminarCategoria($conexion) {
        $consulta = "";
        if(isset($_POST["boton"])){
            switch($_POST["boton"]){
                case 'Eliminar':
                    $idCategoria = trim($_POST["idCategoriaEliminar"]); 
                    $consulta = "DELETE FROM categoria WHERE  idCategoria = '$idCategoria'";
                    $resultado = mysqli_query($conexion, $consulta);
                        if ($resultado === TRUE) {
                            echo "Categoria eliminada!";
                        } else {
                            die("No se puede eliminar la categoria". $conexion->error);
                                }
                    break;
                    default:
                    break;   
  
            }
        }

    }
}



?>