<?PHP
    include 'conexion.php';
    if (isset($_POST['usuario'])&&isset($_POST['password'])&&isset($_POST['nombre'])&&isset($_POST['curp'])&&isset($_POST['rfc'])&&isset($_POST['direccion'])&&isset($_POST['correo'])) {
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];
      $nombre = $_POST['nombre'];
      $curp = $_POST['curp'];
      $rfc = $_POST['rfc'];
      $direccion = $_POST['direccion'];
      $correo = $_POST['correo'];

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

      $cadena_invertida="";
      for($i=strlen($nombre);$i>0;$i--){
				$cadena_invertida .= substr($nombre,$i-1,1);
      }
      $nombre=$cadena_invertida;

      $cadena_invertida="";
      for($i=strlen($curp);$i>0;$i--){
				$cadena_invertida .= substr($curp,$i-1,1);
      }
      $curp=$cadena_invertida;

      $cadena_invertida="";
      for($i=strlen($rfc);$i>0;$i--){
				$cadena_invertida .= substr($rfc,$i-1,1);
      }
      $rfc=$cadena_invertida;

      $cadena_invertida="";
      for($i=strlen($direccion);$i>0;$i--){
				$cadena_invertida .= substr($direccion,$i-1,1);
      }
      $direccion=$cadena_invertida;

      $cadena_invertida="";
      for($i=strlen($correo);$i>0;$i--){
				$cadena_invertida .= substr($correo,$i-1,1);
      }
      $correo=$cadena_invertida;

      $usuario_reg= "/^[a-zA-Z0-9\_\-]{4,16}$/";
      $nombre_reg= "/^[a-zA-ZÁ-ÿ\s]{8,40}$/";
      $password_reg= "/^.{8,16}$/";
      $correo_reg= "/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
      $curp_reg= "/^[A-Z0-9]{18}$/";
      $rfc_reg= "/^[A-Z0-9]{13}$/";
      $direccion_reg= "/^[a-zA-Z0-9Á-ÿ\s\#\.]{5,40}$/";

      $campos=array();

      if(!preg_match($usuario_reg,$usuario)){
        array_push($campos,"El usuario solo debe llevar letras y numeros");
      }

      if(!preg_match($password_reg,$password)){
        array_push($campos,"La contraseña debe ser de al menos 8 caractéres");
      }

      if(!preg_match($nombre_reg,$nombre)){
        array_push($campos,"El nombre debe ser completo");
      }

      if(!preg_match($curp_reg,$curp)){
        array_push($campos,"CURP no válido");
      }

      if(!preg_match($rfc_reg,$rfc)){
        array_push($campos,"RFC no válido");
      }

      if(!preg_match($direccion_reg,$direccion)){
        array_push($campos,"Dirección no válida");
      }

      if(!preg_match($correo_reg,$correo)){
        array_push($campos,"Ingresa un correo válido");
      }

      if (count($campos)>0) {
        $mensaje = "";
        for ($i=0; $i < count($campos); $i++) {
          $mensaje .= "-".$campos[$i]."\\n";
        }
        echo'<script type="text/javascript">;
        alert("'.$mensaje.'");
        location.href="/P13/html/index.html";
        </script>';
      } else {
        echo'<script type="text/javascript">;
        alert("Datos Correctos!");
        </script>';

        $millave = "17121073";
        $consulta="INSERT INTO usuario values (AES_ENCRYPT('$usuario','$millave'), AES_ENCRYPT('$password','$millave'), AES_ENCRYPT('$nombre','$millave'), AES_ENCRYPT('$curp','$millave'), AES_ENCRYPT('$rfc','$millave'), AES_ENCRYPT('$direccion','$millave'), AES_ENCRYPT('$correo','$millave'))";
        mysqli_query($conexion,$consulta) or die (mysqli_error());
        mysqli_close($conexion);
        echo'<script type="text/javascript">
          alert("Te has registrado correctamente!");
          location.href="/P16/html/index.htm";
          </script>';
        }
  }else{
      echo'<script type="text/javascript">
        alert("Llena todos los campos del formulario!");
        </script>';
    }
?>
