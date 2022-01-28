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

  $usuario = $_GET['usuario'];
  $articulo = $_GET['articulo'];
  $cantidad = $_GET['cantidad'];
  $precio = $_GET['precio'];
  $imagen = $_GET['imagen'];
  $cantidad_nueva = $cantidad-1;

  $consulta="INSERT INTO carrito values ('$articulo','$precio','$imagen','$usuario')";
  mysqli_query($conexion,$consulta) or die (mysqli_error());

  $consulta="UPDATE productos set cantidad='$cantidad_nueva' where articulo='$articulo'";
  mysqli_query($conexion,$consulta) or die (mysqli_error());
  mysqli_close($conexion);

  echo'<script type="text/javascript">
    alert("Articulo: '.$articulo.'\\nPrecio: $'.$precio.'\\nDisponibles: '.$cantidad_nueva.'");
    location.href="catalogo.php";
    </script>';
?>
