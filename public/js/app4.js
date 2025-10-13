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
  const menunav = document.querySelector("#btn_nav_menu");
  const nav = document.querySelector("#navbarSupportedContent");

  const hideToggleButtons = function() {
      toggleButton.style.display = "none";
      toggleButton2.style.display = "none";
  };

  const showToggleButtons = function() {
      toggleButton.style.display = "none";
      toggleButton2.style.display = "block";
  };

  toggleButton.addEventListener("click", function() {
      if (dashboard.classList.contains("open")) {
          dashboard.classList.remove("open");
          content.classList.remove("pushed");
          showToggleButtons();
      } else {
        if (nav && nav.classList.contains('show')) {
          menunav.click();
        }
          dashboard.classList.add("open");
          content.classList.add("pushed");
          hideToggleButtons();
      }
  });

  toggleButton2.addEventListener("click", function() {
      if (dashboard.classList.contains("open")) {
          dashboard.classList.remove("open");
          content.classList.remove("pushed");
          showToggleButtons();
      } else {
        if (nav && nav.classList.contains('show')) {
          menunav.click();
        }
          dashboard.classList.add("open");
          content.classList.add("pushed");
          hideToggleButtons();
      }
  });

  hideButton.addEventListener("click", function() {
      dashboard.classList.remove("open");
      content.classList.remove("pushed");
      showToggleButtons();  // Asegúrate de mostrar los botones cuando se oculta el dashboard.
  });

  menunav.addEventListener("click", function() {
    if (dashboard.classList.contains("open")) {
      dashboard.classList.remove("open");
      content.classList.remove("pushed");
      showToggleButtons();
    }
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
        actividadarrastrada.setAttribute("id-act", idArrastrado.getAttribute("id-act"));
        actividadarrastrada.setAttribute("estado", idArrastrado.getAttribute("estado"));
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
        event.target.setAttribute("estado", "1");
        event.target.draggable = false;
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
        event.target.setAttribute("estado", "0");
        event.target.draggable = true;
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
document.addEventListener("touchstart", function(event){
  if (event.target.classList.contains("cho")){
      event.target.classList.remove("cho");
      event.target.classList.add("cha");
      event.target.setAttribute("estado", "1");
      event.target.draggable = false;
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
      event.target.setAttribute("estado", "0");
      event.target.draggable = true;
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

menunav.addEventListener("click", function() {
  if (dashboardd.classList.contains("open")) {
    dashboardd.classList.remove("open");
    content.classList.remove("pushed");
    showToggleButtons();
  }
});