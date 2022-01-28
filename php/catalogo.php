<?php session_start();
	if($_SESSION["autenticado"] != "SI"){
		echo'<script type="text/javascript">
      alert("Inicio de sesion no válido!!");
      location.href="/P16/html/index.htm";
      </script>';
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/catalogo.css"/>
    <link rel="icon" type="../img/image/png" href="../img/favicon.png" />
    <title>Productos</title>
  </head>
  <body>
    <div class="container">
      <div class="cabecera">
        <div class="logo"><img src="../img/logo.png" alt="Logo" class="img_logo"></div>
        <div class="menu">
          <a href="home.php"><button type="button" name="home">Home</button></a>
          <a><button type="button" name="productos">Productos</button></a>
          <a href="mostrar_carrito.php"><button type="button" name="carrito">Carrito</button></a>
          <a href="cerrar.php"><button type="button" name="login">Logout</button></a>
        </div>
      </div>
      <div class="ofertas">
        <h1>OFERTAS PARA TI</h1>
        <p>Da click sobre el artículo que desee agregar al carrito</p>
      </div>
      <div class="oferts">
        <?php
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
    			$password=$_SESSION['password'];
          $consulta="select * from productos";
          $resultado=$conexion->query($consulta);
          while($fila=$resultado->fetch_assoc()) {
            if (!($fila["imagen"]=="violetfb")) {
              if ($fila["precio"]<20 && $fila["cantidad"]>0) {
                echo "<div><a href='agregar_carrito.php?usuario=".$usuario."&articulo=".$fila["articulo"]."&cantidad=".$fila["cantidad"]."&precio=".$fila["precio"]."&imagen=".$fila["imagen"]."'><img name='".$fila["imagen"]."' id='".$fila["imagen"]."' src='../img/".$fila["imagen"].".jpeg' alt='".$fila["articulo"]."'></a></div>";
              }
            }
          }
          $resultado->close();
        ?>
      </div>
      <div class="ultimos">
        <h1>ULTIMAS PIEZAS</h1>
        <p>Da click sobre el artículo que desee agregar al carrito</p>
      </div>
      <div class="ultims">
        <?php
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
    			$password=$_SESSION['password'];
          $consulta="select * from productos";
          $resultado=$conexion->query($consulta);
          while($fila=$resultado->fetch_assoc()) {
            if (!($fila["imagen"]=="violetfb")) {
              if ($fila["cantidad"]==1) {
                echo "<div><a href='agregar_carrito.php?usuario=".$usuario."&articulo=".$fila["articulo"]."&cantidad=".$fila["cantidad"]."&precio=".$fila["precio"]."&imagen=".$fila["imagen"]."'><img src='../img/".$fila["imagen"].".jpeg' alt='".$fila["articulo"]."'></a></div>";
              }
            }
          }
          $resultado->close();
        ?>
      </div>
      <div class="otros">
        <h1>OTROS PRODUCTOS</h1>
        <p>Da click sobre el artículo que desee agregar al carrito</p>
      </div>
      <div class="otrs">
        <?php
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
    			$password=$_SESSION['password'];
          $consulta="select * from productos";
          $resultado=$conexion->query($consulta);
          while($fila=$resultado->fetch_assoc()) {
            if (!($fila["imagen"]=="violetfb")) {
              if ($fila["cantidad"]>1 && $fila["precio"]>19) {
                echo "<div><a href='agregar_carrito.php?usuario=".$usuario."&articulo=".$fila["articulo"]."&cantidad=".$fila["cantidad"]."&precio=".$fila["precio"]."&imagen=".$fila["imagen"]."'><img src='../img/".$fila["imagen"].".jpeg' alt='".$fila["articulo"]."'></a></div>";
              }
            }
          }
          $resultado->close();
        ?>
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
