
function validarFormulario(idFormulario) {

    let exprePassword = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$");
    let expreEmail = new RegExp("^[A-z0-9]{3,}@[A-z0-9]{2,}.[A-z0-9]{2,4}$");

    if ($(idFormulario+" input.require").val() == ""){

        alert("Algunos de los campos son obligatorios");
        return false;
    }
    else if ($(idFormulario+" input[type='password'].require").length
        && !exprePassword.test($(idFormulario+" input[type='password'].require").val())){

        alert("La contraseña no es válida");
        return false;
    }
    else if ($(idFormulario+" input[type='email'].require").length
        && !expreEmail.test($(idFormulario+" input[type='email'].require").val())){

        alert("El email no es válido");
        return false;
    }
    else {
        return true;
    }

}

function eviarDatos(url,idFormulario,method) {

    event.preventDefault();
    let selectorjQformulario = "#"+idFormulario;
    let valido = validarFormulario(selectorjQformulario);

    if (valido){

        let datos = $(selectorjQformulario).serialize();

        $.ajax({

            url: url,
            method: method,
            data: datos,
            success: function (data) {
debugger;
                if (data === "nombreUsuario"){

                    $("#resultado").html("Este nombre de usuario ya existe");
                }
                else if (data === "email"){

                    $("#resultado").html("Este email ya existe");
                }
                else {

                    document.getElementById(idFormulario).reset();
                    $("#resultado").html("Usuario registrado con exito");

                    recargarPágina();

                }
            },
            error: function (data) {

                alert("Error"+data);
            }

        });
    }
}