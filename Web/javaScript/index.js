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

comprobarLogin();