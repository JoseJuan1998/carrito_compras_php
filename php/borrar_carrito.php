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
  $usuario = $_SESSION['usuario'];
  $articulo = $_GET['articulo'];
  $cantidad = $_GET['cantidad'];

  $consulta="DELETE FROM carrito WHERE articulo='$articulo' AND usuario='$usuario'";
  mysqli_query($conexion,$consulta) or die (mysqli_error());

  $consulta="UPDATE productos set cantidad=cantidad+'$cantidad' where articulo='$articulo'";
  mysqli_query($conexion,$consulta) or die (mysqli_error());
  mysqli_close($conexion);

  echo'<script type="text/javascript">
    alert("Articulo eliminado!");
    location.href="mostrar_carrito.php";
    </script>';
?>
