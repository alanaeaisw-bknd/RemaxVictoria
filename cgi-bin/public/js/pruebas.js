

var elementos = document.querySelectorAll(".cuad-act");

elementos.forEach(function(elemento) {
  elemento.setAttribute("draggable", "true");
});

var contenedores = document.querySelectorAll("#contenedor");
contenedores.forEach(contenedor => {
contenedor.addEventListener("drop", function(event) {
  console.log('Drop');
  event.preventDefault();
  const textocabronson = document.createElement('p');
  textocabronson.textContent = 'si se pudo mi chingon';
  contenedor.appendChild(textocabronson);
})
});