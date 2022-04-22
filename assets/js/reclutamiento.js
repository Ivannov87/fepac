$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#reclutamientoForm').validate({
            rules: {
                iap: {
                    required: true,
                    minlength: 2
                },
                iam: {
                    required: true,
                    minlength: 2
                },
                iname: {
                    required: true,
                    minlength: 2
                },
                iemail: {
                    required: true,
                    email: true
                },
                itema: {
                    required: true,
                    minlength: 10
                },
                iocupacion: {
                    required: true,
                    minlength: 5
                },
                iacerca: {
                    required: true,
                    minlength: 150
                }
            },
            messages: {
                iap: {
                    required: "falta agregar un apellido paterno !",
                    minlength: "el nombre debe contener almenos 2 caracteres"
                },
                iam: {
                    required: "falta agregar un apellido materno !",
                    minlength: "el nombre debe contener almenos 2 caracteres"
                },
                iname: {
                    required: "falta agregar un nombre !",
                    minlength: "el nombre debe contener almenos 2 caracteres"
                },
                iemail: {
                    required: "sin correo, sin mensaje"
                },
                itema: {
                    required: "falta agregar un tema !",
                    minlength: "el tema debe tener almenos 10 caracteres"
                },
                iocupacion: {
                    required: "falta agregar una ocupación !",
                    minlength: "la ocupación  debe tener almenos 5 caracteres"
                },
                iacerca: {
                    required: "tienes que escribir algo para enviar este formulario !",
                    minlength: "debes escribir algo más, el mensaje es muy corto ... "
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"talento.php",
                    success: function(data) {
                        // $('#contactForm :input').attr('disabled', 'disabled');
                        // $('#contactForm').fadeTo( "slow", 1, function() {
                        //     $(this).find(':input').attr('disabled', 'disabled');
                        //     $(this).find('label').css('cursor','default');
                        //     $('#success').fadeIn()
                        //     $('.modal').modal('hide');
		                // 	$('#success').modal('show');
                        // })
                        alert('Mensaje Enviado correctamente !');
                        window.location.href= "https://fepac.com.mx/index.html";
                        
                    },
                    error: function(err) {
                        // $('#contactForm').fadeTo( "slow", 1, function() {
                        //     $('#error').fadeIn()
                        //     $('.modal').modal('hide');
		                // 	$('#error').modal('show');
                        // })
                        alert(err);
                    }
                })
                
            }
        })
    })
        
 })(jQuery)
})