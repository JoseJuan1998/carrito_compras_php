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
    <link rel="stylesheet" href="../css/index.css"/>
    <link rel="icon" type="../img/image/png" href="../img/favicon.png" />
    <title>Violetas</title>
  </head>
  <body>
    <div class="container">
      <div class="cabecera">
        <div class="logo"><img src="../img/logo.png" alt="Logo" class="img_logo"></div>
        <div class="menu">
          <a><button type="button" name="home">Home</button></a>
          <a href="../php/catalogo.php"><button type="button" name="productos">Productos</button></a>
          <a href="../php/mostrar_carrito.php"><button type="button" name="carrito">Carrito</button></a>
          <a href="../php/cerrar.php"><button type="button" name="login">Logout</button></a>
        </div>
      </div>
      <div class="principal">
        <img src="../img/violetfb.png" alt="Página de Facebook">
      </div>
      <div class="noticias">
        <div><img src="../img/brocha.jpeg" alt="Página de Facebook"></div>
        <div><img src="../img/labial.jpeg" alt="Página de Facebook"></div>
        <div><img src="../img/plancha.jpeg" alt="Página de Facebook"></div>
        <div><img src="../img/iluminador.jpeg" alt="Página de Facebook"></div>
        <div><img src="../img/mascarilla.jpeg" alt="Página de Facebook"></div>
        <div><img src="../img/paleta.jpeg" alt="Página de Facebook"></div>
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
