const actividades = document.querySelectorAll('.cho');
const contenedores = document.querySelectorAll('.dropc');
var identificador = -1;
var actidiv = document.querySelectorAll(".cho");
var permiso = document.querySelector('.todo');
permiso = permiso.getAttribute("permiso");
console.log(permiso)


document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById("toggleButton");
    const hideButton = document.getElementById("hideButton");
    const toggleButton2 = document.getElementById("toggleButton2");
    const dashboard = document.getElementById("dashboard");
    const content = document.getElementById("content");
  
    toggleButton.addEventListener("click", function() {
        if (dashboard.classList.contains("open")) {
            dashboard.classList.remove("open");
            content.classList.remove("pushed");
        } else {
            dashboard.classList.add("open");
            content.classList.add("pushed");
        }
    });
    toggleButton2.addEventListener("click", function() {
      if (dashboard.classList.contains("open")) {
          dashboard.classList.remove("open");
          content.classList.remove("pushed");
      } else {
          dashboard.classList.add("open");
          content.classList.add("pushed");
      }
    });
    hideButton.addEventListener("click", function() {
      dashboard.classList.remove("open");
      content.classList.remove("pushed");
    });
});
if(permiso == 'limited'){
actividades.forEach(function(elemento) {
    elemento.setAttribute("draggable", "true");
  });

document.addEventListener("dragstart", function(event) {
    event.dataTransfer.setData("text/plain", event.target.className); //envias la clase del objeto arrastrado
    event.dataTransfer.setData("id", event.target.id); //envias la id del objeto arrastrado
    var elementoArrastrado = event.target; //iguala el objeto que estas arrastrando a una variable 
    var claseDelElementoArrastrado = elementoArrastrado.className; // obtiene la clase del elemento arrastradro
    if(claseDelElementoArrastrado == 'cho'){  //comparativa para saber si se estan arrastrando tareas DENTRO DE LA MISMA AGENDA, es decir no arrastrar una actividad desde fuera
      event.dataTransfer.setData("texto2", event.target.textContent);//obtengo el texto del objeto arrastrado
      event.dataTransfer.setData("text/plain4", event.target.getAttribute("data-actividad-id"));
    }
});

contenedores.forEach(contenedor => {
    contenedor.addEventListener('dragenter', e => {
    });
    contenedor.addEventListener('dragleave', e => {
    });
    contenedor.addEventListener('dragover', e => {
      e.preventDefault();
    });
    contenedor.addEventListener('drop', function(event) { //entramos al evento drop
      console.log('Drop');
      event.preventDefault();
      var actid2 = event.dataTransfer.getData("text/plain4");
      var elementoArrastrado = event.dataTransfer.getData("text/plain"); //obtenemos la clase del elemento del evento drag
      var idArrastrado = event.dataTransfer.getData("id");
      var idArrastrado = document.getElementById(idArrastrado);

      if(elementoArrastrado == 'cho'){ //si el elemento es una actividad que ya esta en la agenda, es decir, que se quiere pasar a otro dia por asi decirlo
        var texto2 = event.dataTransfer.getData("texto2"); // obtenemos los datos que enviamos en el eventro drag, en este caso el texto
        const actividadarrastrada = document.createElement('div'); // crea un elemento div
        actividadarrastrada.textContent = texto2; // crea texto para ese elemento
        actividadarrastrada.classList.add('cho');
        actividadarrastrada.setAttribute('data-actividad-id', actid2);
        actividadarrastrada.id = identificador;
        identificador = identificador + 1;
        actividadarrastrada.setAttribute("draggable", "true");
        contenedor.appendChild(actividadarrastrada); //lo agrega al contenedor
        idArrastrado.parentNode.removeChild(idArrastrado);
      }
      $.ajax({
        type: 'PUT',
        url: agendaUpdateUrl,
        data: {
          id : idArrastrado.getAttribute("id-act"),
          dia_semana_id: contenedor.getAttribute("dia"),
          momento_dia: contenedor.getAttribute("momento"),
          estado: idArrastrado.getAttribute("estado")
        }
      });
      
    });
});

document.addEventListener("click", function(event){
    if (event.target.classList.contains("cho")){
        event.target.classList.remove("cho");
        event.target.classList.add("cha");
        $.ajax({
            type: 'PUT',
            url: agendaUpdateEstadoUrl,
            data: {
              id : event.target.getAttribute("id-act"),
              estado: 1
            }
          });
    }
    
    else if (event.target.classList.contains("cha")){
        event.target.classList.remove("cha");
        event.target.classList.add("cho");
        $.ajax({
            type: 'PUT',
            url: agendaUpdateEstadoUrl,
            data: {
              id : event.target.getAttribute("id-act"),
              estado: 0
            }
          });
    }
    
});
}
else{

}