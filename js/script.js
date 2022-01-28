const form = document.getElementById('frm');
const inputs = document.querySelectorAll('#frm input');

const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
  password: /^.{8,16}$/
}

const campos = {
  usuario: false,
  password: false
}

const validarFormulario = (e)=>{
  switch(e.target.name){
    case "usuario":
      validarCampo(expresiones.usuario,e.target,'usuario','useralert');
    break;
    case "password":
      validarCampo(expresiones.password,e.target,'password','passalert');
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
  if(campos.usuario&&campos.password){
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
    inputs[1].value=cadenaInvertida

  }else {
    e.preventDefault();
    alert("Rellena todos los campos del formulario correctamente!");
  }
});

$(function(){
  $('#recargar').click(function(){
    document.location.reload();
    return false;
  });
});
