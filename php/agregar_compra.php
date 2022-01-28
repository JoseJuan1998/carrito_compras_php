<?php session_start();
	if($_SESSION["autenticado"] != "SI"){
		echo'<script type="text/javascript">
      alert("Inicio de sesion no válido!!");
      location.href="/P16/html/index.htm";
      </script>';
	}
?>

<?php
  include 'conexion.php';
  $usuario=$_SESSION['usuario'];
  $fecha = date("Y-m-d H:i:s");
  $consulta="SELECT articulo,precio,imagen, COUNT(*) as cantidad FROM carrito WHERE usuario = '$usuario' GROUP BY articulo";
  $resultado=$conexion->query($consulta);
  while($fila=$resultado->fetch_assoc()) {
    $articulo = $fila["articulo"];
    $precio = $fila["precio"];
    $imagen = $fila["imagen"];
    $cantidad = $fila["cantidad"];
    $consulta="INSERT INTO ventas values ('$fecha','$articulo','$cantidad','$precio','$imagen','$usuario')";
    mysqli_query($conexion,$consulta) or die (mysqli_error());
  }

  $consulta="DELETE FROM carrito WHERE usuario = '$usuario'";
  mysqli_query($conexion,$consulta) or die (mysqli_error());

  mysqli_close($conexion);
  $resultado->close();

  echo'<script type="text/javascript">
    alert("Tú compra se realizó con éxito!");
    location.href="mostrar_carrito.php";
    </script>';
?>
