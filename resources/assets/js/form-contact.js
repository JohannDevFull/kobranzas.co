//const { default: Axios } = require("axios");
//window.axios = require('axios');





function validate(event) {
    event.preventDefault();
    
    var btn = document.getElementById('send');
    var loader = document.getElementById('loader');
    var text = document.getElementById('wait-text');
    text.innerHTML=' Espera por favor....';
    text.style.color="black";
    loader.style.display = "inline-block";
    text.style.display = "block";
    btn.innerHTML = '';
     var btn_parent = document.getElementById('send-btn');
     btn_parent.classList.add('disabled'); 


    var errors;
    reset();
    let nombre = document.getElementById('name').value;
    let correo = document.getElementById('email').value;
    let telefono = document.getElementById('phone').value;
    let ciudad = document.getElementById('city').value;
    let tipo_documento = document.getElementById('select').value;
    let documento = document.getElementById('doc').value;
    let otro = document.getElementById('otro').value;
    let mensaje = document.getElementById('message').value;


    axios.post('/contactRequest', {
        nombre: nombre,
        correo: correo,
        telefono: telefono,
        ciudad: ciudad,
        tipo_documento: tipo_documento,
        documento: documento,
        mensaje: mensaje,
        tipo_de_consulta: otro
    }).then((response) => {
     btn_parent.classList.remove('disabled'); 

        resetValues();
        loader.style.display = "none";
        text.innerHTML='Se ha enviado tu correo.';
        text.style.color="green";
        btn.innerHTML = 'Enviar';
        errors = '';
        document.getElementById("otro-error").innerHTML = '';
        return (false);
    }).catch((err) => {
     btn_parent.classList.remove('disabled'); 

        loader.style.display = "none";
        text.style.display = "none";
        btn.innerHTML = 'Enviar';
        errors = err.response.data;
        //    console.log(errors.errors);
        document.getElementById("name-error").innerHTML = errors.errors.nombre ? errors.errors.nombre : '';
        document.getElementById("email-error").innerHTML = errors.errors.correo ? errors.errors.correo : '';
        document.getElementById("phone-error").innerHTML = errors.errors.telefono ? errors.errors.telefono : '';
        document.getElementById("city-error").innerHTML = errors.errors.ciudad ? errors.errors.ciudad : '';
        document.getElementById("select-error").innerHTML = errors.errors.tipo_documento ? errors.errors.tipo_documento : '';
        document.getElementById("doc-error").innerHTML = errors.errors.documento ? errors.errors.documento : '';
        document.getElementById("message-error").innerHTML = errors.errors.mensaje ? errors.errors.mensaje : '';
        document.getElementById("otro-error").innerHTML = errors.errors.tipo_de_consulta ? errors.errors.tipo_de_consulta : '';
        document.getElementById("error").innerHTML = 'Corrige los errores para poder ponernos en contacto.';
        return (false);
    });
}
function reset(){
    document.getElementById("name-error").innerHTML = '';
    document.getElementById("email-error").innerHTML = '';
    document.getElementById("phone-error").innerHTML = '';
    document.getElementById("city-error").innerHTML =  '';
    document.getElementById("select-error").innerHTML = '';
    document.getElementById("doc-error").innerHTML =  '';
    document.getElementById("message-error").innerHTML = '';
    document.getElementById("otro-error").innerHTML = '';
    document.getElementById("error").innerHTML = '';
    
}
function resetValues(){
     document.getElementById('name').value='';
     document.getElementById('email').value='';
     document.getElementById('phone').value='';
     document.getElementById('city').value='';
     document.getElementById('doc').value='';
     document.getElementById('message').value='';
     document.getElementById('select').value='';
     document.getElementById('otro').value='';
}
function count() {
    var texto=document.getElementById('message').value;
     for (var i = 0; i < texto.length+1; i++) {
        var cantidadCaracteres = i;
        document.getElementById("counter").innerHTML=cantidadCaracteres;
    }
}