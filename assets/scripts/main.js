$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados   = $('.ABMEmpleados');
    var $salir          = $('#salir');

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

    // Se inicializa combo
    $('select').material_select();

    // Se inicializan Datepickers
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    // Se pone el foco en el primer campo del formulario de editar Empleado
    $('.btnEditar').on('click', function(){
        $('#nombre').focus();
    });

    // Se inicializa tooltip
     $('.tooltipped').tooltip({delay: 20});

    $salir.on('click', function(e) {
        e.preventDefault();
        swal({
            title: '¿Deseas salir?',
            type: 'warning',
            showCancelButton: true
        });
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
