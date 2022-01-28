const form = document.getElementById('frm');
const inputs = document.querySelectorAll('#frm input');

const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
  nombre: /^[a-zA-ZÁ-ÿ\s]{8,40}$/,
  password: /^.{8,16}$/,
  correo: /^[a-zA-Z0-9.-_]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  curp: /^[A-Z0-9]{18}$/,
  rfc: /^[A-Z0-9]{13}$/,
  direccion: /^[a-zA-Z0-9Á-ÿ\s\#\.]{5,40}$/
}

const campos = {
  usuario: false,
  nombre: false,
  password: false,
  correo: false,
  curp: false,
  rfc: false,
  direccion: false
}

const validarFormulario = (e)=>{
  switch(e.target.name){
    case "usuario":
      validarCampo(expresiones.usuario,e.target,'usuario','useralert');
    break;
    case "password":
      validarCampo(expresiones.password,e.target,'password','passalert');
    break;
    case "nombre":
      validarCampo(expresiones.nombre,e.target,'nombre','namealert');
    break;
    case "curp":
      validarCampo(expresiones.curp,e.target,'curp','curpalert');
    break;
    case "rfc":
      validarCampo(expresiones.rfc,e.target,'rfc','rfcalert');
    break;
    case "direccion":
      validarCampo(expresiones.direccion,e.target,'direccion','diralert');
    break;
    case "correo":
      validarCampo(expresiones.correo,e.target,'correo','correoalert');
    break;
  }
}

const validarCampo = (expresion,input,campo,alert)=>{
  if (expresion.test(input.value)) {
    document.getElementById(campo).classList.remove('incorrecto');
    document.getElementById(campo).classList.add('correcto');
    document.getElementById(alert).classList.remove('activo');
    campos[campo]=true;
  }else{
    document.getElementById(campo).classList.add('incorrecto');
    document.getElementById(campo).classList.remove('correcto');
    document.getElementById(alert).classList.add('activo');
    campos[campo]=false;
  }
}

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});

form.addEventListener('submit',(e)=>{
  if(campos.usuario&&campos.password&&campos.nombre&&campos.correo&&campos.curp&&campos.rfc&&campos.direccion){
    texto_usuario=inputs[0].value;
    var x = texto_usuario.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_usuario.charAt(x);
      x--;
    }
    inputs[0].value=cadenaInvertida;

    texto_pass=inputs[1].value;
    var x = texto_pass.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_pass.charAt(x);
      x--;
    }
    inputs[1].value=cadenaInvertida;

    texto_nombre=inputs[2].value;
    var x = texto_nombre.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_nombre.charAt(x);
      x--;
    }
    inputs[2].value=cadenaInvertida;

    texto_curp=inputs[3].value;
    var x = texto_curp.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_curp.charAt(x);
      x--;
    }
    inputs[3].value=cadenaInvertida;

    texto_rfc=inputs[4].value;
    var x = texto_rfc.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_rfc.charAt(x);
      x--;
    }
    inputs[4].value=cadenaInvertida;

    texto_dir=inputs[5].value;
    var x = texto_dir.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_dir.charAt(x);
      x--;
    }
    inputs[5].value=cadenaInvertida;

    texto_correo=inputs[6].value;
    var x = texto_correo.length;
    var cadenaInvertida = "";
    while (x>=0) {
      cadenaInvertida = cadenaInvertida + texto_correo.charAt(x);
      x--;
    }
    inputs[6].value=cadenaInvertida;
  }else {
    e.preventDefault();
    alert("Rellena todos los campos del formulario correctamente!");
  }
});
