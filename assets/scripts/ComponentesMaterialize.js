var ComponentesMaterialize = function () {
	'use strict';
	
	this.cargar = function() {
		inicializarSideNav();
	    inicializarModals();
	    inicilizarCombos();
	    // inicializarDatePickers(); De momento se va a usar el datepicker de nativo de HTML5
	    inizializarTooltips();
	};

	/* Métodos privados */

    function inicializarSideNav() {
        $('.button-collapse').sideNav();
    }

    function inicializarModals() {
        $('.modal-trigger').leanModal();
    }

    function inicilizarCombos() {
        $('select').material_select();
    }

    function inicializarDatePickers() {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 100
        });
    }
    function inizializarTooltips() {
        $('.tooltipped').tooltip({delay: 20});
    }	
};