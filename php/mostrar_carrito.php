<?php session_start();
	if($_SESSION["autenticado"] != "SI"){
		echo'<script type="text/javascript">
      alert("Inicio de sesion no válido!!");
      location.href="/P16/html/index.htm";
      </script>';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="../css/carrito.css"/>
    <link rel="icon" type="../img/image/png" href="../img/favicon.png" />
		<title>Carrito</title>
	</head>
	<body>
    <div class="container">
      <div class="cabecera">
        <div class="logo"><img src="../img/logo.png" alt="Logo" class="img_logo"></div>
        <div class="menu">
          <a href="home.php"><button type="button" name="home">Home</button></a>
          <a href="catalogo.php"><button type="button" name="productos">Productos</button></a>
          <a href="mostrar_carrito.php"><button type="button" name="carrito">Carrito</button></a>
          <a href="cerrar.php"><button type="button" name="login">Logout</button></a>
        </div>
      </div>
      <div class="productos">
        <?php
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
          $consulta="SELECT articulo,precio,imagen, COUNT(*) as cantidad FROM carrito WHERE usuario = '$usuario' GROUP BY articulo";
          $resultado=$conexion->query($consulta);
          echo "<br /><br /><table>";
          echo "<tr>";
          echo "<td></td>";
          echo "<td><h4>Producto</h4></td>";
          echo "<td><h4>Cantidad</h4></td>";
          echo "<td><h4>Total</h4></td>";
          echo "<td><h4>Eliminar articulo</h4></td>";
          echo "</tr>";
          while($fila=$resultado->fetch_assoc()) {
            $total = $fila["cantidad"]*$fila["precio"];
            echo "<tr>";
            echo "<td><img src='../img/".$fila["imagen"].".jpeg' alt='".$fila["articulo"]."'></td>";
            echo "<td>".$fila['articulo']."</td>";
            echo "<td>".$fila['cantidad']."</td>";
            echo "<td>$".$total."</td>";
            echo "<td><a href='borrar_carrito.php?articulo=".$fila["articulo"]."&cantidad=".$fila['cantidad']."'>Eliminar</a></td>";
            echo "</tr>";
          }
          echo "</table>";

					$resultado->close();
    		?>
      </div>
			<div class="botones">
        <a href="borrar_carrito_completo.php"><button class="eliminar">Eliminar Productos</button></a>
				<a href="agregar_compra.php"><button class="comprar">Comprar Productos</button></a>
				<a href="mostrar_compras.php"><button class="mostrar">Mostrar Compras Recientes</button></a>
      </div>
      <div class="enlaces">
        <p>Siguenos en nuestra página de FB</p>
        <a href="https://www.facebook.com/Violetas-107761007534935/"><img src="../img/logofb.png" alt=""></a>
      </div>
      <div class="pie">
        <p>Violetas S.A de C.V</p>
        <p>Panindícuaro, Mich</p>
        <p>58570</p>
      </div>
    </div>
	</body>
</html>
