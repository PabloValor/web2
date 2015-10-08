$(document).on('ready', function() {
    'use strict';

    var $botonAbm = $('.boton-ABM');

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

     // ABM
    $botonAbm.on('click', function(e) {
    	e.preventDefault();
    	var id = $(this).data('id');
		$.ajax({
			url: '',
			data: id, 
			method: 'POST',
			success: function(data) {

			},
			error: function(err) {
				console.error(err);
			},
			done: function(){

			}
		});
    });
    
    console.info("DOM ready");
});
