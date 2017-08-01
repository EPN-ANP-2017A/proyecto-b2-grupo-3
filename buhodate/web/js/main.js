$("#reg_Ini").validate({
    rules:{
        alias:{
            requiered:true
        },
        mail:{
            requiered:true,
            email:true,
            dominio:true
        },
        pass:{
            requiered:true,
            minlength:5
        },
        rpass:{
            requiered:true,
            equalTo: "#pass"
        }
    },
    messages:{
        alias:{
            requiered:"Es necesario un nombre de usuario"
        },
        mail:{
            requiered:"Ingresa un correo electrónico institucional"
        },
        pass:{
            requiered:"Vuelve a escribir la contraseña"
        }
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('form-control-danger').removeClass('form-control-success');
        $(element).parent().addClass('has-danger').removeClass('has-success');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('form-control-danger').addClass('form-control-success');
        $(element).parent().removeClass('has-danger').addClass('has-success');
    }
});