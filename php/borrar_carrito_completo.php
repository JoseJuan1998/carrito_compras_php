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
  $consulta="SELECT articulo,precio,imagen, COUNT(*) as cantidad FROM carrito WHERE usuario = '$usuario' GROUP BY articulo";
  $resultado=$conexion->query($consulta);
  while($fila=$resultado->fetch_assoc()) {
    $articulo = $fila["articulo"];
    $cantidad = $fila["cantidad"];
    $consulta="UPDATE productos set cantidad=cantidad+'$cantidad' where articulo='$articulo'";
    mysqli_query($conexion,$consulta) or die (mysqli_error());
  }

  $consulta="DELETE FROM carrito WHERE usuario = '$usuario'";
  mysqli_query($conexion,$consulta) or die (mysqli_error());

  mysqli_close($conexion);
  $resultado->close();

  echo'<script type="text/javascript">
    alert("Articulos del carrito eliminados!");
    location.href="mostrar_carrito.php";
    </script>';
?>
