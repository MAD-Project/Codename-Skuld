function validarFormulario(idFormulario) {

    $('input[type=password]').keyup(function () {

        var pswd = $(this).val();

        //validate the length
        if (pswd.length < 8) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }

        //validate letter
        if (pswd.match(/[A-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if (pswd.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if (pswd.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

    }).focus(function () {
        if (window.innerWidth > 1030) {
            $('#pswd_info').show();
        }
    }).blur(function () {
        $('#pswd_info').hide();
    });

    let exprePassword = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$");
    let expreEmail = new RegExp("^[A-z0-9]{3,}@[A-z0-9]{2,}.[A-z0-9]{2,4}$");

    if ($(idFormulario + " input.require").val() == "") {

        $('#nombreU').css('background', 'red');
        $('#email').css('background', 'red');
        $('#password').css('background', 'red');
        return false;
    } else if ($('#nombreU').val() == "") {

        $('#nombreU').css('background', 'red');
        return false;
    } else if ($(idFormulario + " input[type='email'].require").length &&
        !expreEmail.test($(idFormulario + " input[type='email'].require").val())) {

        $('#email').css('background', 'red');
        $('#nombreU').css('background', '#faffbd');
        $('#password').css('background', '#faffbd');
        return false;
    } else if ($(idFormulario + " input[type='password'].require").length &&
        !exprePassword.test($(idFormulario + " input[type='password'].require").val())) {

        $('#password').css('background', 'red');
        $('#nombreU').css('background', '#faffbd');
        $('#email').css('background', '#faffbd');
        return false;
    } else {
        $('#nombreU').css('background', '#faffbd');
        $('#email').css('background', '#faffbd');
        $('#password').css('background', '#faffbd');
        return true;
    }

}

function eviarDatos(url, idFormulario, method) {

    let selectorjQformulario = "#" + idFormulario;
    let valido = validarFormulario(selectorjQformulario);

    if (valido) {

        let datos = $(selectorjQformulario).serialize();

        $.ajax({

            url: url,
            method: method,
            data: datos,
            success: function (data) {

                if (data === "nombreUsuario") {

                    $("#resultado").html("Este nombre de usuario ya existe");
                } else if (data === "email") {

                    $("#resultado").html("Este email ya existe");
                } else {

                    document.getElementById(idFormulario).reset();
                    $("#resultado").html("Usuario registrado con exito");

                    recargarPagina();

                }
            },
            error: function (data) {

                alert("Error" + data);
            }

        });
    }
}