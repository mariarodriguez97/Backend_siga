function openTab(tabName) {
    // Ocultar todas las pestañas
    var i, tabContent;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }

    // Mostrar la pestaña seleccionada
    document.getElementById(tabName).style.display = "block";
}

// Mostrar la pestaña de "Admin" por defecto al cargar
window.onload = function() {
    document.getElementById('admin').style.display = 'block';
};
