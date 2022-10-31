// aqui iran las validaciones para evitar las inyecciones

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     // para que no de espacio
     /*if(e.target.name != 'nombre'){
         if(key==32) { // backspace.
            return false;
         }
     } */

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }

 function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = " 0123456789";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     // no permite espaciado
     if(e.target.name != 'nombre'){
         if(key==32) { // backspace.
            return false;
         }
     } 

     if(numeros.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }

 function mostrarProgramarFecha(num){
        let dato = document.getElementById("radioEstado1").value;
        if(dato == "A Entrevista"){
            document.getElementById("groupFecha"+num).hidden = false;
        }
    
 }
 function ocultarProgramarFecha(num){
    let dato = document.getElementById("radioEstado2").value;
        if(dato == "No acepto"){
            document.getElementById("groupFecha"+num).hidden = true;
        }
 }

