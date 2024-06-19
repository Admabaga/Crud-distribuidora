<?php
include("../BD/Conexion.php");


session_start();
header('Content-Type: text/html; charset=UTF-8');
$btninicio=$_POST['inicioSesion'];
if(isset($btninicio)){
    $user=$_POST['correoCredencial'];
    $pass=$_POST['passwordCredencial'];

    $sql="SELECT correoElectronicoUsuario, clave from usuario where correoElectronicoUsuario='$user' and clave = '$pass'";
    $res=$conexion->query($sql);
    $fila=$res->fetch_row();
    
    if($fila[0]==$user && $fila[1]==$pass){
    	$_SESSION['correoElectronicoUsuario']=$fila[0];
        $_SESSION['clave']=$fila[1];
		header('location:../Html/RegistroUsuarioVisual.php');
    }
    else{
    	echo "<script>
					alert('Usuario y/o Contraseña Incorrectos');
					location.href='../Html/InicioSesionVisual.php';
					</script>";

     	}
}
?>
