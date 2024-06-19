<?php

$server = "localhost";

$user = "root";
$pass = "";
$db = "distribuidoraCesde";

$conexion = mysqli_connect($server, $user, $pass, $db);
/*
$componentesDb = new CreacionBD();
$componentesDb->crearBD($conexion);
$componentesDb->crearTablaTIpoUsuario($conexion);
$componentesDb->crearTablaUsuario($conexion);
$componentesDb->crearCategoria($conexion);
$componentesDb->crearProveedor($conexion);
$componentesDb->crearProducto($conexion);
$componentesDb->crearFactura($conexion);
$componentesDb->crearVenta($conexion);
*/

class CreacionBD{
    public function crearBD($conexion){
        $sql = "CREATE DATABASE distribuidora";
            if ($conexion->query($sql) === TRUE) {
                    echo "Base de datos creada!";
                } else {
                    die("No se puede crear la base de datos". $conexion->error);
                        }
    }
    public function crearTablaUsuario($conexion){
        $sql = "CREATE TABLE Usuario(
            identificacion int,
            constraint PK_identificacion primary key(identificacion),
            nombreUsuario varchar(100) not null,
            apellidoUsuario varchar(100) not null,
            correoElectronicoUsuario varchar (60) UNIQUE,
            telefonoUsuario numeric (13) not null,
            clave varchar (60) not null,
            fkTipoUsuario int,
	        constraint FK_fktipoUsuario foreign key(fkTipoUsuario) references tipoUsuario(idTipoUsuario)
        )";
            if ($conexion->query($sql) === TRUE) {
                    echo "Tabla usuario creada!";
                } else {
                    die("No se puede crear la tabla.". $conexion->error);
                        }
    }
    public function crearTablaTIpoUsuario($conexion){
        $sql = "CREATE TABLE TipoUsuario(
            idTipoUsuario int AUTO_INCREMENT,
            constraint PK_idTipoUsuario primary key(idTipoUsuario),
            tipoUsuario varchar(45) UNIQUE
        )";
            if ($conexion->query($sql) === TRUE) {
                echo "Tabla tipo usuario creada!";
                } else {
                    die("La tabla tipo usuario no pudo ser creada.". $conexion->error);
                    }
    }
    public function crearCategoria($conexion){
        $sql = "CREATE TABLE Categoria(
            idCategoria int AUTO_INCREMENT,
            constraint PK_idCategoria primary key(idCategoria),
            nombreCategoria varchar(40) UNIQUE
        )";
            if ($conexion->query($sql) === TRUE) {
                    echo "Tabla categoria creada!";
                } else {
                    die("La tabla categoria no pudo ser creada.". $conexion->error);
                        }
    }
    public function crearProveedor($conexion){
        $sql = "CREATE TABLE Proveedor(
            idProveedor int AUTO_INCREMENT,
            constraint PK_idProveedor primary key(idProveedor),
            nombreProveedor varchar(60) not null,
            direccionProveedor varchar(70) not null,
            correoProveedor varchar(50) not null,
            telefonoProveedor numeric(15) not null
        )";
            if ($conexion->query($sql) === TRUE) {
                echo "Tabla proveedor creada!";                
                } else {
                    die("La tabla proveedor no pudo ser creada.". $conexion->error);
                        }
    }
    public function crearProducto($conexion){
        $sql = "CREATE TABLE Producto(
            idProducto int AUTO_INCREMENT,
            constraint PK_idProducto primary key(idProducto),
            nombreProducto varchar(60) not null,
            cantidadProducto numeric(3) not null,
            precioUnitario int not null,
            fkCategoria int,
	        constraint FK_fkCategoria foreign key(fkCategoria) references categoria(idCategoria),
            fkProveedor int,
	        constraint FK_fkProveedor foreign key(fkProveedor) references proveedor(idProveedor)
        )";
            if ($conexion->query($sql) === TRUE) {
                echo "Tabla producto creada!";                
                } else {
                    die("La tabla producto no pudo ser creada.". $conexion->error);
                        }
    }
    public function crearVenta($conexion){
        $sql = "CREATE TABLE Venta(
            idVenta int AUTO_INCREMENT,
            constraint PK_idVenta primary key(idVenta),
            cantidad numeric(3) not null,
            valorUnitario int not null,
            valorTotal int not null,
            fkProducto int,
	        constraint FK_fkProducto foreign key(fkProducto) references producto(idProducto),
            fkVendedor int,
	        constraint FK_fkVendedor foreign key(fkVendedor) references usuario(identificacion),
            fkCliente int,
	        constraint FK_fkCliente foreign key(fkCliente) references usuario(identificacion),
            fkFactura int,
	        constraint FK_fkFactura foreign key(fkFactura) references factura(idFactura)
        )";
            if ($conexion->query($sql) === TRUE) {
                echo "Tabla Venta creada!";
                } else {
                    die("La tabla venta no pudo ser creada.". $conexion->error);
                        }
    }
    public function crearFactura($conexion){
        $sql = "CREATE TABLE Factura(
            idFactura int AUTO_INCREMENT,
            constraint PK_idFactura primary key(idFactura),
            fecha date not null
        )";
            if ($conexion->query($sql) === TRUE) {
                echo "Tabla factura creada!";                
                } else {
                    die("La tabla factura no pudo ser creada.". $conexion->error);
                        }
    }
}


?>