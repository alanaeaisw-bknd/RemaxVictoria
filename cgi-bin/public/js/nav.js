function toggleMenu() {
    var menuContent = document.getElementById("menu-content");
    if (menuContent.style.display === "block") {
      menuContent.style.display = "none";
    } else {
      menuContent.style.display = "block";
    }
}
function actualizarNombreDeUsuario(nuevoNombre) {
  document.getElementById('nombreUsuario').innerText = nuevoNombre;
}