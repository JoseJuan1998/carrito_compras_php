<?php
  session_start();
  include 'conexion.php';
  if (isset($_POST['usuario'])&&isset($_POST['password'])&&isset($_POST['captcha'])) {
    $captcha_cookie = $_COOKIE['captcha'];
    $captcha_user = $_POST['captcha'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $millave = "17121073";

    $cadena_invertida="";
    for($i=strlen($usuario);$i>0;$i--){
      $cadena_invertida .= substr($usuario,$i-1,1);
    }
    $usuario=$cadena_invertida;

    $cadena_invertida="";
    for($i=strlen($password);$i>0;$i--){
      $cadena_invertida .= substr($password,$i-1,1);
    }
    $password=$cadena_invertida;

    if ($captcha_cookie == sha1($captcha_user)) {
      echo "CAPTCHA CORRECTA!";
      setcookie("captcha","",time()-60*3);
    }else{
      echo "CAPTCHA INCORRECTA!";
    }

    $consulta = "select AES_DECRYPT(usuario, '$millave'),AES_DECRYPT(pass, '$millave') from usuario where usuario=AES_ENCRYPT('$usuario','$millave') and pass=AES_ENCRYPT('$password','$millave')";
    $resultado=$conexion->query($consulta);

    if ($resultado->num_rows > 0) {
      while($fila=$resultado->fetch_array()) {
        $sesion=session_id();
        $_SESSION['usuario']=$usuario;
        $_SESSION['password']=$password;
        $_SESSION["autenticado"]= "SI";
      }
      echo'<script type="text/javascript">
        alert("Iniciaste correctamente!");
        location.href="/P16/php/home.php";
        </script>';
    }else{
      echo'<script type="text/javascript">
        alert("Tus datos no son correctos o no te has registrado!");
        location.href="/P16/html/index.htm";
        </script>';
    }
    $resultado->close();
  }
?>
