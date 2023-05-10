<<?php 
$Correo=$_POST['Correo'];
$password=$_POST['password'];

//conexion
$conn = mysqli_connect("localhost", "root", "", "bankstar");
// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuario WHERE corre = '$Correo' AND contrasena = '$password';";
$resultado = mysqli_query($conn, $sql);

// Mostrar los resultados
if (mysqli_num_rows($resultado) > 0) {
  while($fila = mysqli_fetch_assoc($resultado)) {
    echo "el correo es : " . $fila["corre"] . " - contraseña: " . $fila["contrasena"] . "<br>";
    header("location:usuario.html");
exit;
  }
} else {
  echo "<script>alert('Cuenta no encontrada');</script>";
  header("location:Acceder.html");
}

// Cerrar la conexión
mysqli_close($conn);



 ?>
