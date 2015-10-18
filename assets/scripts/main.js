$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados       = $('.ABMEmpleados');
    var $salir              = $('#salir');
    var $btnEditarLista     = $('.btn-editar-lista');
    var $btnEditarEmpleado  = $('.btn-editar-empleado');
    var $formEditarEmpleado = $('#formEditarEmpleado');

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

    // Se inicializa combo
    $('select').material_select();

    // Se inicializan Datepickers
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 100
    });

    // Se pone el foco en el primer campo del formulario de editar Empleado
    $btnEditarLista.on('click', function(){
        $('#nombre').focus();
    });

    // Se inicializa tooltip
     $('.tooltipped').tooltip({delay: 20});

    $salir.on('click', function(e) {
        e.preventDefault();
        swal({
            title: '¿Deseas salir?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#039be5"
        });
    });

    // Editar Empleado
    $btnEditarEmpleado.on('click', function(e) {

        var formData = $formEditarEmpleado.serialize();

        e.preventDefault();

        // TODO: validaciones del form con Validate.js
        $.ajax({
            url: 'source/ABM/empleados/editar.php',
            method: 'POST',
            data: formData,
            success: function(data){
                swal({
                    title: 'Usuario editado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al editar usuario',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }
        });
        return false;
    });

     // ABM Empleados
    $ABMEmpleados.on('click', function(e) {
        
        //TODO: Mostrar loader
    	e.preventDefault();

    	var idUsuario = $(this).data('id');
        var accion = $(this).data('accion');

		$.ajax({
			url: 'source/ABM/Empleados.php?accion=' + accion,
            data: {id: idUsuario},
			method: 'POST',
			success: function(data) {
                debugger;
			},
			error: function(err) {
                debugger;
				console.error(err);
			},
			done: function(){
                // TODO: ocultar el loader
			}
		});
    });
    
    console.info("DOM ready");
});
