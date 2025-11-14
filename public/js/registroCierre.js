document.addEventListener("DOMContentLoaded", function () {
    const checkboxDesarrollador = document.getElementById("modoDeveloper");
    const selectIngreso = document.getElementById("ingreso");
    const labelIngreso = document.querySelector("label[for='ingreso']");

    function actualizarEstado() {
        if (checkboxDesarrollador.checked) {
            // Si es desarrollador: ocultar y limpiar ingreso
            selectIngreso.value = "";
            selectIngreso.setAttribute("disabled", "true");
            selectIngreso.style.display = "none";
            labelIngreso.style.display = "none";
        } else {
            // Si no es desarrollador: mostrar ingreso
            selectIngreso.removeAttribute("disabled");
            selectIngreso.style.display = "block";
            labelIngreso.style.display = "block";
        }
    }

    // Escuchar cuando se cambia el checkbox
    checkboxDesarrollador.addEventListener("change", actualizarEstado);

    // Aplicar al cargar la página (por si se recarga con datos viejos)
    actualizarEstado();
});
