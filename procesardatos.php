<?php 
$lada=3626;
$NombreCliente=$_POST['txtnombre'];
$ApellidoCliente=$_POST['txtapellido'];
$CURP=$_POST['CURP'];
$Correo=$_POST['Correo'];
$ano=$_POST['YEAR'];
$mes=$_POST['MM'];
$dia=$_POST['DD'];
$password=$_POST['password'];
$Domicilio=$_POST['domicilio'];
$Telefono=$_POST['telefono'];
$fecha=$ano."-".$mes."-".$dia;
$saldo=0;

//conexion
$conn = mysqli_connect("localhost", "root", "", "bankstar");
// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
//insertar datos usuarios
$sql="INSERT INTO usuario (nombre,apellido,CURP,corre,contrasena,fecha,domicilio,telefono) VALUES ('$NombreCliente', '$ApellidoCliente', '$CURP', '$Correo', '$password', '$fecha','$Domicilio', '$Telefono')";
if(mysqli_query($conn, $sql)) {
    echo "Datos registrados correctamente";
} else {
    echo "Error al registrar los datos: " . mysqli_error($conn);
}


//conseguir id del usuario
$sql_id = "SELECT id_usuario FROM `usuario` WHERE CURP='$CURP'";
$resultado = mysqli_query($conn, $sql_id);

if (mysqli_num_rows($resultado) > 0) {
  while($fila = mysqli_fetch_assoc($resultado)) {
  	$id = $fila["id_usuario"];
    //echo "numero de cliente = ".$id;
  }
} else {
  echo "0 resultados";
}
//numeros de tarjeta con lada
$numero_tarjeta = '';
for ($i = 0; $i < 14; $i++) {
  $numero_tarjeta .= rand(0, 9);
}
$numeroTarjeta=$lada.$numero_tarjeta;
//CV
$cv = '';
for ($i = 0; $i < 3; $i++) {
  $cv .= rand(0, 9);
}
$cv=$cv;
//CV
$nip = '';
for ($i = 0; $i < 4; $i++) {
  $nip .= rand(0, 9);
}
$nip=$nip;

//fecha de vencimiento
$fecha_vencimiento = date('Y-m-d', strtotime('+30 days'));
echo $fecha_vencimiento;

//insertar cuenta del cliente
$sqlCuenta="INSERT INTO cuenta (id_usuario, numero_tarjeta, tipo_tarjeta, fecha_vencimiento, cv, nip, saldo) VALUES ('$id', '$numeroTarjeta', 'debito', '$fecha_vencimiento', '$cv', '$nip','$saldo')";
if(mysqli_query($conn, $sqlCuenta)) {
  echo "Cuenta creada";
} else {
    echo "tu cuenta no ha sido creada: " . mysqli_error($conn);
}



header("location:usuario.html");
exit;
?>

