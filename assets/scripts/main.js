$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados = $('.ABMEmpleados');

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

    // Se inicializa combo
    $('select').material_select();

    // Se inicializa tooltip
     $('.tooltipped').tooltip({delay: 50});

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
