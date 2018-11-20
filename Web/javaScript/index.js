function mostrarCaja() {
    document.getElementById('box').classList.add("abrirlogin");
    document.getElementById("sidebar").classList.add("abrirlogin");
    document.getElementById("main").style.display = "none";
}

function recargarPágina() {
    window.location.replace(window.location.pathname + window.location.search + window.location.hash);
}

function ocultarElementosSidebar(idOcultar, idMostrar, idOcultar2, idMostrar2) {
    document.getElementById(idMostrar).style.display = "flex";
    document.getElementById(idOcultar).style.display = "none";
    if (idOcultar2 != null) {
        document.getElementById(idOcultar2).style.display = "none";
    }
    if (idMostrar2 != null) {
        document.getElementById(idMostrar2).style.display = "flex";
    }
}

/* jQuery */
function comprobarLogin() {
    if ($('#verLogin').val() == 1) {
        document.getElementById("link").innerHTML = "Mi perfil";
    }
}
/*FIN jQuery */

comprobarLogin();
ocultarElementosSidebar('registro', 'box', null, 'topTemas');