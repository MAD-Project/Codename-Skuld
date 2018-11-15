function mostrarCaja() {
    document.getElementById('box').classList.add("abrirlogin");
    document.getElementById("sidebar").classList.add("abrirlogin");
    document.getElementById("main").style.display = "none";
}

function comprobarLogin() {
    if ($('#verLogin').val() == 1) {
        document.getElementById("link").innerHTML = "Mi perfil";
    }
}

function recargarPágina() {
    window.location.replace(window.location.pathname + window.location.search + window.location.hash);
}

function ocultarElementosSidebar(idOcultar, idMostrar) {
    document.getElementById(idOcultar).style.display = "none";
    document.getElementById(idMostrar).style.display = "flex";
}

comprobarLogin();
ocultarElementosSidebar('registro','box');
