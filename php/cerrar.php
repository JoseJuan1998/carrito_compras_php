<?PHP
  session_start();
  session_destroy();
  echo'<script type="text/javascript">
    alert("Cerraste sesion correctamente!");
    location.href="/P16/html/index.htm";
    </script>';
?>
