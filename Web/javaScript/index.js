function mostrarBox(box) {
    document.getElementById(box).classList.add("abrirlogin");
    document.getElementById("sidebar").classList.add("abrirlogin");
    document.getElementById("main").style.display = "none";
}

function verLogin() {

    if ($('#verLogin').val() != 1){
        alert("no estas logqueado");
    }
    else {
        alert("estas logueado");
    }
}

verLogin();